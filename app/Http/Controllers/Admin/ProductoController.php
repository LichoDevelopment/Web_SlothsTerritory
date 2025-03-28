<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    /**
     * Muestra la lista de productos con opción de filtrar por fechas (si deseas).
     */
    public function index(Request $request)
    {
        // Opcional: filtrar por rango de fechas de creación
        $query = Producto::query();

        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $fechaInicio = $request->input('fecha_inicio');
            $fechaFin = $request->input('fecha_fin');
            $query->whereBetween('created_at', [$fechaInicio, $fechaFin]);
        }

        $productos = $query->orderBy('id', 'desc')->paginate(10);

        return view('admin.productos.index', compact('productos'));
    }

    /**
     * Muestra el formulario de creación de un producto.
     */
    public function create()
    {
        return view('admin.productos.create');
    }

    /**
     * Guarda un nuevo producto en la BD.
     */
    public function store(Request $request)
    {
        // Validar campos básicos
        $request->validate([
            'nombre'        => 'required|string|max:255',
            'descripcion'   => 'nullable|string',
            'codigo_barras' => 'nullable|string|max:255',
            'precio_venta'  => 'required|numeric',
            'stock_actual'  => 'required|integer',
            'activo'        => 'boolean',
        ]);

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->codigo_barras = $request->codigo_barras;
        $producto->precio_venta = $request->precio_venta;
        $producto->stock_actual = $request->stock_actual;
        $producto->activo = $request->activo ?? false;

        // Auditoría
        $producto->created_by = Auth::id();
        $producto->updated_by = Auth::id();

        $producto->save();

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado correctamente');
    }

    /**
     * Mostrar un producto en detalle (si lo deseas).
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('admin.productos.show', compact('producto'));
    }

    /**
     * Muestra el formulario para editar un producto.
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('admin.productos.edit', compact('producto'));
    }

    /**
     * Actualiza la información de un producto.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'        => 'required|string|max:255',
            'descripcion'   => 'nullable|string',
            'codigo_barras' => 'nullable|string|max:255',
            'precio_venta'  => 'required|numeric',
            'stock_actual'  => 'required|integer',
            'activo'        => 'boolean',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->codigo_barras = $request->codigo_barras;
        $producto->precio_venta = $request->precio_venta;
        $producto->stock_actual = $request->stock_actual;
        $producto->activo = $request->activo ?? false;

        // Auditoría
        $producto->updated_by = Auth::id();

        $producto->save();

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado correctamente');
    }

    /**
     * Elimina (o softdelete) un producto.
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado correctamente');
    }
}
