@extends('layouts.admin')


@section('content')

    <section class="card">
        <section class="card-header d-flex justify-content-between align-items-center">
            <h2>Precios</h2>
            <button id="botonAgregarPrecio" class="btn btn-info">Agregar</button>
        </section>
        <section class="card-body">
            <table class="table" id="tablaPrecios">
                <thead>
                    <th>#</th>
                    <th>precio adulto</th>
                    <th>precio niños</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($precios as $precio)
                    <tr>
                        <td> {{$loop->index + 1}} </td>
                        <td> {{$precio->precio_adulto }} </td>
                        <td> {{$precio->precio_niño }} </td>
                        <td> 
                            <button 
                                data-precio-id="{{$precio->id}}"
                                class="btn btn-sm btn-danger btn-elimiar-precio">
                                Eliminar
                            </button> 
                            <button 
                                data-precio-adulto="{{$precio->precio_adulto}}"
                                data-precio-nino="{{$precio->precio_niño}}"
                                data-precio-id="{{$precio->id}}"
                                class="btn btn-sm btn-warning btn-actualizar-precio">
                                actualizar
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
        $('#tablaPrecios').DataTable();
    } );

    const botonAgregarPrecio = document.getElementById('botonAgregarPrecio');
    const botonesEliminarPrecio = document.querySelectorAll('.btn-elimiar-precio');
    const botonesActualizarPrecio = document.querySelectorAll('.btn-actualizar-precio');

    botonAgregarPrecio.addEventListener('click', event =>{
        event.preventDefault();
        Swal.fire({
            html: 
            `
                <h2 class="mx-auto mb-3 ">Agregar precio</h2>
               ${formularioPrecios()}
            `,
            showCancelButton: true,
            confirmButtonText: 'Agregar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#28A745',
            cancelButtonColor: "tomato",
            preConfirm: (response)=>{
                if(response){
                    const form = document.getElementById('formularioPrecios')
                    const precio_adulto = form['precio_adulto'].value
                    const precio_nino = form['precio_niño'].value

                    fetch('/precio',{
                        method: 'POST',
                        headers: {"Content-Type": "application/json"},
                        body: JSON.stringify({
                            "precio_adulto": precio_adulto,
                            "precio_niño": precio_nino
                        })
                    })
                    .then(response => response.json())
                    .then(respuesta => mostrarRespuesta(respuesta))
                    .catch(response => console.log(response))
                }
            }
        })
    })

    botonesEliminarPrecio.forEach(btn =>{
        btn.addEventListener('click', event =>{
            event.preventDefault();
            Swal.fire({
                icon: 'danger',
                title: 'Estas seguro de elimiar este precio?',
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                confirmButtonColor: 'tomato',
                cancelButtonColor: 'teal',
                cancelButtonText: 'Cancelar',
            })
        })
    })

    botonesActualizarPrecio.forEach(btn => {
        btn.addEventListener('click', event => {
            event.preventDefault();
            const id = event.target.dataset.precioId;
            const precio_previo_adulto = event.target.dataset.precioAdulto;
            const precio_previo_nino = event.target.dataset.precioNino;
            Swal.fire({
                html: 
                `
                    <h2 class="mx-auto mb-3 ">Editar precio</h2>
                ${formularioPrecios(precio_previo_adulto, precio_previo_nino)}
                `,
                showCancelButton: true,
                confirmButtonText: 'Editar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#28A745',
                cancelButtonColor: "tomato",
                preConfirm: (response)=>{
                    if(response){
                        const form = document.getElementById('formularioPrecios')
                        const precio_adulto = form['precio_adulto'].value
                        const precio_nino = form['precio_niño'].value
                        fetch(`/precio/${id}`,{
                            method: 'PUT',
                            headers: {"Content-Type": "application/json"},
                            body: JSON.stringify({
                                "precio_adulto": precio_adulto,
                                "precio_niño": precio_nino
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

    function formularioPrecios(adulto = '', nino = ''){
        console.log({adulto, nino})
        return `
                <form id="formularioPrecios" class="col-10 m-auto" >
                    <section class="row mb-3">
                        <label for="precio_adulto">Precio adultos</label>
                        <input type="number" value="${adulto}" class="form-control" name="precio_adulto" />
                    </section>
                    <section class="row mb-3">
                        <label for="precio_niño">Precio niños</label>
                        <input type="number" value="${nino}" class="form-control" name="precio_niño" />
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