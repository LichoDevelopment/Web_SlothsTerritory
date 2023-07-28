<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Factura 00000{{ $reserva->id }}</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/factura.css') }}" media="all" /> --}}
    <!-- Favicon  -->
    <link rel="icon" href=" {{ asset('images/favicon.png') }} ">

    {{-- Aqui el css --}}
    <style>
        @page {
            size: 80mm;
            margin: 0;
        }

        @media print {

            /* Ocultar encabezados y pies de página */
            @top-left,
            @top-center,
            @top-right,
            @bottom-left,
            @bottom-center,
            @bottom-right {
                content: "";
            }
        }

        pre {
            font-size: 12px;
            white-space: pre-wrap;
            overflow: hidden;
        }

        /* Agrega aquí los estilos adicionales que necesites para tu página */
    </style>
</head>

<body>
    <!-- Aquí puedes incluir el contenido de tu página, como lo tenías antes -->
</body>

</html>
