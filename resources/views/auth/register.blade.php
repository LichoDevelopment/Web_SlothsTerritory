@extends('layouts.app') {{-- Cambiá a 'layouts.admin' si querés usar tu layout personalizado --}}

@section('content')
<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4 text-center">Crear cuenta</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Nombre completo</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="form-group mb-3">
            <label for="email">Correo electrónico</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="password">Contraseña</label>
            <input id="password" type="password" class="form-control" name="password" required>
        </div>

        <div class="form-group mb-4">
            <label for="password_confirmation">Confirmar contraseña</label>
            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Registrarse</button>

        <div class="text-center mt-3">
            <a href="{{ route('login') }}">¿Ya tienes una cuenta? Iniciar sesión</a>
        </div>
    </form>
</div>
@endsection
