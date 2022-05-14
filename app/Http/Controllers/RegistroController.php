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
        return view('admin.registros.index');
    }
}
