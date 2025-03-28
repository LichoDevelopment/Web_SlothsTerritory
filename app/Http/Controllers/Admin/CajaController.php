<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Caja;
use App\Models\MovimientoCaja;
use Carbon\Carbon;

class CajaController extends Controller
{
    /**
     * Lista de cajas con opción de filtrar por fecha de apertura.
     */
    public function index(Request $request)
    {
        $query = Caja::query();

        // Si se quieren filtrar por fecha de apertura
        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $fechaInicio = $request->fecha_inicio;
            $fechaFin    = $request->fecha_fin;
            $query->whereBetween('fecha_apertura', [$fechaInicio, $fechaFin]);
        }

        $cajas = $query->orderBy('id', 'desc')->paginate(10);

        return view('admin.cajas.index', compact('cajas'));
    }

    /**
     * Formulario para abrir una nueva caja.
     */
    public function create()
    {
        return view('admin.cajas.create');
    }

    /**
     * Guardar la caja (apertura).
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'fecha_apertura'       => 'required|date',
            'monto_inicial_crc'    => 'required|numeric',
            'monto_inicial_usd'    => 'required|numeric',
            'observaciones_apertura' => 'nullable|string',
        ]);

        $hoy = Carbon::today();  // 00:00:00 de hoy

        // Buscamos una caja que tenga fecha_apertura = HOY (en su parte de fecha) y estado = 'abierta'
        $cajaAbierta = Caja::whereDate('fecha_apertura', $hoy)
            ->where('estado', 'abierta')
            ->first();

        if ($cajaAbierta) {
            return redirect()->route('cajas.index')
                ->with('error', 'Ya existe una caja abierta.');
        }

        $caja = new Caja();
        $caja->fecha_apertura = Carbon::now();
        $caja->monto_inicial_crc = $request->monto_inicial_crc;
        $caja->monto_inicial_usd = $request->monto_inicial_usd;
        $caja->observaciones_apertura = $request->observaciones_apertura;
        $caja->estado = 'abierta';
        $caja->abierta_por = Auth::id();

        // Auditoría
        $caja->created_by = Auth::id();
        $caja->updated_by = Auth::id();

        $caja->save();

        return redirect()->route('cajas.index')
            ->with('success', 'Caja abierta correctamente');
    }

    /**
     * Mostrar detalle de la caja (incluyendo sus movimientos).
     */
    public function show($id)
    {
        $caja = Caja::findOrFail($id);

        // Obtenemos todos los movimientos de esta caja
        $movimientos = MovimientoCaja::where('id_caja', $caja->id)->get();

        // Sumamos ingresos y egresos por cada método
        // Efectivo CRC
        $ingreso_efectivo_crc = $movimientos->where('tipo_movimiento', 'ingreso')->sum('efectivo_crc');
        $egreso_efectivo_crc = $movimientos->where('tipo_movimiento', 'egreso')->sum('efectivo_crc');
        $total_efectivo_crc = $caja->monto_inicial_crc + $ingreso_efectivo_crc - $egreso_efectivo_crc;

        // Repite para efectivo_usd, tarjeta_crc, etc.
        $ingreso_efectivo_usd = $movimientos->where('tipo_movimiento', 'ingreso')->sum('efectivo_usd');
        $egreso_efectivo_usd  = $movimientos->where('tipo_movimiento', 'egreso')->sum('efectivo_usd');
        $total_efectivo_usd   = $caja->monto_inicial_usd + $ingreso_efectivo_usd - $egreso_efectivo_usd;

        $ingreso_tarjeta_crc = $movimientos->where('tipo_movimiento', 'ingreso')->sum('tarjeta_crc');
        $egreso_tarjeta_crc  = $movimientos->where('tipo_movimiento', 'egreso')->sum('tarjeta_crc');
        $total_tarjeta_crc   = $ingreso_tarjeta_crc - $egreso_tarjeta_crc;

        $ingreso_tarjeta_usd = $movimientos->where('tipo_movimiento', 'ingreso')->sum('tarjeta_usd');
        $egreso_tarjeta_usd  = $movimientos->where('tipo_movimiento', 'egreso')->sum('tarjeta_usd');
        $total_tarjeta_usd   = $ingreso_tarjeta_usd - $egreso_tarjeta_usd;

        $ingreso_transf_crc = $movimientos->where('tipo_movimiento', 'ingreso')->sum('transferencia_crc');
        $egreso_transf_crc  = $movimientos->where('tipo_movimiento', 'egreso')->sum('transferencia_crc');
        $total_transf_crc   = $ingreso_transf_crc - $egreso_transf_crc;

        $ingreso_transf_usd = $movimientos->where('tipo_movimiento', 'ingreso')->sum('transferencia_usd');
        $egreso_transf_usd  = $movimientos->where('tipo_movimiento', 'egreso')->sum('transferencia_usd');
        $total_transf_usd   = $ingreso_transf_usd - $egreso_transf_usd;

        // En la vista, podremos mostrar estos totales
        return view('admin.cajas.show', compact(
            'caja',
            'movimientos',
            'total_efectivo_crc',
            'total_efectivo_usd',
            'total_tarjeta_crc',
            'total_tarjeta_usd',
            'total_transf_crc',
            'total_transf_usd'
        ));
    }

    /**
     * Editar datos de la caja (rara vez se usa, pero por si acaso).
     */
    public function edit($id)
    {
        $caja = Caja::findOrFail($id);
        return view('admin.cajas.edit', compact('caja'));
    }

    /**
     * Actualizar la caja (p.ej. cambiar observaciones).
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // Dependiendo de tu lógica, quizá no quieras permitir cambiar la fecha de apertura
            'observaciones_apertura' => 'nullable|string',
        ]);

        $caja = Caja::findOrFail($id);
        $caja->observaciones_apertura = $request->observaciones_apertura;
        $caja->updated_by = Auth::id();
        $caja->save();

        return redirect()->route('cajas.index')
            ->with('success', 'Caja actualizada');
    }

    /**
     * Cerrar (hacer arqueo) de la caja.
     */
    public function cerrarCaja(Request $request, $id)
    {
        $request->validate([
            'observaciones_cierre' => 'nullable|string',
        ]);

        $caja = Caja::findOrFail($id);

        // Verificamos que la caja no esté cerrada
        if ($caja->estado == 'cerrada') {
            return redirect()->route('cajas.show', $caja->id)
                ->with('error', 'Esta caja ya está cerrada');
        }

        // Podrías calcular automáticamente la fecha de cierre:
        $caja->fecha_cierre = Carbon::now();
        $caja->observaciones_cierre = $request->observaciones_cierre;
        $caja->estado = 'cerrada';
        $caja->updated_by = Auth::id();
        $caja->cerrada_por  = Auth::id();
        $caja->save();

        return redirect()->route('cajas.show', $caja->id)
            ->with('success', 'Caja cerrada correctamente');
    }

    /**
     * Eliminar una caja (poco común). Quizá prefieras un softDelete.
     */
    public function destroy($id)
    {
        $caja = Caja::findOrFail($id);
        $caja->delete();

        return redirect()->route('cajas.index')
            ->with('success', 'Caja eliminada');
    }
}
