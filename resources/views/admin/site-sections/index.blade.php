@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h1>Site Sections</h1>
        </div>

        <div class="card-body">

            <div class="d-flex justify-content-end">
                <a class="btn btn-outline-info mb-2" href="/site-sections/create">
                    Agregar
                </a>
            </div>

            <div class="container">

                <div class="container">
                    <h1 class="main-title mt-3"> {!! $siteSections['inicio.titulo_principal'][0]['content'] !!} </h1>
                    <p class="p-heading p-large"> {!! $siteSections['inicio.parrafo_descriptivo'][0]['content'] !!}<div class=""></div></p>
                    <div class="d-flex justify-content-center align-items-center">
                        <button class="btn-solid-lg page-scroll" disabled>{{__('btn.reservar_ahora')}}</button>
                    </div>
                </div>

                <!-- Intro -->
                <div id="intro" class="basic-1">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="text-container">
                                    <div class="section-title"> {{__('intro.titulo:principal')}}</div>
                                    <h3 class="h3-black">{{__('intro.titulo_secundario')}}</h3>
                                    <p> {{__('intro.parrafo_descriptivo')}}</p>
                                    <div class="testimonial-author">{{__('intro.testimonial')}}</div>
                                </div> <!-- end of text-container -->
                            </div> <!-- end of col -->
                            <div class="col-lg-7 center-header">
                                <div class="image-container">
                                    <img class="img-fluid" src="{{asset('images/otras-especies/tours-en-sloths-territory.jpg')}}" alt="Perezosos La Fortuna de San Carlos" title="Perezosos Sloth's Territory" height="450px" width="500px">
                                </div> <!-- end of image-container -->
                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                    </div> <!-- end of container -->
                </div> <!-- end of basic-1 -->
                <!-- end of intro -->

                <!-- Description -->
                <div class="cards-1">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">

                                <!-- Card -->
                                <div class="card">
                                    <span class="fa-stack">
                                        {{-- <span class="hexagon"></span> --}}
                                        <i class="fas fa-home fa-stack-1x"></i>
                                    </span>
                                    <div class="card-body">
                                        <h4 class="card-title">{{__('cards.card_1.titulo')}}</h4>
                                        <p>{{__('cards.card_1.parrafo')}}</p>
                                    </div>
                                </div>
                                <!-- end of card -->

                                <!-- Card -->
                                <div class="card">
                                    <span class="fa-stack">
                                        {{-- <span class="hexagon"></span> --}}
                                        <i class="fas fa-paw fa-stack-1x"></i>
                                    </span>
                                    <div class="card-body">
                                        <h4 class="card-title">{{__('cards.card_2.titulo')}}</h4>
                                        <p>{{__('cards.card_2.parrafo')}}</p>
                                    </div>
                                </div>
                                <!-- end of card -->

                                <!-- Card -->
                                <div class="card">
                                    <span class="fa-stack">
                                        {{-- <span class="hexagon"></span> --}}
                                        <i class="fas fa-binoculars fa-stack-1x"></i>
                                    </span>
                                    <div class="card-body">
                                        <h4 class="card-title">{{__('cards.card_3.titulo')}}</h4>
                                        <p>{{__('cards.card_3.parrafo')}}</p>
                                    </div>
                                </div>
                                <!-- end of card -->

                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                    </div> <!-- end of container -->
                </div> <!-- end of cards-1 -->
                <!-- end of description -->

            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="{{ url('js/combos.js') }}"></script>
@endsection