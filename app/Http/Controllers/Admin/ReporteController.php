<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\MovimientoCaja; // o la tabla/Modelo que tengas
use Illuminate\Support\Collection;

class ReporteController extends Controller
{
    public function index(Request $request)
    {
        // 1. Capturar fechas del request
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin    = $request->input('fecha_fin');

        // Variable para guardar resultados
        // Por defecto, vacío si no se han seleccionado fechas
        $movimientos = collect();
        $totales = [
            'efectivo_crc' => 0,
            'efectivo_usd' => 0,
            'tarjeta_crc'  => 0,
            'tarjeta_usd'  => 0,
            'transferencia_crc' => 0,
            'transferencia_usd' => 0,
            'total_general_crc' => 0, // si deseas un gran total en CRC, etc.
            // ...
        ];

        // 2. Si el usuario ha seleccionado un rango de fechas
        if ($fechaInicio && $fechaFin) {
            // Ajustamos las fechas para incluir todo el día fin: 
            // Por ejemplo, si pones 2025-05-31, incluya 2025-05-31 23:59:59
            $fechaFinCarbon = Carbon::parse($fechaFin)->endOfDay();

            // 3. Obtener los movimientos del rango
            //    Usando 'fecha_movimiento' como campo (ajusta según tu BD)
            $movimientos = MovimientoCaja::whereBetween('fecha_movimiento', [
                $fechaInicio,
                $fechaFinCarbon
            ])->get();

            // 4. Calcular sumas
            //    Por ejemplo, sólo para tipo_movimiento = 'ingreso'
            //    (Si también quieres ver egresos, sumas aparte o filtras).
            $ingresos = $movimientos->where('tipo_movimiento', 'ingreso');

            // Efectivo CRC
            $totales['efectivo_crc'] = $ingresos->sum('efectivo_crc');
            // Efectivo USD
            $totales['efectivo_usd'] = $ingresos->sum('efectivo_usd');
            // Tarjeta CRC
            $totales['tarjeta_crc']  = $ingresos->sum('tarjeta_crc');
            // Tarjeta USD
            $totales['tarjeta_usd']  = $ingresos->sum('tarjeta_usd');
            // Transferencia CRC
            $totales['transferencia_crc'] = $ingresos->sum('transferencia_crc');
            // Transferencia USD
            $totales['transferencia_usd'] = $ingresos->sum('transferencia_usd');

            // Si quieres un "Total General" en CRC, necesitarías 
            // convertir el USD a CRC a algún tipo de cambio, 
            // o simplemente mostrarlo por separado. 
            // Por ahora, lo dejamos en ceros o sumamos sin conversión.
            $totales['total_general_crc'] =
                $totales['efectivo_crc'] + $totales['tarjeta_crc'] + $totales['transferencia_crc'];

            // Podrías hacer otro 'total_general_usd', etc.
        }

        // 5. Retornar la vista con los datos
        return view('admin.reportes.index', compact('movimientos', 'totales', 'fechaInicio', 'fechaFin'));
    }
}
