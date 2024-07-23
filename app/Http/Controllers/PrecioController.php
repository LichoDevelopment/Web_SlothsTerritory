<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agencia;
use App\Models\Precio;
use App\Models\Horario;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PrecioController extends Controller
{
    /**
     * @var Request
     */
    private $request;

    private $reglasValidacion = [
        'precio_adulto_diurno' => 'required|gt:0',
        'precio_nino_diurno' => 'required|gt:0',
        'tipo_tourDiurno' => 'required',

        'precio_adulto_nocturno' => 'required|gt:0',
        'precio_nino_nocturno' => 'required|gt:0',
        'tipo_tourNocturno' => 'required',

        'precio_adulto_aves' => 'required|gt:0',
        'precio_nino_aves' => 'required|gt:0',
        'tipo_tourAves' => 'required',

        'agencia' => 'required'
    ];

    private $mensajesValidacion = [
        'required' => 'El campo :attribute es requerido',
        'gt'       => 'El campo :attribute debe ser mayor que 0'
    ];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function index()
    {
        $tours = Tour::all();
        $horarios = Horario::all();
        $precios = Precio::all();
        $agencias = Agencia::all();

        // sort by name of agency
        $agencias = $agencias->sortBy('nombre');
        // Eager load the precios relationship for all agencies
        $agencias->load('precios');

        // dd($agencias->toArray());


        // dd($precios->unique('id_agencia')->toArray());
        $precios = $precios->unique('id_agencia');


        return view('admin.precios.index', compact('tours', 'precios', 'agencias'));
        // return view('admin.precios.index', compact('precios'));
    }

    public function store()
    {   
        $response = response(["message" => "precio creado"], 201);

        $validator = Validator::make($this->request->all(), $this->reglasValidacion, $this->mensajesValidacion);

        if ($validator->fails()) {
            $response = response([
                "status"    => 422,
                "message"   => "Error",
                "errors"    => $validator->errors()
            ], 422);
        } else {
            Precio::create([
                'id_tour' => $this->request->tipo_tourDiurno,
                'id_agencia' => $this->request->agencia,
                'precio_adulto' => $this->request->precio_adulto_diurno,
                'precio_niño'   => $this->request->precio_nino_diurno,
            ]);
            Precio::create([
                'id_tour' => $this->request->tipo_tourNocturno,
                'id_agencia' => $this->request->agencia,
                'precio_adulto' => $this->request->precio_adulto_nocturno,
                'precio_niño'   => $this->request->precio_nino_nocturno,
            ]);
            Precio::create([
                'id_tour' => $this->request->tipo_tourAves,
                'id_agencia' => $this->request->agencia,
                'precio_adulto' => $this->request->precio_adulto_aves,
                'precio_niño'   => $this->request->precio_nino_aves,
            ]);
            Agencia::find($this->request->agencia)->update([
                'con_precio' => true,
            ]);
        }
        return $response;
    }

    public function update(Request $request)
    {
  

        $agency = $this->request->agencia;
        $tours = [
            'diurno' => 1, 
            'nocturno' => 2,
            'aves' => 3
        ];


        foreach ($tours as $key => $tourId) {
            $adultPrice = $request->input("precio_adulto_{$key}", '0.00');
            $childPrice = $request->input("precio_niño_{$key}", '0.00');
      
            

            Precio::updateOrCreate(
                [
                    'id_agencia' => $agency['id'],
                    'id_tour' => $tourId,
                ],
                [
                    'precio_adulto' => $adultPrice,
                    'precio_niño' => $childPrice,
                ]
            );

        }

        

        $response = response(["message" => "precio actualizado"], 202);

        // $validator = Validator::make($this->request->all(), $this->reglasValidacion, $this->mensajesValidacion);

        // if ($validator->fails()) {
        //     $response = response([
        //         "status"    => 422,
        //         "message"   => "Error",
        //         "errors"    => $validator->errors()
        //     ], 422);
        // } else {
        //     Precio::find($id)->update([
        //         'id_tour' => $this->request->id_tour,
        //         'precio_adulto' => $this->request->precio_adulto,
        //         'precio_niño'   => $this->request->precio_niño,
        //     ]);
        // }

        return $response;
    }

    public function destroy($id)
    {
        Precio::destroy($id);
        return response("", 204);
    }

    public function getPriceWeb($tourId)
    {

        // get Agency wine name 'WEB'
        $agencia = Agencia::where('nombre', 'WEB')->first();

        // get all results Price where id_agencia = $agencia->id 
        $precios = Precio::where('id_agencia', $agencia->id)->where('id_tour', $tourId)->get();

        return response()->json($precios);
    }
}
