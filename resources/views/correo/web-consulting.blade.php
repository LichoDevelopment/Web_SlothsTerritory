@component('mail::message')

# {{__('saludo')}} {{$clientName}}

{{$message}}

{{__('gracias')}},<br>
{{ config('app.name') }}
@endcomponent
