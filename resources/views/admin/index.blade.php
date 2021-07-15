@extends('layouts.admin')


@section('content')
    <section class="card rounded">
        <section class="card-header d-flex justify-content-between align-items-center">
            <h2 class="fw-bold">Reservas del {{ date('Y-m-d')}} </h2>
            <a class="btn btn-info " href=" {{ route('reservas.agregar') }} ">agregar</a>
        </section>
        <section class="card-body">
            <section class="d-flex justify-content-between mb-4 align-items-center">
                <section class="d-flex align-items-center">
                    <p>Filtrar por fecha</p>
                    <form class="d-flex ml-2" action="/admin?" method="get">
                        <input
                            @if (request()->query() && isset(request()->query()['fecha']))
                                value="{{request()->query()['fecha']}}"
                            @endif 
                            type="date" name="fecha" class="form-control">
                        <button class="btn btn-info">filtrar</button>
                    </form>
                </section>
                @if (request()->query())
                    <a href="/admin" class="btn btn-secondary btn-sm">Eliminar filtro</a>
                @endif
            </section>
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
                    <th>Acciones</th>
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
                            <td class="btn-group">
                                <a href="{{ route('reservas.editar', ['id'=> $reservacion->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                                <button
                                    data-id="{{$reservacion->id}}" 
                                    class="btn btn-sm btn-danger borrar-reserva-btn">Eliminar</button>
                            </td>
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

    const borrarReservasBtn = document.querySelectorAll('.borrar-reserva-btn')

    borrarReservasBtn.forEach(btn =>{
        btn.addEventListener('click', event =>{
            event.preventDefault();
            const id = event.target.dataset.id

            Swal.fire({
                icon: 'warning',
                title: '¿Estas seguro de eliminar esta reserva?',
                confirmButtonText: 'Eliminar',
                confirmButtonColor: '#DC3545',
                showCancelButton: true,
                cancelButtonColor: 'teal',
                preConfirm: (respuesta)=>{
                    if(respuesta){
                        fetch(`/reservacion/${id}`,{
                            method: 'DELETE'
                        }).then(()=>{
                            Swal.fire({
                                icon: 'success',
                                title: 'Reserva eliminada',
                                showConfirmButton: false,
                            })
                            setTimeout(() => {
                                location.reload()
                            }, 1500);
                        })

                    }
                }
            })
        })
    })
    </script>
@endsection