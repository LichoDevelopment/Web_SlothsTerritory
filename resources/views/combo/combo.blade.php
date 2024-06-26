@extends('layouts.app')

@section('content')

    <section class="wrapper-combo">
        <div class="container-fostrap-combo">
            <div>
                {{-- <img src="/images/favicon.png" class="fostrap-logo-combo"/> --}}
                <h1 class="heading-combo">
                    Our Combos 
                </h1>
            </div>
            <div class="content">
                <div class="container">
                    <div class="combo-grid">
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
                                
                                <div class="">
                                    <div class="card-combo">
                                        <a class="img-card-combo" href="#">
                                        <img src="/storage/{{$combo->image}}" />
                                    </a>
                                        <div class="card-content-combo">
                                            <h4 class="card-title-combo">
                                                <a href="#"> {{$combo->name}}
                                            </a>
                                            </h4>
                                            <p class="preview-description" data-content="{{$combo->description}}">
                                                
                                            </p>
                                        </div>
                                        {{-- <div class="card-read-more-combo">
                                            <a href="#" class="btn btn-link btn-block">
                                                Read More
                                            </a>
                                        </div> --}}
                                        <a class="popup-with-move-anim" href="#{{$combo->uuid}}"><div class="btn-solid-reg page-scroll">{!! $siteSections['btn.mas_detalles'][0]['content'] !!}</div></a> 
                                                                                <!-- {!! $siteSections['terminos_condiciones'][0]['content'] !!} -->
                                    </div>
                                </div>  

                                <div id="{{$combo->uuid}}" class="lightbox-basic zoom-anim-dialog mfp-hide">
                                    <div class="row justify-content-center">
                                        <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                                        <div class="col-lg-10 mb-2">
                                            <img class="img-fluid" src="/storage/{{$combo->image}}" alt="tour de perezosos en La Fortuna" title="Tour de perezosos">
                                        </div> <!-- end of col -->
                                        <div class="col-lg-10">
                                            <h3>{{$combo->name}}</h3>
                                            {{-- <hr class="line-heading"> --}}
                                            <hr>
                                            <h6 class="text-justify">{{$combo->description}}</h6>                                           

                                            <div class="row mb-3">
                                                <div class="col-lg-6 col-sm-12">
                                                    <p><strong>Itinirery </strong></p>
                                                    <ul class="list-group itinerary" data-itinerary="{{$combo->itinerary}}"></ul>
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <p><strong> Rates</strong></p>
                                                    <p><strong>Adults Price:</strong> ${{$combo->adult_price}}</p>
                                                    <p><strong>Kids Price:</strong> ${{$combo->kid_price}}</p>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row mb-2">
                                                <div class="col-lg-6 col-sm-12">
                                                    <p><strong>What is Included:</strong></p>
                                                    <p>{{$combo->includes}}</p>
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <p><strong>What to bring: </strong></p>
                                                    <p>{{$combo->requirements}}</p>
                                                </div>

                                            </div>
                                            <a class="btn-solid-reg" href="https://wa.me/message/UAO3TORZITGBE1" target="_blank">{!! $siteSections['btn.reservar_ahora'][0]['content'] !!}</a> <a class="btn-outline-reg mfp-close as-button" href="#services">{!! $siteSections['btn.volver'][0]['content'] !!}</a>
                                        </div> <!-- end of col -->
                                    </div> <!-- end of row -->
                                </div> <!-- end of lightbox-basic -->
                                <!-- end of lightbox -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        const itineraries = document.querySelectorAll('.itinerary');
        const previewDescription = document.querySelectorAll('.preview-description');

        itineraries.forEach(itinerary => {
            let itineraryArray = JSON.parse(itinerary.getAttribute('data-itinerary'));

            itinerary.innerHTML = '';

            itineraryArray.forEach(item => {
                itinerary.innerHTML += `<li class="list-group-item">${item}</li>`;
            });
        });

        previewDescription.forEach(preview => {
            let content = preview.getAttribute('data-content');

            let contentArray = content.split(' ');

            preview.innerHTML = contentArray.slice(0, 20).join(' ') + '...';
        });
    </script>
@endsection


