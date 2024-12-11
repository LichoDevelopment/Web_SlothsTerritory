<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Información sobre su transporte</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333333;
        }
        .header {
            background-color: #2E8B57;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .content p {
            font-size: 15px;
            line-height: 1.6;
        }
        .content ul {
            list-style-type: disc;
            padding-left: 20px;
        }
        .content li {
            margin-bottom: 10px;
        }
        .footer {
            font-size: 12px;
            color: gray;
            padding: 10px;
            text-align: center;
        }
        .btn {
            background-color: #2E8B57;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #24694D;
        }
        .contact-link {
            color: #FFA413;
            text-decoration: underline;
            transition: color 0.3s ease;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Sloths Territory</h1>
    </div>

    <div class="content">
        <p>Estimado/a <strong>{{ $reserva->nombre_cliente }}</strong>,</p>

        <p>¡Gracias por elegir <strong>Sloth's Territory</strong> para su próxima aventura!</p>

        <p>Número de reserva: <strong>{{ $numeroReserva }}</strong></p>

        @if($isUpdate)
            <p><strong>Actualización importante:</strong> Su hora de recogida ha cambiado debido a nuevos ajustes en el itinerario. Por favor tome nota de la nueva hora de recogida:</p>
            <p><strong>{{ \Carbon\Carbon::parse($reserva->fecha_tour->fecha)->format('d/m/Y') }} a las {{ $arrivalTime }}</strong></p>
        @else
            <p>Nos complace confirmarle que su transporte ha sido programado para recogerle el día <strong>{{ \Carbon\Carbon::parse($reserva->fecha_tour->fecha)->format('d/m/Y') }}</strong> a las <strong>{{ $arrivalTime }}</strong>.</p>
        @endif

        <p>Para asegurar una experiencia fluida, tenga en cuenta lo siguiente:</p>

        <ul>
            <li><strong>Puntualidad:</strong> Esté listo/a en el punto de recogida <strong>al menos 10 minutos antes</strong> de la hora programada.</li>
            <li><strong>Espera máxima:</strong> El conductor esperará un máximo de <strong>5 minutos</strong>. Después de este tiempo, deberá continuar con el itinerario.</li>
            <li><strong>Respeto al horario:</strong> Su puntualidad ayuda a mantener el cronograma y ofrecer una experiencia óptima para todos.</li>
            <li><strong>Equipaje y pertenencias:</strong> Tenga sus pertenencias listas para facilitar una salida ágil y sin demoras.</li>
            <li><strong>Seguridad:</strong> Siga las indicaciones del conductor y use el cinturón de seguridad durante el viaje.</li>
            <li><strong>Contacto:</strong> Si surge algún inconveniente o tiene dudas, no dude en contactarnos:
                <ul>
                    <li>Email: <a class="contact-link" href="mailto:info@slothsterritory.com">info@slothsterritory.com</a></li>
                    <li>Teléfono: <a class="contact-link" href="tel:+50685610404">+506 85610404</a></li>
                    <li>WhatsApp: <a class="contact-link" href="https://wa.me/50685610404" target="_blank">+506 85610404</a></li>
                </ul>
            </li>
        </ul>

        @if($isUpdate)
            <p>Agradecemos su comprensión ante este ajuste. Nuestro objetivo es brindarle la mejor experiencia posible.</p>
        @else
            <p>Estamos comprometidos a ofrecerle una experiencia inolvidable. ¡Le esperamos con entusiasmo!</p>
        @endif

        <p>Atentamente,</p>
        <p><strong>El equipo de Sloth's Territory</strong></p>

        <p style="font-size: 12px; color: gray;">
            Nota: Este es un correo generado automáticamente. Por favor, no responda a este mensaje. Si necesita asistencia, contáctenos a través de nuestros canales oficiales.
        </p>
    </div>

</body>
</html>
