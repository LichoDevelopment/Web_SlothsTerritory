<!DOCTYPE html>
<html>
<head>
    <title>Nueva Reserva con Transporte</title>
</head>
<body>
    <h1>Nueva Reserva con Transporte</h1>

    <p>Se ha realizado una nueva reserva con transporte. Aquí están los detalles:</p>

    <h2>Detalles de la Reserva</h2>
    <ul>
        <li><strong>Nombre del Cliente:</strong> {{ $reservation->nombre_cliente }}</li>
        <li><strong>Fecha del Tour:</strong> {{ $reservation->fecha_tour->fecha }}</li>
        <li><strong>Horario:</strong> {{ $reservation->horario->hora }}</li>
        <li><strong>Cantidad de Adultos:</strong> {{ $reservation->cantidad_adultos }}</li>
        <li><strong>Cantidad de Niños:</strong> {{ $reservation->cantidad_niños }}</li>
        <li><strong>Cantidad de Niños Gratis:</strong> {{ $reservation->cantidad_niños_gratis }}</li>
        <li><strong>Monto Total:</strong> ${{ number_format($reservation->monto_total, 2) }}</li>
    </ul>

    <h2>Detalles del Transporte</h2>
    <ul>
        <li><strong>Dirección:</strong> {{ $transport->direccion }}</li>
        <li><strong>Latitud:</strong> {{ $transport->latitud }}</li>
        <li><strong>Longitud:</strong> {{ $transport->longitud }}</li>
        <li><strong>Costo:</strong> ${{ number_format($transport->costo, 2) }}</li>
        <li><strong>Distancia:</strong> {{ $transport->distancia }} km</li>
    </ul>
</body>
</html>
