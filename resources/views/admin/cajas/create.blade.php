@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h1>Abrir Caja</h1>

    @if($errors->any())
      <div class="alert alert-danger">
         <ul>
           @foreach($errors->all() as $error)
             <li>{{ $error }}</li>
           @endforeach
         </ul>
      </div>
    @endif

    <form action="{{ route('cajas.store') }}" method="POST">
        @csrf

        {{-- <div class="form-group">
            <label for="fecha_apertura">Fecha Apertura *</label>
            <input type="datetime-local" name="fecha_apertura" class="form-control" 
                   value="{{ old('fecha_apertura') }}" required>
        </div> --}}

        <div class="form-group">
            <label for="monto_inicial_crc">Monto Inicial Efectivo CRC *</label>
            <input type="number" step="0.01" name="monto_inicial_crc" class="form-control"
                   value="{{ old('monto_inicial_crc', 0) }}" required>
        </div>

        <div class="form-group">
            <label for="monto_inicial_usd">Monto Inicial Efectivo USD *</label>
            <input type="number" step="0.01" name="monto_inicial_usd" class="form-control"
                   value="{{ old('monto_inicial_usd', 0) }}" required>
        </div>

        <div class="form-group">
            <label for="observaciones_apertura">Observaciones Apertura</label>
            <textarea name="observaciones_apertura" class="form-control">
                {{ old('observaciones_apertura') }}
            </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Abrir Caja</button>
        <a href="{{ route('cajas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
