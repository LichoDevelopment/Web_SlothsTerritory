{{-- resources/views/correo/reservation_confirmation.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Confirmed</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #97DD3C;
            border-radius: 8px;
            background-color: #f9f9f9;
            margin-top: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            max-width: 100px;
            margin-bottom: 10px;
        }

        .status {
            background-color: #FFA413;
            color: #ffffff;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
        }

        .reservationDetails {
            border-top: 1px solid #97DD3C;
            padding-top: 15px;
        }

        .contactInfo {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #97DD3C;
            color: #555;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.9em;
            color: #555;
        }

        .contact-link {
            color: #FFA413;
            /* Color del enlace */
            text-decoration: underline;
            /* Subrayar para indicar que es un enlace */
            transition: color 0.3s ease;
            /* Transición suave para el cambio de color */
        }

        .contact-link:hover,
        .contact-link:focus {
            color: #97DD3C;
            /* Cambiar el color cuando se pasa el mouse por encima o se enfoca */
            text-decoration: none;
            /* Opcional: eliminar el subrayado en hover/focus */
        }

        .downloadButtonContainer {
            display: flex;
            /* Usa flexbox */
            justify-content: center;
            /* Centrar horizontalmente */
            align-items: center;
            /* Centrar verticalmente */
            flex-wrap: wrap;
            /* Permitir que los elementos pasen a la siguiente línea si no hay espacio */
            gap: 10px;
            /* Espacio entre botones */
            margin-top: 20px;
        }


        .downloadButton {
            background-color: #FFA413;
            /* Color de fondo */
            color: white;
            /* Color del texto */
            border: none;
            /* Sin bordes */
            padding: 10px 20px;
            /* Espaciado interno */
            border-radius: 5px;
            /* Bordes redondeados */
            font-size: 16px;
            /* Tamaño del texto */
            cursor: pointer;
            /* Cursor en forma de mano */
            transition: background-color 0.3s;
            /* Transición suave al cambiar el color */
            margin: 5px;
            margin-bottom: 30px;
        }

        .downloadButton:hover {
            background-color: #97DD3C;
            /* Cambiar el color al pasar el mouse */
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <img src="{{ asset('SlothsTerritory.ico') }}" alt="Company Logo" class="logo" />
            <h1>Reservation Confirmed</h1>
        </div>

        <div class="status">
            <p>{{ $paymentStatus }}</p>
        </div>

        @if ($data)
            <div class="reservationDetails">
                <h2>Reservation Details</h2>
                <p><strong>Reservation Number:</strong> {{ $data->reserva->id }}</p>
                <p><strong>Customer Name:</strong> {{ $data->reserva->nombre_cliente }}</p>
                <p><strong>Tour Date:</strong> {{ $data->reserva->fecha_tour->fecha }}</p>
                <p><strong>Tour Time:</strong> {{ $data->reserva->horario->hora }}</p>
                <p><strong>Adults:</strong> {{ $data->reserva->cantidad_adultos }}</p>
                <p><strong>Children:</strong> {{ $data->reserva->cantidad_niños }}</p>
                <p><strong>Children Free:</strong> {{ $data->reserva->cantidad_niños_gratis }}</p>
                <p><strong>Total Amount:</strong> {{ $data->reserva->monto_total }} USD</p>
            </div>
        @endif

        <div class="contactInfo">
            <h3>Contact</h3>
            <p>Email: <a class="contact-link" href="mailto:info@slothsterritory.com">info@slothsterritory.com</a></p>
            <p>Phone: <a class="contact-link" href="tel:+50685610404">+506 85610404</a></p>
            <p>WhatsApp: <a class="contact-link" href="https://wa.me/50685610404" target="_blank">+506 85610404</a></p>
        </div>

        <div class="footer">
            <p>Thank you for booking with us. If you have any questions, please feel free to contact us.</p>
        </div>
    </div>

</body>

</html>
