@extends('layouts.admin')


@section('content')
    @if (rol_usuario()->id === 1)
        <section class="grid_totales">
            <div class="">
                <div class="card p-3 bg-success text-light">
                    <h2 class="number text-light"> {{$totales->adultos}} </h2>
                    <span class="desc">Adultos</span>
                </div>
            </div>
            <div class="">
                <div class="card p-3 bg-success text-light">
                    <h2 class="number text-light"> {{$totales->niños}} </h2>
                    <span class="desc">Niños</span>
                </div>
            </div>
            <div class="">
                <div class="card p-3 bg-success text-light">
                    <h2 class="number text-light"> {{$totales->niños_gratis}} </h2>
                    <span class="desc">Niños gratis</span>
                </div>
            </div>
            <div class="">
                <div class="card p-3 bg-success text-light">
                    <h2 class="number text-light"> {{$totales->adultos + $totales->niños + $totales->niños_gratis}} </h2>
                    <span class="desc">Total personas</span>
                </div>
            </div>
            <div class="">
                <div class="card p-3 bg-secondary text-light">
                    <h2 class="number text-light"> ${{$totales->comisiones}} </h2>
                    <span class="desc">Total comisiones</span>
                </div>
            </div>
            <div class="">
                <div class="card p-3 bg-secondary text-light">
                    <h2 class="number text-light"> ${{$totales->monto_total}} </h2>
                    <span class="desc">Monto total</span>
                </div>
            </div>
            <div class="">
                <div class="card p-3 bg-secondary text-light">
                    <h2 class="number text-light"> ${{$totales->monto_neto}} </h2>
                    <span class="desc">Monto neto</span>
                </div>
            </div>
        </section>
    @endif
    <section class="card rounded">
        <section class="card-header d-flex justify-content-between align-items-center">
            <h2 class="fw-bold">Reservas registradas </h2>
            <a class="btn btn-info " href=" {{ route('reservas.agregar') }} ">agregar</a>
        </section>
        <section class="card-body">
            <section class="d-flex justify-content-between align-items-center mb-3">
                <button 
                    class="btn btn-outline-info btn-sm" type="button" data-toggle="collapse" 
                    data-target="#SeccionFiltros" aria-expanded="false" aria-controls="SeccionFiltros">
                    Filtros
                </button>
                @if (request()->query())
                    <a href="/admin" class="btn btn-outline-danger btn-sm">Eliminar filtro</a>
                @endif
            </section>
            <section class="collapse" id="SeccionFiltros">
                <div class="d-flex justify-content-between mb-4 align-items-center">
                        <form class="form-filtrar" action="/admin?" method="get" id="form-filtrar">
                            <div>
                                <label for="fecha-inicio">Fecha de inicio</label>
                                <input
                                @if (request()->query() && isset(request()->query()['fechaInicio']))
                                    value="{{request()->query()['fechaInicio']}}"
                                @endif 
                                type="date" name="fechaInicio" class="form-control">
                            </div>
                            <div>
                                <label for="fecha-inicio">Fecha de fin</label>
                                <input
                                @if (request()->query() && isset(request()->query()['fechaFin']))
                                    value="{{request()->query()['fechaFin']}}"
                                @endif 
                                type="date" name="fechaFin" class="form-control">
                            </div>
                            <div>
                                <label for="agencia">agencia</label>
                                <select class="form-control" name="agencia">
                                    <option value=""></option>
                                    @foreach ($agencias as $agencia)
                                    <option value="{{$agencia->id}}"> {{ $agencia->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-info">filtrar</button>
                        </form>
                    
                </div>
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
                            <td>
                                <button 
                                data-reservacion-estado="{{$reservacion->estado->nombre}}"
                                data-reservacion-id="{{$reservacion->id}}"
                                class="btn btn-sm btn-success btn-actualizar-estado">
                                Actualizar estado
                            </button> 
                            </td>
                            
                            <td class="btn-group">
                                <a href="{{ route('reservas.editar', ['id'=> $reservacion->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                                
                                @if (rol_usuario()->id === 1)
                                    <button
                                        data-id="{{$reservacion->id}}" 
                                        class="btn btn-sm btn-danger borrar-reserva-btn">Eliminar</button>
                            
                                @endif
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
    const formFiltrar = document.querySelector('#form-filtrar')
    const botonesActualizarEstado = document.querySelectorAll('.btn-actualizar-estado');

    formFiltrar['fechaInicio'].addEventListener('change', ()=>{
        formFiltrar['fechaFin'].min = formFiltrar['fechaInicio'].value
        if(!formFiltrar['fechaFin'].value){
            formFiltrar['fechaFin'].value = formFiltrar['fechaInicio'].value
        }
    })

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

    botonesActualizarEstado.forEach(btn => {
        btn.addEventListener('click', event => {
            event.preventDefault();
            const id = event.target.dataset.reservacionId;
            const estado = event.target.dataset.reservacionEstado;

            Swal.fire({
                html: 
                `
                    <h2 class="mx-auto mb-3 ">Editar Estado</h2>
                ${formularioEstado(estado)}
                `,
                showCancelButton: true,
                confirmButtonText: 'Editar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#28A745',
                cancelButtonColor: "tomato",
                preConfirm: (response)=>{
                    if(response){
                        const form = document.getElementById('formularioEstado')
                        const estado = form['estado'].value
                        fetch(`/reservacionEstado/${id}`,{
                            method: 'PUT',
                            headers: {"Content-Type": "application/json"},
                            body: JSON.stringify({
                                "estado": estado,
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

    function formularioEstado(estado = ''){
        return `
                <form id="formularioEstado" class="col-10 m-auto" >
                    <section class="form-group">
                        <label for="estado">Estado de la reserva</label>
                        <select class="custom-select" name="estado" required>
                            @foreach ($estados as $estado)
                                <option value="{{ $estado->id}}"> {{ $estado->nombre}} </option>
                            @endforeach
                        </select>
                    </section>
                </form>`
    }

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
            // setTimeout(function(){
            //     location.reload();
            // },1500)
        }
    }
    </script>
@endsection