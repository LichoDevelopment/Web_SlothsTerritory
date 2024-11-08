@extends('layouts.admin')

@section('content')

    <section class="card">
        <section class="card-header">
            <h2>Reservas con Transporte</h2>
        </section>
        <section class="card-body">
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if (empty($datos))
                <p>No hay reservas con transporte.</p>
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
                                            <!-- Botón para copiar el enlace -->
                                            <button class="btn btn-link"
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
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            @endif
        </section>
    </section>

    <!-- Script para copiar el enlace al portapapeles -->
    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                alert('Enlace copiado al portapapeles!');
            }, function(err) {
                console.error('Error al copiar el enlace: ', err);
            });
        }
    </script>

@endsection
