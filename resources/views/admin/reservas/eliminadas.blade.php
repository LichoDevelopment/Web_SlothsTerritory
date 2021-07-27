@extends('layouts.admin')


@section('content')

    <section class="card rounded">
        <section class="card-header d-flex justify-content-between align-items-center">
            <h2 class="fw-bold">Reservas Desactivadas </h2>
        </section>
        <section class="card-body">


            <section class="card-body">
                
                <table class="table table-responsive" id="TablaReservas" >
                    <thead>
                        <tr>
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
                            <th>Eliminada el</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservas as $reserva)
                            <tr>
                                <td> {{$loop->index + 1}} </td>
                                <td> {{$reserva->nombre_tour}} </td>
                                <td> {{$reserva->nombre_agencia}} </td>
                                <td> {{$reserva->hora}} </td>
                                <td> {{$reserva->fecha}} </td>
                                <td> {{$reserva->nombre_cliente}} </td>
                                <td> {{$reserva->cantidad_adultos}} </td>
                                <td> {{$reserva->cantidad_niños}} </td>
                                <td> {{$reserva->cantidad_niños_gratis}} </td>
                                <td> {{$reserva->monto_total}} </td>
                                <td> {{$reserva->descuento}} </td>
                                <td> {{$reserva->monto_con_descuento}} </td>
                                <td> {{$reserva->comision_agencia}} </td>
                                <td> {{$reserva->monto_neto}} </td>
                                <td> {{$reserva->factura}} </td>
                                <td> {{$reserva->created_at}} </td>
                                <td> {{$reserva->nombre_estado}} </td>
                                <td> {{$reserva->deleted}} </td>
                                
                                <td class="btn-group">
                                    <button
                                        data-id="{{$reserva->id}}" 
                                        class="btn btn-sm btn-danger revertir-reserva-btn">REVERTIR
                                    </button>
                                </td> 
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
       </section>
    </section>

 
@endsection

@section('scripts')
    <script>
       $(document).ready( function () {
        $('#TablaReservas').DataTable();
    } );

    const revertirReservasBtn = document.querySelectorAll('.revertir-reserva-btn')

    revertirReservasBtn.forEach(btn =>{
        btn.addEventListener('click', event =>{
            event.preventDefault();
            const id = event.target.dataset.id

            Swal.fire({
                icon: 'warning',
                title: '¿Estas seguro de revertir esta reserva?'  ,
                confirmButtonText: 'REVERTIR',
                confirmButtonColor: '#DC3545',
                showCancelButton: true,
                cancelButtonColor: 'teal',
                preConfirm: (response)=>{
                    if(response){
                        fetch(`/reservacionEliminada/${id}`,{
                            method: 'PUT',
                            headers: {"Content-Type": "application/json"},
                            body: JSON.stringify({
                                "deleted_at": null,
                            })
                        })
                        .then(response => response.json())
                        .then(respuesta => mostrarRespuesta(respuesta))
                        .catch(response => console.log(response))
                    }
                }
            })
        })
    })

    function mostrarRespuesta(respuesta){
        console.log(respuesta)
        if(respuesta.errors){
            let errores = '';
            Object.entries(respuesta.errors).forEach(error =>{
                errores += `
                <div class="alert alert-danger" role="alert">
                    ${error[1][0]}
                </div>
                `
            })
            Swal.fire({
                icon: 'error',
                html: errores
            })
        }else{
            Swal.fire({
                icon: 'success',
                title: respuesta.message,
                showConfirmButton: false
            })
            setTimeout(function(){
                location.reload();
            },1500)
        }
    }
    </script>
@endsection