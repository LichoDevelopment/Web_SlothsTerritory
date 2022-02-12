@extends('layouts.admin')


@section('content')

    <section class="card">
        <section class="card-header d-flex justify-content-between align-items-center">
            <h2>Mensajes de clientes</h2>
        </section>
        <section class="card-body">
            <table class="table" id="tablaMensajes">
                <thead>
                    <th>#</th>
                    <th>Nombre cliente</th>
                    <th>Correo</th>
                    <th>Mensaje</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach ($mensajes as $mensaje)
                        <tr>
                            <td> {{$loop->index + 1}} </td>
                            <td> {{$mensaje->nombre }} </td>
                            <td> {{$mensaje->correo }} </td>
                            <td> {{$mensaje->mensaje }} </td>
                            <td> {{$mensaje->created_at }} </td>
                            <td class="btn-group">
                                <button
                                    data-id="{{$mensaje->id}}" 
                                    class="btn btn-sm btn-danger borrar-mensaje-btn">Marcar Leído
                                </button>
                                <button
                                    data-message="{{$mensaje}}" 
                                    class="btn btn-sm btn-info contestar-mensaje-btn">Responder
                                </button>
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </section>

@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
        $('#tablaMensajes').DataTable();
        } ); 

    $(document).ready( function () {
        $('#tablaMensajes').DataTable();
    } );

    const borrarReservasBtn = document.querySelectorAll('.borrar-mensaje-btn')
    const contestarMensajeBtns = document.querySelectorAll('.contestar-mensaje-btn')

    borrarReservasBtn.forEach(btn =>{
        btn.addEventListener('click', event =>{
            event.preventDefault();
            const id = event.target.dataset.id

            Swal.fire({
                icon: 'warning',
                title: '¿Estás segura de marcar como leído este mensaje?',
                confirmButtonText: 'Leído',
                confirmButtonColor: '#DC3545',
                showCancelButton: true,
                cancelButtonColor: 'teal',
                preConfirm: (respuesta)=>{
                    if(respuesta){
                        fetch(`/mensaje/${id}`,{
                            method: 'DELETE'
                        }).then(()=>{
                            Swal.fire({
                                icon: 'success',
                                title: 'Mensaje leído',
                                showConfirmButton: false,
                            })
                            setTimeout(() => {
                                location.reload()
                            }, 1500);
                        })

                    }
                }
            })
        })
    })

    
    contestarMensajeBtns.forEach(btn=> {
        btn.addEventListener('click', event => {
            event.preventDefault();
            const message = JSON.parse(event.target.dataset.message);
            
            Swal.fire({
                icon: 'info',
                title: 'Reponder consulta web',
                confirmButtonText: 'Enviar',
                confirmButtonColor: '#DC3545',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                cancelButtonColor: 'teal',
                html: `
                    <form>
                        <div class="form-group">
                            <label for="emailSubject">Asunto</label>
                            <input type="text" class="form-control" id="emailSubject" value="Respuesta a consulta web">
                        </div>
                        <div class="form-group">
                            <label for="emailMessage">Contenido</label>
                            <textarea class="form-control" id="emailMessage" rows="3"></textarea>
                        </div>
                    </form>`,
                preConfirm: (respuesta)=>{
                    if(respuesta){
                        let emailSubjet = document.getElementById('emailSubject').value;
                        let emailMessage = document.getElementById('emailMessage').value;
                        let emailResponse = {
                            subject : emailSubjet,
                            message : emailMessage,
                            email : message.correo,
                            clientName : message.nombre
                        }
                        fetch(`/web-consulting-email`,{
                            method: 'POST',
                            headers: {'Content-Type': 'application/json'},
                            body: JSON.stringify(emailResponse)
                        }).then(response => response.json())
                        .then((response)=>{
                            if (response.error){
                                let html = '';
                                Object.entries(response.errors).map(error => {
                                    console.log(error);
                                    html += `<div class="text-danger text-center font-weight-bold" >
                                                ${error[1][0]}
                                            </div>`
                                });
                                Swal.fire({
                                    icon: 'warning',
                                    title: response.message,
                                    html
                                });
                            }
                            else {
                                Swal.fire({
                                    icon: 'success',
                                    title: response.message
                                });
                            }
                        })

                    }
                }
            })
        })
    })

    function mostrarRespuesta(respuesta){
        console.log(respuesta)
        if(respuesta.errors){
            let errores = '';
            Object.entries(respuesta.errors).forEach(error =>{
                errores += `
                <div class="alert alert-danger" role="alert">
                    ${error[1][0]}
                </div>
                `
            })
            Swal.fire({
                icon: 'error',
                html: errores
            })
        }else{
            Swal.fire({
                icon: 'success',
                title: respuesta.message,
                showConfirmButton: false
            })
            setTimeout(function(){
                location.reload();
            },1500)
        }
    }
</script>

@endsection