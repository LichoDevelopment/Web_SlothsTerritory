@extends('layouts.app')


@section('content')
    <div id="sales-agent-container">
        <div id="img-sales-agent-container">
            <img id="img-sales-agent" src="images/perezosos/tierno-oso-perezoso-en-la-fortuna-sloths-territory.jpeg"
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
@endsection
