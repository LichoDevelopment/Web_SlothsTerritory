@extends('layouts.app')

@section('content')

        <div id="header" class="container-all">
            <input type="radio" id="1" name="image-slide" hidden/>
            <input type="radio" id="2" name="image-slide" hidden/>
            <input type="radio" id="3" name="image-slide" hidden/>

            <div class="slide">
                <div class="item-slide">
                    <img class="imgs" src="images/sliderPrincipal/bebe-perezoso-y-madre-perezosa-durmiendo-en-un-arbol.jpeg" alt="Mamá perezosa y su bebé durmiendo en un arbol" title="Bebé perezoso y su madre">
                </div>
                <div class="item-slide" >
                    <img class="imgs" src="images/sliderPrincipal/bebe-perezoso-con-su-madre-bradypus-variegatus.jpeg" alt="Mamá perezosa y su bebé" title="Mamá perezosa y su bebé">
                </div>
                <div class="item-slide">
                    <img class="imgs" src="images/sliderPrincipal/tierno-oso-perezoso-en-la-fortuna-sloths-territory.jpeg"  alt="Oso perezoso en La Fortuna de San Carlos" title="Oso perezoso">
                </div>
            </div>
            <div class="pagination">
                <label class="pagination-item" for="1">
                    <img src="images/sliderPrincipal/bebe-perezoso-y-madre-perezosa-durmiendo-en-un-arbol.jpeg" alt="Bebé perezoso duerme junto a su madre en la Fortuna de San Carlos" title="Perezosos durmiendo" width="16px" height="12px">
                </label>
                <label class="pagination-item" for="2">
                    <img src="images/sliderPrincipal/bebe-perezoso-con-su-madre-bradypus-variegatus.jpeg" alt="Perezosos en la Fortuna" title="Perezosos durmiendo" width="16px" height="12px">
                </label>
                <label class="pagination-item" for="3">
                    <img src="images/sliderPrincipal/tierno-oso-perezoso-en-la-fortuna-sloths-territory.jpeg" alt="Perezosos en la Fortuna Costa Rica" title="Perezoso" width="16px" height="12px">
                </label>

            </div>
        </div>
        <div class="container">
            <h1 class="main-title mt-3"> {{__('inicio.titulo_principal')}} </h1>
            <p class="p-heading p-large"> {{__('inicio.parrafo_descriptivo')}}<div class=""></div></p>
            <div class="d-flex justify-content-center align-items-center">
                <a class="btn-solid-lg page-scroll" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">{{__('btn.reservar_ahora')}}</a>
            </div>
        </div>
Z


        <!-- Intro -->
        <div id="intro" class="basic-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="text-container">
                            <div class="section-title">{{__('intro.titulo:principal')}}</div>
                            <h2>{{__('intro.titulo_secundario')}}</h2>
                            <p> {{__('intro.parrafo_descriptivo')}}</p>
                            <div class="testimonial-author">{{__('intro.testimonial')}}</div>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-7">
                        <div class="image-container">
                            <img class="img-fluid" src="images/otras-especies/tours-en-sloths-territory.jpeg" alt="Senderos La Fortuna de San Carlos" title="Senderos Sloths Territory" height="400px" width="450px">
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
                        <h2>{{__('services.titulo_secundario_parte_1')}} <br>{{__('services.titulo_secundario_parte_2')}} </h2>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
                <div class="row">
                    <div class="col-lg-12">

                        <!-- Card -->
                        <div class="card">
                            <div class="card-image">
                                <img class="img-fluid" src="images/otras-especies/senderos-sloths-territory.jpeg" alt="Sendero para ver perezosos en la Fortuna de San Carlos" title="Sendero Sloths Territory" width="350px" height="258px">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">{{__('service.vista_previa.tour_diurno.titulo')}}</h3>
                                <p>{{__('service.vista_previa.tour_diurno.parrafo')}}</p>
                                <ul class="list-unstyled li-space-lg">
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body">{{__('service.vista_previa.tour_diurno.item_1')}}</div>
                                    </li>
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body">{{__('service.vista_previa.tour_diurno.item_2')}}</div>
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
                                <img class="img-fluid" src="images/tour-nocturno.jpeg" alt="tour nocturno Sloths Territory La Fortuna" title="Tour nocturno La Fortuna" width="350px" height="258px">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">{{__('service.vista_previa.tour_nocturno.titulo')}}</h3>
                                <p>{{__('service.vista_previa.tour_nocturno.parrafo')}}</p>
                                <ul class="list-unstyled li-space-lg">
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body">{{__('service.vista_previa.tour_nocturno.item_1')}}</div>
                                    </li>
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body">{{__('service.vista_previa.tour_nocturno.item_2')}}</div>
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
                                <img class="img-fluid" src="images/aves/halcon-blanco-gavilan.jpeg" alt="magníficas aves en la Fortuna" title="lechuzón en Sloths Territory" width="350px" height="258px">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">{{__('service.vista_previa.tour_aves.titulo')}}</h3>
                                <p>{{__('service.vista_previa.tour_aves.parrafo')}}</p>
                                <ul class="list-unstyled li-space-lg">
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body">{{__('service.vista_previa.tour_aves.item_1')}}</div>
                                    </li>
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body">{{__('service.vista_previa.tour_aves.item_2')}}</div>
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


        <!-- Details 1 -->
        <div class="container">
            <div id="details" class="accordion">
                <div class="area-1 container">
                </div><!-- end of area-1 on same line and no space between comments to eliminate margin white space --><div class="area-2">

                    <!-- Accordion -->
                    <div class="accordion-container" id="accordionOne">
                        <h2>{{__('details.titulo_principal')}}</h2>
                        <div class="item">
                            <div id="headingOne">
                                <span data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" role="button">
                                    <span class="circle-numbering">1</span><span class="accordion-title">{{__('details.item_1.titulo')}}</span>
                                </span>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionOne">
                                <div class="accordion-body">
                                    {{__('details.item_1.parrafo')}}
                                </div>
                            </div>
                        </div> <!-- end of item -->

                        <div class="item">
                            <div id="headingTwo">
                                <span class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" role="button">
                                    <span class="circle-numbering">2</span><span class="accordion-title">{{__('details.item_2.titulo')}} </span>
                                </span>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionOne">
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
                        <h2> {{__('galeria.titulo_secundario')}}</h2>
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
                                    <img loading="lazy" src="images/perezosos/bebe-perezoso-y-madre-perezosa-durmiendo-en-un-arbol-.jpeg" 
                                    alt="bebe perezoso y madre perezosa durmiendo en un arbol">
                                </a>
                            </div>
                            <div class="element-item sloths">
                                <a class="popup-with-move-anim" href="#tour-2">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/perezosos/oso-perezoso-de-tres-dedos.jpeg" 
                                    alt="oso perezoso de tres dedo">
                                </a>
                            </div>
                            <div class="element-item sloths">
                                <a class="popup-with-move-anim" href="#tour-3">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/perezosos/perezoso-en-la-fortuna-de-san-carlos.jpeg" 
                                    alt="perezoso en la fortuna de san carlos">
                                </a>
                            </div>
                            <div class="element-item sloths">
                                <a class="popup-with-move-anim" href="#tour-4">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/perezosos/bebe-perezoso-durmiendo-en-costa-rica.jpeg" 
                                    alt="bebe perezoso durmiendo en costa rica">
                                </a>
                            </div>
                            <div class="element-item design ranas marketing">
                                <a class="popup-with-move-anim" href="#tour-5">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/ranas/rana-flecha-roja-azul-costa-rica.jpeg" 
                                    alt="rana flecha roja azul costa rica">
                                </a>
                            </div>
                            <div class="element-item design ranas marketing">
                                <a class="popup-with-move-anim" href="#tour-6">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/ranas/rana-verde-ojos-rojos.jpeg" 
                                    alt="rana verde ojos rojos">
                                </a>
                            </div>
                            <div class="element-item design ranas marketing">
                                <a class="popup-with-move-anim" href="#tour-7">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/ranas/rana-.jpeg" 
                                    alt="rana">
                                </a>
                            </div>
                            <div class="element-item design monos">
                                <a class="popup-with-move-anim" href="#tour-8">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/monos/mono-aullador-alouatta-palliata-america-central.jpeg" 
                                    alt="mono aullador alouatta palliata america central">
                                </a>
                            </div>
                            <div class="element-item design aves">
                                <a class="popup-with-move-anim" href="#tour-9">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/aves/lechuzon-fortuna-costa-rica-.jpeg" 
                                    alt="lechuzon fortuna costa rica">
                                </a>
                            </div>
                            <div class="element-item design aves">
                                <a class="popup-with-move-anim" href="#tour-10">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/aves/ave-martin-pescador-collar-coraciforme.jpeg" 
                                    alt="ave martin pescador collar coraciforme">
                                </a>
                            </div>
                            <div class="element-item design otras">
                                <a class="popup-with-move-anim" href="#tour-11">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/otras-especies/serpiente-negra-y-amarillo.jpeg" 
                                    alt="serpiente negra y amarrillo">
                                </a>
                            </div>
                            <div class="element-item design otras">
                                <a class="popup-with-move-anim" href="#tour-12">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/otras-especies/leopardo-ocelote-manigordo-bebe-en-la-fortuna-de-san-carlos-costa-rica.jpeg" 
                                    alt="leopardo ocelote manigordo bebe en la fortuna de san carlos costa rica">
                                </a>
                            </div>
                            <div class="element-item design otras">
                                <a class="popup-with-move-anim" href="#tour-13">
                                    <div class="element-item-overlay"></div>
                                    <img loading="lazy" src="images/otras-especies/serpiente.jpeg" 
                                    alt="serpiente">
                                </a>
                            </div>
                        </div> <!-- end of grid -->
                        <!-- end of filter -->

                    </div> <!-- end of col -->
                </div> <!-- end of row -->

        </div> <!-- end of filter -->
        </div> <!-- end of container -->
            <div id="video" class="container">
                <iframe src="https://www.youtube.com/embed/BrAsPlE2gS8?rel=0&amp;showinfo=0" width="100%" height="430px" frameborder="0" style="border:0" allowfullscreen alt="Video de perezosos en Sloths Territory La Fortuna" title="video de perezosos La Fortuna"></iframe>             
        </div>
        <!-- end of tours -->


        <!-- tour Lightboxes -->
        <!-- Lightbox -->
        <div id="tour-1" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="">
                    <img class="img-fluid" loading="lazy" 
                    src="images/perezosos/bebe-perezoso-y-madre-perezosa-durmiendo-en-un-arbol-.jpeg" 
                    alt="bebe perezoso y madre perezosa durmiendo en un arbol">
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
                    src="images/perezosos/oso-perezoso-de-tres-dedos.jpeg" 
                    alt="oso perezoso de tres dedo">
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
                    src="images/perezosos/perezoso-en-la-fortuna-de-san-carlos.jpeg" 
                    alt="perezoso en la fortuna de san carlos">
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
                    src="images/perezosos/bebe-perezoso-durmiendo-en-costa-rica.jpeg" 
                    alt="bebe perezoso durmiendo en costa rica">
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
                    src="images/ranas/rana-flecha-roja-azul-costa-rica.jpeg" 
                    alt="rana flecha roja azul costa rica">
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
                    src="images/ranas/rana-verde-ojos-rojos.jpeg" 
                    alt="rana verde ojos rojos">
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
                    src="images/ranas/rana-.jpeg" 
                    alt="rana">
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
                    src="images/monos/mono-aullador-alouatta-palliata-america-central.jpeg" 
                    alt="mono aullador alouatta palliata america central">
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
                    src="images/aves/lechuzon-fortuna-costa-rica-.jpeg" 
                    alt="lechuzon fortuna costa rica">
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
                    src="images/aves/ave-martin-pescador-collar-coraciforme.jpeg" 
                    alt="ave martin pescador collar coraciforme">
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
                    src="images/otras-especies/serpiente-negra-y-amarillo.jpeg" 
                    alt="serpiente negra y amarrillo">
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
                    src="images/otras-especies/leopardo-ocelote-manigordo-bebe-en-la-fortuna-de-san-carlos-costa-rica.jpeg" 
                    alt="leopardo ocelote manigordo bebe en la fortuna de san carlos costa rica">
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
                    src="images/otras-especies/serpiente.jpeg" 
                    alt="serpiente">
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
                    <img class="img-fluid" src="images/otras-especies/senderos-sloths-territory.jpeg" alt="sloth's territory sendero principal">
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
                    <img class="img-fluid" src="images/tour-nocturno.jpeg" alt="tour-nocturno-Fortuna" title="Tour-nocturno-en-Fortuna">
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
                    <img class="img-fluid" src="images/aves/halcon-blanco-gavilan.jpeg" alt="magníficas aves en la Fortuna" title="lechuzón en Sloths Territory" >
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
        <div class="basic-2">
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
                                <img class="img-fluid" src="images/team-1.png" alt="trabajador (Keilor)">
                            </div> <!-- end of image-wrapper -->
                            <p class="p-large">Keilor</p>
                            <!-- <p class="job-title">Alguna característica</p> -->
                            <span class="social-icons">
                                <span class="fa-stack">
                                    <a href="https://www.facebook.com/Sloths.Territory.2018" target="_blank">
                                        {{-- <span class="hexagon"></span> --}}
                                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                                    </a>
                                </span>
                            </span>
                        </div> <!-- end of team-member -->
                        <!-- end of team member -->

                        <!-- Team Member -->
                        <div class="team-member">
                            <div class="image-wrapper">
                                <img class="img-fluid" src="images/team-2.png" alt="trabajador (Oscar)">
                            </div> <!-- end of image wrapper -->
                            <p class="p-large">Oscar</p>
                            <!-- <p class="job-title">Alguna característica</p> -->
                            <span class="social-icons">
                                <span class="fa-stack">
                                    <a href="https://www.facebook.com/Sloths.Territory.2018" target="_blank">
                                        {{-- <span class="hexagon"></span> --}}
                                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                                    </a>
                                </span>
                            </span>
                        </div> <!-- end of team-member -->
                        <!-- end of team member -->

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
                            <img class="img-fluid" src="images/observando-perezosos-Fortuna.jpeg" alt="sloth's territory sendero">    
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-7 col-xl-6">
                        <div class="text-container">
                            <div class="section-title">{{__('acerca_de.titulo_principal')}}</div>
                            <h2> {{__('acerca_de.titulo_secundario')}}</h2>
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
                            <h2>{{__('contact.titulo_secundario')}}</h2>
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
                        <form id="contactForm" data-toggle="validator" data-focus="false">
                            <div class="form-group">
                                <input type="text" class="form-control-input" id="cname" required>
                                <label class="label-control" for="cname">{{__('formulario.nombre')}}</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control-input" id="cemail" required>
                                <label class="label-control" for="cemail">{{__('formulario.correo')}}</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control-textarea" id="cmessage" required></textarea>
                                <label class="label-control" for="cmessage">{{__('formulario.mensaje')}}</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group checkbox">
                                <input type="checkbox" id="cterms" value="Agreed-to-Terms" required>{{__('formulario.acepta_politicas_parte_1')}}<a href="privacy-policy">{{__('politicas_privacidad')}}</a>  <a href="terms-conditions">{{__('terminos_condiciones')}}</a>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">{{__('btn.enviar_mensaje')}}</button>
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
