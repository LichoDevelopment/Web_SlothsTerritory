@extends('layouts.app')

@section('content')

        <div id="header" class="container-all">

            <div id="carouselTop" class="slide carousel carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach (imagenesCarusel() as $img)
                        <div class="carousel-item item-slide {{$loop->index === 0 ? 'active': ''}}" data-interval="3000" >
                        <img 
                            src="/storage/{{$img->url}}" 
                            class="imgs" alt="{{ $img->titulo }}">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselTop" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselTop" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
        <div class="container">
            <h1 class="main-title mt-3"> {!! $siteSections['inicio.titulo_principal'][0]['content'] !!} </h1>
            <p class="p-heading p-large"> {!! $siteSections['inicio.parrafo_descriptivo'][0]['content'] !!}<div class=""></div></p>
            <div class="d-flex justify-content-center align-items-center">
                <a class="btn-solid-lg page-scroll" href="https://book.peek.com/s/0d5738ed-bc16-4e2e-8706-e15cf8963b30/NxMp2" target="_blank">{!! $siteSections['btn.reservar_ahora'][0]['content'] !!}</a>
            </div>
        </div>

        <!-- Intro -->
        <div id="intro" class="basic-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="text-container">
                            <div class="section-title">{!! $siteSections['intro.titulo:principal'][0]['content'] !!}</div>
                            <h3 class="h3-black">{!! $siteSections['intro.titulo_secundario'][0]['content'] !!}</h3>
                            <p> {!! $siteSections['intro.parrafo_descriptivo'][0]['content'] !!}</p>
                            <div class="testimonial-author">{!! $siteSections['intro.testimonial'][0]['content'] !!}</div>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-7 center-header">
                        <div class="image-container">
                            <img class="img-fluid" src="images/otras-especies/tours-en-sloths-territory.jpg" alt="Perezosos La Fortuna de San Carlos" title="Perezosos Sloth's Territory" height="450px" width="500px">
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
                                <h4 class="card-title">{!! $siteSections['cards.card_1.titulo'][0]['content'] !!}</h4>
                                <p>{!! $siteSections['cards.card_1.parrafo'][0]['content'] !!}</p>
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
                                <h4 class="card-title">{!! $siteSections['cards.card_2.titulo'][0]['content'] !!}</h4>
                                <p>{!! $siteSections['cards.card_2.parrafo'][0]['content'] !!}</p>
                            </div>
                        </div>
                        <!-- end of card -->

                        <!-- Card  desactivado--> 
                        {{-- <div class="card">
                            <span class="fa-stack">
                                <i class="fas fa-binoculars fa-stack-1x"></i>
                            </span>
                            <div class="card-body">
                                <h4 class="card-title">{!! $siteSections['cards.card_3.titulo'][0]['content'] !!}</h4>
                                <p>{!! $siteSections['cards.card_3.parrafo'][0]['content'] !!}</p>
                            </div>
                        </div> --}}
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
                        <div class="section-title">{!! $siteSections['service.titulo_principal'][0]['content'] !!}</div>
                        <h2 class="h2-services">{!! $siteSections['services.titulo_secundario_parte_1'][0]['content'] !!} <br>{!! $siteSections['services.titulo_secundario_parte_2'][0]['content'] !!} </h2>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
                <div class="row">
                    <div class="col-lg-12">

                        <!-- Card -->
                        <div class="card">
                            <div class="card-image">
                                <img class="img-fluidLateral" src="images/otras-especies/perezosos-sloth_s_territory_Fortuna_de_San_Carlos.jpg" alt="Sendero para ver perezosos en la Fortuna de San Carlos Volcán Arenal" title="Sendero Sloth's Territory" width="350px" height="258px">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">{!! $siteSections['service.vista_previa.tour_diurno.titulo'][0]['content'] !!}</h3>
                                <p class="p-services">{!! $siteSections['service.vista_previa.tour_diurno.parrafo'][0]['content'] !!}</p>
                                <ul class="list-unstyled li-space-lg">
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body media-body-service">{!! $siteSections['service.vista_previa.tour_diurno.item_1'][0]['content'] !!}</div>
                                    </li>
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body media-body-service">{!! $siteSections['service.vista_previa.tour_diurno.item_2'][0]['content'] !!}</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="button-container">
                            <a class="popup-with-move-anim" href="#tour-diurno"><div class="btn-solid-reg page-scroll">{!! $siteSections['btn.mas_detalles'][0]['content'] !!}</div></a> 
                                <!-- <a class="btn-solid-reg page-scroll" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">{!! $siteSections['btn.mas_detalles'][0]['content'] !!}</a> -->
                            </div> <!-- end of button-container -->
                        </div>
                        <!-- end of card -->

                        <!-- Card -->
                        <div class="card">
                            <div class="card-image">
                                <img class="img-fluid" src="images/tour_nocturno-Sloth_s_Territory_La_Fortuna.jpeg" alt="tour nocturno de perezosos en Sloths Territory en La Fortuna" title="Tour nocturno La Fortuna Sloth's Territory" width="350px" height="258px">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">{!! $siteSections['service.vista_previa.tour_nocturno.titulo'][0]['content'] !!}</h3>
                                <p class="p-services">{!! $siteSections['service.vista_previa.tour_nocturno.parrafo'][0]['content'] !!}</p>
                                <ul class="list-unstyled li-space-lg">
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body media-body-service">{!! $siteSections['service.vista_previa.tour_nocturno.item_1'][0]['content'] !!}</div>
                                    </li>
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body media-body-service">{!! $siteSections['service.vista_previa.tour_nocturno.item_2'][0]['content'] !!}</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="button-container">
                                <!-- <a class="btn-solid-reg page-scroll" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">{!! $siteSections['btn.mas_detalles'][0]['content'] !!}</a> -->
                                <a class="popup-with-move-anim" href="#tour-nocturno"><div class="btn-solid-reg page-scroll">{!! $siteSections['btn.mas_detalles'][0]['content'] !!}</div></a>
                            </div> <!-- end of button-container -->
                        </div>
                        <!-- end of card -->

                        <!-- Card -->
                        <div class="card">
                            <div class="card-image">
                                <img class="img-fluidLateral" src="images/aves/halcon-blanco-gavilan.jpg" alt="Aves en La Fortuna Sloth's Territory" title="lechuzón en Sloth's Territory Fortuna" width="350px" height="258px">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">{!! $siteSections['service.vista_previa.tour_aves.titulo'][0]['content'] !!}</h3>
                                <p class="p-services">{!! $siteSections['service.vista_previa.tour_aves.parrafo'][0]['content'] !!}</p>
                                <ul class="list-unstyled li-space-lg">
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body media-body-service">{!! $siteSections['service.vista_previa.tour_aves.item_1'][0]['content'] !!}</div>
                                    </li>
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body media-body-service">{!! $siteSections['service.vista_previa.tour_aves.item_2'][0]['content'] !!}</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="button-container">
                            <a class="popup-with-move-anim" href="#tour-aves"><div class="btn-solid-reg page-scroll">{!! $siteSections['btn.mas_detalles'][0]['content'] !!}</div></a>
                                <!-- <a class="btn-solid-reg page-scroll" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">{!! $siteSections['btn.mas_detalles'][0]['content'] !!}</a> -->
                            </div> <!-- end of button-container -->
                        </div>
                        <!-- end of card -->

                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of cards-2 -->
        <!-- end of services -->

        {{-- SECCIÓN DE COMBOIS DESACTIVADAS. --}}
        {{-- <div class="container-combo-img container">
            <div  class="d-flex justify-content-center">
                <img class="combo-preview-img" src="{{ asset('images/combo-preview-img.jpeg') }}" alt="">
            </div>
            <div  class="d-flex justify-content-center">
                <a class="" href="{{ route('combos', $locale) }}">
                    <span class="btn-solid-reg page-scroll">{!! $siteSections['btn.mas_detalles'][0]['content'] !!}</span>
                </a> 
            </div>
        </div> --}}


        <!-- Details 1 -->
        <div class="container">
            <div id="details" class="accordion">
                <div class="area-1 container">
                </div><!-- end of area-1 on same line and no space between comments to eliminate margin white space --><div class="area-2">

                    <!-- Accordion -->
                    <div class="accordion-container" id="accordionOne">
                        <p class="textJustify fontSizeMidium">{!! $siteSections['details.titulo_principal'][0]['content'] !!}</p>
                            {{-- <img src="{{ asset('/images/banderas/cr.png')  }}" height="25" width="25" alt="bandera de costa rica">
                            Costa Rica
                            <img src="{{ asset('/images/banderas/cr.png')  }}" height="25" width="25" alt="bandera de costa rica"> --}}
                        

                        {{-- <div class="item">
                            <div aria-labelledby="headingTwo" data-parent="#accordionOne">
                                <div class="accordion-body">
                                    {!! $siteSections['details.item_2.parrafo'][0]['content'] !!}

                                </div>
                            </div>
                        </div>  --}}
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
                        <div class="section-title"> {!! $siteSections['galeria.titulo_principal'][0]['content'] !!}</div>
                        <h3 class="h3-black"> {!! $siteSections['galeria.titulo_secundario'][0]['content'] !!}</h3>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Filter -->
                        <div class="button-group filters-button-group">
                            <a class="button is-checked" data-filter="*"><span>{!! $siteSections['galeria.filtro.ver_todo'][0]['content'] !!}</span></a>

                            @foreach ($imageTypes as $type)
                                <a class="button" data-filter=".{{$type->name_en}}"><span>{{$locale == "es" ? $type->name_es : $type->name_en}}</span></a>
                            @endforeach

                        </div> <!-- end of button group -->

                        <div class="grid">
                            @foreach ($images as $image)
                                <div class="element-item {{$image->type->name_en}}">
                                    <a class="popup-with-move-anim" href="#img{{$image->id}}">
                                        <div class="element-item-overlay"></div>
                                        <img loading="lazy" src="/storage/{{$image->url}}" alt="{{$image->titulo}}"
                                        title="{{$image->titulo}}">
                                    </a>
                                </div>
                            @endforeach
                            
                            
                        </div> <!-- end of grid -->
                        <!-- end of filter -->

                    </div> <!-- end of col -->
                </div> <!-- end of row -->

        </div> <!-- end of filter -->
        </div> <!-- end of container -->
            <div id="video" class="">
                <iframe class="yt-iframe" src="https://www.youtube.com/embed/BrAsPlE2gS8?rel=0&amp;showinfo=0" frameborder="0" style="border:0" allowfullscreen alt="Video de perezosos en La Fortuna" title="video de perezosos en La Fortuna"></iframe>             
        </div>
        <!-- end of tours -->


        <!-- tour Lightboxes -->
        @foreach ($images as $image)
            <!-- Lightbox -->
            <div id="img{{$image->id}}" class="lightbox-basic zoom-anim-dialog mfp-hide">
                <div class="row">
                    <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                    <div class="">
                        <img class="img-fluid img-modal" loading="lazy" 
                        src="/storage/{{$image->url}}" alt="{{$image->titulo}}"
                        title="{{$image->titulo}}">
                    </div>
                </div> <!-- end of row -->
            </div> <!-- end of lightbox-basic -->
            <!-- end of lightbox -->
        
        @endforeach


        <div id="tour-diurno" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row justify-content-center">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-10">
                    <img class="img-fluid" src="images/otras-especies/perezosos-sloth_s_territory_Fortuna_de_San_Carlos.jpg" alt="tour de perezosos en La Fortuna" title="Tour de perezosos">
                </div> <!-- end of col -->
                <div class="col-lg-10">
                    <h3>{!! $siteSections['service.tour_diurno.info.titulo_principal'][0]['content'] !!}</h3>
                    <hr class="line-heading">
                    <h6>{!! $siteSections['service.tour_diurno.info.titulo_secundario_1'][0]['content'] !!}</h6>
                    <p>{!! $siteSections['service.tour_diurno.info.parrafo_1'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.tour_diurno.info.parrafo_2'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.tour_diurno.info.parrafo_3'][0]['content'] !!}.</p>
                    <p>{!! $siteSections['service.tour_diurno.info.parrafo_4'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.tour_diurno.info.parrafo_5'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.tour_diurno.info.parrafo_6'][0]['content'] !!}</p>
                    <h6>{!! $siteSections['service.todos.info.titulo_secundario_2'][0]['content'] !!}</h6>
                    <p>{!! $siteSections['service.todos.info.que_llevar_1'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.todos.info.que_llevar_2'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.todos.info.que_llevar_3'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.todos.info.que_llevar_4'][0]['content'] !!}</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">{!! $siteSections['service.todos.info.parrafo_testimonial'][0]['content'] !!}</p>
                    </div>
                    <a class="btn-solid-reg" href="https://book.peek.com/s/0d5738ed-bc16-4e2e-8706-e15cf8963b30/O49p6" target="_blank">{!! $siteSections['btn.reservar_ahora'][0]['content'] !!}</a> <a class="btn-outline-reg mfp-close as-button" href="#services">{!! $siteSections['btn.volver'][0]['content'] !!}</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->

        <div id="tour-nocturno" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row justify-content-center">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-10">
                    <img class="img-fluid" src="images/tour_nocturno-Sloth_s_Territory_La_Fortuna.jpeg" alt="tour nocturno en La Fortuna" title="Tour nocturno en La Fortuna">
                </div> <!-- end of col -->
                <div class="col-lg-10">
                    <h3>{!! $siteSections['service.tour_nocturno.info.titulo_principal'][0]['content'] !!}</h3>
                    <hr class="line-heading">
                    <h6>{!! $siteSections['service.tour_nocturno.info.titulo_secundario_1'][0]['content'] !!}</h6>
                    <p>{!! $siteSections['service.tour_nocturno.info.parrafo_1'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.tour_nocturno.info.parrafo_2'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.tour_nocturno.info.parrafo_3'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.tour_nocturno.info.parrafo_4'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.tour_nocturno.info.parrafo_5'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.tour_nocturno.info.parrafo_6'][0]['content'] !!}</p>
                    <h6>{!! $siteSections['service.todos.info.titulo_secundario_2'][0]['content'] !!}</h6>
                    <p>{!! $siteSections['service.todos.info.que_llevar_1'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.todos.info.que_llevar_2'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.todos.info.que_llevar_3'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.todos.info.que_llevar_4'][0]['content'] !!}</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">{!! $siteSections['service.todos.info.parrafo_testimonial'][0]['content'] !!}</p>
                    </div>
                    <a class="btn-solid-reg" href="https://book.peek.com/s/0d5738ed-bc16-4e2e-8706-e15cf8963b30/Ad2j6" target="_blank">{!! $siteSections['btn.reservar_ahora'][0]['content'] !!}</a> <a class="btn-outline-reg mfp-close as-button" href="#services">{!! $siteSections['btn.volver'][0]['content'] !!}</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->

        <div id="tour-aves" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row justify-content-center">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-10">
                    <img class="img-fluid" src="images/aves/halcon-blanco-gavilan.jpg" alt="Tour de aves en La Fortuna" title="Tour de aves en La Fortuna">
                </div> <!-- end of col -->
                <div class="col-lg-10">
                    <h3>{!! $siteSections['service.tour_aves.info.titulo_principal'][0]['content'] !!}</h3>
                    <hr class="line-heading">
                    <h6>{!! $siteSections['service.tour_aves.info.titulo_secundario_1'][0]['content'] !!}</h6>
                    <p>{!! $siteSections['service.tour_aves.info.parrafo_1'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.tour_aves.info.parrafo_2'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.tour_aves.info.parrafo_3'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.tour_aves.info.parrafo_4'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.tour_aves.info.parrafo_5'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.tour_aves.info.parrafo_6'][0]['content'] !!}</p>
                    <h6>{!! $siteSections['service.todos.info.titulo_secundario_2'][0]['content'] !!}</h6>
                    <p>{!! $siteSections['service.todos.info.que_llevar_1'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.todos.info.que_llevar_2'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.todos.info.que_llevar_3'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.tour_aves.info.que_llevar_5'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.tour_aves.info.que_llevar_6'][0]['content'] !!}</p>
                    <p>{!! $siteSections['service.tour_aves.info.que_llevar_7'][0]['content'] !!}</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">{!! $siteSections['service.todos.info.parrafo_testimonial'][0]['content'] !!}</p>
                    </div>
                    <a class="btn-solid-reg" href="https://book.peek.com/s/0d5738ed-bc16-4e2e-8706-e15cf8963b30/em9pb" target="_blank">{!! $siteSections['btn.reservar_ahora'][0]['content'] !!}</a> <a class="btn-outline-reg mfp-close as-button" href="#services">{!! $siteSections['btn.volver'][0]['content'] !!}</a>
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
                            <img class="img-fluid" src="images/tour_de_perezosos_en_La_Fortuna.jpeg" alt="Tour de Perezosos En La Fortuna" title="Tour de perezosos en La Fortuna">    
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-7 col-xl-6">
                        <div class="text-container">
                            <div class="section-title">{!! $siteSections['acerca_de.titulo_principal'][0]['content'] !!}</div>
                            <h3 class="h3-black"> {!! $siteSections['acerca_de.titulo_secundario'][0]['content'] !!}</h3>
                            <p> {!! $siteSections['acerca_de.parrafo_descriptivo'][0]['content'] !!}</p>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">{!! $siteSections['acerca_de.item_1'][0]['content'] !!}</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">{!! $siteSections['acerca_de.item_2'][0]['content'] !!}</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">{!! $siteSections['acerca_de.item_3'][0]['content'] !!}</div>
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
                            <div class="section-title">{!! $siteSections['contact.titulo_principal'][0]['content'] !!}</div>
                            <h3 class="h3-black">{!! $siteSections['contact.titulo_secundario'][0]['content'] !!}</h3>
                            <p>{!! $siteSections['contact.parrafo_descriptivo'][0]['content'] !!}</p>
                            <ul class="list-unstyled li-space-lg">
                                <li class="address"><i class="fas fa-map-marker-alt"></i>{!! $siteSections['contact.direccion'][0]['content'] !!}</li>
                                <li><i class="fas fa-phone"></i><a href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">+506 8561 0404</a></li>
                                <li><i class="fas fa-envelope"></i><a href="mailto:info@slothsterritory.com" target="_blank">info@slothsterritory.com</a></li>
                            </ul>
                            <h3>{!! $siteSections['contact.titulo_redes_sociaes'][0]['content'] !!}</h3>

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
                                <label class="label-control" for="nombre">{!! $siteSections['formulario.nombre'][0]['content'] !!}</label>
                                <div id="error-nombre" class="text-danger"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="correo" class="form-control-input" id="correo" required>
                                <label class="label-control" for="correo">{!! $siteSections['formulario.correo'][0]['content'] !!}</label>
                                <div id="error-correo"  class="text-danger"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control-textarea" name="mensaje" id="mensaje" required></textarea>
                                <label class="label-control" for="mensaje">{!! $siteSections['formulario.mensaje'][0]['content'] !!}</label>
                                <div id="error-mensaje"  class="text-danger"></div>
                            </div>
                            {{-- <div class="form-group checkbox">
                                <input type="checkbox" id="cterms" value="Agreed-to-Terms" required>{!! $siteSections['formulario.acepta_politicas_parte_1'][0]['content'] !!}<a href="privacy-policy">{!! $siteSections['politicas_privacidad'][0]['content'] !!}</a>  <a href="terms-conditions">{!! $siteSections['terminos_condiciones'][0]['content'] !!}</a>
                                <div class="help-block with-errors"></div>
                            </div> --}}
                            <div class="form-group">
                                <button type="submit" id="botonFormulario" class="form-control-submit-button">{!! $siteSections['btn.enviar_mensaje'][0]['content'] !!} </button>
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
        @endsection

@section('scripts')
    <script>
        const form = document.getElementById('formularioMensaje')
        const botonFormulario = document.getElementById('botonFormulario')
        const coreoRegex = /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/

        botonFormulario.addEventListener('click', event => {
            event.preventDefault();
            enviarMensaje()
        })
        form.addEventListener('submit', event => {
            event.preventDefault();
            enviarMensaje()
        })

        function enviarMensaje(){
            const mensaje = {
                nombre: form['nombre'].value,
                correo: form['correo'].value,
                mensaje: form['mensaje'].value,
            }

            let elFormularioEsValido = true;

            Object.entries(mensaje).map(campo => {
                if(campo[0] == 'correo'){
                    console.log(coreoRegex.test(campo[1]))
                    if(!coreoRegex.test(campo[1])){
                        validarCorreo()
                        elFormularioEsValido = false;
                    }
                }
                if(!campo[1]){
                    validarFormulario(campo[0])
                    elFormularioEsValido = false;
                }
            })

            if(elFormularioEsValido){
                fetch('/mensaje',{
                    method: 'POST',
                    headers: {"Content-Type": "application/json"},
                    body: JSON.stringify(mensaje)
                })
                .then(response => response.json())
                .then(response => {
                    Swal.fire({
                        icon: 'success',
                        text: 'Gracias por contactarnos, te responderemos lo antes posible',
                        confirmButtonText: 'Cerrar',
                        confirmButtonColor: 'tomato'
                    })
                    form.reset()
                })
            }
        }


        function validarFormulario(campo){
            let campoError = document.getElementById(`error-${campo}`)
            campoError.innerHTML = "este campo es requerido";
            setTimeout(() => {
                campoError.innerHTML = ""
            }, 2000);
        }
        
        function validarCorreo(){
            let campoError = document.getElementById(`error-correo`)
            campoError.innerHTML = "debes ingresar un correo valido";
            setTimeout(() => {
                campoError.innerHTML = ""
            }, 2000);
        }
    </script>
@endsection
