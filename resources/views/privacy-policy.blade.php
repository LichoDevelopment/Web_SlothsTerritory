@extends('layouts.app')


@section('content')

    <!-- Header -->
    <header id="header" class="ex-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{__("cancellation_policy.title")}}</h1>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->


    <!-- Breadcrumbs -->
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                        <a href="index.html">{{__("header.home")}}</a><i class="fa fa-angle-double-right"></i><span>{{__("cancellation_policy.title")}}</span>
                    </div> <!-- end of breadcrumbs -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of breadcrumbs -->


    <!-- Privacy Content -->
    <div class="ex-basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container">
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <ul class="list-unstyled li-space-lg indent">
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body">
                                            {{__("cancellation_policy.item1")}}
                                        </div>
                                    </li>
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body">
                                            {{__("cancellation_policy.item2")}}
                                        </div>
                                    </li>
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body">
                                            {{__("cancellation_policy.item3")}}
                                        </div>
                                    </li>
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body">
                                            {{__("cancellation_policy.item4")}}
                                        </div>
                                    </li>
                                    <li class="media">
                                        <i class="fas fa-square"></i>
                                        <div class="media-body">
                                            {{__("cancellation_policy.item5")}}
                                        </div>
                                    </li>
                                </ul>
                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                    </div> <!-- end of text-container-->

                    <div class="container text-center text-muted">
                        Senderos RPKO S.A. cédula jurídica 3-101-777088 <br>
                        info@slothsterritory | Teléfono: +506 8561 0404 <br>
                        La Fortuna, Alajuela, Costa Rica
                    </div>
                    <a class="btn-outline-reg back" href="/">{{__("header.home")}}</a>
                </div> <!-- end of col-->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-2 -->
    <!-- end of privacy content -->


    <!-- Breadcrumbs -->
    <div class="ex-basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                        <a href="index.html">Home</a><i class="fa fa-angle-double-right"></i><span>{{__("cancellation_policy.title")}}</span>
                    </div> <!-- end of breadcrumbs -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of breadcrumbs -->

@endsection
