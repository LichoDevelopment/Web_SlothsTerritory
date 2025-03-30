@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1>Cajas</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="GET" action="{{ route('cajas.index') }}" class="form-inline mb-3">
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

        <a href="{{ route('cajas.create') }}" class="btn btn-success mb-3">Abrir Caja</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha Apertura</th>
                    <th>Fecha Cierre</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cajas as $caja)
                    <tr>
                        <td>{{ $caja->id }}</td>
                        <td>{{ $caja->fecha_apertura }}</td>
                        <td>{{ $caja->fecha_cierre ?? '---' }}</td>
                        <td>{{ $caja->estado }}</td>
                        <td>
                            <a href="{{ route('cajas.show', $caja->id) }}" class="btn btn-info btn-sm">Ver</a>
                            @if (rol_usuario()->id == 1)
                                @if ($caja->estado == 'abierta')
                                    <!-- Podrías tener un botón para cerrar aquí -->
                                    <form action="{{ route('cajas.cerrar', $caja->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-sm"
                                            onclick="return confirm('¿Seguro de cerrar esta caja?')">
                                            Cerrar
                                        </button>
                                    </form>
                                @endif
                                <form action="{{ route('cajas.destroy', $caja->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Eliminar caja?')">
                                        Eliminar
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No hay cajas registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $cajas->links() }}
    </div>
@endsection
