<?php

namespace App\Http\Controllers;

use App\Models\Fecha_tour;
use App\Models\Horario;
use App\Models\Registro;
use App\Models\Reserva;
use App\Models\Reservacion;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservacionController extends Controller
{
    /**
    * @var Request
    */
   private $request;

   private $reglasValidacion = [
       'nombre_cliente'     => 'required',
       'cantidad_adultos'   => 'required',
       'cantidad_niños'     => 'required',
       'monto_total'        => 'required',
       'descuento'          => 'required',
       'monto_con_descuento'=> 'required',
       'comision_agencia'   => 'required',
       'monto_neto'         => 'required',
       'id_agencia'         => 'required',
       'id_tour'            => 'required',
       'id_horario'         => 'required',
    //    'id_precio'          => 'required',
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

       $fecha_tour = Fecha_tour::where('fecha',$this->request->fecha_tour)->first();
       if(!$fecha_tour){
           $fecha_tour = Fecha_tour::create(['fecha' => $this->request->fecha_tour]);
       }

       $registro = Registro::where('id_horario',$this->request->id_horario)->first();
    //    $horario = Horario::find($this->request->id_horario);

       $total_pax_en_reserva = $this->request->cantidad_adultos + $this->request->cantidad_niños + $this->request->cantidad_niños_gratis;

    //    if($registro && ( $registro->cantidad_reservas + $total_pax_en_reserva ) > $horario->capacidad_maxima){
    //        $capacidad_libre = $horario->capacidad_maxima - $registro->cantidad_reservas;
    //        return redirect('/agregar_reserva')->with([
    //            'limite' => 'Se ha exedido el limite para esta hora',
    //            'capacidad_libre' => $capacidad_libre,
    //            'capacidad_maxima' => $horario->capacidad_maxima,
    //         ]);
    //    }

    //    if(!$registro && $total_pax_en_reserva > $horario->capacidad_maxima){
    //         return redirect('/agregar_reserva')->with([
    //             'limite' => 'Se ha exedido el limite para esta hora',
    //             'capacidad_libre' => $horario->capacidad_maxima,
    //             'capacidad_maxima' => $horario->capacidad_maxima
    //          ]);
    //    }

       
       $validator = Validator::make($this->request->all(), $this->reglasValidacion, $this->mensajesValidacion);

       if($validator->fails()){
           $response = response([
               "status"    => 422,
               "message"   => "Error",
               "errors"    => $validator->errors()
           ], 422);
       }else{
           Reserva::create([
               'nombre_cliente'         => $this->request->nombre_cliente,
               'cantidad_adultos'       => $this->request->cantidad_adultos,
               'cantidad_niños'         => $this->request->cantidad_niños,
               'cantidad_niños_gratis'  => $this->request->cantidad_niños_gratis || 0,
               'monto_total'            => $this->request->monto_total,
               'descuento'              => $this->request->descuento,
               'monto_con_descuento'    => $this->request->monto_con_descuento,
               'comision_agencia'       => $this->request->comision_agencia,
               'monto_neto'             => $this->request->monto_neto,
               'id_agencia'             => $this->request->id_agencia,
               'id_tour'                => $this->request->id_tour,
               'id_horario'             => $this->request->id_horario,
            //    'id_precio'              => $this->request->id_precio,
               'id_fecha_tour'          => $fecha_tour->id,
               'factura'                => $this->request->factura,
           ]);

           if($registro){
                $registro->update([
                    'id_horario'        => $this->request->id_horario,
                    'id_fecha'          => $fecha_tour->id,
                    'cantidad_reservas' => $registro->cantidad_reservas + $total_pax_en_reserva
                ]);

                $registro->save();
           }else{
               Registro::create([
                    'id_horario'        => $this->request->id_horario,
                    'id_fecha'          => $fecha_tour->id,
                    'cantidad_reservas' => $total_pax_en_reserva
               ]);
           }
       }

       return redirect('/admin')->with("Mensaje","reserva creada");
   }

   public function updateEstado($id)
   {
        $response = response(["message"=> "Estado actualizado"],202);

        Reserva::find($id)->update([
            'id_estado'     => $this->request->estado,
        ]);
    

       return $response;
   }

   public function update($id)
   {
       $response = response("",202);
       $fecha_tour = Fecha_tour::where('fecha',$this->request->fecha_tour)->first();
       if(!$fecha_tour){
           $fecha_tour = Fecha_tour::create(['fecha' => $this->request->fecha_tour]);
       }

       $reserva = Reserva::find($id);
    //    $horario = Horario::find($this->request->id_horario);
       $registro = Registro::where('id_horario',$this->request->id_horario)->first();
       $cantidad_previa_pax_en_reserva = $reserva->cantidad_adultos + $reserva->cantidad_niños + $reserva->cantidad_niños_gratis;
       $cantidad_reservas = $registro->cantidad_reservas - $cantidad_previa_pax_en_reserva;

       $total_pax_en_reserva = $this->request->cantidad_adultos + $this->request->cantidad_niños + $this->request->cantidad_niños_gratis;

    //    if(( $cantidad_reservas + $total_pax_en_reserva ) > $horario->capacidad_maxima){
    //        return redirect()->back()->with('limite', 'Se ha exedido el limite para esta hora');
    //    }

    //    if($total_pax_en_reserva > $horario->capacidad_maxima){
    //         return redirect()->back()->with('limite', 'Se ha exedido el limite para esta hora');
    //    }

       $validator = Validator::make($this->request->all(), $this->reglasValidacion, $this->mensajesValidacion);

       if($validator->fails()){
           $response = response([
               "status"    => 422,
               "message"   => "Error",
               "errors"    => $validator->errors()
           ], 422);
        }else{
            $reserva->update([
                'nombre_cliente'         => $this->request->nombre_cliente,
                'cantidad_adultos'       => $this->request->cantidad_adultos,
                'cantidad_niños'         => $this->request->cantidad_niños,
                'cantidad_niños_gratis'  => $this->request->cantidad_niños_gratis || 0,
                'monto_total'            => $this->request->monto_total,
                'descuento'              => $this->request->descuento,
                'monto_con_descuento'    => $this->request->monto_con_descuento,
                'comision_agencia'       => $this->request->comision_agencia,
                'monto_neto'             => $this->request->monto_neto,
                'id_agencia'             => $this->request->id_agencia,
                'id_tour'                => $this->request->id_tour,
                'id_horario'             => $this->request->id_horario,
                // 'id_precio'              => $this->request->id_precio,
                'id_fecha_tour'          => $fecha_tour->id,
                'factura'                => $this->request->factura,
            ]);

            $reserva->save();

            $registro->update([
                'id_horario'        => $this->request->id_horario,
                'id_fecha'          => $fecha_tour->id,
                'cantidad_reservas' => $cantidad_reservas + $total_pax_en_reserva
            ]);
            $registro->save();
            return redirect('/admin')->with("Mensaje","reserva actualizada");
       }

   }

   public function destroy($id)
   {
       $reserva = Reserva::find($id);
       $registro = Registro::where('id_horario',$reserva->id_horario)->first();
       $cantidad_pax_en_reserva = $reserva->cantidad_adultos + $reserva->cantidad_niños + $reserva->cantidad_niños_gratis;
       $registro->cantidad_reservas = $registro->cantidad_reservas - $cantidad_pax_en_reserva;
       $registro->save();
       Reserva::destroy($id);
       return response("", 204);
   }
}
