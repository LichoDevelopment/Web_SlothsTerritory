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
                    @foreach ($combos as $combo)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>{{$combo[0]->name}}</span>
                            <div>
                                <a href="{{ route('admin.combos.show', $combo[0]->uuid) }}" class="btn btn-sm btn-warning fa fa-eye"> </a>
                                <button class="btn btn-sm btn-danger fa fa-trash delete-combo-btn" data-id="{{ $combo[0]->uuid }}">
                                </button>
                            </div>
                        </li>
                        
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="{{ url('js/combos.js') }}"></script>
@endsection