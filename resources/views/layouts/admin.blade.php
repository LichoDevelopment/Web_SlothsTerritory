<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Inbox</title>

    {{-- <link href="css/font-face.css" rel="stylesheet" media="all"> --}}
    
    @if (env('APP_ENV') == 'local')
        <link href="{{asset('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" >
        <link href="{{asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" >
        <link href="{{asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" >
    @else
        <link href="{{env('APP_URL')}}/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" >
        <link href="{{env('APP_URL')}}/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" >
        <link href="{{env('APP_URL')}}/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" >
    @endif
    
    <link href="{{env('APP_URL')}}/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" >
    <link href="{{env('APP_URL')}}/vendor/animsition/animsition.min.css" rel="stylesheet" >
    <link href="{{env('APP_URL')}}/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" >
    <link href="{{env('APP_URL')}}/vendor/wow/animate.css" rel="stylesheet" >
    <link href="{{env('APP_URL')}}/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" >
    <link href="{{env('APP_URL')}}/vendor/slick/slick.css" rel="stylesheet" >
    <link href="{{env('APP_URL')}}/vendor/select2/select2.min.css" rel="stylesheet" >
    <link href="{{env('APP_URL')}}/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" >
    <link href="{{env('APP_URL')}}/css/admin.css" rel="stylesheet" >
    <link href="{{env('APP_URL')}}/css/combo.css" rel="stylesheet" >
    <link href="{{env('APP_URL')}}/css/variables.css" rel="stylesheet" >
    <link href="{{env('APP_URL')}}/css/styles.css" rel="stylesheet" >
    <link href="{{env('APP_URL')}}/css/responsive.css" rel="stylesheet" >
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.25/af-2.3.7/b-1.7.1/date-1.1.0/r-2.2.9/datatables.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">

</head>

<body class="animsition> {{-- class="animsition" --}}
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <h2>Sloth's Territory</h2>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="{{ Route::is('admin.index') ? 'active' : '' }} ">
                            <a class="js-arrow" href="{{ route('admin.index') }}">
                                <i class="fas fa-home"></i>Inicio
                            </a>
                        </li>
                        <li class="{{ Route::is('admin.registros') ? 'active' : '' }} ">
                            <a href="{{ route('admin.registro') }}">
                                <i class="fas fa-chart-bar"></i>Registros</a>
                        </li>
                        <li class="{{ Route::is('admin.agencias') ? 'active' : '' }} ">
                            <a href="{{ route('admin.agencia') }}">
                                <i class="fas fa-briefcase"></i>Agencias</a>
                        </li>
                        @if ( rol_usuario()->id == 1)
                            <li class="{{ Route::is('admin.tours') ? 'active' : '' }} ">
                                <a href="{{ route('admin.tours') }}">
                                    <i class="fas fa-calendar-alt"></i>Tours</a>
                            </li>
                            <li class="{{ Route::is('admin.precio') ? 'active' : '' }} ">
                                <a href="{{ route('admin.precio') }}">
                                    <i class="fas fa-dollar-sign"></i>Precios</a>
                            </li>
                            <li class="{{ Route::is('admin.horario') ? 'active' : '' }} ">
                                <a href="{{ route('admin.horario') }}">
                                    <i class="fas fa-clock"></i>Horarios</a>
                            </li>
                            <li class="{{ Route::is('admin.mensaje') ? 'active' : '' }} ">
                                <a href="{{ route('admin.mensaje') }}">
                                    <i class="fas fa-envelope"></i>Mensajes</a>
                            </li>
                            <li class="{{ Route::is('reservas.eliminadas') ? 'active' : '' }} ">
                                <a href="{{ route('reservas.eliminadas') }}">
                                    <i class="fas fa-recycle"></i>Eliminadas</a>
                            </li>
                            <li class="{{ Route::is('admin.carusel') ? 'active' : '' }} ">
                                <a href="{{ route('admin.carusel') }}">
                                    <i class="fas fa-images"></i>Carusel</a>
                            </li>
                            
                        @endif
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{ route('admin.index') }}">
                    <h4 class="">Sloth's Territory</h4>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="{{ Route::is('admin.index') ? 'active' : '' }} ">
                            <a class="js-arrow" href="{{ route('admin.index') }}">
                                <i class="fas fa-home"></i>Inicio
                            </a>
                        </li>
                        
                        <li class="{{ Route::is('admin.agencias') ? 'active' : '' }} ">
                            <a href="{{ route('admin.agencia') }}">
                                <i class="fas fa-briefcase"></i>Agencias</a>
                        </li>
                        @if (rol_usuario()->id == 1)
                            <li class="{{ Route::is('admin.registros') ? 'active' : '' }} ">
                                <a href="{{ route('admin.registro') }}">
                                    <i class="fas fa-chart-bar"></i>Registros</a>
                            </li>
                            <li class="{{ Route::is('admin.tours') ? 'active' : '' }} ">
                                <a href="{{ route('admin.tours') }}">
                                    <i class="fas fa-calendar-alt"></i>Tours</a>
                            </li>
                            <li class="{{ Route::is('admin.precio') ? 'active' : '' }} ">
                                <a href="{{ route('admin.precio') }}">
                                    <i class="fas fa-dollar-sign"></i>Precios</a>
                            </li>
                            <li class="{{ Route::is('admin.horario') ? 'active' : '' }} ">
                                <a href="{{ route('admin.horario') }}">
                                    <i class="fas fa-clock"></i>Horarios</a>
                            </li>
                            
                            <li class="{{ Route::is('reservas.eliminadas') ? 'active' : '' }} ">
                                <a href="{{ route('reservas.eliminadas') }}">
                                    <i class="fas fa-recycle"></i>Eliminadas</a>
                            </li>
                        @endif
                        {{-- <li class="{{ Route::is('admin.combos.index') ? 'active' : '' }} ">
                            <a href="{{ route('admin.combos.index') }}">
                                <i class="fas fa-tags"></i>Combos</a>
                        </li> --}}
                        <li class="{{ Route::is('admin.mensaje') ? 'active' : '' }} ">
                            <a href="{{ route('admin.mensaje') }}">
                                <i class="fas fa-envelope"></i>Mensajes sin leer</a>
                        </li>
                        <li class="{{ Route::is('admin.mensajesLeidos') ? 'active' : '' }} ">
                            <a href="{{ route('admin.mensajesLeidos') }}">
                                <i class="fas fa-envelope"></i>Mensajes leídos</a>
                        </li>
                        <li class="{{ Route::is('admin.carusel') ? 'active' : '' }} ">
                            <a href="{{ route('admin.carusel') }}">
                                <i class="fas fa-images"></i>Carusel</a>
                        </li>
                        <li class="{{ Route::is('admin.galeria') ? 'active' : '' }} ">
                            <a href="{{ route('admin.galeria') }}">
                                <i class="fas fa-images"></i>Galeria</a>
                        </li>
                        <li class="{{ Route::is('admin.site.sections.index') ? 'active' : '' }} ">
                            <a href="{{ route('admin.site.sections.index') }}">
                                <i class="fas fa-images"></i>Pagina</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap float-right ">
                            <div class="header-button">
                                <div class="noti-wrap">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            {{-- <img src="images/icon/avatar-01.jpg" alt="John Doe" /> --}}
                                            <img src="{{env('APP_URL')}}/images/favicon--.png" alt="sloth's territory logo" />
                                            
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{Auth::user()->name}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        {{-- <img src="images/icon/avatar-01.jpg" alt="John Doe" /> --}}
                                                        <img src="{{env('APP_URL')}}/images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"> {{Auth::user()->name}} </a>
                                                    </h5>
                                                    <span class="email">{{Auth::user()->email}}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <a href="#">
                                                <button type="submit">
                                                        <i class="zmdi zmdi-power"></i>Logout
                                                    </button>
                                                    </a>
                                                
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid" id="app">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
    <!-- Jquery JS-->
    <script src="{{env('APP_URL')}}/vendor/jquery-3.2.1.min.js" ></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap JS-->
    {{-- <script src="vendor/bootstrap-4.1/popper.min.js"></script> --}}
    {{-- <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script> --}}
    <script src="{{env('APP_URL')}}/vendor/bootstrap-4.1/popper.min.js" ></script>
    <script src="{{env('APP_URL')}}/vendor/bootstrap-4.1/bootstrap.min.js" ></script>
    <!-- Vendor JS       -->
    {{-- <script src="vendor/slick/slick.min.js"></script> --}}
    <script src="{{env('APP_URL')}}/vendor/slick/slick.min.js" ></script>
        
    {{-- <script src="vendor/wow/wow.min.js"></script> --}}
    {{-- <script src="vendor/animsition/animsition.min.js"></script> --}}
    {{-- <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> --}}
    <script src="{{env('APP_URL')}}/vendor/wow/wow.min.js"></script>
    <script src="{{env('APP_URL')}}/vendor/animsition/animsition.min.js" ></script>
    <script src="{{env('APP_URL')}}/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    
    {{-- <script src="vendor/counter-up/jquery.waypoints.min.js"></script> --}}
    {{-- <script src="vendor/counter-up/jquery.counterup.min.js"></script> --}}
    <script src="{{env('APP_URL')}}/vendor/counter-up/jquery.waypoints.min.js" ></script>
    <script src="{{env('APP_URL')}}/vendor/counter-up/jquery.counterup.min.js" ></script>

    {{-- <script src="vendor/circle-progress/circle-progress.min.js"></script> --}}
    {{-- <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script> --}}
    {{-- <script src="vendor/chartjs/Chart.bundle.min.js"></script> --}}
    {{-- <script src="vendor/select2/select2.min.js"></script> --}}
    <script src="{{env('APP_URL')}}/vendor/circle-progress/circle-progress.min.js" ></script>
    <script src="{{env('APP_URL')}}/vendor/perfect-scrollbar/perfect-scrollbar.js" ></script>
    <script src="{{env('APP_URL')}}/vendor/chartjs/Chart.bundle.min.js" ></script>
    <script src="{{env('APP_URL')}}/vendor/select2/select2.min.js" ></script>
        
        
    <!-- Main JS-->
    {{-- <script src="js/main.js"></script> --}}
    <script src="{{env('APP_URL')}}/js/main.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.25/af-2.3.7/b-1.7.1/date-1.1.0/r-2.2.9/datatables.min.js"></script>    {{-- <script src="vendor/jquery-3.2.1.min.js"></script> --}}
    @yield('scripts')
    </body>

</html>
<!-- end document-->
