<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Factura 00000{{ $reserva->id }}</title>
    <link rel="stylesheet" href="{{ asset('css/factura.css') }}" media="all" />
    <!-- Favicon  -->
    <link rel="icon" href=" {{ asset('images/favicon.png') }} ">
</head>

<body>
    <section class="main">

        <header class="clearfix">
            <div id="logo">
                <img src="{{ asset('images/favicon--.png') }}">
            </div>
            <h1>{{ __('factura') }} 00000{{ $reserva->id }}</h1>
            <div id="company" class="clearfix">
                <div>Sloth's Territory</div>
                <div>La Fortuna,<br /> San Carlos, CR</div>
                <div>+506 8561 0404</div>
                <div><a target="_blank" href="https://slothsterritory.com/es">slothsterritory.com</a></div>
            </div>
            <div id="project">
                <div><span>TOUR: </span> <span>{{ $reserva->tour->nombre }}</span></div>
                <div><span>{{ __('cliente') }}: </span> <span>{{ $reserva->nombre_cliente }}</span></div>
                <div><span>{{ __('agencia') }}: </span> <span>{{ $reserva->agencia->nombre }}</span> </div>
                <div><span>{{ __('hora') }}: </span>
                    <span>{{ $reserva->horario->hora }}:{{ $reserva->horario->orden > 20 ? 'PM' : 'AM' }}</span>
                </div>
                <div><span>{{ __('fecha') }}: </span> <span>{{ $reserva->fecha_tour->fecha }} </span> </div>
            </div>
        </header>
        <main>
            <h1 class="display-4"> {{ __('detalles') }} </h1>

            <table>
                <tbody>

                    <tr>
                        <td class="service"><span>{{ __('cantidadAdultos') }}: </span></td>
                        <td class="desc"><span> {{ $reserva->cantidad_adultos }} </span></td>
                    </tr>
                    <tr>
                        <td class="service"><span>{{ __('cantidadNinios') }}: </span></td>
                        <td class="desc"><span> {{ $reserva->cantidad_niños }} </span></td>
                    </tr>
                    <tr>
                        <td class="service"><span>{{ __('cantidadNiniosGratis') }}: </span></td>
                        <td class="desc"><span> {{ $reserva->cantidad_niños_gratis }} </span></td>
                    </tr>
                    <tr>
                        <td class="service"><span>{{ __('montoTotal') }}: </span></td>
                        <td class="desc"><span> ${{ $reserva->monto_total }} </span></td>
                    </tr>
                    <tr>
                        <td class="service"><span>{{ __('noFactura') }}: </span></td>
                        <td class="desc"><span> {{ $reserva->factura }} </span></td>
                    </tr>
                    <tr>
                        <td class="service"><span>Phone: </span></td>
                        <td class="desc"><span> {{ $reserva->tilopayTransaction->billToTelephone }} </span></td>
                    </tr>
                    <tr>
                        <td class="service"><span>Email: </span></td>
                        <td class="desc"><span> {{ $reserva->tilopayTransaction->billToEmail }} </span></td>
                </tbody>
            </table>

        </main>
        <article>
            <h2 class="tituloPoliticasReglasFactura">
                {{ __('titulo.politicascancelacion') }}
            </h2>
            <ul>
                <li>
                    <p class="itemsPoliticasPrivacidadReserva">{{ __('politica.cancelacion_1') }}</p>
                </li>
            </ul>
        </article>
        <article>
            <h2 class="tituloPoliticasReglasFactura">
                {{ __('titulo.reglasSlothsTerritoryDuranteVisita') }}
            </h2>
            <ul>
                <li>
                    <p class="itemsPoliticasPrivacidadReserva">{{ __('regla.SlothsTerritoryDuranteVisita_1') }}</p>
                </li>
                <li>
                    <p class="itemsPoliticasPrivacidadReserva">{{ __('regla.SlothsTerritoryDuranteVisita_2') }}</p>
                </li>
                <li>
                    <p class="itemsPoliticasPrivacidadReserva">{{ __('regla.SlothsTerritoryDuranteVisita_3') }}</p>
                </li>
                <li>
                    <p class="itemsPoliticasPrivacidadReserva">{{ __('regla.SlothsTerritoryDuranteVisita_4') }}</p>
                </li>
                <li>
                    <p class="itemsPoliticasPrivacidadReserva">{{ __('regla.SlothsTerritoryDuranteVisita_5') }}</p>
                </li>
                <li>
                    <p class="itemsPoliticasPrivacidadReserva">{{ __('regla.SlothsTerritoryDuranteVisita_6') }}</p>
                </li>
                <li>
                    <p class="itemsPoliticasPrivacidadReserva">{{ __('regla.SlothsTerritoryDuranteVisita_7') }}</p>
                </li>
            </ul>
        </article>
        <footer>
            sloth's territory
        </footer>
    </section>

    <div class="btn-container">
        <a href="/" class="btn btn-sucess" id="inicio">Inicio</a>
        <button class="btn btn-sucess" id="imprimir">Imprimir</button>
        <button class="btn btn-info" id="enviar" data-reserva="{{ $reserva->id }}">Enviar</button>
        <button class="btn btn-primary" id="ticket">Ticket</button>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const inicio = document.getElementById('inicio')
        const imprimir = document.getElementById('imprimir')
        const enviar = document.getElementById('enviar')
        const ticket = document.getElementById('ticket');

        imprimir.addEventListener('click', event => {
            event.preventDefault();
            imprimir.style.visibility = 'hidden';
            enviar.style.visibility = 'hidden';
            inicio.style.visibility = 'hidden';
            print()
            imprimir.style.visibility = 'visible';
            enviar.style.visibility = 'visible';
            inicio.style.visibility = 'visible';
        })

        enviar.addEventListener('click', event => {
            event.preventDefault();
            const reservaId = event.target.dataset.reserva
            Swal.fire({
                title: 'A que correo desea enviar la factura?',
                html: '<input type="email" id="email">',
                preConfirm: () => {
                    const email = document.getElementById('email').value
                    if (email) {
                        fetch(`/enviarCorreo/${reservaId}`, {
                            method: 'post',
                            headers: {
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({
                                email: email
                            })
                        })
                        Swal.fire('Correo enviado')
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Debes proporcionar un correo'
                        })
                    }

                }
            })
        })

        ticket.addEventListener('click', event => {
            event.preventDefault();
            imprimirTicket();
        });

        // Función para generar el contenido del ticket y enviarlo a la impresora
        function imprimirTicket() {

            var reserva = @json($reserva);

            fetch('/print-ticket', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        reserva: reserva
                    })
                })
                .then(response => response.json())
                .then(data => {
                    alert('Ticket impreso exitosamente.');
                })
                .catch(error => {
                    alert('Ocurrió un error al imprimir el ticket.');
                });
        }
    </script>
</body>

</html>
