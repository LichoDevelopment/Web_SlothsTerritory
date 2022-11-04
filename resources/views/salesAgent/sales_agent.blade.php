@extends('layouts.app')


@section('content')
    <div class="sales-agent-container">
        <div id="img-sales-agent-container">
            <img id="img-sales-agent" src="images/perezosos/oso-perezoso-con-hojas.jpeg"
                alt="SlothsTerritory">
        </div>

        <div id="sales-agent-title-container">
            <h2 id="h2-sales-agent">
                <p class="p-h2-sales-agent"> MATERIAL PARA </p>
                <p class="p-h2-sales-agent"> AGENTES DE VENTAS </p>
            </h2>
        </div>
    </div>

    <!-- options Container -->
    <div class="options-container sales-agent-center" id="team">

        <div class="sales-agent-row"><br>

            <div class="sales-agent-quarter">
                <a href="{{ route('sales_agents.download', 'Tarifas_Slothsterritory.zip') }}" target="_blank"  >
                    <img src="icons/logo-tarifas.svg" alt="Boss" style="width:45%" class="sales-agent-circle sales-agent-hover-opacity img-sales-agent-options" >
                    <h3 class="h3-sales-agent">TARIFAS</h3>
                </a>
            </div>

            <div class="sales-agent-quarter">
                <a href="{{ route('sales_agents.download', 'Fotografias_Slothsterritory.zip') }}"target="_blank" >
                    <img src="icons/logo-fotografias.svg" alt="Boss" style="width:45%" class="sales-agent-circle sales-agent-hover-opacity">
                    <h3 class="h3-sales-agent">FOTOGRAFÍAS</h3>
                </a>
            </div>

            <div class="sales-agent-quarter">
                <a href="{{ route('sales_agents.download', 'Logos_Slothsterritory.zip') }}" target="_blank">
                    <img src="icons/logo-blanco.png" alt="Boss" style="width:45%" class="sales-agent-circle sales-agent-hover-opacity">
                    <h3 class="h3-sales-agent">LOGOS</h3>
                </a>
            </div>

            <div class="sales-agent-quarter">
                <a href="/en#galeria" target="_blank" >
                    <img src="icons/logo-galeria.svg" alt="Boss" style="width:45%" class="sales-agent-circle sales-agent-hover-opacity">
                    <h3 class="h3-sales-agent">GALERÍA</h3>
                </a>
            </div>

        </div>
    </div>

    <div class="container pd-agents" >
        <div>
            <h2 class="h2-sales-agent-info">INFORMACIÓN DE CONTACTO</h2>
        </div>
        <div class="sales-agent-grid">
            <article class="sales-agent-grid-article">
                <div >
                    <h4 class="pd-bottom">RESERVACIONES</h4>
                    <ul class="list-unstyled li-space-lg greenSloth">
                        <li>
                            <i class="fas fa-user"></i>
                            <a class="agent-link" href="#">Juan José Pérez Rojas</a>
                        </li>
                        <li >
                            <i class="fas fa-phone"></i>
                            <a class="agent-link" href="tel:+50685610404">+506 8561-0404</a>
                        </li>
                        <li >
                            <i class="fas fa-envelope"></i>
                            <a class="agent-link" href="mailto:info@slothsterritory.com">info@slothsterritory.com</a>
                        </li>
                    </ul>
                </div>
            </article>
            <article class="sales-agent-grid-article">
                <div >
                    <h4 class="pd-bottom">MERCADEO</h4>
                    <ul class="list-unstyled li-space-lg greenSloth">
                        <li>
                            <i class="fas fa-user"></i>
                            <a class="agent-link" href="#">Natalia Valenciano</a>
                        </li>
                        <li >
                            <i class="fas fa-phone"></i>
                            <a class="agent-link" href="tel:+50687069029">+506 8706-9029</a>
                        </li>
                        <li >
                            <i class="fas fa-envelope"></i>
                            <a class="agent-link" href="mailto:mercadeo@slothsterritory.com">mercadeo@slothsterritory.com</a>
                        </li>
                    </ul>
                </div>
            </article>
            <article class="sales-agent-grid-article">
                <div >
                    <h4 class="pd-bottom">GERENCIA</h4>
                    <ul class="list-unstyled li-space-lg greenSloth">
                        <li>
                            <i class="fas fa-user greenSloth"></i>
                            <a class="agent-link" href="#">Keilor Rodríguez</a>
                        </li>
                        <li >
                            <i class="fas fa-phone"></i>
                            <a class="agent-link" href="tel:+50684119219">+506 8411-9219</a>
                        </li>
                        <li >
                            <i class="fas fa-envelope"></i>
                            <a class="agent-link" href="mailto:gerencia@slothsterritory.com">gerencia@slothsterritory.com</a>
                        </li>
                    </ul>
                </div>
            </article>
        </div> <!-- end of row -->
    </div> <!-- end of container -->
@endsection
