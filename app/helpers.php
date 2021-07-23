<?php

use Illuminate\Support\Facades\Auth;

function rol_usuario() {
    return Auth::User()->role;
}