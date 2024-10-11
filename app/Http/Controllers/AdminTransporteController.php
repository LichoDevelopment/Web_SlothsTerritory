<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminTransporteController extends Controller
{
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

                // Generar el enlace de ruta
                $link = $this->generateRouteLink($fechaId, $horarioId);

                $horarios[] = [
                    'horario_id' => $horarioId,
                    'hora' => $hora,
                    'reservas' => $reservasDeHorario,
                    'ruta_link' => $link,
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

    private function generateRouteLink($fecha_id, $horarioId)
    {
        // Obtener las reservas con transporte para la fecha y horario seleccionados
        $reservas = Reserva::where('id_fecha_tour', $fecha_id)
            ->where('id_horario', $horarioId)
            ->whereHas('transporte')
            ->with('transporte')
            ->get();

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

    // private function generarEnlaceGoogleMaps($origen, $destino, $waypoints)
    // {
    //     $baseUrl = 'https://www.google.com/maps/dir/?api=1';

    //     // Limite de waypoints es 25 para cuentas con facturación
    //     if (count($waypoints) > 23) {
    //         // 23 waypoints + origen y destino = 25
    //         $waypoints = array_slice($waypoints, 0, 23);
    //     }

    //     $waypointsStr = implode('|', $waypoints);

    //     $params = [
    //         'origin' => $origen,
    //         'destination' => $destino,
    //         'travelmode' => 'driving',
    //         'waypoints' => 'optimize:true|' . $waypointsStr,
    //     ];

    //     $query = http_build_query($params);

    //     return $baseUrl . '&' . $query;
    // }

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
}
