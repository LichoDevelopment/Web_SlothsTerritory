@extends('layouts.admin')

@section('content')

    <section class="card">
        <section class="card-header d-flex justify-content-between align-items-center">
            <h2>Reservas con Transporte</h2>
            <form action="{{ route('admin.transporte') }}" method="GET" class="form-inline">
                <div class="form-group mr-2">
                    <label for="fecha" class="mr-2">Fecha:</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" value="{{ request('fecha') }}">
                </div>
                <button type="submit" class="btn btn-info">Filtrar</button>
            </form>
        </section>
        <section class="card-body">
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if (empty($datos))
                @if (request('fecha'))
                    <p>No hay reservas con transporte para la fecha seleccionada.</p>
                @else
                    <p>Seleccione una fecha para ver las reservas con transporte.</p>
                @endif
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Horario</th>
                            <th>Ruta</th>
                            <th>Hora de Salida del Chófer</th>
                            <th>Hora de Llegada a Sloth's Territory</th>
                            <th>Detalle</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $datoFecha)
                            @foreach ($datoFecha['horarios'] as $datoHorario)
                                <tr>
                                    <td>{{ $datoFecha['fecha_formateada'] }}</td>
                                    <td>{{ $datoHorario['hora'] }}</td>
                                    <td>
                                        @if ($datoHorario['route_link'])
                                            <a href="{{ $datoHorario['route_link'] }}" target="_blank">Ver Ruta</a>
                                            <button type="button" class="btn btn-link"
                                                onclick="copyToClipboard('{{ $datoHorario['route_link'] }}')"
                                                title="Copiar enlace">
                                                <i class="fas fa-copy"></i>
                                            </button>
                                        @else
                                            No hay ruta disponible
                                        @endif
                                    </td>
                                    <td>{{ $datoHorario['driver_departure_time'] }}</td>
                                    <td>{{ $datoHorario['driver_arrival_time'] }}</td>
                                    <td>{{ $datoHorario['detail'] }}</td>
                                    <td>
                                        <!-- data-fecha y data-horario para no mostrar el JSON en el HTML visible -->
                                        <button type="button" class="btn btn-sm btn-primary copy-summary-btn"
                                            data-fecha="{{ $datoFecha['fecha_formateada'] }}"
                                            data-horario='@json($datoHorario)'>
                                            Copiar Resumen
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            @endif
        </section>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.copy-summary-btn');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const fecha = this.getAttribute('data-fecha');
                    const horarioData = JSON.parse(this.getAttribute('data-horario'));
                    copyFullSummary(fecha, horarioData);
                });
            });
        });

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                alert('Enlace copiado al portapapeles!');
            }, function(err) {
                console.error('Error al copiar el enlace: ', err);
            });
        }

        function copyFullSummary(fecha, horarioData) {
            let resumen = `*** Resumen de Transporte ***\n\n`;
            resumen += `Fecha: ${fecha}\n`;
            resumen += `Horario: ${horarioData.hora}\n`;
            resumen += `Hora de Salida del Chofer: ${horarioData.driver_departure_time}\n`;
            // resumen += `Hora de Llegada a Sloth's Territory: ${horarioData.driver_arrival_time}\n`;
            resumen += `Detalle: ${horarioData.detail}\n`;

            if (horarioData.route_link) {
                resumen += `Ruta: ${horarioData.route_link}\n\n`;
            } else {
                resumen += `Ruta: N/A\n\n`;
            }

            if (Array.isArray(horarioData.reservas)) {
                resumen += `*** Reservas ***\n`;
                horarioData.reservas.forEach(reserva => {
                    const totalPersonas = reserva.cantidad_adultos + reserva.cantidad_niños + reserva
                        .cantidad_niños_gratis;
                    let horaRecogida = 'N/A';
                    if (horarioData.pick_up_times[reserva.id]) {
                        let isoString = horarioData.pick_up_times[reserva.id]; // La cadena ISO original
                        // Crear objeto Date a partir de la cadena ISO
                        let dateObj = new Date(isoString);
                        // Formatear a HH:MM (24 horas)
                        let hours = dateObj.getHours().toString().padStart(2, '0');
                        let minutes = dateObj.getMinutes().toString().padStart(2, '0');
                        horaRecogida = `${hours}:${minutes}`;
                    }

                    resumen += `- Cliente: ${reserva.nombre_cliente}\n`;
                    resumen += `  Email: ${reserva.email ?? 'N/A'}\n`;
                    resumen += `  Total Personas: ${totalPersonas}\n`;
                    resumen += `  Hora Estimada de Recogida: ${horaRecogida}\n\n`;
                });
            }

            navigator.clipboard.writeText(resumen).then(function() {
                alert('Resumen copiado al portapapeles!');
            }, function(err) {
                console.error('Error al copiar el resumen: ', err);
            });
        }
    </script>

@endsection
