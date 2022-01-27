
@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h1>Editar Seccion</h1>
        </div>

        <div class="card-body">
            <div class="card card-body">
                <form action=" {{ route('admin.site.sections.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="enContent">Contenido en Inglés</label>
                        <textarea name="enContent" id="enContent" class="form-control" rows="10">{{ $siteSections[0]->content}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="esContent">Contenido en Español</label>
                        <textarea name="esContent" id="esContent" class="form-control" rows="10">{{ $siteSections[1]->content}}</textarea>
                    </div>
                        
                    <textarea name="uuid" id="uuid" class="form-control" rows="1" >{{ $siteSections[1]->uuid}}  </textarea>

                    <button class="btn btn-success" type="submit">Editar</button>
                </form>
            </div>
        </div>
    </div>

@endsection