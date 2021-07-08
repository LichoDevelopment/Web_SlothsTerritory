@extends('layouts.admin')


@section('content')
    <h2 class="display-4">Inicio</h2>
    <a href="">Agencias</a>
    <a href="{{ url('/admin/agencias')}}" class="btn btn-success"> Ver Agencias</a>
 
@endsection