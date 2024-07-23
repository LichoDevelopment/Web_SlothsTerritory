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
                    <th>Tour Diurno (Adulto/Niño)</th>
                    <th>Tour Nocturno (Adulto/Niño)</th>
                    <th>Tour Aves (Adulto/Niño)</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    {{-- @foreach ($precios as $precio)
                        <tr>
                            <td> {{ $loop->index + 1 }} </td>
                            <td> {{ $agencia->nombre }}</td>
                            <td> {{ $precio->precio_adulto }} </td>
                            <td> {{ $precio->precio_niño }} </td>
                            <td> {{ $precio->tour->nombre }} </td>

                            <td>
                                <button data-precio-id="{{ $precio->id }}"
                                    class="btn btn-sm btn-danger btn-eliminar-precio">
                                    Eliminar
                                </button>
                                <button data-precio-adulto="{{ $precio->precio_adulto }}"
                                    data-precio-nino="{{ $precio->precio_niño }}" data-tipo-tour="{{ $precio->tour->id }}"
                                    data-precio-id="{{ $precio->id }}" data-agencia="{{ $precio->agencia }}"
                                    class="btn btn-sm btn-warning btn-actualizar-precio">
                                    actualizar
                                </button>
                            </td>
                        </tr>
                    @endforeach --}}
                    @foreach ($agencias as $index => $agencia)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $agencia['nombre'] }}</td>
                            <!-- Display prices for each tour type, defaulting to '0.00' if not available -->
                            <td>
                                {{ $agencia['precios'][0]['precio_adulto'] ?? '0.00' }} /
                                {{ $agencia['precios'][0]['precio_niño'] ?? '0.00' }}
                            </td>
                            <td>
                                {{ $agencia['precios'][1]['precio_adulto'] ?? '0.00' }} /
                                {{ $agencia['precios'][1]['precio_niño'] ?? '0.00' }}
                            </td>
                            <td>
                                {{ $agencia['precios'][2]['precio_adulto'] ?? '0.00' }} /
                                {{ $agencia['precios'][2]['precio_niño'] ?? '0.00' }}
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary btn-edit-prices" 
                                    data-agency="{{ $agencia }}"
                                    data-diurno-adult="{{ $agencia['precios'][0]['precio_adulto'] ?? '0.00' }}"
                                    data-diurno-child="{{ $agencia['precios'][0]['precio_niño'] ?? '0.00' }}"
                                    data-nocturno-adult="{{ $agencia['precios'][1]['precio_adulto'] ?? '0.00' }}"
                                    data-nocturno-child="{{ $agencia['precios'][1]['precio_niño'] ?? '0.00' }}"
                                    data-aves-adult="{{ $agencia['precios'][2]['precio_adulto'] ?? '0.00' }}"
                                    data-aves-child="{{ $agencia['precios'][2]['precio_niño'] ?? '0.00' }}">
                                    Editar Precios
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
        $(document).ready(function() {
            $('#tablaPrecios').DataTable();
        });

        const botonAgregarPrecio = document.getElementById('botonAgregarPrecio');
        const botonesEliminarPrecio = document.querySelectorAll('.btn-elimiar-precio');
        const botonesActualizarPrecio = document.querySelectorAll('.btn-edit-prices');

        botonAgregarPrecio.addEventListener('click', event => {
            event.preventDefault();
            Swal.fire({
                html: `
                <h2 class="mx-auto mb-3 ">Agregar precio</h2>
               ${formularioPrecios()}
            `,
                showCancelButton: true,
                confirmButtonText: 'Agregar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#28A745',
                cancelButtonColor: "tomato",
                preConfirm: (response) => {
                    if (response) {
                        const form = document.getElementById('formularioPrecios')
                        const agencia = form['agencia'].value

                        const precio_adulto_diurno = form['precio_adulto_diurno'].value
                        const precio_niño_diurno = form['precio_niño_diurno'].value
                        const tipo_tourDiurno = form['tourDiurno'].value

                        const precio_adulto_nocturno = form['precio_adulto_nocturno'].value
                        const precio_niño_nocturno = form['precio_niño_nocturno'].value
                        const tipo_tourNocturno = form['tourNocturno'].value

                        const precio_adulto_aves = form['precio_adulto_aves'].value
                        const precio_niño_aves = form['precio_niño_aves'].value
                        const tipo_tourAves = form['tourAves'].value

                        fetch('/precio', {
                                method: 'POST',
                                headers: {
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({
                                    "precio_adulto_diurno": precio_adulto_diurno,
                                    "precio_niño_diurno": precio_niño_diurno,
                                    "tipo_tourDiurno": tipo_tourDiurno,

                                    "precio_adulto_nocturno": precio_adulto_nocturno,
                                    "precio_niño_nocturno": precio_niño_nocturno,
                                    "tipo_tourNocturno": tipo_tourNocturno,

                                    "precio_adulto_aves": precio_adulto_aves,
                                    "precio_niño_aves": precio_niño_aves,
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

        botonesEliminarPrecio.forEach(btn => {
            btn.addEventListener('click', event => {
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
                        if (respuesta) {
                            fetch(`/precio/${id}`, {
                                    method: 'DELETE',
                                    headers: {
                                        "Content-Type": "application/json"
                                    }
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
                // const id = event.target.dataset.precioId;
                // const precio_previo_adulto = event.target.dataset.precioAdulto;
                // const precio_previo_nino = event.target.dataset.precioNino;
                // const tipo_tour_previo = event.target.dataset.tipoTour;
                // const agencia_previa = event.target.dataset.agencia;
                const agency = JSON.parse(btn.dataset.agency);
                const agencyId = agency.id;
                const agencyName = agency.nombre;
                const diurnoAdult = btn.dataset.diurnoAdult;
                const diurnoChild = btn.dataset.diurnoChild;
                const nocturnoAdult = btn.dataset.nocturnoAdult;
                const nocturnoChild = btn.dataset.nocturnoChild;
                const avesAdult = btn.dataset.avesAdult;
                const avesChild = btn.dataset.avesChild;

                Swal.fire({
                    html: `
                    <h2 class="mx-auto mb-3 ">Editar precio</h2>
                ${formularioPrecios(
                agencyId, agencyName,
                diurnoAdult, diurnoChild,
                nocturnoAdult, nocturnoChild,
                avesAdult, avesChild
            )}
                `,
                    showCancelButton: true,
                    confirmButtonText: 'Editar',
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#28A745',
                    cancelButtonColor: "tomato",
                    preConfirm: (response) => {
                        if (response) {
                            const form = document.getElementById('formularioPrecios')
                            // const precio_adulto = form['precio_adulto'].value
                            // const precio_niño = form['precio_niño'].value
                            // const tipo_tour = form['tour'].value
                            // const agencia = form['agencia'].value
                            const agency = JSON.parse(btn.dataset.agency);
                            const agencyName = agency.nombre;
                            const diurnoAdult = form['precio_adulto_diurno'].value
                            const diurnoChild = form['precio_niño_diurno'].value
                            const nocturnoAdult = form['precio_adulto_nocturno'].value
                            const nocturnoChild = form['precio_niño_nocturno'].value
                            const avesAdult = form['precio_adulto_aves'].value
                            const avesChild = form['precio_niño_aves'].value
                            fetch(`/precio`, {
                                    method: 'PUT',
                                    headers: {
                                        "Content-Type": "application/json"
                                    },
                                    body: JSON.stringify({
                                        "precio_adulto_diurno": diurnoAdult,
                                        "precio_niño_diurno": diurnoChild,
                                        "precio_adulto_nocturno": nocturnoAdult,
                                        "precio_niño_nocturno": nocturnoChild,
                                        "precio_adulto_aves": avesAdult,
                                        "precio_niño_aves": avesChild,
                                        "agencia": agency
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

        function formularioPrecios(agencyId, agencyName, diurnoAdult, diurnoChild, nocturnoAdult, nocturnoChild, avesAdult, avesChild, adulto = 0, nino = 0) {
            return `
                <form id="formularioPrecios" class="col-10 m-auto" >
                    <section class="form-group">
                        <label for="agencia">Agencia</label>
                        <select class="custom-select" name="agencia" required>
                            <option selected value="${agencyId}">${agencyName} </option>
                            
                        </select>
                           
                    </section>

                    <section class="form-group">
                        <label for="tourDiurno">Tour Diurno</label>
                    </section>

                    <!-- Fields for Tour Diurno -->
                    <section class="row mb-3">
                        <label for="precio_adulto_diurno">Precio adultos Diurno</label>
                        <input type="number" min="0" value="${diurnoAdult}" class="form-control" name="precio_adulto_diurno" />
                        <label for="precio_niño_diurno">Precio niños Diurno</label>
                        <input type="number" min="0" value="${diurnoChild}" class="form-control" name="precio_niño_diurno" />
                    </section>

                    <section class="form-group">
                        <label for="tourNocturno">Tour Nocturno</label>
                    </section>

                     <!-- Fields for Tour Nocturno -->
                    <section class="row mb-3">
                        <label for="precio_adulto_nocturno">Precio adultos Nocturno</label>
                        <input type="number" min="0" value="${nocturnoAdult}" class="form-control" name="precio_adulto_nocturno" />
                        <label for="precio_niño_nocturno">Precio niños Nocturno</label>
                        <input type="number" min="0" value="${nocturnoChild}" class="form-control" name="precio_niño_nocturno" />
                    </section>

                    <section class="form-group">
                        <label for="tourAves">Tour Aves</label>
                    </section>

                    <!-- Fields for Tour Aves -->
                    <section class="row mb-3">
                        <label for="precio_adulto_aves">Precio adultos Aves</label>
                        <input type="number" min="0" value="${avesAdult}" class="form-control" name="precio_adulto_aves" />
                        <label for="precio_niño_aves">Precio niños Aves</label>
                        <input type="number" min="0" value="${avesChild}" class="form-control" name="precio_niño_aves" />
                    </section>

                </form>`
        }

        function mostrarRespuesta(respuesta) {
            console.log(respuesta)
            if (respuesta.errors) {
                let errores = '';
                Object.entries(respuesta.errors).forEach(error => {
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
            } else {
                Swal.fire({
                    icon: 'success',
                    title: respuesta.message,
                    showConfirmButton: false
                })
                setTimeout(function() {
                    location.reload();
                }, 1500)
            }
        }
    </script>
@endsection
