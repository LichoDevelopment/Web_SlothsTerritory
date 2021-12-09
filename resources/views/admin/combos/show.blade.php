
@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h1>Editar Combo</h1>
        </div>

        <div class="card-body">

            <div class="card card-body">
                <form class="p-2" id="add-combo-form">
                    <div class="row img-combo-drag mb-3">
                        <span>Arrastra y suelta una imagen</span>
                        <span>O</span>
                        <button class="btn btn-outline-dark" id="img-btn">Selecciona una imagen</button>
                        <input type="file" name="imagen" id="img-input" hidden >
                        <span id="img-name">
                            <img src="{{$combo['en']->image}}" height="100">
                        </span>
                    </div>

                    <h3 class="text-center">Precios</h3>
                    <div class="row mb-3">
                        <div class="col-lg-6 col-sm-12">
                            <label for="">Precio Adultos</label>
                            <input type="number" class="form-control" value="{{ $combo['en']->adult_price }}" min="0" name="price.adults">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <label for="">Precio Niños</label>
                            <input type="number" class="form-control" value="{{ $combo['en']->kid_price }}" min="0" name="price.kids">
                        </div>
                    </div>

                    <div class="mb-3 ">
                        <h3 class="text-center">Intinerario</h3>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <input type="time" id="new-itinerary-input">
                                <button class="btn btn-sm btn-secondary" id="add-itinerary-btn">Agregar</button>
                            </div>
                            <ul id="itinerary" class="list-group col-lg-6 col-sm-12" data-list="{{ $combo['en']->itinerary }}">
                            </ul>
                        </div>
                    </div>

                    <h3 class="text-center">Detalles</h3>
                    <nav class="mb-3">
                        <div class="nav nav-pills" id="nav-tab" role="tablist">
                          <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Español</a>
                          <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Inglés</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row row-cols-2 row-cols-sm-1 mb-3">
                                <div class="col-lg-6 col-sm-12">
                                    <label for="">Nombre</label>
                                    <input type="text" class="form-control" name="es.name" value="{{ $combo['es']->name }}">
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label for="">Descripción</label>
                                    <textarea id="" class="form-control" rows="3" name="es.description">{{ $combo['es']->description }}</textarea>
                                </div>
        
                            </div>
        
                            <div class="row mb-3">
                                <div class="col-lg-6 col-sm-12">
                                    <label for="">Que Incluye</label>
                                    <textarea id="" class="form-control" rows="3" name="es.includes" >{{ $combo['es']->includes }}</textarea>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label for="">Que llevar</label>
                                    <textarea id="" class="form-control" rows="3" name="es.requirements">{{ $combo['es']->requirements }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row row-cols-2 row-cols-sm-1 mb-3">
                                <div class="col-lg-6 col-sm-12">
                                    <label for="">Nombre</label>
                                    <input type="text" class="form-control" name="en.name" value="{{ $combo['en']->name }}">
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label for="">Descripción</label>
                                    <textarea id="" class="form-control" rows="3" name="en.description">{{ $combo['en']->description }}</textarea>
                                </div>
        
                            </div>
        
                            <div class="row mb-3">
                                <div class="col-lg-6 col-sm-12">
                                    <label for="">Que Incluye</label>
                                    <textarea id="" class="form-control" rows="3" name="en.includes">{{ $combo['en']->includes }}</textarea>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label for="">Que llevar</label>
                                    <textarea id="" class="form-control" rows="3" name="en.requirements">{{ $combo['en']->requirements }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <button class="btn btn-warning btn-block btn-lg" id="add-combo-btn">
                        Editar
                    </button>
                </form>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ url('js/combos.js') }}"></script>
@endsection