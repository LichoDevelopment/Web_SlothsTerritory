<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgenciaController extends Controller
{
    /**  
     * @var Request
     */
    private $request;

    private $reglasValidacion = [
        'nombre'    => 'required',
        'comision'  => 'required'
    ];

    private $mensajesValidacion = [
        'required' => 'El campo :attribute es requerido'
    ];

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function index()
    {
        $agencias = Agencia::all();
        return view('admin.agencias.index', compact('agencias'));
    }

    public function store()
    {
        $response = response(["message"=> "agencia creada"],201);

        $validator = Validator::make($this->request->all(), $this->reglasValidacion, $this->mensajesValidacion);

        if($validator->fails()){
            $response = response([
                "status"    => 422,
                "message"   => "Error",
                "errors"    => $validator->errors()
            ], 422);
        }else{
            Agencia::create([
                'nombre' => $this->request->nombre,
                'comision' => $this->request->comision,
            ]);
        }

        return $response;
    }


    public function update($id)
    {
        $response = response(["message"=> "agencia actualizada"],202);

        $validator = Validator::make($this->request->all(), $this->reglasValidacion, $this->mensajesValidacion);

        if($validator->fails()){
            $response = response([
                "status"    => 422,
                "message"   => "Error",
                "errors"    => $validator->errors()
            ], 422);
        }else{
            Agencia::find($id)->update([
                'nombre' => $this->request->nombre,
                'comision' => $this->request->comision,
            ]);
        }

        return $response;
    }

    public function destroy($id)
    {
        $agencia = Agencia::find($id);
        if($agencia->reservas()->count() > 0){
            $response = response(["message" => "la agencia no se pudo borrar"], 422);
        }else{
            Agencia::destroy($id);
            $response =  response(["message" => "agencia eliminada"], 204);
        }

        return $response;
    }
}
