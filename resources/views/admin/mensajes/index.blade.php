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