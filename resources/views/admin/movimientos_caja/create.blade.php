@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1>Nuevo Movimiento de Caja</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('movimientos_caja.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="id_caja">Caja *</label>
                <select name="id_caja" class="form-control" required>
                    <option value="">-- Seleccione --</option>
                    @foreach ($cajas as $caja)
                        <option value="{{ $caja->id }}" {{ old('id_caja') == $caja->id ? 'selected' : '' }}>
                            #{{ $caja->id }} (Abierta: {{ $caja->fecha_apertura }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tipo_movimiento">Tipo *</label>
                <select name="tipo_movimiento" class="form-control" required>
                    <option value="">--Seleccione--</option>
                    <option value="ingreso" {{ old('tipo_movimiento') == 'ingreso' ? 'selected' : '' }}>Ingreso</option>
                    <option value="egreso" {{ old('tipo_movimiento') == 'egreso' ? 'selected' : '' }}>Egreso</option>
                </select>
            </div>

            <div class="form-group">
                <label for="fecha_movimiento">Fecha Movimiento *</label>
                <input type="datetime-local" name="fecha_movimiento" class="form-control"
                    value="{{ old('fecha_movimiento') ?? now()->format('Y-m-d\TH:i') }}" required disabled>

            </div>

            <h5>Métodos de Pago (Cantidades)</h5>
            <div class="form-row">
                <div class="col">
                    <label>Efectivo CRC</label>
                    <input type="number" step="0.01" name="efectivo_crc" class="form-control"
                        value="{{ old('efectivo_crc', 0) }}">
                </div>
                <div class="col">
                    <label>Efectivo USD</label>
                    <input type="number" step="0.01" name="efectivo_usd" class="form-control"
                        value="{{ old('efectivo_usd', 0) }}">
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="col">
                    <label>Tarjeta CRC</label>
                    <input type="number" step="0.01" name="tarjeta_crc" class="form-control"
                        value="{{ old('tarjeta_crc', 0) }}">
                </div>
                <div class="col">
                    <label>Tarjeta USD</label>
                    <input type="number" step="0.01" name="tarjeta_usd" class="form-control"
                        value="{{ old('tarjeta_usd', 0) }}">
                </div>
            </div>
            <div class="form-row mt-2">
                <div class="col">
                    <label>Transf. CRC</label>
                    <input type="number" step="0.01" name="transferencia_crc" class="form-control"
                        value="{{ old('transferencia_crc', 0) }}">
                </div>
                <div class="col">
                    <label>Transf. USD</label>
                    <input type="number" step="0.01" name="transferencia_usd" class="form-control"
                        value="{{ old('transferencia_usd', 0) }}">
                </div>
            </div>

            <div class="form-group mt-3">
                <label for="motivo">Motivo</label>
                <input type="text" name="motivo" class="form-control" value="{{ old('motivo') }}">
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción (opcional)</label>
                <textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
            </div>

            <div class="form-group">
                <label for="retirado_por">Retirado por (si es egreso)</label>
                <input type="text" name="retirado_por" class="form-control" value="{{ old('retirado_por') }}">
            </div>

            <!-- Si quieres enlazar a un pago (reserva):
            <div class="form-group">
                <label for="id_pago">ID Pago (si aplica)</label>
                <input type="number" name="id_pago" class="form-control" value="{{ old('id_pago') }}">
            </div>
            -->

            <button type="submit" class="btn btn-primary">Guardar Movimiento</button>
            <a href="{{ route('movimientos_caja.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
