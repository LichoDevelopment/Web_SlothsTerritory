<?php

namespace App\Http\Controllers;

use App\Models\ConfiguracionTransporte;
use App\Models\Reserva;
use App\Models\Transporte;
use App\Traits\CalculaRutasTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminTransporteController extends Controller
{

    use CalculaRutasTrait;

    public function index(Request $request)
    {
        // Obtener todas las reservas que tienen transporte
        $reservasConTransporte = Reserva::whereHas('transporte')
            ->with(['fecha_tour', 'horario', 'transporte'])
            ->get();

        // Preparar los datos estructurados
        $datos = [];

        // Agrupar las reservas por id_fecha_tour
        $reservasPorFecha = $reservasConTransporte->groupBy('id_fecha_tour');

        foreach ($reservasPorFecha as $fechaId => $reservasDeFecha) {
            $fechaTour = $reservasDeFecha->first()->fecha_tour;
            $fecha = $fechaTour->fecha;
            $fechaFormateada = Carbon::parse($fecha)->format('d/m/Y');

            // Agrupar las reservas de esta fecha por id_horario
            $reservasPorHorario = $reservasDeFecha->groupBy('id_horario');

            $horarios = [];

            foreach ($reservasPorHorario as $horarioId => $reservasDeHorario) {
                $horario = $reservasDeHorario->first()->horario;
                $hora = $horario->hora;

                $agencia = $reservasDeHorario->first()->agencia;
                $nombreAgencia = $agencia ? $agencia->nombre : 'N/A';

                $isAdm = true;
                // Llamar al método calculateRouteAndTimes para obtener los tiempos
                $routeData = $this->calculateRouteAndTimes($fechaId, $horarioId, $isAdm);

                if ($routeData) {
                    $driverDepartureTime = $routeData['driver_departure_time']->format('H:i');
                    $routeLink = $routeData['route_link'];
                    $pickUpTimes = $routeData['pick_up_times'];
                } else {
                    $driverDepartureTime = 'N/A';
                    $routeLink = null;
                    $pickUpTimes = [];
                }

                $horarios[] = [
                    'horario_id' => $horarioId,
                    'hora' => $hora,
                    'reservas' => $reservasDeHorario,
                    'driver_departure_time' => $driverDepartureTime,
                    'route_link' => $routeLink,
                    'pick_up_times' => $pickUpTimes,
                    'driver_arrival_time' => $horario->hora_llegada_transporte,
                    'detail' => $nombreAgencia === 'Bloqueo Transporte' ? 'Transporte Bloqueado' : 'Válido',
                ];
            }

            $datos[] = [
                'fecha' => $fecha,
                'fecha_formateada' => $fechaFormateada,
                'fecha_id' => $fechaId,
                'horarios' => $horarios,
            ];
        }

        return view('admin.transporte.index', compact('datos'));
    }

    private function generateRouteLinkV2($fecha_id, $horarioId)
    {
        // Obtener las reservas con transporte para la fecha y horario seleccionados
        $reservas = Reserva::where('id_fecha_tour', $fecha_id)
            ->where('id_horario', $horarioId)
            ->whereHas('transporte')
            ->with('transporte')
            ->get();

        $fecha = Reserva::find($reservas->first()->id)->fecha_tour->fecha;

        if ($reservas->isEmpty()) {
            return null;
        }

        // Coordenadas de Sloths Territory
        $origen = '10.471471,-84.603181';
        $destino = '10.471471,-84.603181';

        // Obtener los waypoints (puntos de recogida)
        $waypoints = [];

        foreach ($reservas as $reserva) {
            $transporte = $reserva->transporte;
            if ($transporte && $transporte->latitud && $transporte->longitud) {
                $waypoints[] = "{$transporte->latitud},{$transporte->longitud}";
            }
        }

        if (empty($waypoints)) {
            return null;
        }

        // Generar el enlace de Google Maps
        $link = $this->generarEnlaceGoogleMaps($origen, $destino, $waypoints);

        return $link;
    }

    private function generarEnlaceGoogleMaps($origen, $destino, $waypoints)
    {
        $apiKey = env('GOOGLE_MAPS_API_KEY');
        $baseUrl = 'https://www.google.com/maps/dir/?api=1';

        // Limite de waypoints es 25 para cuentas con facturación
        if (count($waypoints) > 23) {
            // 23 waypoints + origen y destino = 25
            $waypoints = array_slice($waypoints, 0, 23);
        }

        // Obtener el orden optimizado de los waypoints mediante la Directions API
        $directionsUrl = 'https://maps.googleapis.com/maps/api/directions/json?' . http_build_query([
            'origin' => $origen,
            'destination' => $destino,
            'waypoints' => 'optimize:true|' . implode('|', $waypoints),
            // 'arrival_time' => `{$fecha} 
            'key' => $apiKey,
        ]);

        $response = file_get_contents($directionsUrl);
        $data = json_decode($response, true);

        if ($data['status'] === 'OK') {
            $optimizedOrder = $data['routes'][0]['waypoint_order'];
            // Reordenar los waypoints según el orden optimizado
            $optimizedWaypoints = [];
            foreach ($optimizedOrder as $index) {
                $optimizedWaypoints[] = $waypoints[$index];
            }
        } else {
            // Manejar el error
            return null;
        }

        // Construir manualmente la URL sin codificar las comas
        $params = [
            'origin' => $origen,
            'destination' => $destino,
            'travelmode' => 'driving',
            'waypoints' => implode('|', $optimizedWaypoints),
        ];

        $queryParts = [];
        foreach ($params as $key => $value) {
            $queryParts[] = $key . '=' . urlencode($value);
        }

        $query = implode('&', $queryParts);
        $url = $baseUrl . '&' . $query;

        return $url;
    }

    public function assignTransport(Request $request)
    {
        // Validar los datos
        $validator = Validator::make($request->all(), [
            'reserva_id' => 'required|exists:reservas,id',
            'direccion' => 'required|string|max:255',
            'latitud' => 'required|numeric',
            'longitud' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Datos inválidos.',
                'errors' => $validator->errors(),
            ], 400);
        }

        // Obtener la reserva
        $reserva = Reserva::find($request->reserva_id);

        // Verificar si ya tiene transporte asignado
        if ($reserva->transporte) {
            return response()->json([
                'success' => false,
                'message' => 'Esta reserva ya tiene transporte asignado.',
            ], 400);
        }

        // Validar disponibilidad de espacios
        $availablePlaces = $this->getAvailableTransportPlaces($reserva);
        $totalPeople = $reserva->cantidad_adultos + $reserva->cantidad_niños + $reserva->cantidad_niños_gratis;

        if ($totalPeople > $availablePlaces) {
            return response()->json([
                'success' => false,
                'message' => 'No hay suficientes espacios disponibles en el transporte.',
            ], 400);
        }

        // Calcular distancia y precio
        $distance = $this->calculateDistance($request->latitud, $request->longitud);

        $placeSelected = [
            'placeId' => $request->placeId,
            'direccion' => $request->direccion,
            'ubicacion' => [
                'lat' => $request->latitud,
                'lng' => $request->longitud
            ]
        ];

        // Crear registro de transporte
        $transport = new Transporte();
        $transport->reserva_id = $reserva->id;
        $transport->punto_recogida = $placeSelected;
        $transport->direccion = $request->direccion;
        $transport->placeId = $request->placeId;
        $transport->latitud = $request->latitud;
        $transport->longitud = $request->longitud;
        $transport->costo = $request->precio * $totalPeople;
        $transport->distancia = $request->distancia;
        $transport->save();

        // Asociar transporte a la reserva
        $reserva->monto_total += $request->precio;
        $reserva->monto_con_descuento += $request->precio;
        $reserva->monto_neto += $request->precio;
        $reserva->save();

        return response()->json([
            'success' => true,
            'message' => 'Transporte asignado correctamente.',
        ]);
    }

    // Método para calcular lugares disponibles
    private function getAvailableTransportPlaces($reserva)
    {
        // Lógica para calcular lugares disponibles
        $configuracion = ConfiguracionTransporte::first();
        $totalPersonas = Reserva::where('id_fecha_tour', $reserva->id_fecha_tour)
            ->where('id_horario', $reserva->id_horario)
            ->whereHas('transporte') // Asegura que sólo considera reservas con transporte
            ->get()
            ->sum(function ($reserva) {
                return $reserva->cantidad_adultos + $reserva->cantidad_niños + $reserva->cantidad_niños_gratis;
            });

        $availablePlaces = $configuracion->cantidad_maxima_pasajeros - $totalPersonas;

        return $availablePlaces;
    }


    // Método para calcular distancia
    private function calculateDistance($lat, $lng)
    {
        $origen = $lat . ',' . $lng;
        $destino = '10.471471,-84.603181'; // Sloths Territory

        $apiKey = env('GOOGLE_MAPS_API_KEY');

        $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?' . http_build_query([
            'origins' => $origen,
            'destinations' => $destino,
            'key' => $apiKey,
        ]);

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if ($data['status'] === 'OK' && $data['rows'][0]['elements'][0]['status'] === 'OK') {
            $distance = $data['rows'][0]['elements'][0]['distance']['value']; // En metros
            return $distance / 1000; // Retornar en kilómetros
        } else {
            // Manejar error
            return null;
        }
    }
}
