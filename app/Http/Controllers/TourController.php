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
        'nombre'     => 'required',
    ];

    private $mensajesValidacion = [
        'required' => 'El campo :attribute es requerido',
    ];

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function index()
    {
        $tours = Tour::all();
        return view('admin.tours.index', compact('tours'));
    }

    public function store()
    {
        $response = response(["message"=> "tour creado"],201);

        $validator = Validator::make($this->request->all(), $this->reglasValidacion, $this->mensajesValidacion);

        if($validator->fails()){
            $response = response([
                "status"    => 422,
                "message"   => "Error",
                "errors"    => $validator->errors()
            ], 422);
        }else{
            Tour::create([
                'nombre' => $this->request->nombre,
            ]);
        }

        return $response;
    }

    public function update($id)
    {
        $response = response(["message"=> "tour actualizado"],202);

        $validator = Validator::make($this->request->all(), $this->reglasValidacion, $this->mensajesValidacion);

        if($validator->fails()){
            $response = response([
                "status"    => 422,
                "message"   => "Error",
                "errors"    => $validator->errors()
            ], 422);
        }else{
            Tour::find($id)->update([
                'nombre' => $this->request->nombre,
            ]);
        }

        return $response;
    }

    public function destroy($id)
    {
        $response = response(["message"=> "Tour eliminado"],204);
        Tour::destroy($id);
        return $response;
        // return response("Tour eliminado", 204);
    }
    

}
