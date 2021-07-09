<?php

namespace App\Http\Controllers;

use App\Models\Reservacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservacionController extends Controller
{
    /**
    * @var Request
    */
   private $request;

   private $reglasValidacion = [
       'nombre_cliente' => 'required',
       'adultos'        => 'required',
       'niños'          => 'required',
       'niños_gratis'   => 'required',
       'precio'         => 'required',
       'fecha_inicio'   => 'required',
       'agencia_id'     => 'required',
       'tour_id'        => 'required',
       'horario_id'     => 'required',
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
           Reservacion::create([
               'nombre_cliente'         => $this->request->nombre_cliente,
               'adultos'                => $this->request->adultos,
               'niños'                  => $this->request->niños,
               'niños_gratis'           => $this->request->niños_gratis,
               'precio'                 => $this->request->precio,
               'precio_con_descuento'   => $this->request->precio_con_descuento,
               'fecha_inicio'           => $this->request->fecha_inicio,
               'agencia_id'             => $this->request->agencia_id,
               'tour_id'                => $this->request->tour_id,
               'horario_id'             => $this->request->horario_id,
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
           Reservacion::fin($id)->update([
               'nombre_cliente'         => $this->request->nombre_cliente,
               'adultos'                => $this->request->adultos,
               'niños'                  => $this->request->niños,
               'niños_gratis'           => $this->request->niños_gratis,
               'precio'                 => $this->request->precio,
               'precio_con_descuento'   => $this->request->precio_con_descuento,
               'fecha_inicio'           => $this->request->fecha_inicio,
               'agencia_id'             => $this->request->agencia_id,
               'tour_id'                => $this->request->tour_id,
               'horario_id'             => $this->request->horario_id,
            ]);
       }

       return $response;
   }

   public function destroy($id)
   {
       Reservacion::destroy($id);
       return response("", 204);
   }
}
