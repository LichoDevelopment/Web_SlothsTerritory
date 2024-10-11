<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DistanceController extends Controller
{
    public function calculate(Request $request)
    {
        $origen = $request->input('origen');
        $destino = $request->input('destino');

        if (!$origen || !$destino) {
            return response()->json(['error' => 'Origen y destino son requeridos'], 400);
        }

        $apiKey = env('GOOGLE_MAPS_API_KEY');

        try {
            $response = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json', [
                'units' => 'metric',
                'origins' => $origen,
                'destinations' => $destino,
                'key' => $apiKey,
            ]);

            $data = $response->json();

            if ($data['rows'][0]['elements'][0]['status'] === 'OK') {
                $distancia = $data['rows'][0]['elements'][0]['distance']['value']; // Distancia en metros
                return response()->json(['distancia' => $distancia]);
            } else {
                return response()->json(['error' => 'No se pudo calcular la distancia'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener la distancia'], 500);
        }
    }
}
