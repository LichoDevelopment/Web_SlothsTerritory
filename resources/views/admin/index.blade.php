@extends('layouts.admin')


@section('content')
    <h2 class="display-4">Inicio</h2>
    <a href="{{ route('agencias.index') }}" class="btn btn-success"> Ver Agencias</a>
 
@endsection