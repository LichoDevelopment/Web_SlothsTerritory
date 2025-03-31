@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Movimientos de Caja</h1>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ route('movimientos_caja.index') }}" class="form-inline mb-3">
        <div class="form-group mr-2">
            <label for="caja_id" class="mr-2">Caja:</label>
            <select name="caja_id" class="form-control">
                <option value="">-- Todas --</option>
                @foreach($cajas as $caja)
                    <option value="{{ $caja->id }}" 
                        {{ request('caja_id') == $caja->id ? 'selected' : '' }}>
                        #{{ $caja->id }} ({{ $caja->estado }})
                    </option>
                @endforeach
            </select>
        </div>
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

    <a href="{{ route('movimientos_caja.create') }}" class="btn btn-success mb-3">Nuevo Movimiento</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Caja</th>
                <th>Tipo</th>
                <th>Efectivo CRC</th>
                <th>Efectivo USD</th>
                <th>Fecha</th>
                <th>Motivo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($movimientos as $mov)
                <tr>
                    <td>{{ $mov->id }}</td>
                    <td>#{{ $mov->id_caja }} ({{ $mov->caja ? $mov->caja->estado : 'Sin caja' }})</td>
                    <td>{{ $mov->tipo_movimiento }}</td>
                    <td>{{ $mov->efectivo_crc }}</td>
                    <td>{{ $mov->efectivo_usd }}</td>
                    <td>{{ $mov->fecha_movimiento }}</td>
                    <td>{{ $mov->motivo }}</td>
                    <td>
                        <a href="{{ route('movimientos_caja.edit', $mov->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('movimientos_caja.destroy', $mov->id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Eliminar este movimiento?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8">No hay movimientos registrados.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{ $movimientos->appends(request()->query())->links() }}
</div>
@endsection
