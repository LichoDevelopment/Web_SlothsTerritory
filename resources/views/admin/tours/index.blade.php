
@extends('layouts.admin')


@section('content')

    <section class="card">
        <section class="card-header d-flex justify-content-between align-items-center">
            <h2>Tours</h2>
            <button id="botonAgregarTour" class="btn btn-info">Agregar</button>
        </section>
        <section class="card-body">
            <table class="table" id="tablaTours">
                <thead>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($tours as $tour)
                    <tr>
                        <td> {{$loop->index + 1}} </td>
                        <td> {{$tour->nombre }} </td>
                        <td> 
                            <button 
                                data-tour-id="{{$tour->id}}"
                                class="btn btn-sm btn-danger btn-elimiar-tour">
                                Eliminar
                            </button> 
                            <button 
                                data-tour-nombre="{{$tour->nombre}}"
                                data-tour-id="{{$tour->id}}"
                                class="btn btn-sm btn-warning btn-actualizar-tour">
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
        $('#tablaTours').DataTable();
    } );

    const botonAgregarTour = document.getElementById('botonAgregarTour');
    const botonesEliminarTour = document.querySelectorAll('.btn-elimiar-tour');
    const botonesActualizarTour = document.querySelectorAll('.btn-actualizar-tour');

    botonAgregarTour.addEventListener('click', event =>{
        event.preventDefault();
        Swal.fire({
            html: 
            `
                <h2 class="mx-auto mb-3 ">Agregar tour</h2>
               ${formularioTours()}
            `,
            showCancelButton: true,
            confirmButtonText: 'Agregar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#28A745',
            cancelButtonColor: "tomato",
            preConfirm: (response)=>{
                if(response){
                    const form = document.getElementById('formularioTours')
                    const nombre = form['nombre'].value
                    

                    fetch('/tour',{
                        method: 'POST',
                        headers: {"Content-Type": "application/json"},
                        body: JSON.stringify({
                            "nombre": nombre
                        })
                    })
                    .then(response => response.json())
                    .then(respuesta => mostrarRespuesta(respuesta))
                    .catch(response => console.log(response))
                }
            }
        })
    })

    botonesEliminarTour.forEach(btn =>{
        btn.addEventListener('click', event =>{
            event.preventDefault();
            const id = event.target.dataset.tourId;
            Swal.fire({
                icon: 'warning',
                title: 'Estas seguro de elimiar este tour?',
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                confirmButtonColor: 'tomato',
                cancelButtonColor: 'teal',
                cancelButtonText: 'Cancelar',
                preConfirm: (response) => {
                    if(response){
                        fetch(`/tour/${id}`,{
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

    botonesActualizarTour.forEach(btn => {
        btn.addEventListener('click', event => {
            event.preventDefault();
            const id = event.target.dataset.tourId;
            const nombre_previo = event.target.dataset.tourNombre;
            Swal.fire({
                html: 
                `
                    <h2 class="mx-auto mb-3 ">Editar tour</h2>
                ${formularioTours(nombre_previo)}
                `,
                showCancelButton: true,
                confirmButtonText: 'Editar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#28A745',
                cancelButtonColor: "tomato",
                preConfirm: (response)=>{
                    if(response){
                        const form = document.getElementById('formularioTours')
                        const nombre = form['nombre'].value
                        fetch(`/tour/${id}`,{
                            method: 'PUT',
                            headers: {"Content-Type": "application/json"},
                            body: JSON.stringify({
                                "nombre": nombre,
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

    function formularioTours(nombre = ''){
        return `
                <form id="formularioTours" class="col-10 m-auto" >
                    <section class="row mb-3">
                        <label for="nombre">Nombre tour</label>
                        <input type="text"  value="${nombre}" class="form-control" name="nombre" />
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
            setTimeout(function(){
                location.reload();
            },1500)
        }
    }
    </script>

@endsection