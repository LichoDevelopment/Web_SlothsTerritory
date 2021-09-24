@extends('layouts.admin')

@section('content')
    <h2 class="display-6">Carusel principal</h2>

    <div class="card mt-2">
        <div class="card-header">
            <button class="float-right btn btn-info" id="addImageBtn">Agregar <span class="fa fa-plus"></span> </button>
        </div>
        <div class="card-body">
            <div id="imgCarusel">
                @foreach ($imagenesCarusel as $img)
                    <img src="/storage/{{$img->url}}" 
                        class="img-carusel" data-id="{{$img->id}}" alt="">
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const addImageBtn = document.querySelector('#addImageBtn')
        const imgCarusel = document.querySelector('#imgCarusel')
        
        addImageBtn.addEventListener('click', event => {
            event.preventDefault();
            
            swal.fire({
                icon: 'info',
                html: `
                    <div class="container">
                        <div class="mb-2">
                            <label>Titulo</label>
                            <input class="form-control" type="text" id="titulo-imagen">
                        </div>
                        <div class="mb-1 custom-file">
                            <input class="custom-file-input" type="file" id="imagen">
                            <label class="custom-file-label" for="imagen">Eliga una imagen</label>
                        </div>
                    </div>

                `,
                confirmButtonText: 'Subir',
                cancelButtonText: 'Cancelar',
                showCancelButton: true,
                preConfirm: () => {
                    const titulo = document.querySelector('#titulo-imagen').value
                    const imagen = document.querySelector('#imagen').files

                    if(!titulo) {
                        swal.fire({
                            icon: 'warning',
                            text: 'debes ingresar un titulo para la imagen'
                        })
                    }

                    if(imagen.length === 0) {
                        swal.fire({
                            icon: 'warning',
                            text: 'debes seleccionar una imagen'
                        })
                    }

                    if(titulo && imagen.length > 0) {
                        const formData = new FormData();

                        formData.append('titulo', titulo)
                        formData.append('file', imagen[0])

                        fetch('/carusel', {
                            method: 'POST',
                            body: formData
                        }).then(() => {
                            location.reload();
                        })
                    }
                }
            })
        })

        imgCarusel.addEventListener('click', event => {
            event.preventDefault();
            if(event.target && event.target.tagName === 'IMG'){
                let { id } = event.target.dataset;
                Swal.fire({
                    icon: 'warning',
                    text: 'esta seguro de eliminar esta imagen?'
                }).then(({isConfirmed}) => {
                    if(isConfirmed){
                        fetch(`/carusel/${id}`,{ method: 'DELETE'})
                        .then(() => { location.reload() })
                    }
                })
            }
        })
    </script>
@endsection