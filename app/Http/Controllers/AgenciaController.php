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
            Agencia::create([
                'nombre'    => $this->request->nombre,
                'comision'  => $this->request->comision,
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
            Agencia::fin($id)->update([
                'nombre'    => $this->request->nombre,
                'comision'  => $this->request->comision,
            ]);
        }

        return $response;
    }

    public function destroy($id)
    {
        Agencia::destroy($id);
        return response("", 204);
    }
}