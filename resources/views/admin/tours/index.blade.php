@extends('layouts.admin')


@section('content')

    <section class="card">
        <section class="card-header d-flex justify-content-between align-items-center">
            <h2>Tours</h2>
            <button id="addTourBtn" class="btn btn-info">Agregar</button>
        </section>
        <section class="card-body">
            <table class="table" id="tablaTours">
                <thead>
                    <th>#</th>
                    <th>nombre</th>
                    <th>horarios</th>
                </thead>
                <tbody>
                    @foreach ($tours as $tour)
                    <tr>
                        <td> {{$loop->index + 1}} </td>
                        <td> {{$tour->nombre }} </td>
                        <td> <button class="btn btn-sm"> ver </button> </td>
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