@extends('layouts.admin')


@section('content')
  <div class="container">
        <form action="{{ route('agencias.update', ['agencia'=>$agencia->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.agencias.form',["Modo"=>"editar"])
        </form>
    </div>
@endsection