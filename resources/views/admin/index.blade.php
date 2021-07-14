@extends('layouts.admin')


@section('content')
    <section class="card rounded">
        <section class="card-header d-flex justify-content-between align-items-center">
            <h2 class="fw-bold">Reservas del {{ date('Y-m-d')}} </h2>
            <a class="btn btn-info " href=" {{ route('reservas.agregar') }} ">agregar</a>
        </section>
        <section class="card-body">
            <table id="reservationTable" class="table table-responsive table-striped">
                <thead>
                    <th>#</th>
                    <th>Tour</th>
                    <th>Agencia</th>
                    <th>Hora</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Adultos</th>
                    <th>Niños</th>
                    <th>Niños Gratis</th>
                    <th>Precio</th>
                    <th>Descuento</th>
                    <th>Precio con descuento</th>
                    <th>Comision de agencia</th>
                    <th>Total</th>
                    <th>Factura</th>
                    <th>Creado el</th>
                    <th>Estado</th>
                </thead>
                <tbody>
                    @foreach ($reservaciones as $reservacion)
                        <tr>
                            <td> {{$loop->index + 1}} </td>
                            <td> {{$reservacion->tour->nombre}} </td>
                            <td> {{$reservacion->agencia->nombre}} </td>
                            <td> {{$reservacion->horario->hora}} </td>
                            <td> {{$reservacion->fecha_tour->fecha}} </td>
                            <td> {{$reservacion->nombre_cliente}} </td>
                            <td> {{$reservacion->cantidad_adultos}} </td>
                            <td> {{$reservacion->cantidad_niños}} </td>
                            <td> {{$reservacion->cantidad_niños_gratis}} </td>
                            <td> {{$reservacion->monto_total}} </td>
                            <td> {{$reservacion->descuento}} </td>
                            <td> {{$reservacion->monto_con_descuento}} </td>
                            <td> {{$reservacion->comision_agencia}} </td>
                            <td> {{$reservacion->monto_neto}} </td>
                            <td> {{$reservacion->factura}} </td>
                            <td> {{$reservacion->created_at}} </td>
                            <td> {{$reservacion->estado->nombre}} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
       </section>
    </section>
    {{-- <a href="{{ route('agencias.index') }}" class="btn btn-success"> Ver Agencias</a> --}}
 
@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
        $('#reservationTable').DataTable();
    } );
    </script>
@endsection