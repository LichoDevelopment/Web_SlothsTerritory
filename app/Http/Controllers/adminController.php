<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function agregarReserva()
    {
        return view('admin.reservas.agregar');
    }
}
