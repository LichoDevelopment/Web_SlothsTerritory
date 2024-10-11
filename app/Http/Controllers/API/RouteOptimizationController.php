<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RouteOptimizationController extends Controller
{
    public function generateOptimizedRoute(Request $request)
    {
        // Validar la entrada
        $validated = $request->validate([
            'schedule_id' => 'required|integer',
        ]);

        // Obtener las ubicaciones de los clientes para el horario dado
        $scheduleId = $validated['schedule_id'];

        // Aquí debes obtener las ubicaciones de los clientes desde tu base de datos
        // Supongamos que tienes un modelo Reservation que tiene un campo pickup_location

        $reservations = \App\Models\Reservation::where('schedule_id', $scheduleId)->get();

        if ($reservations->isEmpty()) {
            return response()->json(['message' => 'No hay reservas para este horario'], 404);
        }

        // Coordenadas de Sloths Territory
        $origen = '10.471471,-84.603181';
        $destino = '10.471471,-84.603181';

        // Obtener las ubicaciones de los clientes
        $waypoints = [];

        foreach ($reservations as $reservation) {
            // Suponiendo que pickup_location almacena coordenadas en formato "lat,lng"
            $waypoints[] = $reservation->pickup_location;
        }

        // Construir la URL para la solicitud a Directions API
        $apiKey = config('services.google_maps.api_key');
        $waypointsStr = implode('|', $waypoints);

        $url = 'https://maps.googleapis.com/maps/api/directions/json';
        $params = [
            'origin' => $origen,
            'destination' => $destino,
            'waypoints' => 'optimize:true|' . $waypointsStr,
            'key' => $apiKey,
        ];

        try {
            $response = Http::get($url, $params);
            $data = $response->json();

            if ($data['status'] === 'OK') {
                $rutaOptimizada = $data['routes'][0];
                $ordenOptimizado = $rutaOptimizada['waypoint_order'];

                // Generar el enlace para Google Maps
                $link = $this->generateGoogleMapsLink($ordenOptimizado, $waypoints);

                return response()->json([
                    'message' => 'Ruta optimizada generada correctamente',
                    'link' => $link,
                ]);
            } else {
                return response()->json(['message' => 'Error al obtener la ruta: ' . $data['status']], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al comunicarse con Google Maps API'], 500);
        }
    }

    private function generateGoogleMapsLink($ordenOptimizado, $waypoints)
    {
        $baseUrl = 'https://www.google.com/maps/dir/?api=1';
        $origen = '10.471471,-84.603181';
        $destino = '10.471471,-84.603181';

        // Reordenar los waypoints según el orden optimizado
        $waypointsOptimized = [];
        foreach ($ordenOptimizado as $index) {
            $waypointsOptimized[] = $waypoints[$index];
        }

        $waypointsStr = implode('|', $waypointsOptimized);

        $params = [
            'origin' => $origen,
            'destination' => $destino,
            'travelmode' => 'driving',
            'waypoints' => $waypointsStr,
        ];

        $query = http_build_query($params);

        return $baseUrl . '&' . $query;
    }
}
