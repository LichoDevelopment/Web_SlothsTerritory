@extends('layouts.admin')

@section('content')

<section class="card">
    <section class="card-header d-flex justify-content-between align-items-center">
        <h2>Consulta de Pagos</h2>
    </section>
    <section class="card-body">
        <!-- Formulario para enviar el correo -->
        <form action="{{ route('admin.pagos') }}" method="GET">
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Buscar Pagos</button>
        </form>

        <!-- Verifica si se ha enviado un correo para la búsqueda -->
        @if(request('email'))
            @if(!empty($pagos))
                <table class="table" id="tablaPrecios">
                    <thead>
                        <th>#</th>
                        <th>Monto</th>
                        <th>Estado</th>
                        <th>Correo</th>
                        <th>Fecha</th>
                    </thead>
                    <tbody>
                        @foreach ($pagos as $pago)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $pago['amount'] }}</td>
                                <td>{{ $pago['response'] }}</td>
                                <td>{{ $pago['email'] }}</td>
                                <td>{{ $pago['date'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No se encontraron pagos para el correo proporcionado.</p>
            @endif
        @endif
    </section>
</section>

@endsection
