@extends('/layouts.admin')


@section('content')
  <div class="container">
        @if(Session::has("Mensaje")){{
            Session::get("Mensaje")
        }}
        @endif



        <a href="{{ url('/agencias/create')}}" class="btn btn-success"> Agregar Agencia</a>
        <br/>
        <br/>

        <table class="table table-light table-hover">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Comision</th>
                    <th>Factura</th>
                    <th>Acciones</th>
            
                </tr>
            </thead>
            <tbody>
                @foreach ($agencias as $agencia)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$agencia->name}}</td>
                        <td>{{$agencia->commission}}</td>
                        <td>{{$agencia->invoice}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ url('/agencias/'.$agencia->id.'/edit')}}">
                                Editar
                            </a>

                            <form method="post" action="{{ url('/agencias/'.$agencia->id) }}" style="display: inline">
                                {{csrf_field() }}
                                {{ method_field('DELETE')}}
                                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');"> Borrar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection