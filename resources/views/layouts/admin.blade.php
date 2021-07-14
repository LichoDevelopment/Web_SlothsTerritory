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

    <!-- Fontfaces CSS-->
    {{--<link href="css/font-face.css" rel="stylesheet" media="all">

    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/admin.css" rel="stylesheet" media="all"> --}}

    {{-- PRUEBA INTERFAZ --}}
    <link href="{{ url('css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">

    <link href="{{ url('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
    <link href="{{ url('css/admin.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.25/af-2.3.7/b-1.7.1/date-1.1.0/r-2.2.9/datatables.min.css"/>


</head>

<body class="animsition">
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
                                <i class="fas fa-calendar-alt"></i>Inicio
                            </a>
                        </li>
                        <li class="{{ Route::is('admin.sales') ? 'active' : '' }} ">
                            <a href="{{ route('admin.sales') }}">
                                <i class="fas fa-chart-bar"></i>Ventas</a>
                        </li>
                        <li class="{{ Route::is('admin.agencias') ? 'active' : '' }} ">
                            <a href="{{ route('admin.agencia') }}">
                                <i class="fas fa-calendar-alt"></i>Agencias</a>
                        </li>
                        <li class="{{ Route::is('admin.tours') ? 'active' : '' }} ">
                            <a href="{{ route('admin.tours') }}">
                                <i class="fas fa-calendar-alt"></i>Tours</a>
                        </li>
                        <li class="{{ Route::is('admin.precio') ? 'active' : '' }} ">
                            <a href="{{ route('admin.precio') }}">
                                <i class="fas fa-calendar-alt"></i>Precios</a>
                        </li>
                        <li class="{{ Route::is('admin.horario') ? 'active' : '' }} ">
                            <a href="{{ route('admin.horario') }}">
                                <i class="fas fa-calendar-alt"></i>Horarios</a>
                        </li>
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
                                <i class="fas fa-calendar-alt"></i>Inicio
                            </a>
                        </li>
                        <li class="{{ Route::is('admin.sales') ? 'active' : '' }} ">
                            <a href="{{ route('admin.sales') }}">
                                <i class="fas fa-chart-bar"></i>Ventas</a>
                        </li>
                        <li class="{{ Route::is('admin.agencias') ? 'active' : '' }} ">
                            <a href="{{ route('admin.agencia') }}">
                                <i class="fas fa-calendar-alt"></i>Agencias</a>
                        </li>
                        <li class="{{ Route::is('admin.tours') ? 'active' : '' }} ">
                            <a href="{{ route('admin.tours') }}">
                                <i class="fas fa-calendar-alt"></i>Tours</a>
                        </li>
                        <li class="{{ Route::is('admin.precio') ? 'active' : '' }} ">
                            <a href="{{ route('admin.precio') }}">
                                <i class="fas fa-calendar-alt"></i>Precios</a>
                        </li>
                        <li class="{{ Route::is('admin.horario') ? 'active' : '' }} ">
                            <a href="{{ route('admin.horario') }}">
                                <i class="fas fa-calendar-alt"></i>Horarios</a>
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
                                            <img src="{{ url('images/icon/avatar-01.jpg')}}" alt="John Doe" />
                                            
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{Auth::user()->name}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        {{-- <img src="images/icon/avatar-01.jpg" alt="John Doe" /> --}}
                                                        <img src="{{ url('images/icon/avatar-01.jpg')}}" alt="John Doe" />
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
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

    <!-- Jquery JS-->
    <script src="{{ url('vendor/jquery-3.2.1.min.js')}}" ></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap JS-->
    {{-- <script src="vendor/bootstrap-4.1/popper.min.js"></script> --}}
    {{-- <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script> --}}
    <script src="{{ url('vendor/bootstrap-4.1/popper.min.js')}}" ></script>
        <script src="{{ url('vendor/bootstrap-4.1/bootstrap.min.js')}}" ></script>
        <!-- Vendor JS       -->
        {{-- <script src="vendor/slick/slick.min.js"></script> --}}
        <script src="{{ url('vendor/slick/slick.min.js')}}" ></script>
        
    {{-- <script src="vendor/wow/wow.min.js"></script> --}}
    {{-- <script src="vendor/animsition/animsition.min.js"></script> --}}
    {{-- <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> --}}
    <script src="{{ url('vendor/wow/wow.min.js')}}"></script>
    <script src="{{ url('vendor/animsition/animsition.min.js')}}" ></script>
            <script src="{{ url('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    
            {{-- <script src="vendor/counter-up/jquery.waypoints.min.js"></script> --}}
            {{-- <script src="vendor/counter-up/jquery.counterup.min.js"></script> --}}
            <script src="{{ url('vendor/counter-up/jquery.waypoints.min.js')}}" ></script>
            <script src="{{ url('vendor/counter-up/jquery.counterup.min.js')}}" ></script>
    
            {{-- <script src="vendor/circle-progress/circle-progress.min.js"></script> --}}
            {{-- <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script> --}}
            {{-- <script src="vendor/chartjs/Chart.bundle.min.js"></script> --}}
            {{-- <script src="vendor/select2/select2.min.js"></script> --}}
            <script src="{{ url('vendor/circle-progress/circle-progress.min.js')}}" ></script>
            <script src="{{ url('vendor/perfect-scrollbar/perfect-scrollbar.js')}}" ></script>
            <script src="{{ url('vendor/chartjs/Chart.bundle.min.js')}}" ></script>
        <script src="{{ url('vendor/select2/select2.min.js')}}" ></script>
        
        
        <!-- Main JS-->
        {{-- <script src="js/main.js"></script> --}}
        <script src="{{ url('js/main.js')}}"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.25/af-2.3.7/b-1.7.1/date-1.1.0/r-2.2.9/datatables.min.js"></script>    {{-- <script src="vendor/jquery-3.2.1.min.js"></script> --}}
        @yield('scripts')
    </body>

</html>
<!-- end document-->
