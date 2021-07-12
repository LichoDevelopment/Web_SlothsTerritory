@extends('layouts.admin')


@section('content')

    <section class="card">
        <section class="card-header d-flex justify-content-between align-items-center">
            <h2>Tours</h2>
            <a href="{{ route('tour.agregar') }}" class="btn btn-info">Agregar</a>
        </section>
        <section class="card-body">
            <table class="table" id="tablaTours">
                <thead>
                    <th>#</th>
                    <th>nombre</th>
                    <th>horario</th>
                    <th>precios</th>
                    <th>acciones</th>
                </thead>
                <tbody>
                    @foreach ($tours as $tour)
                    <tr>
                        <td> {{$loop->index + 1}} </td>
                        <td> {{$tour->nombre }} </td>
                        <td> {{$tour->horario->hora }} </td>
                        <td> 
                            <span>Adultos - {{$tour->precio->precio_adulto }}</span> |
                            <span>Niños - {{$tour->precio->precio_niño }}</span>
                        </td>
                        <td>
                            <button class="btn btn-warning btn-sm">Editar</button>
                            <button class="btn btn-danger btn-sm">Eliminar</button>
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
        $('#tablaTours').DataTable();
    } );

    const addTourBtn = document.getElementById('addTourBtn');

    addTourBtn.addEventListener('click', event =>{
        event.preventDefault();
        Swal.fire({
            html: 
            `
                <h2 class="mx-auto mb-3 ">Agregar tour</h2>
                <form id="addTourFom" class="col-10 m-auto" >
                    <section class="row">
                        <label for="nombre">Nombre del tour</label>
                        <input class="form-control" name="nombre" />
                    </section>
                </form>
            `,
            showCancelButton: true,
            confirmButtonText: 'Agregar',
            confirmButtonColor: '#28A745',
            cancelButtonColor: "tomato",
            preConfirm: (response)=>{
                if(response){
                    const form = document.getElementById('addTourFom')
                    console.log(form['nombre'].value);
                }
            }
        })
    })
    </script>
@endsection