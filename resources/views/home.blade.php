@extends('layouts.app')

@section('content')
        <!-- Header -->
        <header id="header" class="header">
            <div class="header-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-container">
                                <!-- <h1>El mejor tour de Perezosos <span id="js-rotating">en la Fortuna de San Carlos, Quizá algo más ..</span></h1> -->
                                <h1>El mejor tour de perezosos en La Fortuna de San Carlos (tratar de mencionar Volcán Arenal)</h1>
                                <p class="p-heading p-large"> En Sloth's Territory podrás observar perezosos de 2 y 3 dedos, además gran variedad de aves y anfibios.<div class=""></div></p>
                                <a class="btn-solid-lg page-scroll" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">RESERVAR AHORA</a>
                            </div>
                        </div> <!-- end of col -->
                    </div> <!-- end of row -->
                </div> <!-- end of container -->
            </div> <!-- end of header-content -->
        </header> <!-- end of header -->
        <!-- end of header -->


        <!-- Intro -->
        <div id="intro" class="basic-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="text-container">
                            <div class="section-title">BIENVENIDOS</div>
                            <h2>Sloth's Territory en La Fortuna de San Carlos.</h2>
                            <p>Sloth's Territory es un sendero con un total de 1300 metros, que se extiende sobre la margen del Río Habana, en El Tanque de La Fortuna.</p>
                            <!-- <p class="testimonial-text">"Sloths are a group of arboreal Neotropical xenarthran mammals, constituting the suborder Folivora."</p> -->
                            <div class="testimonial-author">Visite este paraíso rodeado de naturaleza y habitado por osos perezosos.</div>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-7">
                        <div class="image-container">
                            <img class="img-fluid" src="images/intro-office.jpg" alt="alternative">
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
                                <h4 class="card-title">En Sloth's Territory</h4>
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
                        <h2>En Sloth's Territory contamos con 3 diferentes actividades<br> Te invitamos a conocerlas en La Fortuna de San Carlos</h2>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
                <div class="row">
                    <div class="col-lg-12">

                        <!-- Card -->
                        <div class="card">
                            <div class="card-image">
                                <img class="img-fluid" src="images/services-1.jpg" alt="alternative">
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
                                <img class="img-fluid" src="images/services-2.jpg" alt="alternative">
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
                                <img class="img-fluid" src="images/services-3.jpg" alt="alternative">
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
            <div class="area-1">
            </div><!-- end of area-1 on same line and no space between comments to eliminate margin white space --><div class="area-2">

                <!-- Accordion -->
                <div class="accordion-container" id="accordionOne">
                    <h2>Pequeña info para ....</h2>
                    <div class="item">
                        <div id="headingOne">
                            <span data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" role="button">
                                <span class="circle-numbering">1</span><span class="accordion-title">Información Sloths</span>
                            </span>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionOne">
                            <div class="accordion-body">
                                Sloths are a group of arboreal Neotropical xenarthran mammals, constituting the suborder Folivora.
                            </div>
                        </div>
                    </div> <!-- end of item -->

                    <div class="item">
                        <div id="headingTwo">
                            <span class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" role="button">
                                <span class="circle-numbering">2</span><span class="accordion-title">Más informacion</span>
                            </span>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionOne">
                            <div class="accordion-body">
                                Sloths are a group of arboreal Neotropical xenarthran mammals, constituting the suborder Folivora.
                            </div>
                        </div>
                    </div> <!-- end of item -->

                    <div class="item">
                        <div id="headingThree">
                            <span class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" role="button">
                                <span class="circle-numbering">3</span><span class="accordion-title">Más información</span>
                            </span>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionOne">
                            <div class="accordion-body">
                                Sloths are a group of arboreal Neotropical xenarthran mammals, constituting the suborder Folivora.
                            </div>
                        </div>
                    </div> <!-- end of item -->
                </div> <!-- end of accordion-container -->
                <!-- end of accordion -->

            </div> <!-- end of area-2 -->
        </div> <!-- end of accordion -->
        <!-- end of details 1 -->


        <!-- Details 2 -->
        <div class="tabs">
            <div class="area-1">
                <div class="tabs-container">

                    <!-- Tabs Links -->
                    <ul class="nav nav-tabs" id="ariaTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="nav-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true"><i class="fas fa-th"></i> Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false"><i class="fas fa-th"></i> Info 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false"><i class="fas fa-th"></i> Info 3</a>
                        </li>
                    </ul>
                    <!-- end of tabs links -->

                    <!-- Tabs Content -->
                    <div class="tab-content" id="ariaTabsContent">

                        <!-- Tab -->
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                            <h4>Alguna info sobre lugar o algo</h4>
                            <p>Sloths are a group of arboreal Neotropical xenarthran mammals, constituting the suborder Folivora.</p>

                            <!-- Progress Bars -->
                            <div class="progress-container">
                                <div class="title">Ambiente o algo 100%</div>
                                <div class="progress">
                                    <div class="progress-bar first" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="title">reseñas 76%</div>
                                <div class="progress">
                                    <div class="progress-bar second" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="title">calidad 90%</div>
                                <div class="progress">
                                    <div class="progress-bar third" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div> <!-- end of progress-container -->
                            <!-- end of progress bars -->

                        </div> <!-- end of tab-pane -->
                        <!-- end of tab -->

                        <!-- Tab -->
                        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                            <ul class="list-unstyled li-space-lg first">
                                <li class="media">
                                    <div class="media-bullet">1</div>
                                    <div class="media-body"><strong>Sobre</strong> alguna caracteristica ...</div>
                                </li>
                                <li class="media">
                                    <div class="media-bullet">2</div>
                                    <div class="media-body"><strong>Sobre</strong> alguna caracteristica ...</div>
                                </li>
                                <li class="media">
                                    <div class="media-bullet">3</div>
                                    <div class="media-body"><strong>Sobre</strong> alguna caracteristica ...</div>
                                </li>
                            </ul>
                            <ul class="list-unstyled li-space-lg last">
                                <li class="media">
                                    <div class="media-bullet">4</div>
                                    <div class="media-body"><strong>Sobre</strong> alguna caracteristica ...</div>
                                </li>
                                <li class="media">
                                    <div class="media-bullet">5</div>
                                    <div class="media-body"><strong>Sobre</strong> alguna caracteristica ...</div>
                                </li>
                                <li class="media">
                                    <div class="media-bullet">6</div>
                                    <div class="media-body"><strong>Sobre</strong> alguna caracteristica ...</div>
                                </li>
                            </ul>
                        </div> <!-- end of tab-pane -->
                        <!-- end of tab -->

                        <!-- Tab -->
                        <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                            <p><strong>Información sobre algun punto ...</strong> 100% : <a class="green" href="https://en.wikipedia.org/wiki/Sloth">Sloths</a></p>
                            <p><strong>info...</strong> Informacion sobre algo <a class="green" href="#your-link">Link de referencia a algo más</a></p>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">alguna info ...</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">alguna info ...</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">alguna info ...</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">alguna info ...</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">alguna info ...</div>
                                </li>
                            </ul>
                        </div> <!-- end of tab-pane -->
                        <!-- end of tab -->

                    </div> <!-- end of tab-content -->
                    <!-- end of tabs content -->

                </div> <!-- end of tabs-container -->
            </div><!-- end of area-1 on same line and no space between comments to eliminate margin white space --><div class="area-2"></div> <!-- end of area-2 -->
        </div> <!-- end of tabs -->
        <!-- end of details 2 -->


        <!-- Testimonials -->
        <div class="slider">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Algunas de nuestras especies de animales</h2>
                        <p class="p-heading">En Sloths Territory en La Fortuna de San Carlos podrás encontrar gran variedad de animales.</p>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
                <div class="row">
                    <div class="col-lg-12">

                        <!-- Card Slider -->
                        <div class="slider-container">
                            <div class="swiper-container card-slider">
                                <div class="swiper-wrapper">

                                    <!-- Slide -->
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <img class="card-image" src="images/testimonial-1.jpg" alt="alternative">
                                            <div class="card-body">
                                                <div class="testimonial-text">Esta especies es ....</div>
                                                <div class="testimonial-author">Nombre científico</div>
                                            </div>
                                        </div>
                                    </div> <!-- end of swiper-slide -->
                                    <!-- end of slide -->

                                    <!-- Slide -->
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <img class="card-image" src="images/testimonial-2.jpg" alt="alternative">
                                            <div class="card-body">
                                                <div class="testimonial-text">Esta especies es ...</div>
                                                <div class="testimonial-author">Nombre científico</div>
                                            </div>
                                        </div>
                                    </div> <!-- end of swiper-slide -->
                                    <!-- end of slide -->

                                    <!-- Slide -->
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <img class="card-image" src="images/testimonial-3.jpg" alt="alternative">
                                            <div class="card-body">
                                                <div class="testimonial-text">Esta especie es ... </div>
                                                <div class="testimonial-author">Nombre científico.</div>
                                            </div>
                                        </div>
                                    </div> <!-- end of swiper-slide -->
                                    <!-- end of slide -->

                                    <!-- Slide -->
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <img class="card-image" src="images/testimonial-4.jpg" alt="alternative">
                                            <div class="card-body">
                                                <div class="testimonial-text">Esta especie es ...</div>
                                                <div class="testimonial-author">Nombre científico</div>
                                            </div>
                                        </div>
                                    </div> <!-- end of swiper-slide -->
                                    <!-- end of slide -->

                                    <!-- Slide -->
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <img class="card-image" src="images/testimonial-5.jpg" alt="alternative">
                                            <div class="card-body">
                                                <div class="testimonial-text">Esta especie es ...</div>
                                                <div class="testimonial-author">Nombre científico</div>
                                            </div>
                                        </div>
                                    </div> <!-- end of swiper-slide -->
                                    <!-- end of slide -->

                                    <!-- Slide -->
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <img class="card-image" src="images/testimonial-6.jpg" alt="alternative">
                                            <div class="card-body">
                                                <div class="testimonial-text">Esta especie es ...</div>
                                                <div class="testimonial-author">Nombre científico</div>
                                            </div>
                                        </div>
                                    </div> <!-- end of swiper-slide -->
                                    <!-- end of slide -->

                                </div> <!-- end of swiper-wrapper -->

                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                                <!-- end of add arrows -->

                            </div> <!-- end of swiper-container -->
                        </div> <!-- end of sliedr-container -->
                        <!-- end of card slider -->

                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of slider -->
        <!-- end of testimonials -->


        <!-- Tours -->
        <div id="tours" class="filter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title"> Nuestra galería</div>
                        <h2> En esta sección podrás conocer imágenes de las diferentes especies de Sloths Territory.</h2>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Filter -->
                        <div class="button-group filters-button-group">
                            <a class="button is-checked" data-filter="*"><span>SHOW ALL</span></a>
                            <a class="button" data-filter=".design"><span>Sloths</span></a>
                            <a class="button" data-filter=".development"><span>Frog</span></a>
                            <a class="button" data-filter=".marketing"><span>Tortugas</span></a>
                            <a class="button" data-filter=".seo"><span>etc (agregar o quitar)</span></a>
                        </div> <!-- end of button group -->
                        <div class="grid">
                            <div class="element-item development">
                                <a class="popup-with-move-anim" href="#tour-1"><div class="element-item-overlay"><span>El Pepe</span></div><img src="images/project-1.jpg" alt="alternative"></a>
                            </div>
                            <div class="element-item development">
                                <a class="popup-with-move-anim" href="#tour-2"><div class="element-item-overlay"><span>Juanito</span></div><img src="images/project-2.jpg" alt="alternative"></a>
                            </div>
                            <div class="element-item design development marketing">
                                <a class="popup-with-move-anim" href="#tour-3"><div class="element-item-overlay"><span>Juanita</span></div><img src="images/project-3.jpg" alt="alternative"></a>
                            </div>
                            <div class="element-item design development marketing">
                                <a class="popup-with-move-anim" href="#tour-4"><div class="element-item-overlay"><span>No se</span></div><img src="images/project-4.jpg" alt="alternative"></a>
                            </div>
                            <div class="element-item design development marketing seo">
                                <a class="popup-with-move-anim" href="#tour-5"><div class="element-item-overlay"><span>Joy el perezoso </span></div><img src="images/project-5.jpg" alt="alternative"></a>
                            </div>
                            <div class="element-item design marketing seo">
                                <a class="popup-with-move-anim" href="#tour-6"><div class="element-item-overlay"><span>Juancho</span></div><img src="images/project-6.jpg" alt="alternative"></a>
                            </div>
                            <div class="element-item design marketing">
                                <a class="popup-with-move-anim" href="#tour-7"><div class="element-item-overlay"><span>Oscar jaja</span></div><img src="images/project-7.jpg" alt="alternative"></a>
                            </div>
                            <div class="element-item design marketing">
                                <a class="popup-with-move-anim" href="#tour-8"><div class="element-item-overlay"><span>Armadillo creo</span></div><img src="images/project-8.jpg" alt="alternative"></a>
                            </div>
                        </div> <!-- end of grid -->
                        <!-- end of filter -->

                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of filter -->
        <!-- end of tours -->


        <!-- tour Lightboxes -->
        <!-- Lightbox -->
        <div id="tour-1" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <img class="img-fluid" src="images/project-1.jpg" alt="alternative">
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>El Pepe</h3>
                    <hr class="line-heading">
                    <h6>Algo de info sub titulo</h6>
                    <p>Info sobre...</p>
                    <p>Info sobre...</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">Parrafo sobre comentario de algo.</p>
                        <p class="testimonial-author">Tipo de animal o no se...</p>
                    </div>
                    <a class="btn-solid-reg" href="#your-link">DETAILS (redirecciona a otra página)</a> <a class="btn-outline-reg mfp-close as-button" href="#tours">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->

        <!-- Lightbox -->
        <div id="tour-2" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <img class="img-fluid" src="images/project-2.jpg" alt="alternative">
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>Juanito</h3>
                    <hr class="line-heading">
                    <h6>Info</h6>
                    <p>Info</p>
                    <p>indo</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">Parrafo </p>
                        <p class="testimonial-author">Tipo</p>
                    </div>
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#tours">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->

        <!-- Lightbox -->
        <div id="tour-3" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <img class="img-fluid" src="images/project-3.jpg" alt="alternative">
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>Bofw</h3>
                    <hr class="line-heading">
                    <h6>Strategy Development</h6>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p class="testimonial-author">General Manager</p>
                    </div>
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#tours">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->

        <!-- Lightbox -->
        <div id="tour-4" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <img class="img-fluid" src="images/project-4.jpg" alt="alternative">
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>Ipsum</h3>
                    <hr class="line-heading">
                    <h6>Strategy Development</h6>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p class="testimonial-author">General Manager</p>
                    </div>
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#tours">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->

        <!-- Lightbox -->
        <div id="tour-5" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <img class="img-fluid" src="images/project-5.jpg" alt="alternative">
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>IMpsu</h3>
                    <hr class="line-heading">
                    <h6>Strategy Development</h6>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p class="testimonial-author">General Manager</p>
                    </div>
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#tours">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->

        <!-- Lightbox -->
        <div id="tour-6" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <img class="img-fluid" src="images/project-6.jpg" alt="alternative">
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>Ipsum</h3>
                    <hr class="line-heading">
                    <h6>Strategy Development</h6>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p class="testimonial-author">General Manager</p>
                    </div>
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#tours">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->

        <!-- Lightbox -->
        <div id="tour-7" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <img class="img-fluid" src="images/project-7.jpg" alt="alternative">
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>CIPSU</h3>
                    <hr class="line-heading">
                    <h6>Strategy Development</h6>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p class="testimonial-author">General Manager</p>
                    </div>
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#tours">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->

        <!-- Lightbox -->
        <div id="tour-8" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row justify-content-center">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-10">
                    <img class="img-fluid" src="images/project-8.jpg" alt="alternative">
                </div> <!-- end of col -->
                <div class="col-lg-10">
                    <h3>sub algo</h3>
                    <hr class="line-heading">
                    <h6>Strategy Development</h6>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <div class="testimonial-container">
                        <p class="testimonial-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <p class="testimonial-author">General Manager</p>
                    </div>
                    <a class="btn-solid-reg" href="#your-link">DETAILS</a> <a class="btn-outline-reg mfp-close as-button" href="#tours">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->

        <div id="tour-diurno" class="lightbox-basic zoom-anim-dialog mfp-hide">
            <div class="row justify-content-center">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-10">
                    <img class="img-fluid" src="images/services-1.jpg" alt="alternative">
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
                    
                    
                    
                    <div class="testimonial-container">
                        <p class="testimonial-text">Parrafo sobre comentario de algo.</p>
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
                    <img class="img-fluid" src="images/services-2.jpg" alt="alternative">
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
                    
                    
                    
                    <div class="testimonial-container">
                        <p class="testimonial-text">Parrafo sobre comentario de algo (opcional preguntar a Keilor.).</p>
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
                    <img class="img-fluid" src="images/services-3.jpg" alt="alternative">
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
                    
                    
                    
                    <div class="testimonial-container">
                        <p class="testimonial-text">Parrafo sobre comentario de algo (opcional preguntar a Keilor.).</p>
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
                        <h2>Fundadores (Se puede quitar o cambiar)</h2>
                        <p class="p-heading">Pequeña historia sobre los fundadores (podría ser)</p>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
                <div class="row">
                    <div class="col-lg-12">

                        <!-- Team Member -->
                        <div class="team-member">
                            <div class="image-wrapper">
                                <img class="img-fluid" src="images/team-1.png" alt="alternative">
                            </div> <!-- end of image-wrapper -->
                            <p class="p-large">Keilor</p>
                            <p class="job-title">Alguna característica</p>
                            <span class="social-icons">
                                <span class="fa-stack">
                                    <a href="#your-link">
                                        <span class="hexagon"></span>
                                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                                    </a>
                                </span>
                                <span class="fa-stack">
                                    <a href="#your-link">
                                        <span class="hexagon"></span>
                                        <i class="fab fa-whatsapp fa-stack-1x"></i>
                                    </a>
                                </span>
                            </span>
                        </div> <!-- end of team-member -->
                        <!-- end of team member -->

                        <!-- Team Member -->
                        <div class="team-member">
                            <div class="image-wrapper">
                                <img class="img-fluid" src="images/team-2.png" alt="alternative">
                            </div> <!-- end of image wrapper -->
                            <p class="p-large">Oscar</p>
                            <p class="job-title">Alguna característica</p>
                            <span class="social-icons">
                                <span class="fa-stack">
                                    <a href="#your-link">
                                        <span class="hexagon"></span>
                                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                                    </a>
                                </span>
                                <span class="fa-stack">
                                    <a href="#your-link">
                                        <span class="hexagon"></span>
                                        <i class="fab fa-whatsapp fa-stack-1x"></i>
                                    </a>
                                </span>
                            </span>
                        </div> <!-- end of team-member -->
                        <!-- end of team member -->

                        <!-- Team Member -->
                        <div class="team-member">
                            <div class="image-wrapper">
                                <img class="img-fluid" src="images/team-3.png" alt="alternative">
                            </div> <!-- end of image wrapper -->
                            <p class="p-large">juanito</p>
                            <p class="job-title">Alguna característica</p>
                            <span class="social-icons">
                                <span class="fa-stack">
                                    <a href="#your-link">
                                        <span class="hexagon"></span>
                                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                                    </a>
                                </span>
                                <span class="fa-stack">
                                    <a href="#your-link">
                                        <span class="hexagon"></span>
                                        <i class="fab fa-whatsapp fa-stack-1x"></i>
                                    </a>
                                </span>
                            </span>
                        </div> <!-- end of team-member -->
                        <!-- end of team member -->

                        <!-- Team Member -->
                        <div class="team-member">
                            <div class="image-wrapper">
                                <img class="img-fluid" src="images/team-4.png" alt="alternative">
                            </div> <!-- end of image wrapper -->
                            <p class="p-large">Juanita</p>
                            <p class="job-title">Alguna característica</p>
                            <span class="social-icons">
                                <span class="fa-stack">
                                    <a href="#your-link">
                                        <span class="hexagon"></span>
                                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                                    </a>
                                </span>
                                <span class="fa-stack">
                                    <a href="#your-link">
                                        <span class="hexagon"></span>
                                        <i class="fab fa-whatsapp fa-stack-1x"></i>
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
                            <img class="img-fluid" src="images/about.jpg" alt="alternative">
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-7 col-xl-6">
                        <div class="text-container">
                            <div class="section-title">Acerda de </div>
                            <h2> Sloths Territory</h2>
                            <p> Algo de info...</p>
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
                                    <div class="media-body">Más características si fuese posible y necesario...</div>
                                </li>
                            </ul>

                            <!-- Counter -->
                            <!-- <div id="counter">
                                <div class="cell">
                                    <div class="counter-value number-count" data-count="2315">1</div>
                                    <div class="counter-info">clientes <br>Felices</div>
                                </div> -->
                                <!-- <div class="cell">
                                    <div class="counter-value number-count" data-count="121">1</div>
                                    <div class="counter-info">Clientes <br> </div>
                                </div>
                                <div class="cell">
                                    <div class="counter-value number-count" data-count="159">1</div>
                                    <div class="counter-info">Good<br>Reviews</div>
                                </div> -->
                            <!-- </div> -->
                            <!-- end of counter -->

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
                            <h2>Sloth's Territory La Fortuna de San Carlos</h2>
                            <p>Información de contacto</p>
                            <ul class="list-unstyled li-space-lg">
                                <li class="address"><i class="fas fa-map-marker-alt"></i>4 km de La Fortuna hacia el Este, 400 mts entrada de lastre a la derecha, 200 mts Este Fortuna, Alajuela Provinces, Costa Rica</li>
                                <li><i class="fas fa-phone"></i><a href="https://wa.me/message/UAO3TORZITGBE1">+506 8561 0404</a></li>
                                <li><i class="fas fa-envelope"></i><a href="mailto:sloths.territory@gmail.com">sloths.territory@gmail.com</a></li>
                            </ul>
                            <h3>Follow Sloth's Territory</h3>

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
                            <h3>Calificanos en Tripadvisor</h3>
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
                                <label class="label-control" for="cname">Name</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control-input" id="cemail" required>
                                <label class="label-control" for="cemail">Email</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control-textarea" id="cmessage" required></textarea>
                                <label class="label-control" for="cmessage">Your message</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group checkbox">
                                <input type="checkbox" id="cterms" value="Agreed-to-Terms" required>I agree Sloth Territory <a href="privacy-policy.html">Privacy Policy</a> and <a href="terms-conditions.html">Terms Conditions</a>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">SUBMIT MESSAGE</button>
                            </div>
                            <div class="form-message">
                                <div id="cmsgSubmit" class="h3 text-center hidden"></div>
                            </div>
                        </form>
                        <!-- end of contact form -->

                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
            <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3923.364791697207!2d-84.60491328525374!3d10.471881892528604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa07373f73ac3a3%3A0xe455ceddc98003!2sSloth%E2%80%99s%20Territory!5e0!3m2!1ses!2scr!4v1623630326775!5m2!1ses!2scr" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>             
                </div>
        </div> <!-- end of form-2 -->
        <!-- end of contact -->
@endsection
