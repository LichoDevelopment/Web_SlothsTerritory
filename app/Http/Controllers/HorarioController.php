<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HorarioController extends Controller
{
    /**
     * @var Request
     */
    private $request;

    
    private $reglasValidacion = [
        'hora'      => 'required',
        'tour_id'   => 'required|exists:App\Models\Tour,id'
    ];

    private $mensajesValidacion = [
        'required' => 'El campo :attribute es requerido'
    ];

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function index()
    {
        return Horario::all();
    }
    public function store()
    {
        $response = response("",201);

        $validator = Validator::make($this->request->all(), $this->reglasValidacion, $this->mensajesValidacion);

        if($validator->fails()){
            $response = response([
                "status"    => 422,
                "message"   => "Error",
                "errors"    => $validator->errors()
            ], 422);
        }else{
            Horario::create([
                'hora' => $this->request->hora,
                'tour_id' => $this->request->tour_id,
            ]);
        }

        return $response;
    }

    public function update($id)
    {
        $response = response("",202);

        $validator = Validator::make($this->request->all(), $this->reglasValidacion, $this->mensajesValidacion);

        if($validator->fails()){
            $response = response([
                "status"    => 422,
                "message"   => "Error",
                "errors"    => $validator->errors()
            ], 422);
        }else{
            Horario::find($id)->update([
                'hora' => $this->request->hora,
                'tour_id' => $this->request->tour_id,
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
