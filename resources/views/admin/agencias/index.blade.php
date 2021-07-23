{{-- @extends('/layouts.admin')


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
@endsection --}}




@extends('layouts.admin')


@section('content')

    <section class="card">
        <section class="card-header d-flex justify-content-between align-items-center">
            <h2>Agencias</h2>
            <button id="botonAgregarAgencia" class="btn btn-info">Agregar</button>
        </section>
        <section class="card-body">
            <table class="table" id="tablaAgencia">
                <thead>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Comision</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($agencias as $agencia)
                    <tr>
                        <td> {{$loop->index + 1}} </td>
                        <td> {{$agencia->nombre }} </td>
                        <td> {{$agencia->comision }} </td>
                        <td> 
                            @if (rol_usuario()->id === 1)
                                <button 
                                    data-agencia-id="{{$agencia->id}}"
                                    class="btn btn-sm btn-danger btn-elimiar-agencia">
                                    Eliminar
                                </button> 
                                
                            @endif
                            <button 
                                data-agencia-nombre="{{$agencia->nombre}}"
                                data-agencia-comision="{{$agencia->comision}}"
                                data-agencia-id="{{$agencia->id}}"
                                class="btn btn-sm btn-warning btn-actualizar-agencia">
                                Actualizar
                            </button> 
                        </td>
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
        $('#tablaAgencia').DataTable();
    } );

    const botonAgregarAgencia = document.getElementById('botonAgregarAgencia');
    const botonesEliminarAgencia = document.querySelectorAll('.btn-elimiar-agencia');
    const botonesActualizarAgencia = document.querySelectorAll('.btn-actualizar-agencia');

    botonAgregarAgencia.addEventListener('click', event =>{
        event.preventDefault();
        Swal.fire({
            html: 
            `
                <h2 class="mx-auto mb-3 ">Agregar agencia</h2>
               ${formularioAgencias()}
            `,
            showCancelButton: true,
            confirmButtonText: 'Agregar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#28A745',
            cancelButtonColor: "tomato",
            preConfirm: (response)=>{
                if(response){
                    const form = document.getElementById('formularioAgencias')
                    const nombre = form['nombre'].value
                    const comision = form['comision'].value
                    

                    fetch('/agencia',{
                        method: 'POST',
                        headers: {"Content-Type": "application/json"},
                        body: JSON.stringify({
                            "nombre": nombre,
                            "comision": comision
                        })
                    })
                    .then(response => response.json())
                    .then(respuesta => mostrarRespuesta(respuesta))
                    .catch(response => console.log(response))
                }
            }
        })
    })

    botonesEliminarAgencia.forEach(btn =>{
        btn.addEventListener('click', event =>{
            event.preventDefault();
            const id = event.target.dataset.agenciaId;
            Swal.fire({
                icon: 'warning',
                title: 'Estas seguro de elimiar este agencia?',
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                confirmButtonColor: 'tomato',
                cancelButtonColor: 'teal',
                cancelButtonText: 'Cancelar',
                preConfirm: (response) => {
                    if(response){
                        fetch(`/agencia/${id}`,{
                            method: 'DELETE',
                            headers: {"Content-Type": "application/json"}
                        })
                        .then(response => mostrarRespuesta(response))
                        .catch(response => console.log(response))
                    }
                }
            })
        })
    })

    botonesActualizarAgencia.forEach(btn => {
        btn.addEventListener('click', event => {
            event.preventDefault();
            const id = event.target.dataset.agenciaId;
            const nombre_previo = event.target.dataset.agenciaNombre;
            const comision_previa = event.target.dataset.agenciaComision;
            Swal.fire({
                html: 
                `
                    <h2 class="mx-auto mb-3 ">Editar agencia</h2>
                ${formularioAgencias(nombre_previo, comision_previa)}
                `,
                showCancelButton: true,
                confirmButtonText: 'Editar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#28A745',
                cancelButtonColor: "tomato",
                preConfirm: (response)=>{
                    if(response){
                        const form = document.getElementById('formularioAgencias')
                        const nombre = form['nombre'].value
                        const comision = form['comision'].value
                        fetch(`/agencia/${id}`,{
                            method: 'PUT',
                            headers: {"Content-Type": "application/json"},
                            body: JSON.stringify({
                                "nombre": nombre,
                                "comision": comision,
                            })
                        })
                        .then(respuesta => respuesta.json())
                        .then(respuesta => {
                            console.log({respuesta})
                            mostrarRespuesta(respuesta)
                        })
                        .catch(respuesta => console.log(respuesta))
                    }
                }
            })
        })
    })

    function formularioAgencias(nombre = '', comision = ''){
        return `
                <form id="formularioAgencias" class="col-10 m-auto" >
                    <section class="row mb-3">
                        <label for="nombre">Nombre agencia</label>
                        <input type="text"  value="${nombre}" class="form-control" name="nombre" />
                    </section>
                    <section class="row mb-3">
                        <label for="comision">Comision</label>
                        <input type="number" step=".01" value="${comision}" class="form-control" name="comision" />
                    </section>
                </form>`
    }

    function mostrarRespuesta(respuesta){
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