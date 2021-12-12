@extends('layouts.admin')

@section('content')
    <h2 class="display-6">Galeria principal</h2>

    <div class="card mt-2">
        <div class="card-header">
            <button class="float-right btn btn-info" id="addImageBtn">Agregar <span class="fa fa-plus"></span> </button>
        </div>
        <div class="card-body">
            <div id="imgCarusel">
                @foreach ($images as $img)
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
        
        addImageBtn.addEventListener('click', async event => {
            event.preventDefault();

            const tipos = await getTipos()

            const tiposHTML = `
                <select class="custom-select mb-2" id="imagenTipo">
                    <option selected value="">Elija un tipo...</option>
                    ${tipos.map(tipo => `<option value="${tipo.id}">${tipo.name}</option>`)}
                </select>`
            
            swal.fire({
                icon: 'info',
                html: `
                    <div class="container">
                        <div class="mb-2">
                            <label>Titulo</label>
                            <input class="form-control" type="text" id="titulo-imagen">
                        </div>
                        ${tiposHTML}
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
                    const tipoInput = document.querySelector('#imagenTipo')

                    const tipo = tipoInput.options[tipoInput.selectedIndex].value

                    if(!titulo) {
                        swal.fire({
                            icon: 'warning',
                            text: 'debes ingresar un titulo para la imagen'
                        })
                        return;
                    }

                    if(!tipo) {
                        swal.fire({
                            icon: 'warning',
                            text: 'debes seleccionar un tipo'
                        })
                        return;
                    }

                    if(imagen.length === 0) {
                        swal.fire({
                            icon: 'warning',
                            text: 'debes seleccionar una imagen'
                        })
                        return;
                    }                    

                    

                    if(titulo && imagen.length > 0 && tipo) {
                        const formData = new FormData();

                        formData.append('titulo', titulo)
                        formData.append('file', imagen[0])
                        formData.append('tipo', tipo)

                        fetch('/galeria', {
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
                        fetch(`/galeria/${id}`,{ method: 'DELETE'})
                        .then(() => { 
                            location.reload() 
                        })
                    }
                })
            }
        })


        async function getTipos(){
            const response = await fetch('/galeria/tipos')

            return response.json()
        }
    </script>
@endsection