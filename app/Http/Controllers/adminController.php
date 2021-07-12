<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agencia;
use App\Models\Horario;
use App\Models\Precio;
use App\Models\Tour;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function agregarReserva()
    {
        return view('admin.reservas.agregar');
    }
    public function agencias()
    {
        $agencas = Agencia::all();
        return view('admin.agencias', compact('agencias'));
    }
    public function tours()
    {
        $tours = Tour::all();
        $horarios = Horario::all();
        $precios = Precio::all();
        return view('admin.tours.index', compact('tours'));
    }
}