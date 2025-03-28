<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Caja;
use App\Models\MovimientoCaja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MovimientoInventario;
use App\Models\Producto;
use App\Models\Pago; // si necesitas vincular pagos
use Carbon\Carbon;

class MovimientoInventarioController extends Controller
{
    /**
     * Lista de movimientos con filtro de fechas opcional.
     */
    public function index(Request $request)
    {
        $query = MovimientoInventario::with('producto', 'pago');

        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $query->whereBetween('fecha_movimiento', [
                $request->input('fecha_inicio'),
                $request->input('fecha_fin')
            ]);
        }

        // Ejemplo: filtrar por tipo_movimiento si quieres
        // if ($request->filled('tipo')) {
        //     $query->where('tipo_movimiento', $request->input('tipo'));
        // }

        $movimientos = $query->orderBy('id', 'desc')->paginate(10);

        return view('admin.movimientos.index', compact('movimientos'));
    }

    /**
     * Formulario de creación de un movimiento.
     */
    public function create()
    {
        $productos = Producto::where('activo', true)->get();
        // Si deseas vincular a un pago, podrías traer una lista de pagos,
        // pero normalmente se crea el pago en otro proceso. Depende de tu flujo.
        // $pagos = Pago::all();

        return view('admin.movimientos.create', compact('productos'));
    }

    /**
     * Muestra un formulario para registrar la venta de un producto
     * (movimiento "salida").
     */
    public function createVenta()
    {
        // Listamos los productos activos
        $productos = Producto::where('activo', true)->get();

        return view('admin.movimientos.venta.create', compact('productos'));
    }

    /**
     * Guarda un nuevo movimiento de inventario.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'id_producto'            => 'required|exists:productos,id',
    //         'tipo_movimiento'        => 'required|string',
    //         'cantidad'               => 'required|integer|min:1',
    //         'costo_unitario'         => 'nullable|numeric',
    //         'precio_venta_unitario'  => 'nullable|numeric',
    //         'motivo'                 => 'nullable|string',
    //         'fecha_movimiento'       => 'required|date',
    //         'id_pago'              => 'nullable|exists:pagos,id', // si lo usas
    //     ]);

    //     $mov = new MovimientoInventario();
    //     $mov->id_producto = $request->id_producto;
    //     $mov->tipo_movimiento = $request->tipo_movimiento;
    //     $mov->cantidad = $request->cantidad;
    //     $mov->costo_unitario = $request->costo_unitario;
    //     $mov->precio_venta_unitario = $request->precio_venta_unitario;
    //     $mov->motivo = $request->motivo;
    //     $mov->fecha_movimiento = $request->fecha_movimiento;
    //     $mov->id_pago = $request->id_pago ?? null; // si existe

    //     // Auditoría
    //     $mov->created_by = Auth::id();
    //     $mov->updated_by = Auth::id();

    //     $mov->save();

    //     // Ajustar el stock si quieres hacerlo automáticamente
    //     // Si es una 'entrada', incrementas stock_actual, si es 'salida', lo decrementas
    //     $producto = Producto::findOrFail($mov->id_producto);
    //     if ($mov->tipo_movimiento === 'entrada') {
    //         $producto->stock_actual += $mov->cantidad;
    //     } elseif ($mov->tipo_movimiento === 'salida') {
    //         $producto->stock_actual -= $mov->cantidad;
    //     }
    //     $producto->updated_by = Auth::id();
    //     $producto->save();

    //     return redirect()->route('movimientos.index')
    //         ->with('success', 'Movimiento registrado correctamente');
    // }

    /**
     * Procesa y guarda la venta de producto.
     */
    public function storeVenta(Request $request)
    {
        // Validar
        $request->validate([
            'id_producto'       => 'required|exists:productos,id',
            'cantidad'          => 'required|integer|min:1',
            'efectivo_crc'      => 'nullable|numeric|min:0',
            'efectivo_usd'      => 'nullable|numeric|min:0',
            'tarjeta_crc'       => 'nullable|numeric|min:0',
            'tarjeta_usd'       => 'nullable|numeric|min:0',
            'transferencia_crc' => 'nullable|numeric|min:0',
            'transferencia_usd' => 'nullable|numeric|min:0',
        ]);

        // 1. Obtener el producto
        $producto = Producto::findOrFail($request->id_producto);

        // 2. Calcular el precio_unitario (puede venir de la BD o permitir al usuario sobreescribir)
        $precioUnitario = $producto->precio_venta;  // O $request->precio_unitario, si lo permites
        // 3. Calcular el precio total
        $cantidad = $request->cantidad;
        $total = $cantidad * $precioUnitario;

        // 4. Crear el movimiento de inventario (salida)
        $mov = new MovimientoInventario();
        $mov->id_producto           = $producto->id;
        $mov->tipo_movimiento       = 'salida';
        $mov->cantidad              = $cantidad;
        $mov->precio_venta_unitario = $precioUnitario;
        $mov->costo_unitario        = null;  // no aplica en la venta
        $mov->motivo                = 'venta';
        $mov->fecha_movimiento      = now(); // fecha actual
        $mov->created_by            = Auth::id();
        $mov->updated_by            = Auth::id();
        $mov->save();

        // 5. Ajustar el stock
        $producto->stock_actual -= $cantidad;
        $producto->updated_by   = Auth::id();
        $producto->save();

        // 6. Registrar Movimiento de Caja (si hay montos > 0)
        //    (Similar a como hiciste con reservas)
        $this->handleMovimientoCajaVenta($mov, $request);

        return redirect()->route('movimientos.index')
            ->with('success', 'Venta registrada correctamente');
    }

    /**
     * Crea un movimiento de caja tipo "ingreso" con los montos de pago
     * cuando se vende un producto.
     */
    private function handleMovimientoCajaVenta(MovimientoInventario $mov, Request $request)
    {
        // Sumar todos los campos de pago
        $efectivo_crc      = $request->efectivo_crc      ?? 0;
        $efectivo_usd      = $request->efectivo_usd      ?? 0;
        $tarjeta_crc       = $request->tarjeta_crc       ?? 0;
        $tarjeta_usd       = $request->tarjeta_usd       ?? 0;
        $transferencia_crc = $request->transferencia_crc ?? 0;
        $transferencia_usd = $request->transferencia_usd ?? 0;

        $totalPago = $efectivo_crc + $efectivo_usd +
            $tarjeta_crc + $tarjeta_usd +
            $transferencia_crc + $transferencia_usd;

        // Si todo es 0, no creamos movimiento en caja
        if ($totalPago <= 0) {
            return;
        }

        // Obtener o crear caja abierta
        $caja = $this->getOrCreateCajaAbiertaHoy(); // función que busque la caja de hoy o cree una
        // (igual que hiciste en reservas)

        // Crear el registro en "movimientos_caja"
        MovimientoCaja::create([
            'id_caja'            => $caja->id,
            'tipo_movimiento'    => 'ingreso',
            'efectivo_crc'       => $efectivo_crc,
            'efectivo_usd'       => $efectivo_usd,
            'tarjeta_crc'        => $tarjeta_crc,
            'tarjeta_usd'        => $tarjeta_usd,
            'transferencia_crc'  => $transferencia_crc,
            'transferencia_usd'  => $transferencia_usd,
            'motivo'             => 'Venta de producto',
            'descripcion'        => 'Venta MovInv#' . $mov->id,
            'fecha_movimiento'   => now(),
            'created_by'         => Auth::id(),
            'updated_by'         => Auth::id(),
        ]);
    }

    /**
     * Muestra un formulario para "Agregar Inventario" (entrada).
     */
    public function createEntrada()
    {
        $productos = Producto::where('activo', true)->get();
        return view('admin.movimientos.entrada.create', compact('productos'));
    }

    /**
     * Guarda la entrada de inventario.
     */
    public function storeEntrada(Request $request)
    {
        // Validar
        $request->validate([
            'id_producto'   => 'required|exists:productos,id',
            'cantidad'      => 'required|integer|min:1',
            'costo_unitario' => 'nullable|numeric|min:0',
        ]);

        $producto = Producto::findOrFail($request->id_producto);

        // Crear el movimiento de inventario (entrada)
        $mov = new MovimientoInventario();
        $mov->id_producto      = $producto->id;
        $mov->tipo_movimiento  = 'entrada';
        $mov->cantidad         = $request->cantidad;
        $mov->costo_unitario   = $request->costo_unitario; // si lo deseas
        $mov->precio_venta_unitario = null; // no aplica en una compra/entrada
        $mov->motivo           = 'compra';  // o 'reabastecimiento'
        $mov->fecha_movimiento = now();
        $mov->created_by       = Auth::id();
        $mov->updated_by       = Auth::id();
        $mov->save();

        // Ajustar stock
        $producto->stock_actual += $request->cantidad;
        $producto->updated_by = Auth::id();
        $producto->save();

        // Si quisieras, podrías crear también un MovimientoCaja de "egreso" por la compra 
        // (reflejando que salió dinero de caja). Depende de tu flujo contable.
        $this->handleMovimientoCajaCompra($mov, $request);

        return redirect()->route('movimientos.index')
            ->with('success', 'Inventario agregado correctamente');
    }

    private function handleMovimientoCajaCompra(MovimientoInventario $mov, Request $request)
    {
        $efectivo_crc = $request->efectivo_crc ?? 0;
        $efectivo_usd = $request->efectivo_usd ?? 0;
        $totalPagado  = $efectivo_crc + $efectivo_usd;

        // Si no se usó dinero de la caja, no hacemos nada
        if ($totalPagado <= 0) {
            return;
        }

        // Obtener o crear la caja abierta de hoy
        $caja = $this->getOrCreateCajaAbiertaHoy();

        // Crear un movimiento de caja de tipo "egreso"
        // Significa que salió dinero de la caja para pagar la compra de inventario
        MovimientoCaja::create([
            'id_caja'            => $caja->id,
            'tipo_movimiento'    => 'egreso',
            'efectivo_crc'       => $efectivo_crc,
            'efectivo_usd'       => $efectivo_usd,
            'tarjeta_crc'        => 0,
            'tarjeta_usd'        => 0,
            'transferencia_crc'  => 0,
            'transferencia_usd'  => 0,
            'motivo'             => 'Compra de inventario',
            'descripcion'        => 'Compra MovInv#' . $mov->id,
            'fecha_movimiento'   => now(),
            'created_by'         => Auth::id(),
            'updated_by'         => Auth::id(),
        ]);
    }

    /**
     * Muestra un movimiento en detalle (opcional).
     */
    public function show($id)
    {
        $movimiento = MovimientoInventario::with('producto', 'pago')->findOrFail($id);
        return view('admin.movimientos.show', compact('movimiento'));
    }

    /**
     * Formulario para editar un movimiento (se usa poco en inventarios, pero posible).
     */
    public function edit($id)
    {
        $movimiento = MovimientoInventario::findOrFail($id);
        $productos = Producto::where('activo', true)->get();

        return view('admin.movimientos.edit', compact('movimiento', 'productos'));
    }

    /**
     * Actualiza un movimiento (cuidado con recalcular stock si cambias la cantidad).
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_producto'            => 'required|exists:productos,id',
            'tipo_movimiento'        => 'required|string',
            'cantidad'               => 'required|integer|min:1',
            'costo_unitario'         => 'nullable|numeric',
            'precio_venta_unitario'  => 'nullable|numeric',
            'motivo'                 => 'nullable|string',
            'fecha_movimiento'       => 'required|date',
        ]);

        $mov = MovimientoInventario::findOrFail($id);

        // Antes de actualizar, revertir stock actual
        // (para luego aplicar el nuevo)
        $producto = Producto::findOrFail($mov->id_producto);
        if ($mov->tipo_movimiento === 'entrada') {
            $producto->stock_actual -= $mov->cantidad;
        } elseif ($mov->tipo_movimiento === 'salida') {
            $producto->stock_actual += $mov->cantidad;
        }

        // Ahora actualizamos con los nuevos datos
        $mov->id_producto = $request->id_producto;
        $mov->tipo_movimiento = $request->tipo_movimiento;
        $mov->cantidad = $request->cantidad;
        $mov->costo_unitario = $request->costo_unitario;
        $mov->precio_venta_unitario = $request->precio_venta_unitario;
        $mov->motivo = $request->motivo;
        $mov->fecha_movimiento = $request->fecha_movimiento;
        // $mov->id_pago = $request->id_pago ?? null;

        $mov->updated_by = Auth::id();

        $mov->save();

        // Ajustar stock con los nuevos valores
        // Podrías cambiar de producto, así que asegurémonos de setear el stock correcto
        $nuevoProducto = Producto::findOrFail($request->id_producto);

        // si es el mismo producto, ya lo tenemos en $producto, pero si cambió, ajustamos ambos
        if ($mov->id_producto != $producto->id) {
            // Guardar el anterior (ya revertido el stock)
            $producto->updated_by = Auth::id();
            $producto->save();

            // Al nuevo producto, incrementarle
            if ($mov->tipo_movimiento === 'entrada') {
                $nuevoProducto->stock_actual += $mov->cantidad;
            } else {
                $nuevoProducto->stock_actual -= $mov->cantidad;
            }
            $nuevoProducto->updated_by = Auth::id();
            $nuevoProducto->save();
        } else {
            // Mismo producto: 
            if ($mov->tipo_movimiento === 'entrada') {
                $producto->stock_actual += $mov->cantidad;
            } else {
                $producto->stock_actual -= $mov->cantidad;
            }
            $producto->updated_by = Auth::id();
            $producto->save();
        }

        return redirect()->route('movimientos.index')
            ->with('success', 'Movimiento actualizado correctamente');
    }

    /**
     * Eliminar un movimiento.
     * Habría que revertir el stock, en teoría, para no dejar inconsistencias.
     */
    public function destroy($id)
    {
        $mov = MovimientoInventario::findOrFail($id);

        // Revertir stock antes de eliminar
        $producto = Producto::findOrFail($mov->id_producto);
        if ($mov->tipo_movimiento === 'entrada') {
            $producto->stock_actual -= $mov->cantidad;
        } else {
            $producto->stock_actual += $mov->cantidad;
        }
        $producto->updated_by = Auth::id();
        $producto->save();

        $mov->delete();

        return redirect()->route('movimientos.index')
            ->with('success', 'Movimiento eliminado y stock ajustado correctamente');
    }

    /**
     * Ejemplo de función para obtener o crear la caja de HOY (una sola abierta)
     */
    private function getOrCreateCajaAbiertaHoy()
    {
        $hoy = Carbon::today();  // 00:00:00 de hoy

        // Buscamos una caja que tenga fecha_apertura = HOY (en su parte de fecha) y estado = 'abierta'
        $cajaAbierta = Caja::whereDate('fecha_apertura', $hoy)
            ->where('estado', 'abierta')
            ->first();

        if (!$cajaAbierta) {
            // Crear una nueva caja
            // fecha_apertura podría ser now() o la medianoche de hoy, 
            // pero para el ejemplo la ponemos en 'now()'
            $cajaAbierta = Caja::create([
                'fecha_apertura' => Carbon::now(),
                'estado'         => 'abierta',
                'monto_inicial_crc' => 0,
                'monto_inicial_usd' => 0,
                'created_by' => Auth::id(),
                'updated_by' => Auth::id(),
            ]);
        }

        return $cajaAbierta;
    }
}
