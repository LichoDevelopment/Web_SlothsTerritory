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
            <h1 class="main-title mt-3"> {{__('inicio.titulo_principal')}} </h1>
            <p class="p-heading p-large"> {{__('inicio.parrafo_descriptivo')}}<div class=""></div></p>
            <div class="d-flex justify-content-center align-items-center">
                <a class="btn-solid-lg page-scroll" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">{{__('btn.reservar_ahora')}}</a>
            </div>
        </div>

        <!-- Intro -->
        <div id="intro" class="basic-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="text-container">
                            <div class="section-title">{{__('intro.titulo:principal')}}</div>
                            <h3 class="h3-black">{{__('intro.titulo_secundario')}}</h3>
                            <p> {{__('intro.parrafo_descriptivo')}}</p>
                            <div class="testimonial-author">{{__('intro.testimonial')}}</div>
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


        <!-- Services -->
        <div id="services" class="cards-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">{{__('service.titulo_principal')}}</div>
                        <h2 class="h2-services">{{__('services.titulo_secundario_parte_1')}} <br>{{__('services.titulo_secundario_parte_2')}} </h2>
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
                                <h3 class="card-title">{{__('service.vista_previa.tour_diurno.titulo')}}</h3>
                                <p class="p-services">{{__('service.vista_previa.tour_diurno.parrafo')}}</p>
                                <ul class="list-unstyled li-space-lg">
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body media-body-service">{{__('service.vista_previa.tour_diurno.item_1')}}</div>
                                    </li>
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body media-body-service">{{__('service.vista_previa.tour_diurno.item_2')}}</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="button-container">
                            <a class="popup-with-move-anim" href="#tour-diurno"><div class="btn-solid-reg page-scroll">{{__('btn.mas_detalles')}}</div></a> 
                                <!-- <a class="btn-solid-reg page-scroll" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">{{__('btn.mas_detalles')}}</a> -->
                            </div> <!-- end of button-container -->
                        </div>
                        <!-- end of card -->

                        <!-- Card -->
                        <div class="card">
                            <div class="card-image">
                                <img class="img-fluid" src="images/tour_nocturno-Sloth_s_Territory_La_Fortuna.jpeg" alt="tour nocturno de perezosos en Sloths Territory en La Fortuna" title="Tour nocturno La Fortuna Sloth's Territory" width="350px" height="258px">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">{{__('service.vista_previa.tour_nocturno.titulo')}}</h3>
                                <p class="p-services">{{__('service.vista_previa.tour_nocturno.parrafo')}}</p>
                                <ul class="list-unstyled li-space-lg">
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body media-body-service">{{__('service.vista_previa.tour_nocturno.item_1')}}</div>
                                    </li>
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body media-body-service">{{__('service.vista_previa.tour_nocturno.item_2')}}</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="button-container">
                                <!-- <a class="btn-solid-reg page-scroll" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">{{__('btn.mas_detalles')}}</a> -->
                                <a class="popup-with-move-anim" href="#tour-nocturno"><div class="btn-solid-reg page-scroll">{{__('btn.mas_detalles')}}</div></a>
                            </div> <!-- end of button-container -->
                        </div>
                        <!-- end of card -->

                        <!-- Card -->
                        <div class="card">
                            <div class="card-image">
                                <img class="img-fluidLateral" src="images/aves/halcon-blanco-gavilan.jpg" alt="Aves en La Fortuna Sloth's Territory" title="lechuzón en Sloth's Territory Fortuna" width="350px" height="258px">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">{{__('service.vista_previa.tour_aves.titulo')}}</h3>
                                <p class="p-services">{{__('service.vista_previa.tour_aves.parrafo')}}</p>
                                <ul class="list-unstyled li-space-lg">
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body media-body-service">{{__('service.vista_previa.tour_aves.item_1')}}</div>
                                    </li>
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body media-body-service">{{__('service.vista_previa.tour_aves.item_2')}}</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="button-container">
                            <a class="popup-with-move-anim" href="#tour-aves"><div class="btn-solid-reg page-scroll">{{__('btn.mas_detalles')}}</div></a>
                                <!-- <a class="btn-solid-reg page-scroll" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">{{__('btn.mas_detalles')}}</a> -->
                            </div> <!-- end of button-container -->
                        </div>
                        <!-- end of card -->

                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of cards-2 -->
        <!-- end of services -->

        <div class="container-combo-img container">
            <a href="{{ route('combos', $locale) }}" class="d-flex justify-content-center">
                <img class="combo-preview-img" src="{{ asset('images/combo-preview-img.jpeg') }}" alt="">
            </a>

        </div>


        <!-- Details 1 -->
        <div class="container">
            <div id="details" class="accordion">
                <div class="area-1 container">
                </div><!-- end of area-1 on same line and no space between comments to eliminate margin white space --><div class="area-2">

                    <!-- Accordion -->
                    <div class="accordion-container" id="accordionOne">
                        <h2>{{__('details.titulo_principal')}}
                            <img src="{{ asset('/images/banderas/cr.png')  }}" height="25" width="25" alt="bandera de costa rica">
                            Costa Rica
                            <img src="{{ asset('/images/banderas/cr.png')  }}" height="25" width="25" alt="bandera de costa rica">
                        </h2>
{{--                        <div class="item">--}}
{{--                            <div id="headingOne">--}}
{{--                                <span data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" role="button">--}}
{{--                                    <span class="circle-numbering">1</span><span class="accordion-title">{{__('details.item_1.titulo')}}</span>--}}
{{--                                </span>--}}
{{--                            </div>--}}
{{--                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionOne">--}}
{{--                                <div class="accordion-body">--}}
{{--                                    {{__('details.item_1.parrafo')}}--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div> <!-- end of item -->--}}

                        <div class="item">
{{--                            <div id="headingTwo">--}}
{{--                                <span class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" role="button">--}}
{{--                                    <span class="circle-numbering">2</span><span class="accordion-title">{{__('details.item_2.titulo')}} </span>--}}
{{--                                </span>--}}
{{--                            </div>--}}
                            <div aria-labelledby="headingTwo" data-parent="#accordionOne">
                                <div class="accordion-body">
                                    {{__('details.item_2.parrafo')}}

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
                        <div class="section-title"> {{__('galeria.titulo_principal')}}</div>
                        <h3 class="h3-black"> {{__('galeria.titulo_secundario')}}</h3>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Filter -->
                        <div class="button-group filters-button-group">
                            <a class="button is-checked" data-filter="*"><span>{{__('galeria.filtro.ver_todo')}}</span></a>
                            <a class="button" data-filter=".sloths"><span>{{__('galeria.filtro.sloths')}}</span></a>
                            <a class="button" data-filter=".ranas"><span>{{__('galeria.filtro.ranas')}}</span></a>
                            <a class="button" data-filter=".monos"><span>{{__('galeria.filtro.monos')}}</span></a>
                            <a class="button" data-filter=".aves"><span>{{__('galeria.filtro.aves')}}</span></a>
                            <a class="button" data-filter=".otras"><span>{{__('galeria.filtro.otras')}}</span></a>
                        </div> <!-- end of button group -->
                        <div class="grid">
                            <div class="element-item sloths">
                                <a class="popup-with-move-anim" href="#tour-1">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/perezosos/perezosos-Sloth_s_Territory_Fortuna.jpeg" 
                                    alt="bebe perezoso en La Fortuna de San Carlos Sloth Territory"
                                    title="bebe perezoso en Fortuna">
                                </a>
                            </div>
                            <div class="element-item sloths">
                                <a class="popup-with-move-anim" href="#tour-2">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/perezosos/oso_perezoso_de_tres_dedos-Sloth_Terirtory_Fortuna.jpeg" 
                                    alt="oso perezoso de tres dedo en Sloths Territory Fortuna"
                                    title="Oso perezoso en La Fortuna de San Carlos">
                                </a>
                            </div>
                            <div class="element-item sloths">
                                <a class="popup-with-move-anim" href="#tour-3">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/perezosos/perezoso_en_La_Fortuna_de_San_Carlos.jpeg" 
                                    alt="Perezoso en La Fortuna de San Carlos Volcán Arenal"
                                    title="Perezosos en la Fortuna de San Carlos">
                                </a>
                            </div>
                            <div class="element-item sloths">
                                <a class="popup-with-move-anim" href="#tour-4">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/perezosos/perezoso_en_Costa_Rica-Sloth_s_Territory_La_Fortuna.jpeg" 
                                    alt="bebe perezoso en Sloth's Territory Fortuna San Carlos"
                                    title="La Fortuna perezosos">
                                </a>
                            </div>
                            <div class="element-item design ranas marketing">
                                <a class="popup-with-move-anim" href="#tour-5">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/ranas/rana_flecha_roja_en_Fortuna_San_Carlos.jpeg" 
                                    alt="Rana flecha roja en La Fortuna de San Carlos en SLoth's Territory"
                                    title="Rana felcha roja Sloth´s Territory Fortuna">
                                </a>
                            </div>
                            <div class="element-item design ranas marketing">
                                <a class="popup-with-move-anim" href="#tour-6">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/ranas/rana_verde_ojos_rojos-Fortuna_San_Carlos.jpeg" 
                                    alt="rana verde ojos rojos Fortuna San Carlos Sloth´s Territory"
                                    title="ranas en Sloth´s Territory">
                                </a>
                            </div>
                            <div class="element-item design ranas marketing">
                                <a class="popup-with-move-anim" href="#tour-7">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/ranas/ranas_en_La_Fortuna.jpeg" 
                                    alt="ranas en La Fortuna de San Carlos"
                                    title="Ranas en La Fortuna">
                                </a>
                            </div>
                            <div class="element-item design monos">
                                <a class="popup-with-move-anim" href="#tour-8">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/monos/mono_aullador-alouatta-La_Fortuna.jpeg" 
                                    alt="Mono aullador en La Fortuna"
                                    title="Mono aullador en Fortuna">
                                </a>
                            </div>
                            <div class="element-item design aves">
                                <a class="popup-with-move-anim" href="#tour-9">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/aves/lechuzon-La_Fortuna_San_Carlos.jpeg" 
                                    alt="Lechuzon en La Fortuna de San Carlos"
                                    title="Lechuzon en La Fortuna">
                                </a>
                            </div>
                            <div class="element-item design aves">
                                <a class="popup-with-move-anim" href="#tour-10">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/aves/ave_martin_pescador_La_Fortuna.jpeg" 
                                    alt="ave martin pescador en La Fortuna de San Carlos"
                                    title="Ave martín pescador en Costa Rica">
                                </a>
                            </div>
                            <div class="element-item design otras">
                                <a class="popup-with-move-anim" href="#tour-11">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/otras-especies/serpientes-La_Fortuna_de_San_Carlos.jpeg" 
                                    alt="Serpientes en La Fortuna de San Carlos"
                                    title="Serpientes en La Fortuna">
                                </a>
                            </div>
                            <div class="element-item design otras">
                                <a class="popup-with-move-anim" href="#tour-12">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/otras-especies/leopardo_en_La_Fortuna-manigordo_en_La_Fortuna.jpeg" 
                                    alt="leopardo en la Fortuna de San Carlos"
                                    title="Leopardo en La Fortuna">
                                </a>
                            </div>
                            <div class="element-item design otras">
                                <a class="popup-with-move-anim" href="#tour-13">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/otras-especies/serpiente_boa_en_La_Fortuna_de_San_Carlos.jpeg" 
                                    alt="Serpiente Boa en La Fortuna en Sloth's Territory"
                                    title="Serpiente en La Fortuna">
                                </a>
                            </div>
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
        <!-- Lightbox -->
        <div id="tour-1" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="">
                    <img class="img-fluid" loading="lazy" 
                    src="images/perezosos/perezosos-Sloth_s_Territory_Fortuna.jpeg" 
                    alt="Perezoso en La Fortuna"
                    title="Perezosos en La Fortuna de San Carlos Volcán Arenal">
                </div> <!-- end of col -->
                {{-- <div class="col-lg-4">
                    <h3>perezoso</h3>
                    <hr class="line-heading">
                    <h6>Algo de info sub titulo</h6>
                    <p>Info sobre...</p>
                    <p>Info sobre...</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">Parrafo sobre comentario de algo.</p>
                        <p class="testimonial-author">Tipo de animal o no se...</p>
                    </div>
                    <a class="btn-solid-reg" href="#your-link">DETAILS (redirecciona a otra página)</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">{{__('btn.volver')}}</a>
                </div> <!-- end of col --> --}}
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->

        <!-- Lightbox -->
        <div id="tour-2" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="">
                    <img class="img-fluid" loading="lazy" 
                    src="images/perezosos/oso_perezoso_de_tres_dedos-Sloth_Terirtory_Fortuna.jpeg" 
                    alt="Perezoso de tres dedo en La Fortuna"
                    title="Perezoso de 3 dedos en La Fortuna">
                </div> <!-- end of col -->
                {{-- <div class="col-lg-4">
                    <h3>Juanito</h3>
                    <hr class="line-heading">
                    <h6>Info</h6>
                    <p>Info</p>
                    <p>indo</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">Parrafo </p>
                        <p class="testimonial-author">Tipo</p>
                    </div>
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">{{__('btn.volver')}}</a>
                </div> <!-- end of col --> --}}
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->

        <!-- Lightbox -->
        <div id="tour-3" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="">
                    <img class="img-fluid" loading="lazy" 
                    src="images/perezosos/perezoso_en_La_Fortuna_de_San_Carlos.jpeg" 
                    alt="Perezoso en La Fortuna de San Carlos"
                    title="Perezosos en La Fortuna en Sloth's Territory">
                </div> <!-- end of col -->
                {{-- <div class="col-lg-4">
                    <h3>Bofw</h3>
                    <hr class="line-heading">
                    <h6>Strategy Development</h6>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p class="testimonial-author">General Manager</p>
                    </div>
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">{{__('btn.volver')}}</a>
                </div> <!-- end of col --> --}}
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->

        <!-- Lightbox -->
        <div id="tour-4" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="">
                    <img class="img-fluid" loading="lazy" 
                    src="images/perezosos/perezoso_en_Costa_Rica-Sloth_s_Territory_La_Fortuna.jpeg" 
                    alt="bebé perezosos en La Fortuna de San Carlos"
                    title="Bebé perezoso en La Fortuna">
                </div> <!-- end of col -->
                {{-- <div class="col-lg-4">
                    <h3>Ipsum</h3>
                    <hr class="line-heading">
                    <h6>Strategy Development</h6>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p class="testimonial-author">General Manager</p>
                    </div>
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">{{__('btn.volver')}}</a>
                </div> <!-- end of col --> --}}
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->

        <!-- Lightbox -->
        <div id="tour-5" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="">
                    <img class="img-fluid" loading="lazy" 
                    src="images/ranas/rana_flecha_roja_en_Fortuna_San_Carlos.jpeg" 
                    alt="rana flecha roja en La Fortuna"
                    title="rana flecha roja La Fortuna de San Carlos">
                </div> <!-- end of col -->
                {{-- <div class="col-lg-4">
                    <h3>IMpsu</h3>
                    <hr class="line-heading">
                    <h6>Strategy Development</h6>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p class="testimonial-author">General Manager</p>
                    </div>
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">{{__('btn.volver')}}</a>
                </div> <!-- end of col --> --}}
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->

        <!-- Lightbox -->
        <div id="tour-6" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="">
                    <img class="img-fluid" loading="lazy" 
                    src="images/ranas/rana_verde_ojos_rojos-Fortuna_San_Carlos.jpeg" 
                    alt="rana de ojos rojos en La Fortuna"
                    title="rana de ojos rojos">
                </div> <!-- end of col -->
                {{-- <div class="col-lg-4">
                    <h3>Ipsum</h3>
                    <hr class="line-heading">
                    <h6>Strategy Development</h6>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p class="testimonial-author">General Manager</p>
                    </div>
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">{{__('btn.volver')}}</a>
                </div> <!-- end of col --> --}}
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->

        <!-- Lightbox -->
        <div id="tour-7" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="">
                    <img class="img-fluid" loading="lazy" 
                    src="images/ranas/ranas_en_La_Fortuna.jpeg" 
                    alt="ranas en La Fortuna de San carlos"
                    title="Ranas en La Fortuna">
                </div> <!-- end of col -->
                {{-- <div class="col-lg-4">
                    <h3>CIPSU</h3>
                    <hr class="line-heading">
                    <h6>Strategy Development</h6>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p class="testimonial-author">General Manager</p>
                    </div>
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">{{__('btn.volver')}}</a>
                </div> <!-- end of col --> --}}
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->

        <!-- Lightbox -->
        <div id="tour-8" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row justify-content-center">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="">
                    <img class="img-fluid" loading="lazy" 
                    src="images/monos/mono_aullador-alouatta-La_Fortuna.jpeg" 
                    alt="mono aullador en Sloth Territory La Fortuna"
                    title="mono aullador en La Fortuna">
                </div> <!-- end of col -->
                {{-- <div class="col-lg-10">
                    <h3>sub algo</h3>
                    <hr class="line-heading">
                    <h6>Strategy Development</h6>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p class="testimonial-author">General Manager</p>
                    </div>
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">{{__('btn.volver')}}</a>
                </div> <!-- end of col --> --}}
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->
        <!-- Lightbox -->
        <div id="tour-9" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row justify-content-center">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="">
                    <img class="img-fluid" loading="lazy" 
                    src="images/aves/lechuzon-La_Fortuna_San_Carlos.jpeg" 
                    alt="lechuzon en Fortuna Costa Rica"
                    title="Lechuzón en La Fortuna de San carlos">
                </div> <!-- end of col -->
                {{-- <div class="col-lg-10">
                    <h3>sub algo</h3>
                    <hr class="line-heading">
                    <h6>Strategy Development</h6>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p class="testimonial-author">General Manager</p>
                    </div>
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">{{__('btn.volver')}}</a>
                </div> <!-- end of col --> --}}
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->
        <!-- Lightbox -->
        <div id="tour-10" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row justify-content-center">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="">
                    <img class="img-fluid" loading="lazy" 
                    src="images/aves/ave_martin_pescador_La_Fortuna.jpeg" 
                    alt="ave martin pescador en La Fortuna"
                    title="Ave martin pescador en La Fortuna">
                </div> <!-- end of col -->
                {{-- <div class="col-lg-10">
                    <h3>sub algo</h3>
                    <hr class="line-heading">
                    <h6>Strategy Development</h6>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p class="testimonial-author">General Manager</p>
                    </div>
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">{{__('btn.volver')}}</a>
                </div> <!-- end of col --> --}}
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->
        <!-- Lightbox -->
        <div id="tour-11" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row justify-content-center">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="">
                    <img class="img-fluid" loading="lazy" 
                    src="images/otras-especies/serpientes-La_Fortuna_de_San_Carlos.jpeg" 
                    alt="serpiente en La Fortuna de San Carlos"
                    title="Serpientes en La Fortuna">
                </div> <!-- end of col -->
                {{-- <div class="col-lg-10">
                    <h3>sub algo</h3>
                    <hr class="line-heading">
                    <h6>Strategy Development</h6>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p class="testimonial-author">General Manager</p>
                    </div>
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">{{__('btn.volver')}}</a>
                </div> <!-- end of col --> --}}
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->
        <!-- Lightbox -->
        <div id="tour-12" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row justify-content-center">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="">
                    <img class="img-fluid" loading="lazy"
                    src="images/otras-especies/leopardo_en_La_Fortuna-manigordo_en_La_Fortuna.jpeg" 
                    alt="Leopardo en La Fortuna, Ocelote en La Fortuna"
                    title="Leoparto, Ocelote en La Fortuna">
                </div> <!-- end of col -->
                {{-- <div class="col-lg-10">
                    <h3>sub algo</h3>
                    <hr class="line-heading">
                    <h6>Strategy Development</h6>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p class="testimonial-author">General Manager</p>
                    </div>
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">{{__('btn.volver')}}</a>
                </div> <!-- end of col --> --}}
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->
        <!-- Lightbox -->
        <div id="tour-13" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row justify-content-center">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="">
                    <img class="img-fluid" 
                    loading="lazy"
                    src="images/otras-especies/serpiente_boa_en_La_Fortuna_de_San_Carlos.jpeg" 
                    alt="Serpiente en La Fortuna de  San Carlos"
                    title="Serpiente en La Fortuna">
                </div> <!-- end of col -->
                {{-- <div class="col-lg-10">
                    <h3>sub algo</h3>
                    <hr class="line-heading">
                    <h6>Strategy Development</h6>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p class="testimonial-author">General Manager</p>
                    </div>
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">{{__('btn.volver')}}</a>
                </div> <!-- end of col --> --}}
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->


        <div id="tour-diurno" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row justify-content-center">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-10">
                    <img class="img-fluid" src="images/otras-especies/perezosos-sloth_s_territory_Fortuna_de_San_Carlos.jpg" alt="tour de perezosos en La Fortuna" title="Tour de perezosos">
                </div> <!-- end of col -->
                <div class="col-lg-10">
                    <h3>{{__('service.tour_diurno.info.titulo_principal')}}</h3>
                    <hr class="line-heading">
                    <h6>{{__('service.tour_diurno.info.titulo_secundario_1')}}</h6>
                    <p>{{__('service.tour_diurno.info.parrafo_1')}}</p>
                    <p>{{__('service.tour_diurno.info.parrafo_2')}}</p>
                    <p>{{__('service.tour_diurno.info.parrafo_3')}}.</p>
                    <p>{{__('service.tour_diurno.info.parrafo_4')}}</p>
                    <p>{{__('service.tour_diurno.info.parrafo_5')}}</p>
                    <p>{{__('service.tour_diurno.info.parrafo_6')}}</p>
                    <h6>{{__('service.todos.info.titulo_secundario_2')}}</h6>
                    <p>{{__('service.todos.info.que_llevar_1')}}</p>
                    <p>{{__('service.todos.info.que_llevar_2')}}</p>
                    <p>{{__('service.todos.info.que_llevar_3')}}</p>
                    <p>{{__('service.todos.info.que_llevar_4')}}</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">{{__('service.todos.info.parrafo_testimonial')}}</p>
                    </div>
                    <a class="btn-solid-reg" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">{{__('btn.reservar_ahora')}}</a> <a class="btn-outline-reg mfp-close as-button" href="#services">{{__('btn.volver')}}</a>
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
                    <h3>{{__('service.tour_nocturno.info.titulo_principal')}}</h3>
                    <hr class="line-heading">
                    <h6>{{__('service.tour_nocturno.info.titulo_secundario_1')}}</h6>
                    <p>{{__('service.tour_nocturno.info.parrafo_1')}}</p>
                    <p>{{__('service.tour_nocturno.info.parrafo_2')}}</p>
                    <p>{{__('service.tour_nocturno.info.parrafo_3')}}</p>
                    <p>{{__('service.tour_nocturno.info.parrafo_4')}}</p>
                    <p>{{__('service.tour_nocturno.info.parrafo_5')}}</p>
                    <p>{{__('service.tour_nocturno.info.parrafo_6')}}</p>
                    <h6>{{__('service.todos.info.titulo_secundario_2')}}</h6>
                    <p>{{__('service.todos.info.que_llevar_1')}}</p>
                    <p>{{__('service.todos.info.que_llevar_2')}}</p>
                    <p>{{__('service.todos.info.que_llevar_3')}}</p>
                    <p>{{__('service.todos.info.que_llevar_4')}}</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">{{__('service.todos.info.parrafo_testimonial')}}</p>
                    </div>
                    <a class="btn-solid-reg" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">{{__('btn.reservar_ahora')}}</a> <a class="btn-outline-reg mfp-close as-button" href="#services">{{__('btn.volver')}}</a>
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
                    <h3>{{__('service.tour_aves.info.titulo_principal')}}</h3>
                    <hr class="line-heading">
                    <h6>{{__('service.tour_aves.info.titulo_secundario_1')}}</h6>
                    <p>{{__('service.tour_aves.info.parrafo_1')}}</p>
                    <p>{{__('service.tour_aves.info.parrafo_2')}}</p>
                    <p>{{__('service.tour_aves.info.parrafo_3')}}</p>
                    <p>{{__('service.tour_aves.info.parrafo_4')}}</p>
                    <p>{{__('service.tour_aves.info.parrafo_5')}}</p>
                    <p>{{__('service.tour_aves.info.parrafo_6')}}</p>
                    <h6>{{__('service.todos.info.titulo_secundario_2')}}</h6>
                    <p>{{__('service.todos.info.que_llevar_1')}}</p>
                    <p>{{__('service.todos.info.que_llevar_2')}}</p>
                    <p>{{__('service.todos.info.que_llevar_3')}}</p>
                    <p>{{__('service.tour_aves.info.que_llevar_5')}}</p>
                    <p>{{__('service.tour_aves.info.que_llevar_6')}}</p>
                    <p>{{__('service.tour_aves.info.que_llevar_7')}}</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">{{__('service.todos.info.parrafo_testimonial')}}</p>
                    </div>
                    <a class="btn-solid-reg" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">{{__('btn.reservar_ahora')}}</a> <a class="btn-outline-reg mfp-close as-button" href="#services">{{__('btn.volver')}}</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->
        <!-- end of tour lightboxes -->

        <!-- Team -->
        {{-- <div class="basic-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>{{__('fundadores.titulo_principal')}}</h2>
                        <!-- <p class="p-heading"> PENDIENTE</p> -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Team Member -->
                        <div class="team-member">
                            <div class="image-wrapper">
                                <img class="img-fluid" src="images/team-1.png" alt="trabajadores de turiísmo en La Fortuna" title="Turismo La Fortuna">
                            </div> <!-- end of image-wrapper -->
                            <p class="p-large">Keilor</p>
                            <!-- <p class="job-title">Alguna característica</p> -->
                            <span class="social-icons">
                                <span class="fa-stack">
                                    <a href="https://www.facebook.com/Sloths.Territory.2018" target="_blank"> --}}
                                        {{-- <span class="hexagon"></span> --}}
                                        {{-- <i class="fab fa-facebook-f fa-stack-1x"></i>
                                    </a>
                                </span>
                            </span>
                        </div> <!-- end of team-member -->
                        <!-- end of team member -->

                        <!-- Team Member -->
                        <div class="team-member">
                            <div class="image-wrapper">
                                <img class="img-fluid" src="images/team-2.png" alt="Perezosos La Fortuna" title="Perezosos en La Fortuna">
                            </div> <!-- end of image wrapper -->
                            <p class="p-large">Oscar</p>
                            <!-- <p class="job-title">Alguna característica</p> -->
                            <span class="social-icons">
                                <span class="fa-stack">
                                    <a href="https://www.facebook.com/Sloths.Territory.2018" target="_blank">
                                        <span class="hexagon"></span> --}}
                                        {{-- <i class="fab fa-facebook-f fa-stack-1x"></i>
                                    </a>
                                </span>
                            </span>
                        </div> <!-- end of team-member -->
                        <!-- end of team member --> --}}

                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of basic-2 -->
        <!-- end of team -->


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
                            <div class="section-title">{{__('acerca_de.titulo_principal')}}</div>
                            <h3 class="h3-black"> {{__('acerca_de.titulo_secundario')}}</h3>
                            <p> {{__('acerca_de.parrafo_descriptivo')}}</p>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">{{__('acerca_de.item_1')}}</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">{{__('acerca_de.item_2')}}</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">{{__('acerca_de.item_3')}}</div>
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
                            <div class="section-title">{{__('contact.titulo_principal')}}</div>
                            <h3 class="h3-black">{{__('contact.titulo_secundario')}}</h3>
                            <p>{{__('contact.parrafo_descriptivo')}}</p>
                            <ul class="list-unstyled li-space-lg">
                                <li class="address"><i class="fas fa-map-marker-alt"></i>{{__('contact.direccion')}}</li>
                                <li><i class="fas fa-phone"></i><a href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">+506 8561 0404</a></li>
                                <li><i class="fas fa-envelope"></i><a href="mailto:sloths.territory@gmail.com" target="_blank">sloths.territory@gmail.com</a></li>
                            </ul>
                            <h3>{{__('contact.titulo_redes_sociaes')}}</h3>

                            <span class="fa-stack">
                            <a href="https://www.facebook.com/Sloths.Territory.2018" target="_blank">
                                    {{-- <span class="hexagon"></span> --}}
                                    <i class="fab fa-facebook-f fa-stack-1x-face"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                            <a href="https://www.instagram.com/slothsterritory/" target="_blank">
                                    {{-- <span class="hexagon"></span> --}}
                                    <i class="fab fa-instagram fa-stack-1x-insta"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="https://www.youtube.com/channel/UCKqtM7YiCFUtcYs5j8B5hgw" target="_blank">
                                    {{-- <span class="hexagon"></span> --}}
                                    <i class="fab fa-youtube fa-stack-1x-youtu"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="https://www.tripadvisor.com/UserReviewEdit-g309226-d15636276-Sloth_s_Territory-La_Fortuna_de_San_Carlos_Arenal_Volcano_National_Park_Province_of_Alajuela.html" target="_blank">
                                    {{-- <span class="hexagon"></span> --}}
                                    <i class="fab fa-tripadvisor fa-stack-1x-trip"></i>
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
                                <label class="label-control" for="nombre">{{__('formulario.nombre')}}</label>
                                <div id="error-nombre" class="text-danger"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="correo" class="form-control-input" id="correo" required>
                                <label class="label-control" for="correo">{{__('formulario.correo')}}</label>
                                <div id="error-correo"  class="text-danger"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control-textarea" name="mensaje" id="mensaje" required></textarea>
                                <label class="label-control" for="mensaje">{{__('formulario.mensaje')}}</label>
                                <div id="error-mensaje"  class="text-danger"></div>
                            </div>
                            {{-- <div class="form-group checkbox">
                                <input type="checkbox" id="cterms" value="Agreed-to-Terms" required>{{__('formulario.acepta_politicas_parte_1')}}<a href="privacy-policy">{{__('politicas_privacidad')}}</a>  <a href="terms-conditions">{{__('terminos_condiciones')}}</a>
                                <div class="help-block with-errors"></div>
                            </div> --}}
                            <div class="form-group">
                                <button type="submit" id="botonFormulario" class="form-control-submit-button">{{__('btn.enviar_mensaje')}} </button>
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
