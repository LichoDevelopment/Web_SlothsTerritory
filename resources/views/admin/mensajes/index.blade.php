@extends('layouts.admin')


@section('content')

    <section class="card">
        <section class="card-header d-flex justify-content-between align-items-center">
            <h2>Mensajes de clientes</h2>
        </section>
        <section class="card-body">
            <table class="table" id="tablaMensajes">
                <thead>
                    <th>#</th>
                    <th>Nombre cliente</th>
                    <th>correo</th>
                    <th>mensaje</th>
                </thead>
                <tbody>
                    @foreach ($mensajes as $mensaje)
                        <tr>
                            <td> {{$loop->index + 1}} </td>
                            <td> {{$mensaje->nombre }} </td>
                            <td> {{$mensaje->correo }} </td>
                            <td> {{$mensaje->mensaje }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </section>

@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
        $('#tablaMensajes').DataTable();
        } ); 
    </script> 
@endsection