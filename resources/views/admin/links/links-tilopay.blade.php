@extends('layouts.admin')

@section('content')
<section class="card">
    <section class="card-header d-flex justify-content-between align-items-center">
        <h2>Links de Pago TiloPay</h2>
    </section>
    <section class="card-body">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (!empty($links))
            <table class="table" id="tablaLinksTilopay">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Monto</th>
                        {{-- <th>Moneda</th> --}}
                        <th>Referencia</th>
                        <th>Descripción</th>
                        <th>URL</th>
                        <th>Estado del Pago</th>
                        <th>Reserva Relacionada</th>
                        {{-- <th>Fecha de Creación</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($links as $link)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $link['amount'] }}</td>
                            {{-- <td>{{ $link['currency'] }}</td> --}}
                            <td>{{ $link['reference'] }}</td>
                            <td>{{ $link['description'] }}</td>
                            <td>
                                <a href="{{ $link['url'] }}" target="_blank">Ver Link</a>
                            </td>
                            <td>
                                @if ($link['pago_aplicado'])
                                    <span class="badge bg-success">Aplicado</span>
                                @else
                                    <span class="badge bg-warning">Pendiente</span>
                                @endif
                            </td>
                            <td>
                                @if ($link['reserva'])
                                    <ul>
                                        <li><strong>Cliente:</strong> {{ $link['reserva']->nombre_cliente }}</li>
                                        <li><strong>Agencia:</strong> {{ $link['reserva']->agencia->nombre ?? 'N/A' }}</li>
                                        <li><strong>Fecha:</strong> {{ $link['reserva']->fecha_tour->fecha ?? 'N/A' }}</li>
                                        <li><strong>Hora:</strong> {{ $link['reserva']->horario->hora ?? 'N/A' }}</li>
                                    </ul>
                                @else
                                    <span class="text-muted">Sin reserva relacionada</span>
                                @endif
                            </td>
                            {{-- <td>{{ $link['create'] }}</td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No se encontraron links de pago.</p>
        @endif
    </section>
</section>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#tablaLinksTilopay').DataTable({
            responsive: true,
            autoWidth: false,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json',
            },
        });
    });
</script>
@endsection
