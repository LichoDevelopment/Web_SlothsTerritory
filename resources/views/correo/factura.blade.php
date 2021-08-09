@component('mail::message')


@component('mail::panel')
factura 00000{{$id}}
@endcomponent

@component('mail::panel')
TOUR: {{$tour['nombre']}}<br>
CLIENTE: {{$nombre_cliente}}<br>
AGENCIA: {{$agencia['nombre']}}<br>
HORA: {{$horario['hora']}} {{$horario['orden'] > 20 ? 'PM' : 'AM'}}<br>
FECHA: {{$fecha_tour['fecha']}} <br>
@endcomponent


@component('mail::table')
| Tour       | Client         | Agencia  | Hora | Fecha 
| ------------- |:-------------:|:-------------:|:-------------:| --------:|
| {{ $tour['nombre'] }}      | {{ $nombre_cliente }}      | {{ $agencia['nombre'] }}      | {{ $horario['hora'] }}      | {{ $fecha_tour['fecha'] }}      |
@endcomponent

@component('mail::table')
| Adultos       | Niños         | Niños gratis  |
| ------------- |:-------------:| --------:|
| {{ $cantidad_adultos }}      | {{ $cantidad_niños }}      | {{ $cantidad_niños_gratis }}      |
@endcomponent

@component('mail::table')
| Monto Total       |  {{ $factura ? 'Factura' : ''}}         |
| ------------- | --------:|
| ${{$monto_total }}  | {{ $factura ? $factura : '' }}      |
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
