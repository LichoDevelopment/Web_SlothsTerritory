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
                    <h1 class="main-title mt-3"> 
                        <a href="{{ route('sections.edit', $siteSections['inicio.titulo_principal'][0]['uuid'])}}">
                            {!! $siteSections['inicio.titulo_principal'][0]['content'] !!}
                        </a>
                    </h1>
                    <p class="p-heading p-large"> 
                        <a href="{{ route('sections.edit', $siteSections['inicio.parrafo_descriptivo'][0]['uuid'])}}">
                            {!! $siteSections['inicio.parrafo_descriptivo'][0]['content'] !!}
                        </a>
                    </p>
                    <div class="d-flex justify-content-center align-items-center">
                        <button class="btn-solid-lg page-scroll" disabled>{!! $siteSections['btn.reservar_ahora'][0]['content'] !!}</button>
                    </div>
                </div>

                <!-- Intro -->
                <div id="intro" class="basic-1">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="text-container">
                                    <div class="section-title"><a href="{{ route('sections.edit', $siteSections['intro.titulo:principal'][0]['uuid'])}}">
                            {!! $siteSections['intro.titulo:principal'][0]['content'] !!}
                        </a></div>
                                    <h3 class="h3-black"><a href="{{ route('sections.edit', $siteSections['intro.titulo_secundario'][0]['uuid'])}}">
                            {!! $siteSections['intro.titulo_secundario'][0]['content'] !!}
                        </a></h3>
                                    <p> <a href="{{ route('sections.edit', $siteSections['intro.parrafo_descriptivo'][0]['uuid'])}}">
                            {!! $siteSections['intro.parrafo_descriptivo'][0]['content'] !!}
                        </a></p>
                                    <div class="testimonial-author"><a href="{{ route('sections.edit', $siteSections['intro.testimonial'][0]['uuid'])}}">
                            {!! $siteSections['intro.testimonial'][0]['content'] !!}
                        </a></div>
                                </div> <!-- end of text-container -->
                            </div> <!-- end of col -->
                            <div class="col-lg-7 center-header">
                                <div class="image-container">
                                    <img class="img-fluid" src="{{asset('images/otras-especies/tours-en-sloths-territory.jpg')  }}" alt="Perezosos La Fortuna de San Carlos" title="Perezosos Sloth's Territory" height="450px" width="500px">
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
                                        <h4 class="card-title"><a href="{{ route('sections.edit', $siteSections['cards.card_1.titulo'][0]['uuid'])}}">
                            {!! $siteSections['cards.card_1.titulo'][0]['content'] !!}
                        </a></h4>
                                        <p><a href="{{ route('sections.edit', $siteSections['cards.card_1.parrafo'][0]['uuid'])}}">
                            {!! $siteSections['cards.card_1.parrafo'][0]['content'] !!}
                        </a></p>
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
                                        <h4 class="card-title"><a href="{{ route('sections.edit', $siteSections['cards.card_2.titulo'][0]['uuid'])}}">
                            {!! $siteSections['cards.card_2.titulo'][0]['content'] !!}
                        </a></h4>
                                        <p><a href="{{ route('sections.edit', $siteSections['cards.card_2.parrafo'][0]['uuid'])}}">
                            {!! $siteSections['cards.card_2.parrafo'][0]['content'] !!}
                        </a></p>
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
                                        <h4 class="card-title"><a href="{{ route('sections.edit', $siteSections['cards.card_3.titulo'][0]['uuid'])}}">
                            {!! $siteSections['cards.card_3.titulo'][0]['content'] !!}
                        </a></h4>
                                        <p><a href="{{ route('sections.edit', $siteSections['cards.card_3.parrafo'][0]['uuid'])}}">
                            {!! $siteSections['cards.card_3.parrafo'][0]['content'] !!}
                        </a></p>
                                    </div>
                                </div>
                                <!-- end of card -->

                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                    </div> <!-- end of container -->
                </div> <!-- end of cards-1 -->
                <!-- end of description -->

                <!-- Services -->
                <div id="services" class="cards-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title"><a href="{{ route('sections.edit', $siteSections['service.titulo_principal'][0]['uuid'])}}">
                            {!! $siteSections['service.titulo_principal'][0]['content'] !!}
                        </a></div>
                                <h2 class="h2-services"><a href="{{ route('sections.edit', $siteSections['services.titulo_secundario_parte_1'][0]['uuid'])}}">
                            {!! $siteSections['services.titulo_secundario_parte_1'][0]['content'] !!}
                        </a> <br><a href="{{ route('sections.edit', $siteSections['services.titulo_secundario_parte_2'][0]['uuid'])}}">
                            {!! $siteSections['services.titulo_secundario_parte_2'][0]['content'] !!}
                        </a> </h2>
                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                        <div class="row">
                            <div class="col-lg-12">

                                <!-- Card -->
                                <div class="card">
                                    <div class="card-image">
                                        <img class="img-fluidLateral" src="{{asset('images/otras-especies/perezosos-sloth_s_territory_Fortuna_de_San_Carlos.jpg')  }}" alt="Sendero para ver perezosos en la Fortuna de San Carlos Volcán Arenal" title="Sendero Sloth's Territory" width="350px" height="258px">
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="{{ route('sections.edit', $siteSections['service.vista_previa.tour_diurno.titulo'][0]['uuid'])}}">
                            {!! $siteSections['service.vista_previa.tour_diurno.titulo'][0]['content'] !!}
                        </a></h3>
                                        <p class="p-services"><a href="{{ route('sections.edit', $siteSections['service.vista_previa.tour_diurno.parrafo'][0]['uuid'])}}">
                            {!! $siteSections['service.vista_previa.tour_diurno.parrafo'][0]['content'] !!}
                        </a></p>
                                        <ul class="list-unstyled li-space-lg">
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body media-body-service"><a href="{{ route('sections.edit', $siteSections['service.vista_previa.tour_diurno.item_1'][0]['uuid'])}}">
                            {!! $siteSections['service.vista_previa.tour_diurno.item_1'][0]['content'] !!}
                        </a></div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body media-body-service"><a href="{{ route('sections.edit', $siteSections['service.vista_previa.tour_diurno.item_2'][0]['uuid'])}}">
                            {!! $siteSections['service.vista_previa.tour_diurno.item_2'][0]['content'] !!}
                        </a></div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="button-container">
                                    <a disabled class="popup-with-move-anim" href="#tour-diurno"><div class="btn-solid-reg page-scroll"><a disabled href="{{ route('sections.edit', $siteSections['btn.mas_detalles'][0]['uuid'])}}">
                            {!! $siteSections['btn.mas_detalles'][0]['content'] !!}
                        </a></div></a> 
                                        <!-- <a class="btn-solid-reg page-scroll" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank"><a href="{{ route('sections.edit', $siteSections['btn.mas_detalles'][0]['uuid'])}}">
                            {!! $siteSections['btn.mas_detalles'][0]['content'] !!}
                        </a></a> -->
                                    </div> <!-- end of button-container -->
                                </div>
                                <!-- end of card -->

                                <!-- Card -->
                                <div class="card">
                                    <div class="card-image">
                                        <img class="img-fluid" src="{{asset('images/tour_nocturno-Sloth_s_Territory_La_Fortuna.jpeg')  }}" alt="tour nocturno de perezosos en Sloths Territory en La Fortuna" title="Tour nocturno La Fortuna Sloth's Territory" width="350px" height="258px">
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="{{ route('sections.edit', $siteSections['service.vista_previa.tour_nocturno.titulo'][0]['uuid'])}}">
                            {!! $siteSections['service.vista_previa.tour_nocturno.titulo'][0]['content'] !!}
                        </a></h3>
                                        <p class="p-services"><a href="{{ route('sections.edit', $siteSections['service.vista_previa.tour_nocturno.parrafo'][0]['uuid'])}}">
                            {!! $siteSections['service.vista_previa.tour_nocturno.parrafo'][0]['content'] !!}
                        </a></p>
                                        <ul class="list-unstyled li-space-lg">
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body media-body-service"><a href="{{ route('sections.edit', $siteSections['service.vista_previa.tour_nocturno.item_1'][0]['uuid'])}}">
                            {!! $siteSections['service.vista_previa.tour_nocturno.item_1'][0]['content'] !!}
                        </a></div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body media-body-service"><a href="{{ route('sections.edit', $siteSections['service.vista_previa.tour_nocturno.item_2'][0]['uuid'])}}">
                            {!! $siteSections['service.vista_previa.tour_nocturno.item_2'][0]['content'] !!}
                        </a></div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="button-container">
                                        <!-- <a class="btn-solid-reg page-scroll" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank"><a href="{{ route('sections.edit', $siteSections['btn.mas_detalles'][0]['uuid'])}}">
                            {!! $siteSections['btn.mas_detalles'][0]['content'] !!}
                        </a></a> -->
                                        <a disabled class="popup-with-move-anim" href="#tour-nocturno"><div class="btn-solid-reg page-scroll"><a disabled href="{{ route('sections.edit', $siteSections['btn.mas_detalles'][0]['uuid'])}}">
                            {!! $siteSections['btn.mas_detalles'][0]['content'] !!}
                        </a></div></a>
                                    </div> <!-- end of button-container -->
                                </div>
                                <!-- end of card -->

                                <!-- Card -->
                                <div class="card">
                                    <div class="card-image">
                                        <img class="img-fluidLateral" src="{{asset('images/aves/halcon-blanco-gavilan.jpg')  }}" alt="Aves en La Fortuna Sloth's Territory" title="lechuzón en Sloth's Territory Fortuna" width="350px" height="258px">
                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><a href="{{ route('sections.edit', $siteSections['service.vista_previa.tour_aves.titulo'][0]['uuid'])}}">
                            {!! $siteSections['service.vista_previa.tour_aves.titulo'][0]['content'] !!}
                        </a></h3>
                                        <p class="p-services"><a href="{{ route('sections.edit', $siteSections['service.vista_previa.tour_aves.parrafo'][0]['uuid'])}}">
                            {!! $siteSections['service.vista_previa.tour_aves.parrafo'][0]['content'] !!}
                        </a></p>
                                        <ul class="list-unstyled li-space-lg">
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body media-body-service"><a href="{{ route('sections.edit', $siteSections['service.vista_previa.tour_aves.item_1'][0]['uuid'])}}">
                            {!! $siteSections['service.vista_previa.tour_aves.item_1'][0]['content'] !!}
                        </a></div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body media-body-service"><a href="{{ route('sections.edit', $siteSections['service.vista_previa.tour_aves.item_2'][0]['uuid'])}}">
                            {!! $siteSections['service.vista_previa.tour_aves.item_2'][0]['content'] !!}
                        </a></div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="button-container">
                                    <a disabled class="popup-with-move-anim" href="#tour-aves"><div class="btn-solid-reg page-scroll"><a disabled href="{{ route('sections.edit', $siteSections['btn.mas_detalles'][0]['uuid'])}}">
                            {!! $siteSections['btn.mas_detalles'][0]['content'] !!}
                        </a></div></a>
                                        <!-- <a class="btn-solid-reg page-scroll" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank"><a href="{{ route('sections.edit', $siteSections['btn.mas_detalles'][0]['uuid'])}}">
                            {!! $siteSections['btn.mas_detalles'][0]['content'] !!}
                        </a></a> -->
                                    </div> <!-- end of button-container -->
                                </div>
                                <!-- end of card -->

                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                    </div> <!-- end of container -->
                </div> <!-- end of cards-2 -->
                <!-- end of services -->

                <!-- Details 1 -->
                <div class="container">
                    <div id="details" class="accordion">
                        <div class="area-1 container">
                        </div><!-- end of area-1 on same line and no space between comments to eliminate margin white space --><div class="area-2">

                            <!-- Accordion -->
                            <div class="accordion-container" id="accordionOne">
                                <h2><a href="{{ route('sections.edit', $siteSections['details.titulo_principal'][0]['uuid'])}}">
                            {!! $siteSections['details.titulo_principal'][0]['content'] !!}
                        </a>
                                    <img src="{{ asset('/images/banderas/cr.png')  }}" height="25" width="25" alt="bandera de costa rica">
                                    Costa Rica
                                    <img src="{{ asset('/images/banderas/cr.png')  }}" height="25" width="25" alt="bandera de costa rica">
                                </h2>

                                <div class="item">
                                    <div aria-labelledby="headingTwo" data-parent="#accordionOne">
                                        <div class="accordion-body">
                                            <a href="{{ route('sections.edit', $siteSections['details.item_2.parrafo'][0]['uuid'])}}">
                            {!! $siteSections['details.item_2.parrafo'][0]['content'] !!}
                        </a>
                                        </div>
                                    </div>
                                </div> <!-- end of item -->
                            </div> <!-- end of accordion-container -->
                            <!-- end of accordion -->

                        </div> <!-- end of area-2 -->
                    </div> <!-- end of accordion -->
                </div>
                <!-- end of details 1 -->

                <!-- Tours -->
                <div id="galeria" class="filter">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title"> <a href="{{ route('sections.edit', $siteSections['galeria.titulo_principal'][0]['uuid'])}}">
                            {!! $siteSections['galeria.titulo_principal'][0]['content'] !!}
                        </a></div>
                                <h3 class="h3-black"> <a href="{{ route('sections.edit', $siteSections['galeria.titulo_secundario'][0]['uuid'])}}">
                            {!! $siteSections['galeria.titulo_secundario'][0]['content'] !!}
                        </a></h3>
                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                        <div class="row">
                        </div> <!-- end of row -->

                    </div> <!-- end of filter -->
                </div> 

                <div id="tour-diurno" class="lightbox-basic zoom-anim-dialog mfp-hide">
                    <div class="row justify-content-center">
                        <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                        <div class="col-lg-10">
                            <img class="img-fluid" src="{{asset('images/otras-especies/perezosos-sloth_s_territory_Fortuna_de_San_Carlos.jpg')  }}" alt="tour de perezosos en La Fortuna" title="Tour de perezosos">
                        </div> <!-- end of col -->
                        <div class="col-lg-10">
                            <h3><a href="{{ route('sections.edit', $siteSections['service.tour_diurno.info.titulo_principal'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_diurno.info.titulo_principal'][0]['content'] !!}
                        </a></h3>
                            <hr class="line-heading">
                            <h6><a href="{{ route('sections.edit', $siteSections['service.tour_diurno.info.titulo_secundario_1'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_diurno.info.titulo_secundario_1'][0]['content'] !!}
                        </a></h6>
                            <p><a href="{{ route('sections.edit', $siteSections['service.tour_diurno.info.parrafo_1'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_diurno.info.parrafo_1'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.tour_diurno.info.parrafo_2'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_diurno.info.parrafo_2'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.tour_diurno.info.parrafo_3'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_diurno.info.parrafo_3'][0]['content'] !!}
                        </a>.</p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.tour_diurno.info.parrafo_4'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_diurno.info.parrafo_4'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.tour_diurno.info.parrafo_5'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_diurno.info.parrafo_5'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.tour_diurno.info.parrafo_6'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_diurno.info.parrafo_6'][0]['content'] !!}
                        </a></p>
                            <h6><a href="{{ route('sections.edit', $siteSections['service.todos.info.titulo_secundario_2'][0]['uuid'])}}">
                            {!! $siteSections['service.todos.info.titulo_secundario_2'][0]['content'] !!}
                        </a></h6>
                            <p><a href="{{ route('sections.edit', $siteSections['service.todos.info.que_llevar_1'][0]['uuid'])}}">
                            {!! $siteSections['service.todos.info.que_llevar_1'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.todos.info.que_llevar_2'][0]['uuid'])}}">
                            {!! $siteSections['service.todos.info.que_llevar_2'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.todos.info.que_llevar_3'][0]['uuid'])}}">
                            {!! $siteSections['service.todos.info.que_llevar_3'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.todos.info.que_llevar_4'][0]['uuid'])}}">
                            {!! $siteSections['service.todos.info.que_llevar_4'][0]['content'] !!}
                        </a></p>
                            <div class="testimonial-container">
                                <p class="testimonial-text"><a href="{{ route('sections.edit', $siteSections['service.todos.info.parrafo_testimonial'][0]['uuid'])}}">
                            {!! $siteSections['service.todos.info.parrafo_testimonial'][0]['content'] !!}
                        </a></p>
                            </div>
                            
                        </div> <!-- end of col -->
                    </div> <!-- end of row -->
                </div> <!-- end of lightbox-basic -->
                <!-- end of lightbox -->

                <div id="tour-nocturno" class="lightbox-basic zoom-anim-dialog mfp-hide">
                    <div class="row justify-content-center">
                        <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                        <div class="col-lg-10">
                            <img class="img-fluid" src="{{asset('images/tour_nocturno-Sloth_s_Territory_La_Fortuna.jpeg')  }}" alt="tour nocturno en La Fortuna" title="Tour nocturno en La Fortuna">
                        </div> <!-- end of col -->
                        <div class="col-lg-10">
                            <h3><a href="{{ route('sections.edit', $siteSections['service.tour_nocturno.info.titulo_principal'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_nocturno.info.titulo_principal'][0]['content'] !!}
                        </a></h3>
                            <hr class="line-heading">
                            <h6><a href="{{ route('sections.edit', $siteSections['service.tour_nocturno.info.titulo_secundario_1'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_nocturno.info.titulo_secundario_1'][0]['content'] !!}
                        </a></h6>
                            <p><a href="{{ route('sections.edit', $siteSections['service.tour_nocturno.info.parrafo_1'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_nocturno.info.parrafo_1'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.tour_nocturno.info.parrafo_2'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_nocturno.info.parrafo_2'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.tour_nocturno.info.parrafo_3'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_nocturno.info.parrafo_3'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.tour_nocturno.info.parrafo_4'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_nocturno.info.parrafo_4'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.tour_nocturno.info.parrafo_5'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_nocturno.info.parrafo_5'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.tour_nocturno.info.parrafo_6'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_nocturno.info.parrafo_6'][0]['content'] !!}
                        </a></p>
                            <h6><a href="{{ route('sections.edit', $siteSections['service.todos.info.titulo_secundario_2'][0]['uuid'])}}">
                            {!! $siteSections['service.todos.info.titulo_secundario_2'][0]['content'] !!}
                        </a></h6>
                            <p><a href="{{ route('sections.edit', $siteSections['service.todos.info.que_llevar_1'][0]['uuid'])}}">
                            {!! $siteSections['service.todos.info.que_llevar_1'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.todos.info.que_llevar_2'][0]['uuid'])}}">
                            {!! $siteSections['service.todos.info.que_llevar_2'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.todos.info.que_llevar_3'][0]['uuid'])}}">
                            {!! $siteSections['service.todos.info.que_llevar_3'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.todos.info.que_llevar_4'][0]['uuid'])}}">
                            {!! $siteSections['service.todos.info.que_llevar_4'][0]['content'] !!}
                        </a></p>
                            <div class="testimonial-container">
                                <p class="testimonial-text"><a href="{{ route('sections.edit', $siteSections['service.todos.info.parrafo_testimonial'][0]['uuid'])}}">
                            {!! $siteSections['service.todos.info.parrafo_testimonial'][0]['content'] !!}
                        </a></p>
                            </div>
                            
                        </a></a>
                        </div> <!-- end of col -->
                    </div> <!-- end of row -->
                </div> <!-- end of lightbox-basic -->
                <!-- end of lightbox -->
        
                <div id="tour-aves" class="lightbox-basic zoom-anim-dialog mfp-hide">
                    <div class="row justify-content-center">
                        <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                        <div class="col-lg-10">
                            <img class="img-fluid" src="{{asset('images/aves/halcon-blanco-gavilan.jpg')  }}" alt="Tour de aves en La Fortuna" title="Tour de aves en La Fortuna">
                        </div> <!-- end of col -->
                        <div class="col-lg-10">
                            <h3><a href="{{ route('sections.edit', $siteSections['service.tour_aves.info.titulo_principal'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_aves.info.titulo_principal'][0]['content'] !!}
                        </a></h3>
                            <hr class="line-heading">
                            <h6><a href="{{ route('sections.edit', $siteSections['service.tour_aves.info.titulo_secundario_1'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_aves.info.titulo_secundario_1'][0]['content'] !!}
                        </a></h6>
                            <p><a href="{{ route('sections.edit', $siteSections['service.tour_aves.info.parrafo_1'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_aves.info.parrafo_1'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.tour_aves.info.parrafo_2'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_aves.info.parrafo_2'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.tour_aves.info.parrafo_3'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_aves.info.parrafo_3'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.tour_aves.info.parrafo_4'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_aves.info.parrafo_4'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.tour_aves.info.parrafo_5'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_aves.info.parrafo_5'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.tour_aves.info.parrafo_6'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_aves.info.parrafo_6'][0]['content'] !!}
                        </a></p>
                            <h6><a href="{{ route('sections.edit', $siteSections['service.todos.info.titulo_secundario_2'][0]['uuid'])}}">
                            {!! $siteSections['service.todos.info.titulo_secundario_2'][0]['content'] !!}
                        </a></h6>
                            <p><a href="{{ route('sections.edit', $siteSections['service.todos.info.que_llevar_1'][0]['uuid'])}}">
                            {!! $siteSections['service.todos.info.que_llevar_1'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.todos.info.que_llevar_2'][0]['uuid'])}}">
                            {!! $siteSections['service.todos.info.que_llevar_2'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.todos.info.que_llevar_3'][0]['uuid'])}}">
                            {!! $siteSections['service.todos.info.que_llevar_3'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.tour_aves.info.que_llevar_5'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_aves.info.que_llevar_5'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.tour_aves.info.que_llevar_6'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_aves.info.que_llevar_6'][0]['content'] !!}
                        </a></p>
                            <p><a href="{{ route('sections.edit', $siteSections['service.tour_aves.info.que_llevar_7'][0]['uuid'])}}">
                            {!! $siteSections['service.tour_aves.info.que_llevar_7'][0]['content'] !!}
                        </a></p>
                            <div class="testimonial-container">
                                <p class="testimonial-text"><a href="{{ route('sections.edit', $siteSections['service.todos.info.parrafo_testimonial'][0]['uuid'])}}">
                            {!! $siteSections['service.todos.info.parrafo_testimonial'][0]['content'] !!}
                        </a></p>
                            </div>
                            
                        </div> <!-- end of col -->
                    </div> <!-- end of row -->
                </div> <!-- end of lightbox-basic -->
                <!-- end of lightbox -->
                <!-- end of tour lightboxes -->

                <!-- About -->
                <div id="about" class="counter">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-xl-6">
                                <div class="image-container">
                                <!-- PENDIENTE poner el alt y title y cambiar la imagen -->
                                    <img class="img-fluid" src="{{asset('images/tour_de_perezosos_en_La_Fortuna.jpeg')  }}" alt="Tour de Perezosos En La Fortuna" title="Tour de perezosos en La Fortuna">    
                                </div> <!-- end of image-container -->
                            </div> <!-- end of col -->
                            <div class="col-lg-7 col-xl-6">
                                <div class="text-container">
                                    <div class="section-title"><a href="{{ route('sections.edit', $siteSections['acerca_de.titulo_principal'][0]['uuid'])}}">
                            {!! $siteSections['acerca_de.titulo_principal'][0]['content'] !!}
                        </a></div>
                                    <h3 class="h3-black"> <a href="{{ route('sections.edit', $siteSections['acerca_de.titulo_secundario'][0]['uuid'])}}">
                            {!! $siteSections['acerca_de.titulo_secundario'][0]['content'] !!}
                        </a></h3>
                                    <p> <a href="{{ route('sections.edit', $siteSections['acerca_de.parrafo_descriptivo'][0]['uuid'])}}">
                            {!! $siteSections['acerca_de.parrafo_descriptivo'][0]['content'] !!}
                        </a></p>
                                    <ul class="list-unstyled li-space-lg">
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body"><a href="{{ route('sections.edit', $siteSections['acerca_de.item_1'][0]['uuid'])}}">
                            {!! $siteSections['acerca_de.item_1'][0]['content'] !!}
                        </a></div>
                                        </li>
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body"><a href="{{ route('sections.edit', $siteSections['acerca_de.item_2'][0]['uuid'])}}">
                            {!! $siteSections['acerca_de.item_2'][0]['content'] !!}
                        </a></div>
                                        </li>
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body"><a href="{{ route('sections.edit', $siteSections['acerca_de.item_3'][0]['uuid'])}}">
                            {!! $siteSections['acerca_de.item_3'][0]['content'] !!}
                        </a></div>
                                        </li>
                                    </ul>
                                </div> <!-- end of text-container -->
                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                    </div> <!-- end of container -->
                </div> <!-- end of counter -->
                <!-- end of about -->

                <!-- Contact -->
                <div id="contact" class="form-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="text-container">
                                    <div class="section-title"><a href="{{ route('sections.edit', $siteSections['contact.titulo_principal'][0]['uuid'])}}">
                            {!! $siteSections['contact.titulo_principal'][0]['content'] !!}
                        </a></div>
                                    <h3 class="h3-black"><a href="{{ route('sections.edit', $siteSections['contact.titulo_secundario'][0]['uuid'])}}">
                            {!! $siteSections['contact.titulo_secundario'][0]['content'] !!}
                        </a></h3>
                                    <p><a href="{{ route('sections.edit', $siteSections['contact.parrafo_descriptivo'][0]['uuid'])}}">
                            {!! $siteSections['contact.parrafo_descriptivo'][0]['content'] !!}
                        </a></p>
                                    <ul class="list-unstyled li-space-lg">
                                        <li class="address"><i class="fas fa-map-marker-alt"></i><a href="{{ route('sections.edit', $siteSections['contact.direccion'][0]['uuid'])}}">
                            {!! $siteSections['contact.direccion'][0]['content'] !!}
                        </a></li>
                                        <li><i class="fas fa-phone"></i><a href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">+506 8561 0404</a></li>
                                        <li><i class="fas fa-envelope"></i><a href="mailto:sloths.territory@gmail.com" target="_blank">sloths.territory@gmail.com</a></li>
                                    </ul>
                                    <h3><a href="{{ route('sections.edit', $siteSections['contact.titulo_redes_sociaes'][0]['uuid'])}}">
                            {!! $siteSections['contact.titulo_redes_sociaes'][0]['content'] !!}
                        </a></h3>

                                    <span class="fa-stack">
                                    <a href="https://www.facebook.com/Sloths.Territory.2018" target="_blank">
                                            <i class="fab fa-facebook-f fa-stack-1x-face"></i>
                                        </a>
                                    </span>
                                    <span class="fa-stack">
                                    <a href="https://www.instagram.com/slothsterritory/" target="_blank">
                                            <i class="fab fa-instagram fa-stack-1x-insta"></i>
                                        </a>
                                    </span>
                                    <span class="fa-stack">
                                        <a href="https://www.youtube.com/channel/UCKqtM7YiCFUtcYs5j8B5hgw" target="_blank">
                                            <i class="fab fa-youtube fa-stack-1x-youtu"></i>
                                        </a>
                                    </span>
                                    <span class="fa-stack">
                                        <a href="https://www.tripadvisor.com/UserReviewEdit-g309226-d15636276-Sloth_s_Territory-La_Fortuna_de_San_Carlos_Arenal_Volcano_National_Park_Province_of_Alajuela.html" target="_blank">
                                            <i class="fab fa-tripadvisor fa-stack-1x-trip"></i>
                                        </a>
                                    </span>
                                    <span class="fa-stack">
                                        <a href="https://www.waze.com/en/live-map/directions/costa-rica/alajuela-province/la-fortuna/sloths-territory?navigate=yes&utm_campaign=iframe_planning&utm_medium=planning_box&utm_source=waze_website&to=place.ChIJo8M693NzoI8RA4DJ3c5V5AA" target="_blank">
                                            <img class="img-fa-stack-1x-trip" src="{{ asset('icons/waze.svg') }}" alt="">
                                        </a>
                                    </span>
                                </div> <!-- end of text-container -->
                            </div> <!-- end of col -->
                            <div class="col-lg-6">

                                <!-- Contact Form -->
                                
                                {{-- <form action="{{ route('mensaje.guardar') }}" method="post" data-toggle="validator" data-focus="false"> --}}
                                <form id="formularioMensaje" >
                                    <div class="form-group">
                                        <input type="text" name="nombre" class="form-control-input" id="nombre" required>
                                        <label class="label-control" for="nombre"><a href="{{ route('sections.edit', $siteSections['formulario.nombre'][0]['uuid'])}}">
                            {!! $siteSections['formulario.nombre'][0]['content'] !!}
                        </a></label>
                                        <div id="error-nombre" class="text-danger"></div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="correo" class="form-control-input" id="correo" required>
                                        <label class="label-control" for="correo"><a href="{{ route('sections.edit', $siteSections['formulario.correo'][0]['uuid'])}}">
                            {!! $siteSections['formulario.correo'][0]['content'] !!}
                        </a></label>
                                        <div id="error-correo"  class="text-danger"></div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control-textarea" name="mensaje" id="mensaje" required></textarea>
                                        <label class="label-control" for="mensaje"><a href="{{ route('sections.edit', $siteSections['formulario.mensaje'][0]['uuid'])}}">
                            {!! $siteSections['formulario.mensaje'][0]['content'] !!}
                        </a></label>
                                        <div id="error-mensaje"  class="text-danger"></div>
                                    </div>
                                    {{-- <div class="form-group checkbox">
                                        <input type="checkbox" id="cterms" value="Agreed-to-Terms" required><a href="{{ route('sections.edit', $siteSections['inicio.titulo_principal'][0]['uuid'])}}">
                            {!! $siteSections['formulario.acepta_politicas_parte_1'][0]['content'] !!}
                        </a><a href="privacy-policy"><a href="{{ route('sections.edit', $siteSections['inicio.titulo_principal'][0]['uuid'])}}">
                            {!! $siteSections['politicas_privacidad'][0]['content'] !!}
                        </a></a>  <a href="terms-conditions"><a href="{{ route('sections.edit', $siteSections['inicio.titulo_principal'][0]['uuid'])}}">
                            {!! $siteSections['terminos_condiciones'][0]['content'] !!}
                        </a></a>
                                        <div class="help-block with-errors"></div>
                                    </div> --}}
                                    <div class="form-group">
                                        <button type="submit" id="botonFormulario" class="form-control-submit-button"><a href="{{ route('sections.edit', $siteSections['btn.enviar_mensaje'][0]['uuid'])}}">
                            {!! $siteSections['btn.enviar_mensaje'][0]['content'] !!}
                        </a> </button>
                                    </div>
                                    <div class="form-message">
                                        <div id="cmsgSubmit" class="h3 text-center hidden"></div>
                                    </div>
                                </form>
                                <!-- end of contact form -->

                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                    </div> <!-- end of container -->
                        <div id="map" class="container">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3923.364791697207!2d-84.60491328525374!3d10.471881892528604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa07373f73ac3a3%3A0xe455ceddc98003!2sSloth%E2%80%99s%20Territory!5e0!3m2!1ses!2scr!4v1623630326775!5m2!1ses!2scr" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>             
                        </div>
                </div> <!-- end of form-2 -->
                <!-- end of contact -->

            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="{{ url('js/combos.js') }}"></script>
@endsection