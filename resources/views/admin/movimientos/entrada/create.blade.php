@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1>Agregar Inventario</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('movimientos.entrada.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Producto *</label>
                <select name="id_producto" class="form-control" required>
                    <option value="">--Seleccione--</option>
                    @foreach ($productos as $prod)
                        <option value="{{ $prod->id }}">{{ $prod->nombre }} (Stock: {{ $prod->stock_actual }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Cantidad *</label>
                <input type="number" name="cantidad" min="1" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Costo Unitario (opcional)</label>
                <input type="number" step="0.01" name="costo_unitario" class="form-control">
            </div>

            <hr>
            <h4>Monto pagado desde la caja chica</h4>
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


            <button type="submit" class="btn btn-primary">Agregar</button>
            <a href="{{ route('movimientos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
