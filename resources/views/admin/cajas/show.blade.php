@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Detalle de Caja #{{ $caja->id }}</h1>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <p><strong>Fecha Apertura:</strong> {{ $caja->fecha_apertura }}</p>
    <p><strong>Fecha Cierre:</strong> {{ $caja->fecha_cierre ?? '---' }}</p>
    <p><strong>Estado:</strong> {{ $caja->estado }}</p>

    @if($caja->estado == 'abierta')
        <form action="{{ route('cajas.cerrar', $caja->id) }}" method="POST" style="display:inline-block;">
            @csrf
            <button type="submit" class="btn btn-warning"
                onclick="return confirm('¿Seguro de cerrar esta caja?')">
                Cerrar Caja
            </button>
        </form>
    @endif

    <hr>

    <h4>Movimientos de esta caja</h4>
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
            <tr><td colspan="10">No hay movimientos</td></tr>
        @endforelse
        </tbody>
    </table>

    <hr>
    <h4>Totales Calculados</h4>
    <ul>
        <li>Efectivo CRC: {{ $total_efectivo_crc }}</li>
        <li>Efectivo USD: {{ $total_efectivo_usd }}</li>
        <li>Tarjeta CRC: {{ $total_tarjeta_crc }}</li>
        <li>Tarjeta USD: {{ $total_tarjeta_usd }}</li>
        <li>Transferencia CRC: {{ $total_transf_crc }}</li>
        <li>Transferencia USD: {{ $total_transf_usd }}</li>
    </ul>

    <!-- Podrías mostrar la "suma" total en una sola moneda, si manejas tipo de cambio -->
</div>
@endsection
