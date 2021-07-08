@extends('layouts.admin')


@section('content')
  <div class="container">
        <form action="{{ url('/agencias/'.$agencia->id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field() }}
            {{method_field('PATCH') }}
            @include('agencias.form',["Modo"=>"editar"])
        </form>
    </div>
@endsection