@extends('layouts.admin')


@section('content')

    <section class="card">
        <section class="card-header d-flex justify-content-between align-items-center">
            <h2>Tours</h2>
            <a id="addTourBtn" class="btn btn-success">Agregar</a>
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
                        <td> {{$loop->index + 1}} </td>
                        <td> {{$tour->nombre }} </td>
                        <td> <button class="btn btn-sm"> ver </button> </td>
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
                <form id="addTourFom" >
                    <section class="form-group">
                        <label for="nombre">Nombre</label>
                        <input class="form-control" name="nombre" />
                    </section>
                </form>
            `,
            showCancelButton: true,
            confirmButtonText: 'Agregar'
        })
    })
    </script>
@endsection