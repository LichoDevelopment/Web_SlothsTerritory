<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TourController extends Controller
{
    /**
     * @var Request
     */
    private $request;

    private $reglasValidacion = [
        'nombre' => 'required',
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
            Tour::create([
                'nombre' => $this->request->nombre
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
            Tour::fin($id)->update([
                'nombre' => $this->request->nombre
            ]);
        }

        return $response;
    }

    public function destroy($id)
    {
        Tour::destroy($id);
        return response("", 204);
    }
    

}
