@extends('layouts.admin')


@section('content')
    @if (rol_usuario()->id === 3)
        {{ Redirect::to('/transporte') }}
    @endif
    @if (rol_usuario()->id === 2 || rol_usuario()->id === 1)
        @foreach ($totales as $total)
            <section class="grid_totales">
                <div class="">
                    <div class="card p-3 bg-success text-light">
                        <h2 class="number text-light"> {{ $total->adultos }} </h2>
                        <span class="desc">Adultos</span>
                    </div>
                </div>
                <div class="">
                    <div class="card p-3 bg-success text-light">
                        <h2 class="number text-light"> {{ $total->niños }} </h2>
                        <span class="desc">Niños</span>
                    </div>
                </div>
                <div class="">
                    <div class="card p-3 bg-success text-light">
                        <h2 class="number text-light"> {{ $total->niños_gratis }} </h2>
                        <span class="desc">Niños gratis</span>
                    </div>
                </div>
                <div class="">
                    <div class="card p-3 bg-success text-light">
                        <h2 class="number text-light"> {{ $total->adultos + $total->niños + $total->niños_gratis }} </h2>
                        <span class="desc">Total personas</span>
                    </div>
                </div>
                @if (rol_usuario()->id === 1)
                    <div class="">
                        <div class="card p-3 bg-secondary text-light">
                            <h2 class="number text-light"> ${{ $total->comisiones }} </h2>
                            <span class="desc">Total comisiones</span>
                        </div>
                    </div>
                    <div class="">
                        <div class="card p-3 bg-secondary text-light">
                            <h2 class="number text-light"> ${{ $total->monto_total }} </h2>
                            <span class="desc">Monto total</span>
                        </div>
                    </div>
                    <div class="">
                        <div class="card p-3 bg-secondary text-light">
                            <h2 class="number text-light"> ${{ $total->monto_neto }} </h2>
                            <span class="desc">Monto neto</span>
                        </div>
                    </div>
                @endif
            </section>
        @endforeach
    @endif
    <section class="card rounded">
        <section class="card-header d-flex justify-content-between align-items-center">
            <h2 class="fw-bold">Reservas registradas </h2>
            <a class="btn btn-info " href=" {{ route('reservas.agregar') }} ">agregar</a>
        </section>
        <section class="card-body">
            <section class="d-flex justify-content-between align-items-center mb-3">
                <button class="btn btn-outline-info btn-sm" type="button" data-toggle="collapse"
                    data-target="#SeccionFiltros" aria-expanded="false" aria-controls="SeccionFiltros">
                    Filtros
                </button>
                @if (request()->query())
                    <a href="/" class="btn btn-outline-danger btn-sm">Eliminar filtro</a>
                @endif
            </section>
            <section class="collapse" id="SeccionFiltros">
                <div class="d-flex justify-content-between mb-4 align-items-center">
                    <form class="form-filtrar" action="/?" method="get" id="form-filtrar">
                        @if (rol_usuario()->id === 1 || rol_usuario()->id === 2)
                            <div>
                                <label for="fecha-inicio">Fecha de inicio</label>
                                <input
                                    @if (request()->query() && isset(request()->query()['fechaInicio'])) value="{{ request()->query()['fechaInicio'] }}" @endif
                                    type="date" name="fechaInicio" class="form-control">
                            </div>
                            <div>
                                <label for="fecha-inicio">Fecha de fin</label>
                                <input
                                    @if (request()->query() && isset(request()->query()['fechaFin'])) value="{{ request()->query()['fechaFin'] }}" @endif
                                    type="date" name="fechaFin" class="form-control">
                            </div>
                        @endif
                        <div>
                            <label for="agencia">Agencia</label>
                            <select class="form-control" name="agencia">
                                <option value=""></option>
                                @foreach ($agencias as $agencia)
                                    <option value="{{ $agencia->id }}"> {{ $agencia->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="horario">Horario</label>
                            <select class="form-control" name="horario">
                                <option value=""></option>
                                @foreach ($horarios as $horario)
                                    <option value="{{ $horario->hora }}"> {{ $horario->hora }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-info">filtrar</button>
                    </form>

                </div>
            </section>
            <section class="card-body">

                <table class="table table-responsive" id="TablaReservas">
                    <thead>
                        <tr>
                            {{-- <th></th> --}}
                            <th>Llegó</th>
                            <th>#</th>
                            <th>Tour</th>
                            <th>Agencia</th>
                            <th>Transporte</th>
                            <th>Hora</th>
                            <th>Fecha</th>
                            <th>Pendiente de pago</th>
                            <th>Cliente</th>
                            <th>Adultos</th>
                            <th>Niños</th>
                            <th>Niños Gratis</th>
                            <th>Total</th>
                            <th>Factura</th>
                            <th>Acciones</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservas as $reserva)
                            <!-- Fila Principal -->
                            <tr class="main-row {{ $reserva->llego ? 'llego' : '' }}">
                                <!-- Celda para el botón de Expandir/Contraer -->
                                {{-- <td>
                                    <button class="btn-toggle-expand" data-target="#details-{{ $reserva->id }}"
                                        title="Ver más">
                                        ➤
                                    </button>
                                </td> --}}

                                <!-- Checkbox de llegó -->
                                <td>
                                    <input type="checkbox" class="checkbox-llego" data-id="{{ $reserva->id }}"
                                        {{ $reserva->llego ? 'checked' : '' }}>
                                </td>

                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $reserva->nombre_tour }}</td>
                                <td>{{ $reserva->nombre_agencia }}</td>
                                <td>{{ $reserva->tiene_transporte }}</td>
                                <td>{{ $reserva->hora }}</td>
                                <td>{{ $reserva->fecha }}</td>
                                <td>
                                    <button
                                        class="btn-toggle-pago {{ $reserva->pendiente_cobrar ? 'pendiente' : 'pagado' }}"
                                        data-id="{{ $reserva->id }}"
                                        data-pendiente="{{ $reserva->pendiente_cobrar ? '1' : '0' }}"
                                        title="Cambiar estado de pago">
                                        {{ $reserva->pendiente_cobrar ? 'Sí' : 'No' }}
                                    </button>
                                </td>
                                <td>{{ $reserva->nombre_cliente }}</td>
                                <td>{{ $reserva->cantidad_adultos }}</td>
                                <td>{{ $reserva->cantidad_niños }}</td>
                                <td>{{ $reserva->cantidad_niños_gratis }}</td>
                                <td>{{ $reserva->monto_neto }}</td>
                                <td>{{ $reserva->factura }}</td>

                                <!-- Acciones -->
                                <td class="btn-group">
                                    <button data-id="{{ $reserva->id }}"
                                        class="btn btn-sm btn-primary btn-solicitar-recogida"
                                        onclick="openPickupModal({{ $reserva->id }})">
                                        Agregar Transporte
                                    </button>
                                    <!-- Botón para Generar Link -->
                                    <button type="button" class="btn btn-sm btn-success"
                                        onclick="onGenerateLinkClick({{ $reserva->id }}, '{{ $reserva->email }}')"
                                        {{-- {{ $reserva->tilopay_link ? 'disabled' : '' }} --}}
                                        >
                                        {{-- {{ $reserva->tilopay_link ? 'Link ya generado' : 'Generar Link de Pago' }} --}}
                                        {{ 'Generar Link de Pago' }}
                                    </button>

                                    {{-- <button data-reservacion-estado="{{ $reserva->nombre_estado }}"
                                        data-reservacion-id="{{ $reserva->id }}"
                                        class="btn btn-sm btn-success btn-actualizar-estado">
                                        Actualizar estado
                                    </button> --}}

                                    <a href="{{ route('reservas.ver', ['id' => $reserva->id]) }}"
                                        class="btn btn-sm btn-info">
                                        Ver
                                    </a>

                                    <a href="{{ route('reservas.editar', ['id' => $reserva->id]) }}"
                                        class="btn btn-sm btn-warning">
                                        Editar
                                    </a>

                                    @if (rol_usuario()->id === 1 || rol_usuario()->id === 2)
                                        <button data-id="{{ $reserva->id }}"
                                            class="btn btn-sm btn-danger borrar-reserva-btn">
                                            Eliminar
                                        </button>
                                    @endif
                                </td>
                            </tr>

                            <!-- Subfila (oculta al inicio) -->
                            {{-- <tr id="details-{{ $reserva->id }}" class="sub-row" style="display: none;">
                                <td colspan="16">
                                    <div class="sub-row-content">
                                        <div><strong>Descuento:</strong> {{ $reserva->descuento }}</div>
                                        <div><strong>Precio c/desc.:</strong> {{ $reserva->monto_con_descuento }}</div>
                                        <div><strong>Comisión agencia:</strong> {{ $reserva->comision_agencia }}</div>
                                        <div><strong>Creado el:</strong> {{ $reserva->created_at }}</div>
                                    </div>
                                </td>
                            </tr> --}}
                        @endforeach
                    </tbody>
                </table>

            </section>
        </section>
    </section>

@endsection
{{-- Incluir el modal --}}
@include('admin.pickupModal')
<!-- Modal para solicitar Email -->
<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="emailModalForm" onsubmit="event.preventDefault(); confirmEmailModal();">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ingresar Email del Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"
                        onclick="$('#emailModal').modal('hide');">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="reservaIdModal" value="" />
                    <div class="form-group">
                        <label for="nuevoEmail">Email</label>
                        <input type="email" class="form-control" id="nuevoEmail" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="$('#emailModal').modal('hide');">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Generar Link</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    // Se llama cuando el form del modal se hace submit
    function confirmEmailModal() {
        let reservaId = document.getElementById('reservaIdModal').value;
        let nuevoEmail = document.getElementById('nuevoEmail').value;
        if (!nuevoEmail) {
            alert("Por favor, ingresa un email.");
            return;
        }

        // Cerrar modal
        $('#emailModal').modal('hide');

        // Llamar generateLinkAjax con los datos
        generateLinkAjax(reservaId, nuevoEmail);
    }
</script>


@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.checkbox-llego');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function(event) {
                    const reservaId = event.target.dataset.id;
                    const llego = event.target.checked;

                    fetch(`/reservas/${reservaId}/marcar-llego`, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({
                                llego
                            }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            const row = event.target.closest('tr');
                            if (llego) {
                                row.classList.add('llego');
                            } else {
                                row.classList.remove('llego');
                            }

                            const mensaje = document.createElement('div');
                            mensaje.className = 'alert alert-success';
                            mensaje.textContent = data.message;
                            document.body.appendChild(mensaje);

                            setTimeout(() => {
                                mensaje.remove();
                            }, 2000);
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('Ocurrió un error al actualizar el estado.');
                        });
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const toggleButtons = document.querySelectorAll('.btn-toggle-pago');

            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const reservaId = this.dataset.id;
                    const pendiente = this.dataset.pendiente === '1' ? 0 : 1;

                    // Enviar la actualización al servidor
                    fetch(`/reservas/${reservaId}/toggle-pago`, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({
                                pendiente
                            }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Actualizar el botón y la clase
                                this.textContent = pendiente ? 'Sí' : 'No';
                                this.dataset.pendiente = pendiente ? '1' : '0';
                                this.classList.toggle('pendiente', pendiente === 1);
                                this.classList.toggle('pagado', pendiente === 0);

                                // Mostrar mensaje de éxito
                                const mensaje = document.createElement('div');
                                mensaje.className = 'alert alert-success';
                                mensaje.textContent = 'Estado de pago actualizado.';
                                document.body.appendChild(mensaje);

                                setTimeout(() => mensaje.remove(), 2000);
                            } else {
                                alert('Error al actualizar el estado de pago.');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButtons = document.querySelectorAll('.btn-toggle-expand');
            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.dataset.target;
                    const subRow = document.querySelector(targetId);

                    if (!subRow) return; // Si no existe, salir

                    // Si está oculta, la mostramos
                    if (subRow.style.display === 'none') {
                        subRow.style.display = 'table-row';
                        this.textContent = '▼'; // Opcionalmente puedes cambiar el ícono
                    } else {
                        subRow.style.display = 'none';
                        this.textContent = '➤'; // Ícono original
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#TablaReservas').DataTable();
        });

        const borrarReservasBtn = document.querySelectorAll('.borrar-reserva-btn')
        const formFiltrar = document.querySelector('#form-filtrar')
        const botonesActualizarEstado = document.querySelectorAll('.btn-actualizar-estado');

        if (formFiltrar && formFiltrar['fechaInicio']) {
            formFiltrar['fechaInicio'].addEventListener('change', () => {
                formFiltrar['fechaFin'].min = formFiltrar['fechaInicio'].value
                if (!formFiltrar['fechaFin'].value) {
                    formFiltrar['fechaFin'].value = formFiltrar['fechaInicio'].value
                }
            })

        }

        borrarReservasBtn.forEach(btn => {
            btn.addEventListener('click', event => {
                event.preventDefault();
                const id = event.target.dataset.id

                Swal.fire({
                    icon: 'warning',
                    title: '¿Estas seguro de eliminar esta reserva?',
                    confirmButtonText: 'Eliminar',
                    confirmButtonColor: '#DC3545',
                    showCancelButton: true,
                    cancelButtonColor: 'teal',
                    preConfirm: (respuesta) => {
                        if (respuesta) {
                            fetch(`/reservacion/${id}`, {
                                method: 'DELETE'
                            }).then(() => {
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
                    html: `
                    <h2 class="mx-auto mb-3 ">Editar Estado</h2>
                ${formularioEstado(estado)}
                `,
                    showCancelButton: true,
                    confirmButtonText: 'Editar',
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#28A745',
                    cancelButtonColor: "tomato",
                    preConfirm: (response) => {
                        if (response) {
                            const form = document.getElementById('formularioEstado')
                            const estado = form['estado'].value
                            fetch(`/reservacionEstado/${id}`, {
                                    method: 'PUT',
                                    headers: {
                                        "Content-Type": "application/json"
                                    },
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

        function formularioEstado(estado = '') {
            return `
                <form id="formularioEstado" class="col-10 m-auto" >
                    <section class="form-group">
                        <label for="estado">Estado de la reserva</label>
                        <select class="custom-select" name="estado" required>
                            @foreach ($estados as $estado)
                                <option value="{{ $estado->id }}"> {{ $estado->nombre }} </option>
                            @endforeach
                        </select>
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
    <script>
        // Función para abrir el modal y establecer el ID de la reserva
        function openPickupModal(reservaId, scheduleId, date) {
            document.getElementById('reservaId').value = reservaId;
            document.getElementById('scheduleId').value = scheduleId;
            document.getElementById('reservationDate').value = date;
            // Limpiar campos anteriores
            document.getElementById('direccion').value = '';
            document.getElementById('latitud').value = '';
            document.getElementById('longitud').value = '';
            document.getElementById('distance').value = '';
            document.getElementById('price').value = '';
            document.getElementById('available_places').value = '';
            // Habilitar el botón de guardar por si estaba deshabilitado
            document.querySelector('#pickupForm button[type="submit"]').disabled = false;
            // Mostrar el modal
            $('#pickupModal').modal('show');
        }

        function closePickupModal() {
            $('#pickupModal').modal('hide');
        }

        // Manejar el envío del formulario
        document.getElementById('pickupForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Obtener datos del formulario
            const reservaId = document.getElementById('reservaId').value;
            const direccion = document.getElementById('direccion').value;
            const latitud = document.getElementById('latitud').value;
            const longitud = document.getElementById('longitud').value;
            const distance = document.getElementById('distance').value;
            const price = document.getElementById('price').value;
            const placeId = document.getElementById('placeId').value;
            const emailCliente = document.getElementById('email_cliente').value;

            // Validar que los campos no estén vacíos
            if (!direccion || !latitud || !longitud || !distance || !price || !emailCliente) {
                alert('Por favor, complete todos los campos.');
                return;
            }

            // Enviar datos al servidor
            fetch('{{ route('admin.transport.assign') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        reserva_id: reservaId,
                        direccion: direccion,
                        latitud: latitud,
                        longitud: longitud,
                        distancia: distance,
                        precio: price,
                        placeId: placeId,
                        email: emailCliente
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Transporte asignado correctamente.');
                        // Cerrar el modal
                        closePickupModal();
                        // Recargar la página o actualizar la tabla
                        location.reload();
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Ocurrió un error al asignar el transporte.');
                });
        });
    </script>
    <script>
        function onGenerateLinkClick(reservaId, emailReserva, tilopayLink=null) {
            if (tilopayLink) {
                Swal.fire({
                    title: 'Link ya generado',
                    html: `
                    <p>Este link ya fue generado:</p>
                    <a href="${tilopayLink}" target="_blank">${tilopayLink}</a>
                `,
                    icon: 'info',
                    confirmButtonText: 'Cerrar',
                });
            } else if (!emailReserva) {
                // Si no tiene email, abre el modal para solicitarlo
                openEmailModal(reservaId);
            } else {
                // Si todo está bien, genera el link directamente
                generateLinkAjax(reservaId, emailReserva);
            }
        }

        function openEmailModal(reservaId) {
            document.getElementById('reservaIdModal').value = reservaId;
            document.getElementById('nuevoEmail').value = '';
            $('#emailModal').modal('show');
        }

        function generateLinkAjax(reservaId, email) {
            const data = {
                reserva_id: reservaId,
                email: email,
            };

            fetch('{{ route('reservas.generar.link.ajax') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify(data),
                })
                .then(response => response.json())
                .then(resp => {
                    if (resp.success) {
                        Swal.fire({
                            title: 'Link Generado',
                            html: `
                            <p>Link generado exitosamente:</p>
                            <a href="${resp.url}" target="_blank">${resp.url}</a>
                            <button class="btn btn-primary mt-2" onclick="copyToClipboard('${resp.url}')">Copiar Link</button>
                        `,
                            icon: 'success',
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: resp.message,
                            icon: 'error',
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: 'Error',
                        text: 'Ocurrió un error al generar el link.',
                        icon: 'error',
                    });
                });
        }

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                Swal.fire({
                    title: 'Copiado',
                    text: 'El link se ha copiado al portapapeles.',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false,
                });
            });
        }
    </script>


    <style>
        .pac-container {
            z-index: 999999 !important;
        }
    </style>
    <style>
        .alert {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 1050;
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: fadeInOut 3s forwards;
        }

        @keyframes fadeInOut {
            0% {
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }
    </style>
    <style>
        .llego {
            background-color: #d4edda !important;
            /* Verde claro */
        }

        /* Estilo general para el botón */
        .btn-toggle-pago {
            display: inline-block;
            padding: 0.5rem 1rem;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        /* Cuando está en estado pendiente (Sí) */
        .pendiente {
            background-color: #ffc107 !important;
            /* Naranja claro */
            color: #000;
            border-bottom: 3px solid #cc9800;
            /* Línea inferior para resaltar */
        }

        .sub-row-content {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            padding: 1rem;
        }

        .sub-row-content>div {
            min-width: 150px;
        }
    </style>
@endsection
