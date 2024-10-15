{{-- resources/views/correo/reservation_confirmation.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reservation Confirmed - Sloths Territory</title>
    <style>
        /* CSS styles for the email */
        body {
            font-family: Arial, sans-serif;
            color: #333333;
        }
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
            text-decoration: underline;
            transition: color 0.3s ease;
        }
        .contact-link:hover,
        .contact-link:focus {
            color: #97DD3C;
            text-decoration: none;
        }
        .rules {
            margin-top: 20px;
        }
        .rules h3 {
            margin-bottom: 10px;
        }
        .rules ul {
            list-style-type: disc;
            padding-left: 20px;
        }
        .rules li {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <img src="{{ asset('SlothsTerritory.ico') }}" alt="Sloths Territory Logo" class="logo" />
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
                <p><strong>Tour Date:</strong> {{ \Carbon\Carbon::parse($data->reserva->fecha_tour->fecha)->format('m/d/Y') }}</p>
                <p><strong>Tour Time:</strong> {{ $data->reserva->horario->hora }}</p>
                <p><strong>Adults:</strong> {{ $data->reserva->cantidad_adultos }}</p>
                <p><strong>Children:</strong> {{ $data->reserva->cantidad_niños }}</p>
                <p><strong>Children Free:</strong> {{ $data->reserva->cantidad_niños_gratis }}</p>
                <p><strong>Total Amount:</strong> ${{ $data->reserva->monto_total }} USD</p>

                @if ($data->reserva->transporte)
                    <h3>Transportation Information</h3>
                    <p>We have confirmed that your reservation includes transportation.</p>
                    <p><strong>Important:</strong> The exact pickup time will be communicated to you the day before the tour due to logistical planning, as we need to consolidate all reservations to plan the optimal route.</p>
                @endif
            </div>
        @endif

        <div class="rules">
            <h3>Important Rules and Policies</h3>
            <ul>
                @if ($data->reserva->transporte)
                    <li><strong>Punctuality:</strong> Please ensure you are ready at the pickup point at least <strong>10 minutes before</strong> the scheduled pickup time.</li>
                    <li><strong>Maximum Wait Time:</strong> The driver will wait a maximum of <strong>5 minutes</strong> at the pickup point. If you are not present after this time, we will proceed with the itinerary to avoid affecting other guests.</li>
                    <li><strong>Respect the Schedule:</strong> Your cooperation is essential to maintain the established schedule and provide an optimal experience for all passengers.</li>
                    <li><strong>Luggage and Belongings:</strong> Please have all your belongings ready to facilitate a quick and smooth departure.</li>
                    <li><strong>Safety Measures:</strong> Remember to follow the driver's instructions at all times and wear your seatbelt during the journey.</li>
                @endif
                <li><strong>Weather Conditions:</strong> The tour will proceed even in light rain. In case of extreme weather conditions, we will contact you to reschedule or refund your reservation.</li>
                <li><strong>Responsibility:</strong> Sloths Territory is not responsible for lost or stolen items during the tour. Please take care of your personal belongings.</li>
            </ul>
        </div>

        <div class="contactInfo">
            <h3>Contact Information</h3>
            <p>Email: <a class="contact-link" href="mailto:info@slothsterritory.com">info@slothsterritory.com</a></p>
            <p>Phone: <a class="contact-link" href="tel:+50685610404">+506 8561 0404</a></p>
            <p>WhatsApp: <a class="contact-link" href="https://wa.me/50685610404" target="_blank">+506 8561 0404</a></p>
        </div>

        <div class="footer">
            <p>Thank you for booking with us. If you have any questions, please feel free to contact us.</p>
            <p>We look forward to seeing you soon!</p>
        </div>
    </div>

</body>

</html>
