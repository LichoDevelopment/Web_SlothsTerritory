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
                    <img src="images/sliderPrincipal/bebe-perezoso-y-madre-perezosa-durmiendo-en-un-arbol.jpeg" alt="Bebé perezoso duerme junto a su madre en la Fortuna de San Carlos" title="Perezosos durmiendo">
                </label>
                <label class="pagination-item" for="2">
                    <img src="images/sliderPrincipal/bebe-perezoso-con-su-madre-bradypus-variegatus.jpeg" alt="Perezosos en la Fortuna" title="Perezosos durmiendo">
                </label>
                <label class="pagination-item" for="3">
                    <img src="images/sliderPrincipal/tierno-oso-perezoso-en-la-fortuna-sloths-territory.jpeg" alt="Perezosos en la Fortuna Costa Rica" title="Perezoso">
                </label>

            </div>
        </div>
        <div class="container">
            <h1 class="main-title mt-3">El mejor tour en La Fortuna de San Carlos e increíble vista del Volcán Arenal</h1>
            <p class="p-heading p-large"> En Sloths Territory podrás observar perezosos de 2 y 3 dedos, además gran variedad de aves y anfibios.<div class=""></div></p>
            <div class="d-flex justify-content-center align-items-center">
                <a class="btn-solid-lg page-scroll" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">RESERVAR AHORA</a>
            </div>
        </div>



        <!-- Intro -->
        <div id="intro" class="basic-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="text-container">
                            <div class="section-title">BIENVENIDOS</div>
                            <h2>Sloths Territory en La Fortuna de San Carlos.</h2>
                            <p>Sloths Territory es un sendero con un total de 1300 metros, que se extiende sobre la margen del Río Habana, en El Tanque de La Fortuna.</p>
                            <!-- <p class="testimonial-text">"Sloths are a group of arboreal Neotropical xenarthran mammals, constituting the suborder Folivora."</p> -->
                            <div class="testimonial-author">Visite este paraíso rodeado de naturaleza y habitado por osos perezosos.</div>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-7">
                        <div class="image-container">
                            <img class="img-fluid" src="images/otras-especies/tours-en-sloths-territory.JPEG" alt="Senderos La Fortuna de San Carlos" title="Senderos Sloths Territory">
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
                                <span class="hexagon"></span>
                                <i class="fas fa-home fa-stack-1x"></i>
                            </span>
                            <div class="card-body">
                                <h4 class="card-title">En Sloths Territory</h4>
                                <p>contamos con un gran hábitad natural.</p>
                            </div>
                        </div>
                        <!-- end of card -->

                        <!-- Card -->
                        <div class="card">
                            <span class="fa-stack">
                                <span class="hexagon"></span>
                                <i class="fas fa-paw fa-stack-1x"></i>
                            </span>
                            <div class="card-body">
                                <h4 class="card-title">Podrás conocer </h4>
                                <p> diferentes tipos de plantas y animales, en especial osos perezozos.</p>
                            </div>
                        </div>
                        <!-- end of card -->

                        <!-- Card -->
                        <div class="card">
                            <span class="fa-stack">
                                <span class="hexagon"></span>
                                <i class="fas fa-binoculars fa-stack-1x"></i>
                            </span>
                            <div class="card-body">
                                <h4 class="card-title"> Maravillosas vistas</h4>
                                <p> al Volcán Arenal y a la increíble natuleza que habita en nuestras instalaciones. </p>
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
                        <div class="section-title">SERVICIOS</div>
                        <h2>En Sloths Territory contamos con 3 diferentes actividades<br> Te invitamos a conocerlas en La Fortuna de San Carlos</h2>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
                <div class="row">
                    <div class="col-lg-12">

                        <!-- Card -->
                        <div class="card">
                            <div class="card-image">
                                <img class="img-fluid" src="images/otras-especies/senderos-sloths-territory.jpeg" alt="Sendero para ver perezosos en la Fortuna de San Carlos" title="Sendero Sloths Territory">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Tour diurno</h3>
                                <p>Ofrecemos varias caminatas diarias iniciando a las: 8 a.m. - 10 a.m. - 1 p.m. y 3 p.m.</p>
                                <ul class="list-unstyled li-space-lg">
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body">El sendero es accesible para todas las edades.</div>
                                    </li>
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body">La duración de esta actividad puede ser de 1 hora y media a 2 horas.</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="button-container">
                            <a class="popup-with-move-anim" href="#tour-diurno"><div class="btn-solid-reg page-scroll">MÁS DETALLES</div></a> 
                                <!-- <a class="btn-solid-reg page-scroll" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">MÁS DETALLES</a> -->
                            </div> <!-- end of button-container -->
                        </div>
                        <!-- end of card -->

                        <!-- Card -->
                        <div class="card">
                            <div class="card-image">
                                <img class="img-fluid" src="images/ranas/rana-ojos-rojos-.jpeg" alt="tour nocturno Sloths Territory La Fortuna" title="rana de ojos rojos en tour nocturno La Fortuna">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Tour nocturno</h3>
                                <p>Pequeña introducción</p>
                                <ul class="list-unstyled li-space-lg">
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body">Nuestra caminata nocturna inicia a las 6:00 pm.</div>
                                    </li>
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body">La duración de esta actividad es de 1 hora y media a 2 horas.</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="button-container">
                                <!-- <a class="btn-solid-reg page-scroll" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">MÁS DETALLES</a> -->
                                <a class="popup-with-move-anim" href="#tour-nocturno"><div class="btn-solid-reg page-scroll">MÁS DETALLES</div></a>
                            </div> <!-- end of button-container -->
                        </div>
                        <!-- end of card -->

                        <!-- Card -->
                        <div class="card">
                            <div class="card-image">
                                <img class="img-fluid" src="images/aves/lechuzon-fortuna-costa-rica-.jpeg" alt="magníficas aves en la Fortuna" title="lechuzón en Sloths Territory">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Tour de aves</h3>
                                <p>Ofrecemos varias caminatas diarias iniciando a las: 8 a.m. - 10 a.m. - 1 p.m. y 3 p.m.</p>
                                <ul class="list-unstyled li-space-lg">
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body">El recorrido comienza a las 5:00 am.</div>
                                    </li>
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body">La duración de esta actividad es de 2 horas.</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="button-container">
                            <a class="popup-with-move-anim" href="#tour-aves"><div class="btn-solid-reg page-scroll">MÁS DETALLES</div></a>
                                <!-- <a class="btn-solid-reg page-scroll" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">MÁS DETALLES</a> -->
                            </div> <!-- end of button-container -->
                        </div>
                        <!-- end of card -->

                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of cards-2 -->
        <!-- end of services -->


        <!-- Details 1 -->
        <div id="details" class="accordion">
            <div class="area-1 container">
            </div><!-- end of area-1 on same line and no space between comments to eliminate margin white space --><div class="area-2">

                <!-- Accordion -->
                <div class="accordion-container" id="accordionOne">
                    <h2>Oso perezoso, símbolo nacional de Costa Rica</h2>
                    <div class="item">
                        <div id="headingOne">
                            <span data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" role="button">
                                <span class="circle-numbering">1</span><span class="accordion-title">El 16 símbolo nacional de Costa Rica</span>
                            </span>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionOne">
                            <div class="accordion-body">
                                El día miercoles 30 de junio del 2021 fue declarado el oso perezoso como símbolo nacional de Costa Rica.
                            </div>
                        </div>
                    </div> <!-- end of item -->

                    <div class="item">
                        <div id="headingTwo">
                            <span class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" role="button">
                                <span class="circle-numbering">2</span><span class="accordion-title">¿Por qué se declaró símbolo nacional? </span>
                            </span>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionOne">
                            <div class="accordion-body">
                                Las especies Bradypus variegatus (perezoso de 3 dedos) y Choloepus hoffomanni (perezoso de 2 dedos) fueron declarados símbolo nacional de Costa Rica 
                                con el fin de destacar la importancia de esta especie en la fauna silvestre de Costa Rica.
                            </div>
                        </div>
                    </div> <!-- end of item -->
                </div> <!-- end of accordion-container -->
                <!-- end of accordion -->

            </div> <!-- end of area-2 -->
        </div> <!-- end of accordion -->
        <!-- end of details 1 -->

        <!-- Tours -->
        <div id="galeria" class="filter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title"> Nuestra sección de galería</div>
                        <h2> En esta sección podrás conocer imágenes de las diferentes especies en Sloths Territory.</h2>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Filter -->
                        <div class="button-group filters-button-group">
                            <a class="button is-checked" data-filter="*"><span>SHOW ALL</span></a>
                            <a class="button" data-filter=".sloths"><span>Sloths</span></a>
                            <a class="button" data-filter=".ranas"><span>Frogs</span></a>
                            <a class="button" data-filter=".monos"><span>Monkeys</span></a>
                            <a class="button" data-filter=".aves"><span>Birds</span></a>
                            <a class="button" data-filter=".otras"><span>Otras especies</span></a>
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
                    <a class="btn-solid-reg" href="#your-link">DETAILS (redirecciona a otra página)</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">BACK</a>
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
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">BACK</a>
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
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">BACK</a>
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
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">BACK</a>
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
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">BACK</a>
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
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">BACK</a>
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
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">BACK</a>
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
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">BACK</a>
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
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">BACK</a>
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
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">BACK</a>
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
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">BACK</a>
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
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">BACK</a>
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
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#galeria">BACK</a>
                </div> <!-- end of col --> --}}
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->


        <div id="tour-diurno" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row justify-content-center">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-10">
                    <img class="img-fluid" src="images/services-1.jpg" alt="sloth's territory sendero principal">
                </div> <!-- end of col -->
                <div class="col-lg-10">
                    <h3>TOUR DIURNO</h3>
                    <hr class="line-heading">
                    <h6>Informacion sobre el tour diurno</h6>
                    <p>Ofrecemos varias caminatas diarias iniciando a las: 8 a.m. - 10 a.m. - 1 p.m. y 3 p.m.</p>
                    <p>Durante la caminata, el sendero le permitirá disfrutar de un bosque de galería con exuberante vegetación y árboles gigantes como Chilamate y Guácimo Colorado;  constituyendo el hábitat de muchas especies como: zarigüeyas, perezosos de dos y tres dedos y muchas aves como: Tucanes, Tangaras, Royal Flycatchers y otras. Pero el principal atractivo es la observación de los osos perezosos.</p>
                    <p>La Familia Rodríguez, una familia tradicional costarricense serán sus guías, ya que tratar de encontrar perezosos requiere de altas habilidades porque suelen tener un excelente camuflaje que los hace imperceptibles, para ojos no entrenados.</p>
                    <p>El sendero es accesible para todas las edades, por lo que esta es una actividad donde toda la familia puede disfrutarla.</p>
                    <p>El recorrido incluye un guía capacitado durante toda la caminata con un telescopio profesional y un refrigerio de frutas frescas de temporada al final.</p>
                    <p>La duración de esta actividad puede ser de 1 hora y media a 2 horas y el precio es de US $ 28 por persona;  Niños de 6 a 12 años US $ 17 y menores de 5 años entran gratis.</p>
                    <h6>Qué llevar:</h6>
                    <p>Repelente de insectos</p>
                    <p>Ropa ligera</p>
                    <p>Impermeable</p>
                    <p>Zapato cerrado</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">No dejes pasar esta aventura.</p>
                    </div>
                    <a class="btn-solid-reg" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">RESERVAR AHORA</a> <a class="btn-outline-reg mfp-close as-button" href="#services">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->

        <div id="tour-nocturno" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row justify-content-center">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-10">
                    <img class="img-fluid" src="images/services-2.jpg" alt="rana ojos rojos">
                </div> <!-- end of col -->
                <div class="col-lg-10">
                    <h3>TOUR NOCTURNO</h3>
                    <hr class="line-heading">
                    <h6>Informacion sobre el tour nocturno</h6>
                    <p>Nuestra caminata nocturna inicia a las 6:00 pm, el mejor momento para buscar animales con comportamiento nocturno.</p>
                    <p>Durante esta caminata, tendrá la oportunidad de ver diferentes tipos de ranas, kinkajous, serpientes, arañas, murciélagos y eventualmente: perezosos de dos y tres dedos (pero no es el enfoque de esta caminata específica).</p>
                    <p>Mientras la noche da su iniciao y el cielo se cubre de estrellas, nuestro guía bien capacitado lo mantendrá seguro, mientras continúa la caminata a lo largo de nuestra propiedad.</p>
                    <p>El sendero es accesible para todas las edades, por lo que esta es una actividad donde toda la familia puede disfrutarla.</p>
                    <p>La duración de esta actividad es de 1 hora y media a 2 horas.  El precio es de US $45 por persona;  niños de 6 a 12 años US $35.</p>
                    <p>El tour incluye un guía capacitado durante toda la caminata, linterna y frutas frescas de temporada al final.</p>
                    <h6>Qué llevar:</h6>
                    <p>Repelente de insectos</p>
                    <p>Ropa ligera</p>
                    <p>Impermeable</p>
                    <p>Zapato cerrado</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">No dejes pasar esta aventura.</p>
                    </div>
                    <a class="btn-solid-reg" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">RESERVAR AHORA</a> <a class="btn-outline-reg mfp-close as-button" href="#services">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->

        <div id="tour-aves" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row justify-content-center">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-10">
                    <img class="img-fluid" src="images/services-3.jpg" alt="buho">
                </div> <!-- end of col -->
                <div class="col-lg-10">
                    <h3>TOUR DE AVES</h3>
                    <hr class="line-heading">
                    <h6>Informacion sobre el tour de aves</h6>
                    <p>Pensando en todos los amantes de la observación de aves, hemos creado esta actividad exclusiva y entretenida.</p>
                    <p>El recorrido comienza a las 5:00 am y uno de nuestros guías profesionales lo llevará a través de hermosos senderos para observar una amplia variedad de especies de: colibríes, tangaras, loros, mieleros, pájaros carpinteros canela, Royal Flycatchers, entre otras especies de aves.</p>
                    <p>Incluso cuando estamos enfocados en las aves, por la gran variedad de especies exóticas, en nuestros senderos, tendrá la oportunidad de observar algunos perezosos, ranas y otras especies.</p>
                    <p>El tour incluye un guía capacitado durante toda la caminata con telescopio profesional, binoculares, bocadillo de frutas frescas de temporada y café, al final de recorrido.</p>
                    <p>La duración de esta actividad es de 2 horas aproximadamente.</p>
                    <p>El precio es de US $ 45 por persona.</p>
                    <h6>Qué llevar:</h6>
                    <p>Repelente de insectos</p>
                    <p>Ropa ligera</p>
                    <p>Impermeable</p>
                    <p>Cámara</p>
                    <p>Binoculares</p>
                    <p>Zapatos cerrados</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">No dejes pasar esta aventura.</p>
                    </div>
                    <a class="btn-solid-reg" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">RESERVAR AHORA</a> <a class="btn-outline-reg mfp-close as-button" href="#services">BACK</a>
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
                        <h2>Fundadores de Sloths Territory en La Fortuna</h2>
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
                                        <span class="hexagon"></span>
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
                                        <span class="hexagon"></span>
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
                            <img class="img-fluid" src="images/about.jpg" alt="sloth's territory sendero">    
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-7 col-xl-6">
                        <div class="text-container">
                            <div class="section-title">Acerda de </div>
                            <h2> Sloths Territory</h2>
                            <p> Te esperamos, no te pierdas el mejor tour de perezosos de La Fortuna</p>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Maravillosa vista al Volcán Arenal.</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Ubicado en El Tanque de La Fortuna de San Carlos.</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Contamos con gran variedad de especies.</div>
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
                            <div class="section-title">CONTACT</div>
                            <h2>Sloths Territory La Fortuna de San Carlos</h2>
                            <p>Información de contacto</p>
                            <ul class="list-unstyled li-space-lg">
                                <li class="address"><i class="fas fa-map-marker-alt"></i>4 km de La Fortuna hacia el Este, 400 mts entrada de lastre a la derecha, 200 mts Este Fortuna, Alajuela Provinces, Costa Rica</li>
                                <li><i class="fas fa-phone"></i><a href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">+506 8561 0404</a></li>
                                <li><i class="fas fa-envelope"></i><a href="mailto:sloths.territory@gmail.com" target="_blank">sloths.territory@gmail.com</a></li>
                            </ul>
                            <h3>Síguenos Sloths Territory</h3>

                            <span class="fa-stack">
                            <a href="https://www.facebook.com/Sloths.Territory.2018" target="_blank">
                                    <span class="hexagon"></span>
                                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                            <a href="https://www.instagram.com/slothsterritory/" target="_blank">
                                    <span class="hexagon"></span>
                                    <i class="fab fa-instagram fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="https://www.youtube.com/channel/UCKqtM7YiCFUtcYs5j8B5hgw" target="_blank">
                                    <span class="hexagon"></span>
                                    <i class="fab fa-youtube fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="https://www.tripadvisor.com/UserReviewEdit-g309226-d15636276-Sloth_s_Territory-La_Fortuna_de_San_Carlos_Arenal_Volcano_National_Park_Province_of_Alajuela.html" target="_blank">
                                    <span class="hexagon"></span>
                                    <i class="fab fa-tripadvisor fa-stack-1x"></i>
                                </a>
                            </span>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">

                        <!-- Contact Form -->
                        <form id="contactForm" data-toggle="validator" data-focus="false">
                            <div class="form-group">
                                <input type="text" class="form-control-input" id="cname" required>
                                <label class="label-control" for="cname">Nombre</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control-input" id="cemail" required>
                                <label class="label-control" for="cemail">Correo</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control-textarea" id="cmessage" required></textarea>
                                <label class="label-control" for="cmessage">Su mensaje</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group checkbox">
                                <input type="checkbox" id="cterms" value="Agreed-to-Terms" required>I agree Sloth Territory <a href="privacy-policy.html">Privacy Policy</a> and <a href="terms-conditions.html">Terms Conditions</a>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">ENVIAR MENSAJE</button>
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
