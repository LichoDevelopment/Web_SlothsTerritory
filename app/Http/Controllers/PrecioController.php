<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Precio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PrecioController extends Controller
{
    /**
     * @var Request
     */
    private $request;

    private $reglasValidacion = [
        'precio_adulto' => 'required',
        'precio_niño' => 'required',
    ];

    private $mensajesValidacion = [
        'required' => 'El campo :attribute es requerido',
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
            Precio::create([
                'precio_adulto' => $this->request->precio_adulto,
                'precio_niño'   => $this->request->precio_niño,
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
            Precio::find($id)->update([
                'precio_adulto' => $this->request->precio_adulto,
                'precio_niño'   => $this->request->precio_niño,
            ]);
        }

        return $response;
    }

    public function destroy($id)
    {
        Precio::destroy($id);
        return response("", 204);
    }
    
}
