@extends('layouts.app')

@section('content')

    <section class="wrapper-combo">
        <div class="container-fostrap-combo">
            <div>
                <img src="/images/favicon.png" class="fostrap-logo-combo"/>
                <h1 class="heading-combo">
                    Our Combos 
                </h1>
            </div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        @foreach ($combos as $combo)
                            @if ($locale === "en")
                                @php
                                    $combo = $combo[0]
                                @endphp
                            @else
                                @php
                                    $combo = $combo[1]
                                @endphp
                            @endif
                                
                                <div class="col-xs-12 col-sm-4">
                                    <div class="card-combo">
                                        <a class="img-card-combo" href="#">
                                        <img src="/storage/{{$combo->image}}" />
                                    </a>
                                        <div class="card-content-combo">
                                            <h4 class="card-title-combo">
                                                <a href="#"> {{$combo->name}}
                                            </a>
                                            </h4>
                                            <p class="">
                                                {{$combo->description}}
                                            </p>
                                        </div>
                                        <div class="card-read-more-combo">
                                            <a href="#" class="btn btn-link btn-block">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>  
                        @endforeach
                        
                        {{-- <div class="col-xs-12 col-sm-4">
                            <div class="card-combo">
                                <a class="img-card-combo" href="#">
                                <img src="\images\combos\ATV-La_Fortuna.png" />
                            </a>
                                <div class="card-content-combo">
                                    <h4 class="card-title-combo">
                                        <a href="#"> Sloth’s and ATV COMBO tour
                                    </a>
                                    </h4>
                                    <p class="">
                                        This is a combination of adrenaline and conexion with the nature will begin  with  
                                        ATV it Will be a drive for about 4 hours by los Altos de Monterrey and la guaria area, we ...
                                    </p>
                                </div>
                                <div class="card-read-more-combo">
                                    <a href="#" class="btn btn-link btn-block">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="card-combo">
                                <a class="img-card-combo" href="#">
                                <img src="\images\combos\cañon-tour-La_Fortuna.png" />
                            </a>
                                <div class="card-content-combo">
                                    <h4 class="card-title-combo">
                                        <a href="#">Sloths and Maquique Canyoning Tour
                                    </a>
                                    </h4>
                                    <p class="">
                                        The canyoning has 5 rappels where the lowest one is about 20 mts and higgest is anout 55mts
                                        and one canopy line ...
                                    </p>
                                </div>
                                <div class="card-read-more-combo">
                                    <a href="#" class="btn btn-link btn-block">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="card-combo">
                                <a class="img-card-combo" href="#">
                                <img src="\images\combos\cañon-tour-La_Fortuna.png" />
                            </a>
                                <div class="card-content-combo">
                                    <h4 class="card-title-combo">
                                        <a href="#">Sloths and Maquique Canyoning Tour
                                    </a>
                                    </h4>
                                    <p class="">
                                        The canyoning has 5 rappels where the lowest one is about 20 mts and higgest is anout 55mts
                                        and one canopy line ...
                                    </p>
                                </div>
                                <div class="card-read-more-combo">
                                    <a href="#" class="btn btn-link btn-block">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="card-combo">
                                <a class="img-card-combo" href="#">
                                <img src="\images\combos\cañon-tour-La_Fortuna.png" />
                            </a>
                                <div class="card-content-combo">
                                    <h4 class="card-title-combo">
                                        <a href="#">Sloths and Maquique Canyoning Tour
                                    </a>
                                    </h4>
                                    <p class="">
                                        The canyoning has 5 rappels where the lowest one is about 20 mts and higgest is anout 55mts
                                        and one canopy line ...
                                    </p>
                                </div>
                                <div class="card-read-more-combo">
                                    <a href="#" class="btn btn-link btn-block">
                                        Read More
                                    </a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection


