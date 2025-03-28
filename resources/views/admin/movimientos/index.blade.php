@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1>Movimientos de Inventario</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Filtrado por fecha de movimiento -->
        <form method="GET" action="{{ route('movimientos.index') }}" class="form-inline mb-3">
            <div class="form-group mr-2">
                <label for="fecha_inicio" class="mr-2">Desde:</label>
                <input type="date" name="fecha_inicio" class="form-control" value="{{ request('fecha_inicio') }}">
            </div>
            <div class="form-group mr-2">
                <label for="fecha_fin" class="mr-2">Hasta:</label>
                <input type="date" name="fecha_fin" class="form-control" value="{{ request('fecha_fin') }}">
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>

        {{-- <a href="{{ route('movimientos.create') }}" class="btn btn-success mb-3">Crear Movimiento</a> --}}
        <a href="{{ route('movimientos.venta.create') }}" class="btn btn-success mb-3">Venta de producto</a>
        <a href="{{ route('movimientos.entrada.create') }}" class="btn btn-primary mb-3">Agregar Inventario</a>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Motivo</th>
                    <th>Pago</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($movimientos as $mov)
                    <tr>
                        <td>{{ $mov->id }}</td>
                        <td>{{ $mov->producto->nombre ?? 'N/A' }}</td>
                        <td>{{ $mov->tipo_movimiento }}</td>
                        <td>{{ $mov->cantidad }}</td>
                        <td>{{ $mov->fecha_movimiento }}</td>
                        <td>{{ $mov->motivo }}</td>
                        <td>
                            @if ($mov->pago)
                                #{{ $mov->pago->id }} ({{ $mov->pago->tipo_concepto }})
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('movimientos.edit', $mov->id) }}" class="btn btn-warning btn-sm">
                                Editar
                            </a>
                            <form action="{{ route('movimientos.destroy', $mov->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro de eliminar este movimiento?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">No hay movimientos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $movimientos->appends(request()->query())->links() }}
    </div>
@endsection
