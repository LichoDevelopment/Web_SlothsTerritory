
@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h1>Editar Seccion</h1>
        </div>
        <div class="card-body">
            <div class="card card-body">
                <form id="updateSiteSection">
                    <div class="mb-3">
                        <label for="title">Titulo</label>
                        <input type="text" name="title" class="form-control" id="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="enContent">Contenido en Inglés</label>
                        <textarea name="enContent" id="enContent" class="form-control" rows="10" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="esContent">Contenido en Español</label>
                        <textarea name="esContent" id="esContent" class="form-control" rows="10" required></textarea>
                    </div>

                    <button class="btn btn-success" type="submit">Agregar</button>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script>
        const enContent = document.querySelector('#enContent');
        const esContent = document.querySelector('#esContent');
        const updateSiteSection = document.querySelector('#updateSiteSection');

        let enContentTextFormatted = '';
        let esContentTextFormatted = '';

        enContent.addEventListener('keydown', e => {
            enContentTextFormatted = enContent.value.replace(/\n/g, '<br>');
        });

        esContent.addEventListener('keydown', e => {
            esContentTextFormatted = esContent.value.replace(/\n/g, '<br>');
        });

        updateSiteSection.addEventListener('submit', e => {
            e.preventDefault();

            fetch('/site-sections/{{ $id }}',{
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    title: document.querySelector('#title').value,
                    enContent: enContentTextFormatted,
                    esContent: esContentTextFormatted
                })
            })
        });


    </script>
@endsection