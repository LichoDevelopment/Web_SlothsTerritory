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
            /* Color del enlace */
            text-decoration: underline;
            /* Subrayar para indicar que es un enlace */
            transition: color 0.3s ease;
            /* Transición suave para el cambio de color */
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Sloths Territory</h1>
    </div>

    <div class="content">
        <p>Estimado/a <strong>{{ $reserva->nombre_cliente }}</strong>,</p>

        <p>¡Gracias por elegir a <strong>Sloth's Territory</strong> para su próxima aventura!</p>

        <p>Número de reserva: <strong>{{ $numeroReserva }}</strong></p>


        <p>Nos complace confirmarle que su transporte ha sido programado para recogerle el día <strong>{{ \Carbon\Carbon::parse($reserva->fecha_tour->fecha)->format('d/m/Y') }}</strong> a las <strong>{{ $arrivalTime }}</strong>.</p>

        <p>Para garantizar una experiencia fluida y agradable para todos nuestros clientes, le solicitamos tener en cuenta las siguientes indicaciones:</p>

        <ul>
            <li><strong>Puntualidad:</strong> Por favor, asegúrese de estar listo/a en el punto de recogida <strong>al menos 10 minutos antes</strong> de la hora programada. Esto nos ayuda a evitar retrasos y asegurar que todos puedan disfrutar del tour a tiempo.</li>
            <li><strong>Espera máxima:</strong> El conductor esperará un máximo de <strong>5 minutos</strong> en el punto de recogida. Si no se encuentra presente después de este tiempo, lamentablemente tendremos que continuar con el itinerario para no afectar a los demás participantes.</li>
            <li><strong>Respeto al horario:</strong> Su cooperación es esencial para mantener el horario establecido y ofrecer una experiencia óptima a todos los pasajeros.</li>
            <li><strong>Equipaje y pertenencias:</strong> Por favor, tenga todas sus pertenencias listas para facilitar una salida rápida y sin inconvenientes.</li>
            <li><strong>Medidas de seguridad:</strong> Recuerde seguir las instrucciones del conductor en todo momento y utilizar el cinturón de seguridad durante el viaje.</li>
            <li><strong>Contacto:</strong> Si surge algún inconveniente o tiene alguna consulta, no dude en contactarnos</li>
            <li>
                <h3>Contact</h3>
                <p>Email: <a class="contact-link" href="mailto:info@slothsterritory.com">info@slothsterritory.com</a></p>
                <p>Phone: <a class="contact-link" href="tel:+50685610404">+506 85610404</a></p>
                <p>WhatsApp: <a class="contact-link" href="https://wa.me/50685610404" target="_blank">+506 85610404</a></p>
            </li>
        </ul>

        <p>Estamos comprometidos en brindarle una experiencia inolvidable y apreciamos su colaboración para lograrlo.</p>

        <p>¡Esperamos verle pronto y compartir juntos esta emocionante aventura!</p>

        <p>Atentamente,</p>
        <p><strong>El equipo de Sloth's Territory</strong></p>

        <p style="font-size: 12px; color: gray;">Nota: Este es un correo generado automáticamente. Por favor, no responda a este mensaje. Si necesita asistencia, contáctenos a través de nuestros canales oficiales.</p>
    </div>

</body>
</html>
