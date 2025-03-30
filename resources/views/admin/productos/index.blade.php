@extends('layouts.admin')
{{-- asumiendo que tienes un layout llamado admin.blade.php --}}

@section('content')
    <div class="container mt-4">
        <h1>Listado de Productos</h1>

        <!-- Mensaje de éxito -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulario para filtrar por rango de fechas de creación -->
        <form method="GET" action="{{ route('productos.index') }}" class="form-inline mb-3">
            <div class="form-group mr-2">
                <label for="fecha_inicio" class="mr-2">Fecha Inicio:</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control"
                    value="{{ request('fecha_inicio') }}">
            </div>
            <div class="form-group mr-2">
                <label for="fecha_fin" class="mr-2">Fecha Fin:</label>
                <input type="date" name="fecha_fin" id="fecha_fin" class="form-control"
                    value="{{ request('fecha_fin') }}">
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>

        <a href="{{ route('productos.create') }}" class="btn btn-success mb-3">Crear Producto</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Código Barras</th>
                    <th>Precio Venta</th>
                    <th>Stock</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->codigo_barras }}</td>
                        <td>{{ $producto->precio_venta }}</td>
                        <td>{{ $producto->stock_actual }}</td>
                        <td>{{ $producto->activo ? 'Sí' : 'No' }}</td>
                        <td>
                            @if (rol_usuario()->id == 1)
                                <a href="{{ route('productos.edit', $producto->id) }}"
                                    class="btn btn-warning btn-sm">Editar</a>

                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Seguro de eliminar este producto?')">
                                        Eliminar
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No hay productos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $productos->appends(request()->query())->links() }}
    </div>
@endsection
