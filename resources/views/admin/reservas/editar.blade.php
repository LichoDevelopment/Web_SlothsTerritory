@extends('layouts.admin')


@section('content')

    <section class="card">
        <section class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Editar reserva</h1>
                <a href="/" class="btn btn-outline-dark btn-sm">Atras</a>
            </div>
        </section>
        <section class="card-body">
            @if (session('limite'))
                <div class="alert alert-danger" id="limite-exedido" role="alert">
                    {{session('limite')}}
                </div>              
            @endif
            <form action="{{ route('reserva.actualizar',['id'=>$reserva->id]) }}" method="post">
                @csrf
                @method('PUT')
               <section class="row mb-3">
                    <article class="col-6">
                        <label for="nombre_cliente">Nombre de cliente</label>
                        <input 
                            class="form-control" name="nombre_cliente" 
                            value="{{$reserva->nombre_cliente}}" required>
                    </article>
                    <article class="col-6">
                        <label for="cantidad_adultos">Adultos</label>
                        <input 
                            type="number" min="0" class="form-control" 
                            id="cantidad_adultos" name="cantidad_adultos"
                            value="{{$reserva->cantidad_adultos}}" required>
                    </article>
               </section>
               <section class="row mb-3">
                    <article class="col-6">
                        <label for="cantidad_niños">Niños</label>
                        <input 
                            type="number" min="0" class="form-control" 
                            id="cantidad_niños" name="cantidad_niños"
                            value="{{$reserva->cantidad_niños}}" required>
                    </article>
                    <article class="col-6">
                        <label for="cantidad_niños_gratis">Niños gratis</label>
                        <input 
                            type="number" min="0" class="form-control" 
                            id="cantidad_niños_gratis" name="cantidad_niños_gratis" required
                            value="{{$reserva->cantidad_niños_gratis}}">
                    </article>
               </section>
               <section class="row mb-3">
                   <article class="col-6">
                       <label for="id_tour">Tour</label>
                       <select 
                            class="custom-select" id="tour" name="id_tour" 
                            data-precios="{{$precios}}" required>
                            <option 
                                selected value="{{$reserva->id_tour}}">
                                {{$reserva->tour->nombre}}
                            </option>

                            @foreach ($tours as $tour)
                                @if ($tour->id !== $reserva->id_tour)
                                    <option value="{{ $tour->id}}"> {{ $tour->nombre}} </option>
                                @endif
                            @endforeach
                       </select>
                   </article>
                   <article class="col-6">
                        <label for="id_agencia">Agencia</label>
                        <select class="custom-select" name="id_agencia" id="agencia" data-agencias="{{$agencias}}" required>
                            <option selected value="{{$reserva->id_agencia}}">
                                {{$reserva->agencia->nombre}}
                            </option>
                            @foreach ($agencias as $agencia)
                                @if ($agencia->id !== $reserva->id_agencia)
                                    <option value="{{$agencia->id}}"> {{ $agencia->nombre}} </option>
                                @endif
                            @endforeach
                        </select>
                    </article>
                   
               </section>
               <section class="row mb-3">
                   <article class="col-6">
                        <label for="fecha_tour">Fecha</label>
                        <input 
                            type="date" class="form-control" name="fecha_tour" 
                            value="{{$reserva->fecha_tour->fecha}}" required>
                   </article>
                   <article class="col-6">
                        <label for="id_horario">Hora</label>
                        <select class="custom-select" 
                        name="id_horario" id="horarios" data-horarios="{{$horarios}}" required>
                            @foreach ($horarios as $horario)
                                @if ($horario->id_tour === $reserva->id_tour)
                                    @if ($horario->id === $reserva->id_horario)
                                        <option selected value="{{$horario->id}}"> {{ $horario->hora}} </option>                                    
                                    @else
                                        <option value="{{$horario->id}}"> {{ $horario->hora}} </option>                                     
                                    @endif                                    
                                @endif
                            @endforeach
                            
                        </select>
                    </article>
               </section>
               <section class="row mb-3">
                    <input type="hidden" name="id_precio" id="id_precio" value={{$reserva->id_precio}}>
                    <article class="col-6">
                        <label for="precio_adulto">Precio adultos</label>
                        <input 
                            type="text" class="form-control" id="precio_adulto" 
                            value="" disabled>
                    </article>
                    <article class="col-6">
                        <label for="precio_nino">Precio niños</label>
                        <input 
                            type="text" class="form-control" id="precio_nino" 
                            value="" disabled>
                    </article>
                </section>
               <section class="row mb-3">
                    <article class="col-6">
                        <label for="comision_agencia">Comision</label>
                        <input 
                            type="number" step=".01" min="0" name="comision_agencia" 
                            id="comision" class="form-control" required
                            value="{{$reserva->comision_agencia}}">
                    </article>
                    <article class="col-6">
                        <label for="descuento">Descuento</label>
                        <input 
                            type="number" step=".01" min="0" value="0" name="descuento" 
                            id="descuento" class="form-control" required
                            value="{{$reserva->descuento}}">
                    </article>
               </section>
               <section class="row mb-3">
                    <article class="col-6">
                        <label for="monto_total">Precio</label>
                        <input 
                            type="number" min="0" step=".01" name="monto_total" 
                            id="monto_total" class="form-control" required
                            value="{{$reserva->monto_total}}">
                    </article>
                    <article class="col-6">
                        <label for="monto_con_descuento">Precio con descuento</label>
                        <input 
                            type="number" min="0" step=".01" name="monto_con_descuento" 
                            id="monto_con_descuento" class="form-control" required
                            value="{{$reserva->monto_con_descuento}}">
                    </article>
               </section>
               <section class="row mb-3">
                    <article class="col-6">
                        <label for="monto_neto">Precio neto</label>
                        <input 
                            type="number" min="0" step=".01" name="monto_neto" 
                            id="monto_neto" class="form-control" required
                            value="{{$reserva->monto_neto}}">
                    </article>
                    <article class="col-6">
                        <label for="factura">Factura</label>
                        <input 
                            type="text"  name="factura" class="form-control"
                            value="{{$reserva->factura}}">
                    </article>
               </section>
               <section class="row mb-3">
                <article class="col-6">
                    <label for="pendiente_cobrar">Pendiente de Pago</label>
                    <div class="form-check">
                        <input type="checkbox" 
                               class="form-check-input" 
                               id="pendiente_cobrar" 
                               name="pendiente_cobrar" 
                               value="1" 
                               {{ $reserva->pendiente_cobrar ? 'checked' : '' }}>
                        <label class="form-check-label" for="pendiente_cobrar">Marcar si está pendiente de pago</label>
                    </div>
                </article>
            </section>
               <button class="btn btn-lg btn-warning btn-block">Editar</button>
            </form>
        </section>
    </section>

@endsection

@section('scripts')
<script>
    const horarios              = document.getElementById('horarios');
    const comision              = document.getElementById('comision');
    const agencia               = document.getElementById('agencia');
    const precio_adulto         = document.getElementById('precio_adulto');
    const precio_nino           = document.getElementById('precio_nino');
    const cantidad_adulto       = document.getElementById('cantidad_adultos');
    const cantidad_ninos        = document.getElementById('cantidad_niños');
    const tour                  = document.getElementById('tour');
    const monto_total           = document.getElementById('monto_total');
    const descuento             = document.getElementById('descuento');
    const monto_con_descuento   = document.getElementById('monto_con_descuento');
    const monto_neto            = document.getElementById('monto_neto');
    const id_precio             = document.getElementById('id_precio');
    const factura             = document.getElementById('factura');
    const alerta_limite_exedido = document.getElementById('limite-exedido');

    const horariosArr   = JSON.parse(horarios.dataset.horarios)

    if(alerta_limite_exedido){
        setTimeout(() => {
            alerta_limite_exedido.style.display = 'none';
        }, 4000);
    }

    comision.addEventListener('change', ()=> actualizarPrecioNeto())
    comision.addEventListener('keyup', ()=> actualizarPrecioNeto())

    monto_total.addEventListener('change', ()=> actualizarPrecioConDescuento())
    monto_total.addEventListener('keyup', ()=> actualizarPrecioConDescuento())

    descuento.addEventListener('change', ()=> actualizarPrecioConDescuento())
    descuento.addEventListener('keyup', ()=> actualizarPrecioConDescuento())

    precio_adulto.addEventListener('change', event =>{
        actualizarPrecio({"cantidad_adultos": cantidad_adultos.value, 
            "cantidad_ninos": cantidad_ninos.value})
    })
    precio_nino.addEventListener('change', event =>{
        actualizarPrecio({"cantidad_adultos": cantidad_adultos.value, 
            "cantidad_ninos": cantidad_ninos.value})
    })
    cantidad_adulto.addEventListener('change', event =>{
        actualizarPrecio({"cantidad_adultos": cantidad_adultos.value, 
            "cantidad_ninos": cantidad_ninos.value})
    })
    cantidad_ninos.addEventListener('change', event =>{
        actualizarPrecio({"cantidad_adultos": cantidad_adultos.value, 
            "cantidad_ninos": cantidad_ninos.value})
    })

    tour.addEventListener('change', async event => {
        const selectedIndex = event.target.selectedIndex;
        const selectedOption = event.target.options[selectedIndex]
        const tourId = selectedOption.value
        const tourHorarios = horariosArr.filter(horario => horario.id_tour == tourId)

        actualizarPrecio({"cantidad_adultos": cantidad_adultos.value, 
            "cantidad_ninos": cantidad_ninos.value})
        actualizarPrecioNeto()
        horarios.innerHTML = ''
        tourHorarios.map(horario => {
                horarios.innerHTML += `
                <option value="${horario.id}"> ${horario.hora} </option>`
            })
    })

    agencia.addEventListener('change',async event => {
        const agencias = JSON.parse(event.target.dataset.agencias);
        const selectedIndex = event.target.selectedIndex;
        const selectedOption = event.target.options[selectedIndex]
        const agenciaId = selectedOption.value
        const comision_agencia = agencias.filter(agencia => agencia.id == agenciaId)[0]
        comision.value = (Number(cantidad_adultos.value) + Number(cantidad_ninos.value)) * Number(comision_agencia.comision) 
        actualizarPrecio({"cantidad_adultos": cantidad_adultos.value, 
        "cantidad_ninos": cantidad_ninos.value})
        actualizarPrecioNeto()
        
    })

    async function actualizarPrecio({cantidad_adultos, cantidad_ninos}){
        const agenciaId = obtenerOpcionSeleccionada(agencia)
        const tourId = obtenerOpcionSeleccionada(tour)
        let precios;
        if(agenciaId && tourId){
            precios = await obtenerListaDePrecios(agenciaId, tourId)
        }
        if(precios){
            const monto_adultos = Number(cantidad_adultos) * Number(precios.precio_adulto)
            const monto_ninos = Number(cantidad_ninos) * Number(precios.precio_niño)
    
            precio_adulto.value = precios.precio_adulto
            precio_nino.value = precios.precio_niño
            id_precio.value = precios.id
    
            monto_total.value = monto_adultos + monto_ninos
            actualizarPrecioConDescuento()
        }

    }

    function actualizarPrecioConDescuento(){
        if(descuento.value == 0 && !descuento.value){
            monto_con_descuento.value = monto_total.value
        }else{
            monto_con_descuento.value = Number(monto_total.value) - Number(descuento.value)
        }
        actualizarPrecioNeto()
    }

    function actualizarPrecioNeto(){
        if(comision.value){
            monto_neto.value = Number(monto_con_descuento.value) - Number(comision.value)
        }else{
            monto_neto.value = monto_con_descuento.value
        }
    }


    function obtenerOpcionSeleccionada(elemento){
        const selectedIndex = elemento.selectedIndex;
        const selectedOption = elemento.options[selectedIndex]
        return selectedOption.value
    }

    async function obtenerListaDePrecios(agenciaId, tourId){
        const consulta = await fetch(`/precios_tour/${agenciaId}/${tourId}`)
        const consultaJson = await consulta.json()
        const precios = await consultaJson.filter(precio => precio.id_tour == tourId)
        return precios[0]
    }
</script>
@endsection