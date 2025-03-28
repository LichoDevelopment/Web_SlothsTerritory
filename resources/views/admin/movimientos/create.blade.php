@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Registrar Movimiento de Inventario</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('movimientos.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="id_producto">Producto *</label>
            <select name="id_producto" id="id_producto" class="form-control" required>
                <option value="">-- Seleccione --</option>
                @foreach($productos as $prod)
                    <option value="{{ $prod->id }}" {{ old('id_producto') == $prod->id ? 'selected' : '' }}>
                        {{ $prod->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tipo_movimiento">Tipo de Movimiento *</label>
            <select name="tipo_movimiento" id="tipo_movimiento" class="form-control" required>
                <option value="">-- Seleccione --</option>
                <option value="entrada" {{ old('tipo_movimiento')=='entrada' ? 'selected' : '' }}>Entrada</option>
                <option value="salida" {{ old('tipo_movimiento')=='salida' ? 'selected' : '' }}>Salida</option>
            </select>
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad *</label>
            <input type="number" name="cantidad" class="form-control" 
                   value="{{ old('cantidad', 1) }}" min="1" required>
        </div>

        <div class="form-group">
            <label for="costo_unitario">Costo Unitario (si aplica)</label>
            <input type="number" step="0.01" name="costo_unitario" class="form-control" 
                   value="{{ old('costo_unitario') }}">
        </div>

        <div class="form-group">
            <label for="precio_venta_unitario">Precio Venta Unitario (si aplica)</label>
            <input type="number" step="0.01" name="precio_venta_unitario" class="form-control" 
                   value="{{ old('precio_venta_unitario') }}">
        </div>

        <div class="form-group">
            <label for="motivo">Motivo (compra, venta, merma, gerencia, etc.)</label>
            <input type="text" name="motivo" class="form-control" value="{{ old('motivo') }}">
        </div>

        <div class="form-group">
            <label for="fecha_movimiento">Fecha de Movimiento *</label>
            <input type="date" name="fecha_movimiento" class="form-control" 
                   value="{{ old('fecha_movimiento', date('Y-m-d')) }}" required>
        </div>

        {{-- Si quisieras enlazar a un pago (opcional):
        <div class="form-group">
            <label for="id_pago">ID Pago (opcional)</label>
            <input type="number" name="id_pago" class="form-control" value="{{ old('id_pago') }}">
        </div>
        --}}

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('movimientos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
