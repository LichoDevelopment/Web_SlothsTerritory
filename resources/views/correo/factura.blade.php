@component('mail::message')


@component('mail::panel')
{{__('factura')}} 00000{{$id}}
@endcomponent

@component('mail::panel')
TOUR: {{$tour['nombre']}}<br>
{{__('cliente')}}: {{$nombre_cliente}}<br>
{{__('agencia')}}: {{$agencia['nombre']}}<br>
{{__('hora')}}: {{$horario['hora']}} {{$horario['orden'] > 20 ? 'PM' : 'AM'}}<br>
{{__('fecha')}}: {{$fecha_tour['fecha']}} <br>
@endcomponent


@component('mail::table')
| Tour       | {{__('cliente')}}         | {{__('agencia')}}  | {{__('hora')}} | {{__('fecha')}} 
| ------------- |:-------------:|:-------------:|:-------------:| --------:|
| {{ $tour['nombre'] }}      | {{ $nombre_cliente }}      | {{ $agencia['nombre'] }}      | {{ $horario['hora'] }}      | {{ $fecha_tour['fecha'] }}      |
@endcomponent

@component('mail::table')
| {{__('adultos')}}       | {{__('ninios')}}         | {{__('niniosGratis')}}  |
| ------------- |:-------------:| --------:|
| {{ $cantidad_adultos }}      | {{ $cantidad_niños }}      | {{ $cantidad_niños_gratis }}      |
@endcomponent

@component('mail::table')
| Total       |  {{ $factura ? 'Factura' : ''}}         |
| ------------- | --------:|
| ${{$monto_total }}  | {{ $factura ? $factura : '' }}      |
@endcomponent

{{__('gracias')}},<br>
{{ config('app.name') }}
@endcomponent
