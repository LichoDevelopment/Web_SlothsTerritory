<?php

use App\Models\ImagenCarusel;
use Illuminate\Support\Facades\Auth;

function rol_usuario() {
    return Auth::User()->role;
}

function imagenesCarusel() {
    return ImagenCarusel::all();
}