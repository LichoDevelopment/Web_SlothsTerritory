<!DOCTYPE html>
<<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    {{-- <meta name="keywords" content="sloths arenal costa rica, sloths habitat, sloths territory la fortuna, sloths and frogs, sloths baby, 
    sloth costa rica, sloths in costa rica, sloths la fortuna, sloth tour la fortuna, sloths la fortuna costa rica , sloth costa rica, sloths pictures, sloths 3 toed, sloths 3 toe, 3 toed sloths, osos perezosos, clima en la fortuna"> --}}
    {{-- <!-- SEO Meta Tags --> --}}
    <meta name="author" content="LichoDevelopment">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="Sloth's territory" /> <!-- website name -->
	<meta property="og:site" content="https://www.slothsterritory.com" /> <!-- website link -->
	<meta property="og:title" content="Sloth's territory | tour de perezosos"/> <!-- title shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="https://www.slothsterritory.com" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="website" />

    <!-- Website Title -->

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
    <link href=" {{asset('css/salesAgent.css')}} " rel="stylesheet">

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





    @yield('content')


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small text-center">Created by <a href="#m"></a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright -->
    <!-- end of copyright -->


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
