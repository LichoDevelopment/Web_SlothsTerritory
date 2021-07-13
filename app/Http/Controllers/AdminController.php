<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agencia;
use App\Models\Horario;
use App\Models\Precio;
use App\Models\Tour;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function agregarReserva()
    {
        $tours      = Tour::all();
        $horarios   = Horario::all();
        $agencias   = Agencia::all();
        $precios    = Precio::all();

        $view_data['tours']     = $tours;
        $view_data['horarios']  = $horarios;
        $view_data['agencias']  = $agencias;
        $view_data['precios']   = $precios;

        return view('admin.reservas.agregar', $view_data);
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
