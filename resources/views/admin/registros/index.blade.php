@extends('layouts.admin')


    @section('content')

        <section class="card">
            <section class="card-header d-flex justify-content-between align-items-center">
                <h2>Registros </h2>
            </section>
            <section class="card-body">
                <table class="table" id="tablaRegistros">
                    <thead>
                        <th>#</th>
                        <th>Día del tour</th>
                        <th>Tipo tour</th>
                        <th>Hora del tour</th>
                        <th>Cantidad de personas</th>
                    </thead>
                    <tbody>
                        @foreach ($registros as $registro)
                        <tr>
                            <td> {{$loop->index + 1}} </td>
                            <td> {{$registro->fecha_tour->fecha}} </td>
                            <td> {{$registro->horario->tours->nombre }} </td>
                            <td> {{$registro->horario->hora }} </td>
                            <td> {{$registro->cantidad_reservas }} </td>
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
            $('#tablaRegistros').DataTable();
            } );
        </script>

    @endsection