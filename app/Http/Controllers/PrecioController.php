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
        'precio_adulto' => 'required|gt:0',
        'precio_niño' => 'required|gt:0',
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
        $precios = Precio::all();
        return view('admin.precios.index', compact('precios'));
    }
    
    public function store()
    {
        $response = response(["message"=> "precio creado"],201);

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
        $response = response(["message"=> "precio actualizado"],202);

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
