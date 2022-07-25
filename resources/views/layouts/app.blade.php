<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    {{-- <meta name="keywords" content="sloths arenal costa rica, sloths habitat, sloths territory la fortuna, sloths and frogs, sloths baby, 
    sloth costa rica, sloths in costa rica, sloths la fortuna, sloth tour la fortuna, sloths la fortuna costa rica , sloth costa rica, sloths pictures, sloths 3 toed, sloths 3 toe, 3 toed sloths, osos perezosos, clima en la fortuna"> --}}
    <meta name="keywords" content="{!! $siteSections['web.keyword1'][0]['content'] !!}, {!! $siteSections['web.keyword2'][0]['content'] !!}, {!! $siteSections['web.keyword3'][0]['content'] !!}, {!! $siteSections['web.keyword4'][0]['content'] !!}, {!! $siteSections['web.keyword5'][0]['content'] !!}, {!! $siteSections['web.keyword6'][0]['content'] !!}, {!! $siteSections['web.keyword7'][0]['content'] !!}, {!! $siteSections['web.keyword8'][0]['content'] !!}, {!! $siteSections['web.keyword9'][0]['content'] !!}, {!! $siteSections['web.keyword10'][0]['content'] !!}, {!! $siteSections['web.keyword11'][0]['content'] !!}, {!! $siteSections['web.keyword12'][0]['content'] !!}, {!! $siteSections['web.keyword13'][0]['content'] !!}, {!! $siteSections['web.keyword14'][0]['content'] !!}"
    {{-- <!-- SEO Meta Tags --> --}}
    <meta name="description" content=" {!! $siteSections['web.descripcion'][0]['content'] !!}">
    <meta name="author" content="LichoDevelopment">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="Sloth's territory" /> <!-- website name -->
	<meta property="og:site" content="https://www.slothsterritory.com" /> <!-- website link -->
	<meta property="og:title" content="Sloth's territory | tour de perezosos"/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content=" {!! $siteSections['web.descripcion'][0]['content'] !!} " /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="https://www.slothsterritory.com" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="website" />

    <!-- Website Title -->
    <title> {!! $siteSections['web.titulo'][0]['content'] !!} </title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">
    <link href=" {{asset('css/bootstrap.css')}} " rel="stylesheet">
    <link href=" {{asset('css/fontawesome-all.css')}} " rel="stylesheet">
    <link href=" {{asset('css/swiper.css')}} " rel="stylesheet">
	<link href=" {{asset('css/magnific-popup.css')}} " rel="stylesheet">
	<link href=" {{asset('css/variables.css')}} " rel="stylesheet">
	<link href=" {{asset('css/styles.css')}} " rel="stylesheet">
    <link href=" {{asset('css/combo.css')}} " rel="stylesheet">
	<link href=" {{asset('css/responsive.css')}} " rel="stylesheet">

	<!-- Favicon  -->
    <link rel="icon" href=" {{asset('images/favicon.png')}} ">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	{{-- <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div> --}}
    <!-- end of preloader -->


    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->


        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">
            <img src="/images/favicon.png"  class="logo-img" alt="Sloth's Territory" title="Sloths Territory">
        </a>

        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                {{-- <li class="nav-item">
                    <a href="{{ route(Route::currentRouteName(),'es') }}" 
                    class="nav-link {{$locale === 'es' ? 'current':''}}">ES</a> 
                 </li> --}}
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{ route('home',[$locale]) }}">{!! $siteSections['header.home'][0]['content'] !!} <span class="sr-only">(current)</span></a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link page-scroll" href="#header">{!! $siteSections['header.inicio'][0]['content'] !!}</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#services">{!! $siteSections['header.service'][0]['content'] !!}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#galeria">{!! $siteSections['header.galeria'][0]['content'] !!}</a>
                </li>

                <!-- Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link page-scroll" href="#about">{!! $siteSections['header.acerca_de'][0]['content'] !!}</a>
                    {{-- <a class="nav-link dropdown-toggle page-scroll" href="#about" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">{!! $siteSections['header.acerca_de'][0]['content'] !!}</a> --}}
                    <!-- PENDIENTE -->
                    <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href=" route('terms-conditions',,[$locale])]) }}"><span class="item-text">TERMS CONDITIONS</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="route('privacy-policy',['locale','en']) }}"><span class="item-text">PRIVACY POLICY</span></a>
                    </div> -->
                </li>
                <!-- end of dropdown menu -->

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#contact">{!! $siteSections['header.contactarnos'][0]['content'] !!}</a>
                </li>
                <li class="nav-item dropdown">
                    <a 
                        class="nav-link dropdown-toggle" href="#" 
                        id="dropdown09" data-toggle="dropdown" aria-haspopup="true" 
                        aria-expanded="false">
                        <span class="flag-icon mr-1 flag-icon-{{$locale === 'en' ? 'us' : 'cr'}}"> </span>
                        {{ $locale === 'en' ? 'ENGLISH' : 'ESPAÑOL'}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown09">
                        @if ($locale === 'en')
                            <a class="dropdown-item" href="{{ route(Route::currentRouteName(),'es') }}">
                                <span class="flag-icon flag-icon-cr mr-1"> </span>  
                                {!! $siteSections['español'][0]['content'] !!}
                            </a>
                        @else
                        <a class="dropdown-item" href="{{ route(Route::currentRouteName(),'en') }}">
                            <span class="flag-icon flag-icon-us mr-1"> </span> 
                            {!! $siteSections['ingles'][0]['content'] !!}
                        </a>
                        @endif
                    </div>
                   {{-- <a href="{{ route(Route::currentRouteName(),'en') }}" 
                   class="nav-link {{$locale === 'en' ? 'current':''}} ">EN</a>  --}}
                </li>
            </ul>
            <span class="nav-item social-icons">
                <span class="fa-stack">
                    <a href="https://www.facebook.com/Sloths.Territory.2018" target="_blank">
                        {{-- <span class="hexagon"></span> --}}
                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                    </a>
                </span>
                <span class="fa-stack">
                    <a href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">
                        {{-- <span class="hexagon"></span> --}}
                        <i class="fab fa-whatsapp fa-stack-1x"></i>
                    </a>
                </span>
                <span class="fa-stack">
                    <a href="https://www.instagram.com/slothsterritory/" target="_blank">
                        {{-- <span class="hexagon"></span> --}}
                        <i class="fab fa-instagram fa-stack-1x"></i>
                    </a>
                </span>
            </span>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navbar -->


    @yield('content')


    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="footer-grid">
                <article class="footer-grid-article">
                    <div >
                        <h4>Legal</h4>
                        <ul class="list-unstyled li-space-lg white">
                            <li>
                                <i class="fas fa-file-alt"></i>
                                <a class="white footer-link" href={{ route('terms-conditions',[$locale]) }}" >Terms</a>
                            </li>
                            <li >
                                <i class="fas fa-user-shield"></i>
                                <a class="white footer-link" href="{{ route('privacy-policy',[$locale]) }}">Privacy</a>
                            </li>
                        </ul>
                    </div>
                </article>
                <article class="footer-grid-article">
                    <div >
                        <h4>Social</h4>
                        <ul class="list-unstyled li-space-lg white">
                            <li>
                                <i class="fab fa-facebook-f"></i>
                                <a class="white footer-link" href="https://www.facebook.com/Sloths.Territory.2018" target="_blank">Facebook</a>
                            </li>
                            <li >
                                <i class="fab fa-tripadvisor"></i>
                                <a class="white footer-link" 
                                    href="https://www.tripadvisor.es/Attraction_Review-g309226-d15636276-Reviews-Sloth_s_Territory-La_Fortuna_de_San_Carlos_Arenal_Volcano_National_Park_Province.html" target="_blank">
                                Tripadvisor</a>
                            </li>
                            <li >
                                <i class="fab fa-instagram"></i>
                                <a class="white footer-link" href="https://www.instagram.com/slothsterritory/" target="_blank">Instagram</a>
                            </li>
                            <li >
                                <i class="fab fa-youtube"></i>
                                <a class="white footer-link" href="https://www.youtube.com/channel/UCKqtM7YiCFUtcYs5j8B5hgw" target="_blank">Youtube</a>
                            </li>
                        </ul>
                    </div>
                </article>
                <article class="footer-grid-article contact">
                    <div >
                        <h4>Contact</h4>
                        <ul class="list-unstyled li-space-lg white">
                            <li>
                                <i class="fas fa-phone"></i>
                                <a class="white footer-link" href="tel:+50685610404" >+506 8561 0404</a>
                            </li>
                            <li >
                                <i class="fas fa-envelope"></i>
                                <a class="white footer-link" href="mailto:sloths.territory@gmail.com">sloths.territory@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                </article>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> 
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small text-center">Created by <a href="#m">LichoDevelopment</a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright -->
    <!-- end of copyright -->
    <a 
        href="https://wa.me/message/UAO3TORZITGBE1" id="bookNowBtn"
        target="_blank" class="reservar-btn btn btn-danger">
        <span>{!! $siteSections['btn.reservar_ahora'][0]['content'] !!}</span>
        <i class="fas fa-angle-double-right"></i>
    </a>

    <!-- Scripts -->
    <script src=" {{ asset('js/jquery.min.js')}} "></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src=" {{ asset('js/popper.min.js')}} "></script> <!-- Popper tooltip library for Bootstrap -->
    <script src=" {{ asset('js/bootstrap.min.js')}} "></script> <!-- Bootstrap framework -->
    <script src=" {{ asset('js/jquery.easing.min.js')}} "></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src=" {{ asset('js/swiper.min.js')}} "></script> <!-- Swiper for image and text sliders -->
    <script src=" {{ asset('js/jquery.magnific-popup.js')}} "></script> <!-- Magnific Popup for lightboxes -->
    <script src=" {{ asset('js/morphext.min.js')}} "></script> <!-- Morphtext rotating text in the header -->
    <script src=" {{ asset('js/isotope.pkgd.min.js')}} "></script> <!-- Isotope for filter -->
    <script src=" {{ asset('js/validator.min.js')}} "></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src=" {{ asset('js/scripts.js')}} "></script> <!-- Custom scripts -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    @yield('scripts')
</body>
</html>
