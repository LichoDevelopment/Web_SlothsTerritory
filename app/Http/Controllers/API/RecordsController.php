<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Registro;
use App\Models\Tour;
use App\Models\Horario;
use App\Models\Fecha_tour;
use Illuminate\Http\Request;

class RecordsController extends Controller
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
        return Registro::with('horario.tours', 'fecha_tour')->get();
    }
}
