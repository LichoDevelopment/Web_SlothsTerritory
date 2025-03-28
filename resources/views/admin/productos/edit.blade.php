@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Editar Producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre *</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $producto->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control">{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        <div class="form-group">
            <label for="codigo_barras">Código de Barras</label>
            <input type="text" name="codigo_barras" class="form-control"
                   value="{{ old('codigo_barras', $producto->codigo_barras) }}">
        </div>

        <div class="form-group">
            <label for="precio_venta">Precio de Venta *</label>
            <input type="number" step="0.01" name="precio_venta" class="form-control"
                   value="{{ old('precio_venta', $producto->precio_venta) }}" required>
        </div>

        <div class="form-group">
            <label for="stock_actual">Stock Actual *</label>
            <input type="number" name="stock_actual" class="form-control"
                   value="{{ old('stock_actual', $producto->stock_actual) }}" required>
        </div>

        <div class="form-group">
            <label for="activo">¿Activo?</label>
            <input type="checkbox" name="activo" value="1"
                {{ old('activo', $producto->activo) ? 'checked' : '' }}>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

