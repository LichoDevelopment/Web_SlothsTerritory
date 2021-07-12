@extends('/layouts.admin')


@section('content')
  <div class="container">
        @if(Session::has("Mensaje")){{
            Session::get("Mensaje")
        }}
        @endif


        
        <section class="card">
           <section class="card-header d-flex justify-content-between align-items-center mb-4">
               <h2>Agencias</h2>
               <a href="{{ url('/agencias/create')}}" class="btn btn-success"> Agregar</a>
           </section>
            <section class="card-body">
                <table class="table table-light table-hover" id="tablaAgencias">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Comision</th>
                            <th>Acciones</th>
                    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agencias as $agencia)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$agencia->nombre}}</td>
                                <td>{{$agencia->comision}}</td>
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
            </section>
       </section>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
        $('#tablaAgencias').DataTable();
    } );
    </script>
@endsection