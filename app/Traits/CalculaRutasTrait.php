<?php

namespace App\Traits;

use App\Models\Reserva;
use App\Models\Fecha_tour;
use App\Models\Horario;
use Carbon\Carbon;

trait CalculaRutasTrait
{

    protected $origenReal = '10.471471,-84.603181'; // Sloths Territory
    protected $apiKey;

    public function calculateRouteAndTimes($fechaTourId, $horarioId, $isAdm = false)
    {

        $this->apiKey = env('GOOGLE_MAPS_API_KEY');

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
        $arrivalTimestamp = $scheduledArrivalDateTime->timestamp;

        // Obtener las reservas con transporte para la fecha y horario dados
        // if ($isAdm) {
        $reservas = Reserva::where('id_fecha_tour', $fechaTourId)
            ->where('id_horario', $horarioId)
            ->whereHas('transporte')
            ->with(['transporte'])
            ->get();

        // } else {
        //     $reservas = Reserva::where('id_fecha_tour', $fechaTourId)
        //         ->where('id_horario', $horarioId)
        //         ->whereHas('transporte', function ($query) {
        //             $query->where('notificacion_enviada', false);
        //         })
        //         ->with(['transporte'])
        //         ->get();
        // }

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

        // 1. Encontrar el waypoint más lejano usando Distance Matrix
        $farthestData = $this->findFarthestWaypointDistanceMatrix($waypoints, $this->origenReal);
        $farthestWaypoint = $farthestData['waypoint'];
        $farthestIndex = $farthestData['index'];

        // Separar el waypoint más lejano del resto
        $otherWaypoints = $waypoints;
        $otherReservations = $waypointReservations;

        $tieneMultiplesPuntos = count($otherWaypoints) > 1;

        if ($tieneMultiplesPuntos) {
            $farthestReservation = $otherReservations[$farthestIndex];
            array_splice($otherWaypoints, $farthestIndex, 1);
            array_splice($otherReservations, $farthestIndex, 1);

            // 2. Obtener el orden óptimo desde farthestWaypoint -> otros -> ST con optimize:true
            $directionsUrl = 'https://maps.googleapis.com/maps/api/directions/json?' . http_build_query([
                'origin' => $farthestWaypoint,
                'destination' => $this->origenReal,
                'waypoints' => 'optimize:true|' . implode('|', $otherWaypoints),
                'key' => $this->apiKey,
                'arrival_time' => $arrivalTimestamp,
            ]);
        } else {
            $directionsUrl = 'https://maps.googleapis.com/maps/api/directions/json?' . http_build_query([
                'origin' => $this->origenReal,
                'destination' => $this->origenReal,
                'waypoints' => 'optimize:true|' . implode('|', $otherWaypoints),
                'key' => $this->apiKey,
                'arrival_time' => $arrivalTimestamp,
            ]);
        }

        $response = file_get_contents($directionsUrl);
        $data = json_decode($response, true);

        if ($data['status'] !== 'OK') {
            return null;
        }

        $waypointOrder = $data['routes'][0]['waypoint_order'];

        // Reordenar según orden optimizado
        $optimizedWaypoints = [];
        $optimizedReservations = [];
        foreach ($waypointOrder as $index) {
            $optimizedWaypoints[] = $otherWaypoints[$index];
            $optimizedReservations[] = $otherReservations[$index];
        }

        if ($tieneMultiplesPuntos) {
            // Orden final de la ruta real: ST -> farthestWaypoint -> [optimizedWaypoints] -> ST
            $optimizedWaypoints = array_merge([$farthestWaypoint], $optimizedWaypoints);
            $optimizedReservations = array_merge([$farthestReservation], $optimizedReservations);

            // 3. Segunda llamada a Directions sin optimize:true
            // Ahora simplemente pedimos la ruta exacta en el orden final, partiendo de ST
            $finalDirectionsUrl = 'https://maps.googleapis.com/maps/api/directions/json?' . http_build_query([
                'origin' => $this->origenReal,
                'destination' => $this->origenReal,
                'waypoints' => implode('|', $optimizedWaypoints),
                'key' => $this->apiKey,
                'arrival_time' => $arrivalTimestamp,
            ]);

            $response = file_get_contents($finalDirectionsUrl);
            $data = json_decode($response, true);

        }


        if ($data['status'] === 'OK') {
            $route = $data['routes'][0];
            $waypointOrder = $route['waypoint_order'];
            $legs = $route['legs'];


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
            $routeLink = $this->generateRouteLink($this->origenReal, $this->origenReal, $optimizedWaypoints);

            // Devolver los datos
            $data = [
                'driver_departure_time' => $driverDepartureTime,
                'pick_up_times' => $pickUpTimes,
                'optimized_reservations' => $optimizedReservations,
                'route_link' => $routeLink,
            ];
            return $data;
        } else {
            // Manejar el error
            return null;
        }
    }

    private function findFarthestWaypointDistanceMatrix($waypoints, $origin)
    {
        $destinations = implode('|', $waypoints);
        $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?' . http_build_query([
            'origins' => $origin,
            'destinations' => $destinations,
            'key' => $this->apiKey
        ]);

        $resp = file_get_contents($url);
        $data = json_decode($resp, true);

        if ($data['status'] === 'OK') {
            $elements = $data['rows'][0]['elements'];
            $farthestDistance = -1;
            $farthestIndex = -1;
            for ($i = 0; $i < count($elements); $i++) {
                $el = $elements[$i];
                if ($el['status'] === 'OK') {
                    $distance = $el['distance']['value']; // metros
                    if ($distance > $farthestDistance) {
                        $farthestDistance = $distance;
                        $farthestIndex = $i;
                    }
                }
            }

            return [
                'waypoint' => $waypoints[$farthestIndex],
                'index' => $farthestIndex
            ];
        }

        return [
            'waypoint' => $waypoints[0],
            'index' => 0
        ];
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
