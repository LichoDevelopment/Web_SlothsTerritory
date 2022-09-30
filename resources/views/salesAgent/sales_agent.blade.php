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
                <a href="{{ route('sales_agents.download', 'Fotografias_Slothsterritory.zip') }}">test</a>
                <img src="public\salesAgent\copy1.jpeg" alt="Boss" style="width:45%" class="sales-agent-circle sales-agent-hover-opacity img-sales-agent-options">
                <h3 class="h3-sales-agent">TARIFAS</h3>
            </div>

            <div class="sales-agent-quarter">
                <img src="images/sales-agent/copy1.jpeg" alt="Boss" style="width:45%" class="sales-agent-circle sales-agent-hover-opacity">
                <h3 class="h3-sales-agent">FOTOGRAFÍAS</h3>
            </div>

            <div class="sales-agent-quarter">
                <img src="images/sales-agent/copy1.jpeg" alt="Boss" style="width:45%" class="sales-agent-circle sales-agent-hover-opacity">
                <h3 class="h3-sales-agent">LOGOS</h3>
            </div>

            <div class="sales-agent-quarter">
                <img src="images/sales-agent/copy1.jpeg" alt="Boss" style="width:45%" class="sales-agent-circle sales-agent-hover-opacity">
                <h3 class="h3-sales-agent">GALERÍA</h3>
            </div>

        </div>
    </div>
@endsection
