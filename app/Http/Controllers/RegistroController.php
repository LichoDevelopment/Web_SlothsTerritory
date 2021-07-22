<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Registro;
use App\Models\Tour;
use App\Models\Horario;
use App\Models\Fecha_tour;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    /**
     * @var Request
     */
    private $request;

    //
    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function index()
    {
        $tours = Tour::all();
        $horarios = Horario::all();
        $fechas = Fecha_tour::all();
        $registros = Registro::all();
        return view('admin.registros.index', compact('tours','horarios','registros','fechas'));
        // return view('admin.precios.index', compact('precios'));
    }
}
