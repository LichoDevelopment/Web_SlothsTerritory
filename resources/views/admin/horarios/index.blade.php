@extends('layouts.admin')


@section('content')

    <section class="card">
        <section class="card-header d-flex justify-content-between align-items-center">
            <h2>Horarios</h2>
            <button id="botonAgregarHorario" class="btn btn-info">Agregar</button>
        </section>
        <section class="card-body">
            <table class="table" id="tablaHorarios">
                <thead>
                    <th>#</th>
                    <th>Hora tour</th>
                    <th>Capacidad máxima</th>
                    <th>Hora mínima</th>
                    <th>tipo tour</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($horarios as $horario)
                        <tr>
                            <td> {{$loop->index + 1}} </td>
                            <td> {{$horario->hora }} </td>
                            <td> {{$horario->capacidad_maxima }} </td>
                            <td> {{$horario->hora_minima_reservar }} </td>
                            <td> {{$horario->tours->nombre }} </td>
                            
                            <td> 
                                <button 
                                    data-horario-id="{{$horario->id}}"
                                    class="btn btn-sm btn-danger btn-elimiar-horario">
                                    Eliminar
                                </button> 
                                <button 
                                    data-horario-hora="{{$horario->hora}}"
                                    data-horario-capacidad="{{$horario->capacidad_maxima}}"
                                    data-horario-horamin="{{$horario->hora_minima_reservar}}"
                                    data-tipo-tour="{{$horario->tours->id}}"
                                    data-horario-id="{{$horario->id}}"
                                    class="btn btn-sm btn-warning btn-actualizar-horario">
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
        $('#tablaHorarios').DataTable();
    } );

    const botonAgregarHorario = document.getElementById('botonAgregarHorario');
    const botonesEliminarHorario = document.querySelectorAll('.btn-elimiar-horario');
    const botonesActualizarHorario = document.querySelectorAll('.btn-actualizar-horario');

    botonAgregarHorario.addEventListener('click', event =>{
        event.preventDefault();
        Swal.fire({
            html: 
            `
                <h2 class="mx-auto mb-3 ">Agregar horario</h2>
               ${formularioHorarios()}
            `,
            showCancelButton: true,
            confirmButtonText: 'Agregar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#28A745',
            cancelButtonColor: "tomato",
            preConfirm: (response)=>{
                if(response){
                    const form = document.getElementById('formularioHorarios')
                    const hora = form['hora'].value
                    const capacidad_maxima = form['capacidad_maxima'].value
                    const hora_minima_reservar = form['hora_minima_reservar'].value
                    const id_tour = form['tour'].value

                    fetch('/horario',{
                        method: 'POST',
                        headers: {"Content-Type": "application/json"},
                        body: JSON.stringify({
                            "hora": hora,
                            "capacidad_maxima": capacidad_maxima,
                            "hora_minima_reservar": hora_minima_reservar,
                            "id_tour": id_tour
                        })
                    })
                    .then(response => response.json())
                    .then(respuesta => mostrarRespuesta(respuesta))
                    .catch(response => console.log(response))
                }
            }
        })
    })

    botonesEliminarHorario.forEach(btn =>{
        btn.addEventListener('click', event =>{
            event.preventDefault();
            const id = event.target.dataset.horarioId;
            Swal.fire({
                icon: 'warning',
                title: 'Estas seguro de elimiar este horario?',
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                confirmButtonColor: 'tomato',
                cancelButtonColor: 'teal',
                cancelButtonText: 'Cancelar',
                preConfirm: (respuesta) => {
                    if(respuesta){
                        fetch(`/horario/${id}`,{
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

    botonesActualizarHorario.forEach(btn => {
        btn.addEventListener('click', event => {
            event.preventDefault();
            const id = event.target.dataset.horarioId;
            const hora_previa = event.target.dataset.horarioHora;
            const capacidad_previa = event.target.dataset.horarioCapacidad;
            const horario_hora_min = event.target.dataset.horarioHoramin;
            const tipo_tour_previo = event.target.dataset.tipoTour;

            Swal.fire({
                html: 
                `
                    <h2 class="mx-auto mb-3 ">Editar horario</h2>
                ${formularioHorarios(hora_previa, capacidad_previa, horario_hora_min, tipo_tour_previo)}
                `,
                showCancelButton: true,
                confirmButtonText: 'Editar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#28A745',
                cancelButtonColor: "tomato",
                preConfirm: (response)=>{
                    if(response){
                        const form = document.getElementById('formularioHorarios')
                        const hora = form['hora'].value
                        const capacidad_maxima = form['capacidad_maxima'].value
                        const hora_minima_reservar = form['hora_minima_reservar'].value
                        const id_tour = form['tour'].value
                        fetch(`/horario/${id}`,{
                            method: 'PUT',
                            headers: {"Content-Type": "application/json"},
                            body: JSON.stringify({
                                "hora": hora,
                                "capacidad_maxima": capacidad_maxima,
                                "hora_minima_reservar": hora_minima_reservar,
                                "id_tour": id_tour
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

    function formularioHorarios(hora = '', capacidad_maxima = '', hora_minima_reservar = '', tipo_tour = ''){
        return `
                <form id="formularioHorarios" class="col-10 m-auto" >
                    <section class="row mb-3">
                        <label for="hora">Hora del tour</label>
                        <input type="time"  value="${hora}" class="form-control" name="hora" />
                    </section>
                    <section class="row mb-3">
                        <label for="hora_minima_reservar">Hora minima a reservar</label>
                        <input type="time"  value="${hora_minima_reservar}" class="form-control" name="hora_minima_reservar" />
                    </section>
                    <section class="row mb-3">
                        <label for="capacidad_maxima">Capacidad máxima</label>
                        <input type="number" min="1"  value="${capacidad_maxima}" class="form-control" name="capacidad_maxima" />
                    </section>


                    <section class="form-group">
                        <label for="tour">Tour</label>
                        <select class="custom-select" name="tour" required>
                            <option selected value="">Elija un tour</option>
                            @foreach ($tours as $tour)
                                <option value="{{ $tour->id}}"> {{ $tour->nombre}} </option>
                            @endforeach
                        </select>
                            @if (session('horario'))
                                <p class="text-danger font-weight-bold error">{{session('horario')[0]}}</p>
                            @endif
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