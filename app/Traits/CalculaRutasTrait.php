<?php

namespace App\Traits;

use App\Models\Reserva;
use App\Models\Fecha_tour;
use App\Models\Horario;
use Carbon\Carbon;

trait CalculaRutasTrait
{
    public function calculateRouteAndTimes($fechaTourId, $horarioId, $isAdm = false)
    {
        // Obtener el horario
        $horario = Horario::find($horarioId);
        if (!$horario) {
            return null;
        }

        // Obtener la hora de llegada programada (hora del tour)
        $scheduledArrivalTime = Carbon::parse($horario->hora_llegada_transporte, 'America/Costa_Rica')->format('H:i:s');

        // Obtener la fecha del tour
        $fechaTour = Fecha_tour::find($fechaTourId);
        if (!$fechaTour) {
            return null;
        }

        // Combinar la fecha del tour y la hora del horario
        $scheduledArrivalDateTime = Carbon::parse($fechaTour->fecha . ' ' . $scheduledArrivalTime, 'America/Costa_Rica');
        // Convertir a timestamp UNIX
        $arrivalTimestamp = $scheduledArrivalDateTime->timestamp;

        // Obtener las reservas con transporte para la fecha y horario dados
        if ($isAdm) {
            $reservas = Reserva::where('id_fecha_tour', $fechaTourId)
                ->where('id_horario', $horarioId)
                ->whereHas('transporte')
                ->with(['transporte'])
                ->get();

        } else {
            $reservas = Reserva::where('id_fecha_tour', $fechaTourId)
                ->where('id_horario', $horarioId)
                ->whereHas('transporte', function ($query) {
                    $query->where('notificacion_enviada', false);
                })
                ->with(['transporte'])
                ->get();
        }

        if ($reservas->isEmpty()) {
            return null;
        }

        // Preparar los waypoints y mapearlos a las reservas
        $waypoints = [];
        $waypointReservations = [];

        foreach ($reservas as $reserva) {
            $transporte = $reserva->transporte;
            if ($transporte && $transporte->latitud && $transporte->longitud) {
                $waypoint = "{$transporte->latitud},{$transporte->longitud}";
                $waypoints[] = $waypoint;
                $waypointReservations[] = $reserva;
            }
        }

        if (empty($waypoints)) {
            return null;
        }

        // Coordenadas de origen y destino
        $origen = '10.471471,-84.603181'; // Sloths Territory
        $destino = '10.471471,-84.603181';

        // Llamar a la API de Google Maps Directions
        $apiKey = env('GOOGLE_MAPS_API_KEY');
        $directionsUrl = 'https://maps.googleapis.com/maps/api/directions/json?' . http_build_query([
            'origin' => $origen,
            'destination' => $destino,
            'waypoints' => 'optimize:true|' . implode('|', $waypoints),
            'key' => $apiKey,
            'arrival_time' => $arrivalTimestamp,
        ]);

        $response = file_get_contents($directionsUrl);
        $data = json_decode($response, true);

        if ($data['status'] === 'OK') {
            $route = $data['routes'][0];
            $waypointOrder = $route['waypoint_order'];
            $legs = $route['legs'];

            // Reordenar los waypoints y reservas según el orden optimizado
            $optimizedWaypoints = [];
            $optimizedReservations = [];

            foreach ($waypointOrder as $index) {
                $optimizedWaypoints[] = $waypoints[$index];
                $optimizedReservations[] = $waypointReservations[$index];
            }

            // Calcular el tiempo total de duración
            $totalDuration = 0;
            foreach ($legs as $leg) {
                $duration = $leg['duration']['value']; // en segundos
                $totalDuration += $duration;
            }

            // Calcular la hora de salida del conductor
            $driverDepartureTimeparsed = Carbon::createFromTimestamp($arrivalTimestamp, 'America/Costa_Rica');
            $departureTimestamp = $arrivalTimestamp - $totalDuration;
            $driverDepartureTime = Carbon::createFromTimestamp($departureTimestamp, 'America/Costa_Rica');

            // Calcular la hora estimada de recogida para cada cliente
            $currentTime = $departureTimestamp;
            $pickUpTimes = [];
            for ($i = 0; $i < count($optimizedReservations); $i++) {
                $leg = $legs[$i];
                $duration = $leg['duration']['value']; // en segundos
                $currentTime += $duration;
                $arrivalTime = Carbon::createFromTimestamp($currentTime, 'America/Costa_Rica');
                $reserva = $optimizedReservations[$i];
                $pickUpTimes[$reserva->id] = $arrivalTime;
            }

            // Generar el enlace de la ruta optimizada
            $routeLink = $this->generateRouteLink($origen, $destino, $optimizedWaypoints);


            // Devolver los datos
            return [
                'driver_departure_time' => $driverDepartureTime,
                'pick_up_times' => $pickUpTimes,
                'optimized_reservations' => $optimizedReservations,
                'route_link' => $routeLink,
            ];
        } else {
            // Manejar el error
            return null;
        }
    }

    private function generateRouteLink($origen, $destino, $waypoints)
    {
        $baseUrl = 'https://www.google.com/maps/dir/?api=1';

        // Construir los parámetros
        $params = [
            'origin' => $origen,
            'destination' => $destino,
            'travelmode' => 'driving',
            'waypoints' => implode('|', $waypoints),
        ];

        // Construir la URL manualmente para evitar codificar las comas
        $queryParts = [];
        foreach ($params as $key => $value) {
            $queryParts[] = $key . '=' . urlencode($value);
        }

        $query = implode('&', $queryParts);
        $url = $baseUrl . '&' . $query;

        return $url;
    }
}
