<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="keywords" content="sloth tour arenal, arenal sloth tour, sloths territory la fortuna, sloth watching arenal, sloth watching costa rica, sloth costa rica, sloth trail arenal, sloth tour arenal, sloth tour la fortuna, sloth sanctuary la fortuna , sloth costa rica, sloth walking, Sloth Walking High, sloth watching trail, sloth walk, sloth walk arenal, sloth walking arenal, sloth park arenal, sloth park la fortuna, sloth watching near arenal">

    <!-- SEO Meta Tags -->
    <meta name="description" content="The best sloths tours in la fortuna de San Carlos">
    <meta name="author" content="LichoDevelopment">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="Sloths territory" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content="Sloths territory | the best place to see sloths in la fortuna"/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="Sloths territory is a wonderful place to enjoy and see sloths in their habitad" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="https://www.sloths-territory.com" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="website" />

    <!-- Website Title -->
    <title>Sloths Territory</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/magnific-popup.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">

    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->


    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->


        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">
            <img src="images/favicon.png"  class="logo-img" alt="alternative">
        </a>

        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{ route('home') }}">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#header">INTRO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#services">SERVICES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#tours">GALERÍA</a>
                </li>

                <!-- Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" href="#about" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">ABOUT</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('terms-conditions') }}"><span class="item-text">TERMS CONDITIONS</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="{{ route('privacy-policy') }}"><span class="item-text">PRIVACY POLICY</span></a>
                    </div>
                </li>
                <!-- end of dropdown menu -->

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#contact">CONTACT</a>
                </li>
            </ul>
            <span class="nav-item social-icons">
                <span class="fa-stack">
                    <a href="https://www.facebook.com/Sloths.Territory.2018" target="_blank">
                        <span class="hexagon"></span>
                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                    </a>
                </span>
                <span class="fa-stack">
                    <a href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">
                        <span class="hexagon"></span>
                        <i class="fab fa-whatsapp fa-stack-1x"></i>
                    </a>
                </span>
                <span class="fa-stack">
                    <a href="https://www.instagram.com/slothsterritory/" target="_blank">
                        <span class="hexagon"></span>
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
                    <div>
                        <h4>Legal</h4>
                        <ul class="list-unstyled li-space-lg white">
                            <li>
                                <i class="fas fa-file-alt"></i>
                                <a class="white footer-link" href="terms-conditions" >Terms</a>
                            </li>
                            <li >
                                <i class="fas fa-user-shield"></i>
                                <a class="white footer-link" href="privacy-policy">Privacy</a>
                            </li>
                        </ul>
                    </div>
                </article>
                <article class="footer-grid-article">
                    <div>
                        <h4>Social</h4>
                        <ul class="list-unstyled li-space-lg white">
                            <li>
                                <i class="fab fa-facebook-f"></i>
                                <a class="white footer-link" href="https://www.facebook.com/Sloths.Territory.2018" >Facebook</a>
                            </li>
                            <li >
                                <i class="fab fa-tripadvisor"></i>
                                <a class="white footer-link" 
                                href="https://www.tripadvisor.es/Attraction_Review-g309226-d15636276-Reviews-Sloth_s_Territory-La_Fortuna_de_San_Carlos_Arenal_Volcano_National_Park_Province.html">
                                Tripadvisor</a>
                            </li>
                            <li >
                                <i class="fab fa-instagram"></i>
                                <a class="white footer-link" href="https://www.instagram.com/slothsterritory/">Instagram</a>
                            </li>
                            <li >
                                <i class="fab fa-youtube"></i>
                                <a class="white footer-link" href="https://www.instagram.com/slothsterritory/">Youtube</a>
                            </li>
                        </ul>
                    </div>
                </article>
                <article class="footer-grid-article contact">
                    <div>
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
                {{-- <div class="col-md-6">
                    <div class="text-container about">
                        <h4>Sección extra</h4>
                        <p class="white">Acerda de parrafo o algo...</p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col --> --}}
                {{-- <div class="col-md-2">
                    <div class="text-container">
                        <h4>Links</h4>
                        <ul class="list-unstyled li-space-lg white">
                            <li>
                                <a class="white" href="#your-link">guiaInicio.com</a>
                            </li>
                            <li>
                                <a class="white" href="terms-conditions.html">Terms & Conditions</a>
                            </li>
                            <li>
                                <a class="white" href="privacy-policy.html">Privacy Policy</a>
                            </li>
                        </ul>
                    </div> 
                    <!-- end of text-container -->
                </div>  --}}
                <!-- end of col -->
                {{-- <div class="col-md-2">
                    <div class="text-container">
                        <h4>Tools</h4>
                        <ul class="list-unstyled li-space-lg">
                            <li>
                                <a class="white" href="#your-link">animales.com</a>
                            </li>
                            <li>
                               <a class="white" href="#your-link">miembros.com</a>
                            </li>
                            <!-- <li class="media">
                                <a class="white" href="#your-link">optimizer.net</a>
                            </li> -->
                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col --> --}}
                {{-- <div class="col-md-2">
                    <div class="text-container">
                        <h4>Socios</h4>
                        <ul class="list-unstyled li-space-lg">
                            <li>
                                <a class="white" href="#your-link">xsocio.com</a>
                            </li>
                            <li>
                                <a class="white" href="#your-link">spagina creator.com</a>
                            </li>
                            <li>
                                <a class="white" href="#your-link">xcosa.com</a>
                            </li>
                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col --> --}}
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->
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


    <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/morphext.min.js"></script> <!-- Morphtext rotating text in the header -->
    <script src="js/isotope.pkgd.min.js"></script> <!-- Isotope for filter -->
    <script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>
