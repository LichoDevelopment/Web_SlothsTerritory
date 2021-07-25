<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Registro;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HorarioController extends Controller
{
    /**
     * @var Request
     */
    private $request;

    
    private $reglasValidacion = [
        'hora' => 'required',
        'capacidad_maxima' => 'required|gt:0',
        'hora_minima_reservar' => 'required',
  
    ];

    private $mensajesValidacion = [
        'required' => 'El campo :attribute es requerido',
        'gt'       => 'El campo :attribute debe ser mayor que 0'
    ];

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function index()
    {
        $tours = Tour::all();
        $horarios = Horario::all();
        return view('admin.horarios.index', compact('tours','horarios'));
    }

    public function capacidad_maxima($hora)
    {
        $horario = Horario::find($hora);

        return $horario->capacidad_maxima;
    }

    public function cantidad_actual($hora)
    {
        $registro = Registro::where('id_horario',$hora)->first();
        return $registro->cantidad_reservas;
    }

    public function store()
    {
        $response = response(["message"=> "Horario creado"],201);

        $validator = Validator::make($this->request->all(), $this->reglasValidacion, $this->mensajesValidacion);

        if($validator->fails()){
            $response = response([
                "status"    => 422,
                "message"   => "Error",
                "errors"    => $validator->errors()
            ], 422);
        }else{
            Horario::create([
                'id_tour' => $this->request->id_tour,
                'hora' => $this->request->hora,
                'capacidad_maxima'   => $this->request->capacidad_maxima,
                'hora_minima_reservar'   => $this->request->hora_minima_reservar,
            ]);
        }

        return $response;
    }

    public function update($id)
    {
        $response = response(["message"=> "Horario actualizado"],202);

        $validator = Validator::make($this->request->all(), $this->reglasValidacion, $this->mensajesValidacion);

        if($validator->fails()){
            $response = response([
                "status"    => 422,
                "message"   => "Error",
                "errors"    => $validator->errors()
            ], 422);
        }else{
            Horario::find($id)->update([
                'id_tour' => $this->request->id_tour,
                'hora' => $this->request->hora,
                'capacidad_maxima'   => $this->request->capacidad_maxima,
                'hora_minima_reservar'   => $this->request->hora_minima_reservar,
            ]);
        }

        return $response;
    }

    public function destroy($id)
    {
        Horario::destroy($id);
        return response("", 204);
    }
}
