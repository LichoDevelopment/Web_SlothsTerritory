<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MovimientoCaja;
use App\Models\Caja;
use App\Models\Pago; // si necesitas relacionar

class MovimientoCajaController extends Controller
{
    /**
     * Listar movimientos. Se puede filtrar por fecha, por caja, etc.
     */
    public function index(Request $request)
    {
        $query = MovimientoCaja::with('caja','pago');

        if ($request->filled('caja_id')) {
            $query->where('id_caja', $request->input('caja_id'));
        }
        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $query->whereBetween('fecha_movimiento', [
                $request->input('fecha_inicio'),
                $request->input('fecha_fin')
            ]);
        }

        $movimientos = $query->orderBy('id','desc')->paginate(10);

        // Para un dropdown de cajas
        $cajas = Caja::orderBy('fecha_apertura','desc')->get();

        return view('admin.movimientos_caja.index', compact('movimientos','cajas'));
    }

    /**
     * Formulario para crear un nuevo movimiento.
     */
    public function create()
    {
        // Solo mostrar cajas abiertas
        $cajas = Caja::where('estado','abierta')->get();
        return view('admin.movimientos_caja.create', compact('cajas'));
    }

    /**
     * Guardar el movimiento (ingreso o egreso).
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_caja'               => 'required|exists:cajas,id',
            'tipo_movimiento'       => 'required|string',
            'fecha_movimiento'      => 'required|date',
            'efectivo_crc'          => 'numeric',
            'efectivo_usd'          => 'numeric',
            'tarjeta_crc'           => 'numeric',
            'tarjeta_usd'           => 'numeric',
            'transferencia_crc'     => 'numeric',
            'transferencia_usd'     => 'numeric',
            'motivo'                => 'nullable|string',
            'descripcion'           => 'nullable|string',
            'retirado_por'          => 'nullable|string',
            // 'id_pago' => 'nullable|exists:pagos,id',
        ]);

        $mov = new MovimientoCaja();
        $mov->id_caja = $request->id_caja;
        $mov->tipo_movimiento = $request->tipo_movimiento;
        $mov->fecha_movimiento = $request->fecha_movimiento;
        $mov->efectivo_crc      = $request->efectivo_crc      ?? 0;
        $mov->efectivo_usd      = $request->efectivo_usd      ?? 0;
        $mov->tarjeta_crc       = $request->tarjeta_crc       ?? 0;
        $mov->tarjeta_usd       = $request->tarjeta_usd       ?? 0;
        $mov->transferencia_crc = $request->transferencia_crc ?? 0;
        $mov->transferencia_usd = $request->transferencia_usd ?? 0;
        $mov->motivo = $request->motivo;
        $mov->descripcion = $request->descripcion;
        $mov->retirado_por = $request->retirado_por;
        $mov->id_pago = $request->id_pago ?? null;

        // Auditoría
        $mov->created_by = Auth::id();
        $mov->updated_by = Auth::id();

        $mov->save();

        return redirect()->route('movimientos_caja.index')
            ->with('success','Movimiento registrado correctamente');
    }

    /**
     * Mostrar un movimiento en detalle.
     */
    public function show($id)
    {
        $movimiento = MovimientoCaja::with('caja','pago')->findOrFail($id);
        return view('admin.movimientos_caja.show', compact('movimiento'));
    }

    /**
     * Formulario para editar un movimiento.
     */
    public function edit($id)
    {
        $movimiento = MovimientoCaja::findOrFail($id);
        // Si quieres solo permitir editar si la caja está abierta:
        // if($movimiento->caja->estado != 'abierta') { ... }
        $cajas = Caja::all();
        return view('admin.movimientos_caja.edit', compact('movimiento','cajas'));
    }

    /**
     * Actualizar un movimiento.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_caja'               => 'required|exists:cajas,id',
            'tipo_movimiento'       => 'required|string',
            'fecha_movimiento'      => 'required|date',
            'efectivo_crc'          => 'numeric',
            'efectivo_usd'          => 'numeric',
            'tarjeta_crc'           => 'numeric',
            'tarjeta_usd'           => 'numeric',
            'transferencia_crc'     => 'numeric',
            'transferencia_usd'     => 'numeric',
            'motivo'                => 'nullable|string',
            'descripcion'           => 'nullable|string',
            'retirado_por'          => 'nullable|string',
        ]);

        $mov = MovimientoCaja::findOrFail($id);
        $mov->id_caja            = $request->id_caja;
        $mov->tipo_movimiento    = $request->tipo_movimiento;
        $mov->fecha_movimiento   = $request->fecha_movimiento;
        $mov->efectivo_crc       = $request->efectivo_crc      ?? 0;
        $mov->efectivo_usd       = $request->efectivo_usd      ?? 0;
        $mov->tarjeta_crc        = $request->tarjeta_crc       ?? 0;
        $mov->tarjeta_usd        = $request->tarjeta_usd       ?? 0;
        $mov->transferencia_crc  = $request->transferencia_crc ?? 0;
        $mov->transferencia_usd  = $request->transferencia_usd ?? 0;
        $mov->motivo             = $request->motivo;
        $mov->descripcion        = $request->descripcion;
        $mov->retirado_por       = $request->retirado_por;
        $mov->updated_by         = Auth::id();

        $mov->save();

        return redirect()->route('movimientos_caja.index')
            ->with('success','Movimiento actualizado');
    }

    /**
     * Eliminar un movimiento (reversión).
     */
    public function destroy($id)
    {
        $mov = MovimientoCaja::findOrFail($id);
        $mov->delete();

        return redirect()->route('movimientos_caja.index')
            ->with('success','Movimiento eliminado');
    }
}
