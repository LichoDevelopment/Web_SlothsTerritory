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
                    <th>Agencia</th>
                    <th>precio adulto</th>
                    <th>precio niños</th>
                    <th>tipo tour</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($precios as $precio)
                    <tr>
                        <td> {{$loop->index + 1}} </td>
                        <td> {{$precio->agencia->nombre}}</td>
                        <td> {{$precio->precio_adulto }} </td>
                        <td> {{$precio->precio_niño }} </td>
                        <td> {{$precio->tour->nombre }} </td>
                        
                        <td> 
                            <button 
                                data-precio-id="{{$precio->id}}"
                                class="btn btn-sm btn-danger btn-elimiar-precio">
                                Eliminar
                            </button> 
                            <button 
                                data-precio-adulto="{{$precio->precio_adulto}}"
                                data-precio-nino="{{$precio->precio_niño}}"
                                data-tipo-tour="{{$precio->tour->id}}"
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
                    const agencia = form['agencia'].value

                    const precio_adulto_diurno = form['precio_adulto_diurno'].value
                    const precio_nino_diurno = form['precio_niño_diurno'].value
                    const tipo_tourDiurno = form['tourDiurno'].value

                    const precio_adulto_nocturno = form['precio_adulto_nocturno'].value
                    const precio_nino_nocturno = form['precio_niño_nocturno'].value
                    const tipo_tourNocturno = form['tourNocturno'].value

                    const precio_adulto_aves = form['precio_adulto_aves'].value
                    const precio_nino_aves = form['precio_niño_aves'].value
                    const tipo_tourAves = form['tourAves'].value

                    fetch('/precio',{
                        method: 'POST',
                        headers: {"Content-Type": "application/json"},
                        body: JSON.stringify({
                            "precio_adulto_diurno": precio_adulto_diurno,
                            "precio_nino_diurno": precio_nino_diurno,
                            "tipo_tourDiurno": tipo_tourDiurno,

                            "precio_adulto_nocturno": precio_adulto_nocturno,
                            "precio_nino_nocturno": precio_nino_nocturno,
                            "tipo_tourNocturno": tipo_tourNocturno,

                            "precio_adulto_aves": precio_adulto_aves,
                            "precio_nino_aves": precio_nino_aves,
                            "tipo_tourAves": tipo_tourAves,

                            "agencia": agencia
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
            const id = event.target.dataset.precioId;
            Swal.fire({
                icon: 'warning',
                title: 'Estas seguro de elimiar este precio?',
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                confirmButtonColor: 'tomato',
                cancelButtonColor: 'teal',
                cancelButtonText: 'Cancelar',
                preConfirm: (respuesta) => {
                    if(respuesta){
                        fetch(`/precio/${id}`,{
                            method: 'DELETE',
                            headers: {"Content-Type": "application/json"}
                        })
                        // .then(()=> location.reload())
                        .then(response => mostrarRespuesta(response))
                        .catch(response => console.log(response))
                    }
                }
            })
        })
    })

    botonesActualizarPrecio.forEach(btn => {
        btn.addEventListener('click', event => {
            event.preventDefault();
            const id = event.target.dataset.precioId;
            const precio_previo_adulto = event.target.dataset.precioAdulto;
            const precio_previo_nino = event.target.dataset.precioNino;
            const tipo_tour_previo = event.target.dataset.tipoTour;

            Swal.fire({
                html: 
                `
                    <h2 class="mx-auto mb-3 ">Editar precio</h2>
                ${formularioPrecios(precio_previo_adulto, precio_previo_nino, tipo_tour_previo)}
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
                        const tipo_tour = form['tour'].value
                        fetch(`/precio/${id}`,{
                            method: 'PUT',
                            headers: {"Content-Type": "application/json"},
                            body: JSON.stringify({
                                "precio_adulto": precio_adulto,
                                "precio_niño": precio_nino,
                                "id_tour": tipo_tour
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

    function formularioPrecios(adulto = '', nino = '' ){
        return `
                <form id="formularioPrecios" class="col-10 m-auto" >
                    <section class="form-group">
                        <label for="agencia">Agencia</label>
                        <select class="custom-select" name="agencia" required>
                            <option selected value="">Elija la agencia</option>
                            @foreach ($agencias as $agencia)
                                @if ($agencia->con_precio == false)
                                    <option value="{{ $agencia->id}}"> {{ $agencia->nombre}} </option>
                                @endif
                            @endforeach
                        </select>
                            @if (session('precio'))
                                <p class="text-danger font-weight-bold error">{{session('precio')[0]}}</p>
                            @endif
                    </section>

                    <section class="form-group">
                        <label for="tourDiurno">Tour Diurno</label>
                        <select class="custom-select" name="tourDiurno" required>
                            @foreach ($tours as $tour)
                            @if ($tour->id == "1")
                                <option value="{{ $tour->id}}"> {{ $tour->nombre}} </option>
                            @endif
                            @endforeach
                        </select>
                            @if (session('precio'))
                                <p class="text-danger font-weight-bold error">{{session('precio')[0]}}</p>
                            @endif
                    </section>
                    <section class="row mb-3">
                        <label for="precio_adulto">Precio adultos</label>
                        <input type="number" min="0" value="${adulto}" class="form-control" name="precio_adulto_diurno" />
                    </section>
                    <section class="row mb-3">
                        <label for="precio_niño">Precio niños</label>
                        <input type="number" min="0" value="${nino}" class="form-control" name="precio_niño_diurno" />
                    </section>
                    <section class="form-group">
                        <label for="tourNocturno">Tour Nocturno</label>
                        <select class="custom-select" name="tourNocturno" required>
                            @foreach ($tours as $tour)
                            @if ($tour->id == "2")
                                <option value="{{ $tour->id}}"> {{ $tour->nombre}} </option>
                            @endif
                            @endforeach
                        </select>
                            @if (session('precio'))
                                <p class="text-danger font-weight-bold error">{{session('precio')[0]}}</p>
                            @endif
                    </section>
                    <section class="row mb-3">
                        <label for="precio_adulto">Precio adultos</label>
                        <input type="number" min="0" value="${adulto}" class="form-control" name="precio_adulto_nocturno" />
                    </section>
                    <section class="row mb-3">
                        <label for="precio_niño">Precio niños</label>
                        <input type="number" min="0" value="${nino}" class="form-control" name="precio_niño_nocturno" />
                    </section>
                    <section class="form-group">
                        <label for="tourAves">Tour Aves</label>
                        <select class="custom-select" name="tourAves" required>
                    
                            @foreach ($tours as $tour)
                            @if ($tour->id == "3")
                                <option value="{{ $tour->id}}"> {{ $tour->nombre}} </option>
                            @endif
                            @endforeach
                        </select>
                            @if (session('precio'))
                                <p class="text-danger font-weight-bold error">{{session('precio')[0]}}</p>
                            @endif
                    </section>
                    <section class="row mb-3">
                        <label for="precio_adulto">Precio adultos</label>
                        <input type="number" min="0" value="${adulto}" class="form-control" name="precio_adulto_aves" />
                    </section>
                    <section class="row mb-3">
                        <label for="precio_niño">Precio niños</label>
                        <input type="number" min="0" value="${nino}" class="form-control" name="precio_niño_aves" />
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