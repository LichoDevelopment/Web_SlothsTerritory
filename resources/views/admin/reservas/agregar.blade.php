@extends('layouts.admin')


@section('content')

    <section class="card">
        <section class="card-header">
            <h1>agregar reserva</h1>
        </section>
        <section class="card-body">
            <form action="{{ route('reserva.agregar') }}" method="post">
                @csrf
               <section class="row mb-3">
                    <article class="col-6">
                        <label for="nombre_cliente">Nombre de cliente</label>
                        <input class="form-control" name="nombre_cliente" required>
                    </article>
                    <article class="col-6">
                        <label for="cantidad_adultos">Adultos</label>
                        <input type="number" min="0" class="form-control" id="cantidad_adultos" name="cantidad_adultos" required>
                    </article>
               </section>
               <section class="row mb-3">
                    <article class="col-6">
                        <label for="cantidad_niños">Niños</label>
                        <input type="number" min="0" class="form-control" id="cantidad_niños" name="cantidad_niños" required>
                    </article>
                    <article class="col-6">
                        <label for="cantidad_niños_gratis">Niños gratis</label>
                        <input type="number" min="0" class="form-control" name="cantidad_niños_gratis" required>
                    </article>
               </section>
               <section class="row mb-3">
                   <article class="col-6">
                       <label for="id_tour">Tour</label>
                       <select class="custom-select" id="tour" name="id_tour" data-precios="{{$precios}}" required>
                            <option selected>Elige un tour</option>
                            @foreach ($tours as $tour)
                                <option value="{{ $tour->id}}"> {{ $tour->nombre}} </option>
                            @endforeach
                       </select>
                   </article>
                   <article class="col-6">
                       <label for="id_horario">Hora</label>
                       <select class="custom-select" 
                       name="id_horario" id="horarios" data-horarios="{{$horarios}}" required>
                            <option selected>Primero debes elegir un tour</option>
                       </select>
                   </article>
               </section>
               <section class="row mb-3">
                   <input type="hidden" name="id_precio" id="id_precio">
                   <article class="col-6">
                       <label for="precio_adulto">Precio adultos</label>
                       <input type="text" class="form-control" id="precio_adulto" disabled>
                   </article>
                   <article class="col-6">
                       <label for="precio_nino">Precio niños</label>
                       <input type="text" class="form-control" id="precio_nino" disabled>
                   </article>
               </section>
               <section class="row mb-3">
                   <article class="col-6">
                        <label for="fecha_tour">Fecha</label>
                        <input type="date" class="form-control" name="fecha_tour" required>
                   </article>
                   <article class="col-6">
                        <label for="id_agencia">Agencia</label>
                        <select class="custom-select" name="id_agencia" id="agencia" data-agencias="{{$agencias}}" required>
                            <option selected>Elige una agencia</option>
                            @foreach ($agencias as $agencia)
                                <option value="{{$agencia->id}}"> {{ $agencia->nombre}} </option>
                            @endforeach
                        </select>
                    </article>
               </section>
               <section class="row mb-3">
                    <article class="col-6">
                        <label for="comision_agencia">Comision</label>
                        <input type="number" min="0" name="comision_agencia" id="comision" class="form-control" required>
                    </article>
                    <article class="col-6">
                        <label for="descuento">Descuento</label>
                        <input type="number" min="0" name="descuento" id="descuento" class="form-control" required>
                    </article>
               </section>
               <section class="row mb-3">
                    <article class="col-6">
                        <label for="monto_total">Precio</label>
                        <input type="number" min="0" name="monto_total" id="monto_total" class="form-control" required>
                    </article>
                    <article class="col-6">
                        <label for="monto_con_descuento">Precio con descuento</label>
                        <input type="number" min="0" name="monto_con_descuento" id="monto_con_descuento" class="form-control" required>
                    </article>
               </section>
               <section class="row mb-3">
                    <article class="col-6">
                        <label for="monto_neto">Precio neto</label>
                        <input type="number" min="0" name="monto_neto" id="monto_neto" class="form-control" required>
                    </article>
                    <article class="col-6">
                        <label for="factura">Factura</label>
                        <input type="text" min="0" name="factura" class="form-control" required>
                    </article>
               </section>
               <button class="btn btn-lg btn-success btn-block">Agregar</button>
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

        const horariosArr   = JSON.parse(horarios.dataset.horarios)

        comision.addEventListener('change', ()=> actualizarPrecioNeto())
        comision.addEventListener('keyup', ()=> actualizarPrecioNeto())

        monto_total.addEventListener('change', ()=> actualizarPrecioConDescuento())
        monto_total.addEventListener('keyup', ()=> actualizarPrecioConDescuento())

        descuento.addEventListener('change', ()=> actualizarPrecioConDescuento())
        descuento.addEventListener('keyup', ()=> actualizarPrecioConDescuento())

        precio_adulto.addEventListener('change', event =>{
            actualizarPrecio({
                "precio_adulto": precio_adulto.value, "precio_nino": precio_nino.value, 
                "cantidad_adultos": cantidad_adultos.value, "cantidad_ninos": cantidad_ninos.value})
        })
        precio_nino.addEventListener('change', event =>{
            actualizarPrecio({
                "precio_adulto": precio_adulto.value, "precio_nino": precio_nino.value, 
                "cantidad_adultos": cantidad_adultos.value, "cantidad_ninos": cantidad_ninos.value})
        })
        cantidad_adulto.addEventListener('change', event =>{
            actualizarPrecio({
                "precio_adulto": precio_adulto.value, "precio_nino": precio_nino.value, 
                "cantidad_adultos": cantidad_adultos.value, "cantidad_ninos": cantidad_ninos.value})
        })
        cantidad_ninos.addEventListener('change', event =>{
            actualizarPrecio({
                "precio_adulto": precio_adulto.value, "precio_nino": precio_nino.value, 
                "cantidad_adultos": cantidad_adultos.value, "cantidad_ninos": cantidad_ninos.value})
        })

        tour.addEventListener('change', event => {
            const selectedIndex = event.target.selectedIndex;
            const selectedOption = event.target.options[selectedIndex]
            const tourHorarios = horariosArr.filter(horario => horario.id == selectedOption.value)

            const precios = JSON.parse(event.target.dataset.precios)
            const precios_tour = precios.filter(precio => precio.id_tour == selectedOption.value)[0]

            precio_adulto.value = precios_tour.precio_adulto
            precio_nino.value = precios_tour.precio_niño
            id_precio.value = precios_tour.id

            actualizarPrecio({
                "precio_adulto": precios_tour.precio_adulto, "precio_nino": precios_tour.precio_niño, 
                "cantidad_adultos": cantidad_adultos.value, "cantidad_ninos": cantidad_ninos.value})

            horarios.innerHTML = ''
            tourHorarios.map(horario => {
                horarios.innerHTML += `<option value="${horario.id}">${horario.hora}</option>`
            })
        })

        agencia.addEventListener('change', event => {
            const agencias = JSON.parse(event.target.dataset.agencias);
            const selectedIndex = event.target.selectedIndex;
            const selectedOption = event.target.options[selectedIndex]
            const comision_agencia = agencias.filter(agencia => agencia.id == selectedOption.value)[0]
           comision.value = comision_agencia.comision
           actualizarPrecioNeto()
        })

        function actualizarPrecio({cantidad_adultos, cantidad_ninos, precio_adulto, precio_nino}){

            const monto_adultos = Number(cantidad_adultos) * Number(precio_adulto)
            const monto_ninos = Number(cantidad_ninos) * Number(precio_nino)

            monto_total.value = monto_adultos + monto_ninos
            actualizarPrecioConDescuento()
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
    </script>
@endsection