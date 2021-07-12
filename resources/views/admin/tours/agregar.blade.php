@extends('layouts.admin')


@section('content')
    <section class="card">
        <section class="card-header d-flex justify-content-between align-items-center">
            <h2 class="">Agregar tour</h2>
            <a href="/tours" class="btn btn-secondary">Volver</a>
        </section>
        <section class="card-body">
            @if (session('mensaje'))
                <article class="text-center error">
                    <p class="text-danger font-weight-bold">{{session('mensaje')}}</p>
                </article>
            @endif
            <form class="col-10 m-auto" action="/tour" method="post">
                @csrf
                <section class="form-group">
                    <label for="nombre">Nombre del tour</label>
                    <input class="form-control" name="nombre" required/>
                    @if (session('nombre'))
                        <p class="text-danger font-weight-bold error">{{session('nombre')[0]}}</p>
                    @endif
                </section>
                <section class="form-group">
                    <label for="horario">Horario</label>
                    <select class="custom-select" name="horario" required>
                        <option selected value="">Elija un horario</option>
                        @foreach ($horarios as $horario)
                            <option value="{{ $horario->id}}"> {{ $horario->hora}} </option>
                        @endforeach
                      </select>
                        @if (session('precio'))
                            <p class="text-danger font-weight-bold error">{{session('precio')[0]}}</p>
                        @endif
                </section>
                <section class="form-group">
                    <label for="precio">Precio</label>
                    <select class="custom-select" name="precio" required>
                        <option selected value="">Elija un precio</option>
                        @foreach ($precios as $precio)
                            <option value="{{ $precio->id}}"> 
                                <article>
                                 <span>adultos - {{ $precio->precio_adulto}}</span>
                                 <span>niños - {{ $precio->precio_niño}}</span>
                                </article> 
                            </option>
                        @endforeach
                      </select>
                        @if (session('precio'))
                            <p class="text-danger font-weight-bold error">{{session('precio')[0]}}</p>
                        @endif
                </section>
                <button class="btn btn-success btn-lg btn-block">Agregar</button>
            </form>
        </section>
    </section>
@endsection

@section('scripts')

    <script>
        const errors = document.querySelectorAll('errors')
        if(errors.length > 0){ 
            setTimeout(() => {
                errors.forEach(error =>{
                    error.style.display = 'none';
                })
            }, 1500);
        }
    </script>
@endsection