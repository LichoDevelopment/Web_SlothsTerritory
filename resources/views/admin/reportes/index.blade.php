@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Reporte de Ingresos</h1>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Formulario para rango de fechas -->
    <form method="GET" action="{{ route('reportes.index') }}" class="form-inline mb-3">
        <div class="form-group mr-2">
            <label for="fecha_inicio" class="mr-2">Desde:</label>
            <input type="date" name="fecha_inicio" class="form-control" 
                   value="{{ $fechaInicio }}">
        </div>
        <div class="form-group mr-2">
            <label for="fecha_fin" class="mr-2">Hasta:</label>
            <input type="date" name="fecha_fin" class="form-control" 
                   value="{{ $fechaFin }}">
        </div>
        <button type="submit" class="btn btn-primary">Filtrar</button>
    </form>

    <!-- Mostrar resultados si hay un rango seleccionado -->
    @if($fechaInicio && $fechaFin)
        <div class="card mb-4">
            <div class="card-header">
                <h4>Totales de Ingresos ({{ $fechaInicio }} a {{ $fechaFin }})</h4>
            </div>
            <div class="card-body">
                <ul>
                    <li>Efectivo CRC: {{ number_format($totales['efectivo_crc'], 2) }}</li>
                    <li>Efectivo USD: {{ number_format($totales['efectivo_usd'], 2) }}</li>
                    <li>Tarjeta CRC: {{ number_format($totales['tarjeta_crc'], 2) }}</li>
                    <li>Tarjeta USD: {{ number_format($totales['tarjeta_usd'], 2) }}</li>
                    <li>Transferencia CRC: {{ number_format($totales['transferencia_crc'], 2) }}</li>
                    <li>Transferencia USD: {{ number_format($totales['transferencia_usd'], 2) }}</li>
                    <li>Total General CRC (sin conversión de USD): {{ number_format($totales['total_general_crc'], 2) }}</li>
                </ul>
            </div>
        </div>

        <!-- Tabla de Movimientos concretos (opcional) -->
        <h5>Movimientos detallados</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Efectivo CRC</th>
                    <th>Efectivo USD</th>
                    <th>Tarjeta CRC</th>
                    <th>Tarjeta USD</th>
                    <th>Transf. CRC</th>
                    <th>Transf. USD</th>
                    <th>Motivo</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
            @forelse($movimientos as $mov)
                <tr>
                    <td>{{ $mov->id }}</td>
                    <td>{{ $mov->tipo_movimiento }}</td>
                    <td>{{ $mov->efectivo_crc }}</td>
                    <td>{{ $mov->efectivo_usd }}</td>
                    <td>{{ $mov->tarjeta_crc }}</td>
                    <td>{{ $mov->tarjeta_usd }}</td>
                    <td>{{ $mov->transferencia_crc }}</td>
                    <td>{{ $mov->transferencia_usd }}</td>
                    <td>{{ $mov->motivo }}</td>
                    <td>{{ $mov->fecha_movimiento }}</td>
                </tr>
            @empty
                <tr><td colspan="10">No hay movimientos en este rango.</td></tr>
            @endforelse
            </tbody>
        </table>
    @endif
</div>
@endsection
