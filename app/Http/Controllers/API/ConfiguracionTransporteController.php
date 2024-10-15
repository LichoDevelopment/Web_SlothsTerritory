<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ConfiguracionTransporte;
use App\Models\Fecha_tour;
use App\Models\Reserva;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class ConfiguracionTransporteController extends Controller
{
    public function index()
    {
        $configuracion = ConfiguracionTransporte::first(); 
        return response()->json($configuracion);
    }

    public function getAvailableTransportPlaces($scheduleId, $date)
    {
        $configuracion = ConfiguracionTransporte::first(); 
        $totalPersonas = $this->getTotalPersonasTransporte($date, $scheduleId);
        $availablePlaces = $configuracion->cantidad_maxima_pasajeros - $totalPersonas;
        if ($availablePlaces < 0) {
            $availablePlaces = 0;
        }
        return response()->json($availablePlaces);
    }

    public function getTotalPersonasTransporte($fecha_tour, $horario_id)
    {
        $fecha_tour = Fecha_tour::where('fecha', $fecha_tour)->first();
        if (!$fecha_tour) {
            return 0;
        }
        $totalPersonas = Reserva::where('id_fecha_tour', $fecha_tour->id)
                                ->where('id_horario', $horario_id)
                                ->whereHas('transporte')
                                ->get()
                                ->sum(function ($reserva) {
                                    return $reserva->cantidad_adultos + $reserva->cantidad_niños + $reserva->cantidad_niños_gratis;
                                });
        return $totalPersonas;
    }
    
}
