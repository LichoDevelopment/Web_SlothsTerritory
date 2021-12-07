@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h1>Combos</h1>
        </div>

        <div class="card-body">

            <div class="d-flex justify-content-end">
                <a class="btn btn-outline-info mb-2" href="/combos/create">
                    Agregar
                </a>
            </div>


            <div class="container">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>Nombre</span>
                        <button class="btn btn-sm btn-info">
                            Ver
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection
