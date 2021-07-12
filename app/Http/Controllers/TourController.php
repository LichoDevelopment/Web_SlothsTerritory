<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Precio;
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
        'precio'     => 'required',
        'horario'    => 'required',
    ];

    private $mensajesValidacion = [
        'required' => 'El campo :attribute es requerido',
    ];

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function agregar()
    {
        $tours = Tour::all();
        $horarios = Horario::all();
        $precios = Precio::all();
        return view('admin.tours.agregar', compact('tours','horarios','precios'));
    }

    public function store()
    {
        $response = ["mensaje"=>"tour creado"];

        $validator = Validator::make($this->request->all(), $this->reglasValidacion, $this->mensajesValidacion);

        if($validator->fails()){
            $response = [
                "mensaje"   => "Error al crear el tour"
            ];

            $response = array_merge($response, $validator->errors()->toArray());
        }else{
            Tour::create([
                'nombre'        => $this->request->nombre,
                'id_horario'    => $this->request->horario,
                'id_precio'     => $this->request->precio,
            ]);
        }

        // dd($response);
        return redirect('/agregar_tour')->with($response);
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
            Tour::find($id)->update([
                'nombre'        => $this->request->nombre,
                'id_horario'    => $this->request->horario,
                'id_precio'     => $this->request->precio,
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
