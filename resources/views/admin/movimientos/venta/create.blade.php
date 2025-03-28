@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Venta de Producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('movimientos.venta.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Producto *</label>
            <select name="id_producto" class="form-control" required>
                <option value="">--Seleccione--</option>
                @foreach($productos as $prod)
                    <option value="{{ $prod->id }}">{{ $prod->nombre }} (Stock: {{ $prod->stock_actual }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Cantidad *</label>
            <input type="number" name="cantidad" min="1" class="form-control" required>
        </div>

        <hr>
        <h4>Métodos de Pago</h4>
        <div class="form-row">
            <div class="col">
                <label>Efectivo CRC</label>
                <input type="number" step="0.01" name="efectivo_crc" class="form-control" value="0">
            </div>
            <div class="col">
                <label>Efectivo USD</label>
                <input type="number" step="0.01" name="efectivo_usd" class="form-control" value="0">
            </div>
        </div>
        <div class="form-row mt-2">
            <div class="col">
                <label>Tarjeta CRC</label>
                <input type="number" step="0.01" name="tarjeta_crc" class="form-control" value="0">
            </div>
            <div class="col">
                <label>Tarjeta USD</label>
                <input type="number" step="0.01" name="tarjeta_usd" class="form-control" value="0">
            </div>
        </div>
        <div class="form-row mt-2">
            <div class="col">
                <label>Transf. CRC</label>
                <input type="number" step="0.01" name="transferencia_crc" class="form-control" value="0">
            </div>
            <div class="col">
                <label>Transf. USD</label>
                <input type="number" step="0.01" name="transferencia_usd" class="form-control" value="0">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Registrar Venta</button>
        <a href="{{ route('movimientos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
