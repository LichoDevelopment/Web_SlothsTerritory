<?php

namespace App\Http\Controllers;

use App\Mail\ReservationConfirmation;
use App\Models\Fecha_tour;
use App\Models\Horario;
use App\Models\Registro;
use App\Models\Reserva;
use App\Models\Reservacion;
use App\Models\Estado;
use App\Models\TilopayTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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

   public function eliminadas(Request $request)
   {

       $reservas = DB::select('CALL reservas_eliminadas()');
    //    $reservas = Reserva::onlyTrashed()->get();
    //    print_r($reservas);
       return view('admin.reservas.eliminadas', compact('reservas'));
   }

   public function store()
   {
       $fecha_tour = Fecha_tour::where('fecha',$this->request->fecha_tour)->first();
       if(!$fecha_tour){
           $fecha_tour = Fecha_tour::create(['fecha' => $this->request->fecha_tour]);
       }

       $registro = Registro::where('id_horario',$this->request->id_horario)
                            ->where('id_fecha',$fecha_tour->id)
                            ->first();

       $total_pax_en_reserva = 
            $this->request->cantidad_adultos + $this->request->cantidad_niños + $this->request->cantidad_niños_gratis;
       
       $validator = Validator::make($this->request->all(), $this->reglasValidacion, $this->mensajesValidacion);

       if($validator->fails()){
           return response([
               "status"    => 422,
               "message"   => "Error",
               "errors"    => $validator->errors()
           ], 422);
       }else{
           $reservacion = Reserva::create([
               'nombre_cliente'         => $this->request->nombre_cliente,
               'cantidad_adultos'       => $this->request->cantidad_adultos,
               'cantidad_niños'         => $this->request->cantidad_niños,
               'cantidad_niños_gratis'  => $this->request->cantidad_niños_gratis,
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
               'id_estado'              => 1,
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

           return redirect('/ver_reserva/'.$reservacion->id);
       }       

   }

   public function updateEstado(Request $request, $id)
   {
        $response = response(["message"=> "Estado actualizado"],202);

        Reserva::find($id)->update([
            'id_estado' => $request->estado
        ]);
       return $response;
   }

   public function updateEstadoEliminado($id)
   {
        $reserva = Reserva::onlyTrashed()->find($id);
        $registro = Registro::where('id_horario',$reserva->id_horario)
                    ->where('id_fecha',$reserva->id_fecha_tour)
                    ->first();
        $cantidad_pax_en_reserva = $reserva->cantidad_adultos + $reserva->cantidad_niños + $reserva->cantidad_niños_gratis;
        $temp = $registro->cantidad_reservas + $cantidad_pax_en_reserva;
        $registro->cantidad_reservas = $temp;
        $registro->save();
        $response = response(["message"=> "Reserva integrada nuevamente"],202);
        Reserva::withTrashed()->find($id)->restore();
            // 'deleted_at'     =>$this->request->deleted_at,
            // 'deleted_at'     =>null,
        // ]);
    

       return $response;
   }

   public function update($id)
   {
       $fecha_tour = Fecha_tour::where('fecha',$this->request->fecha_tour)->first();
       if(!$fecha_tour){
           $fecha_tour = Fecha_tour::create(['fecha' => $this->request->fecha_tour]);
       }

       $reserva = Reserva::find($id);

       $registro = Registro::where('id_horario',$this->request->id_horario)
                            ->where('id_fecha',$fecha_tour->id)
                            ->first();

       $cant_reservas = $registro ? $registro->cantidad_reservas : 0;

       $cantidad_previa_pax_en_reserva = $reserva->cantidad_adultos + $reserva->cantidad_niños + $reserva->cantidad_niños_gratis;
       $cantidad_reservas = $cant_reservas - $cantidad_previa_pax_en_reserva;

       $total_pax_en_reserva = $this->request->cantidad_adultos + $this->request->cantidad_niños + $this->request->cantidad_niños_gratis;


       $validator = Validator::make($this->request->all(), $this->reglasValidacion, $this->mensajesValidacion);

       if($validator->fails()){
           return response([
               "status"    => 422,
               "message"   => "Error",
               "errors"    => $validator->errors()
           ], 422);
        }else{
            $reserva->update([
                'nombre_cliente'         => $this->request->nombre_cliente,
                'cantidad_adultos'       => $this->request->cantidad_adultos,
                'cantidad_niños'         => $this->request->cantidad_niños,
                'cantidad_niños_gratis'  => $this->request->cantidad_niños_gratis,
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

            if($registro){
                $registro->update([
                    'id_horario'        => $this->request->id_horario,
                    'id_fecha'          => $fecha_tour->id,
                    'cantidad_reservas' => $cantidad_reservas + $total_pax_en_reserva
                ]);
                $registro->save();

            }
            return redirect('/ver_reserva/'.$id);
       }

   }

   public function destroy($id)
   {
       $reserva = Reserva::find($id);
       $registro = Registro::where('id_horario',$reserva->id_horario)
                            ->where('id_fecha',$reserva->id_fecha_tour)
                            ->first();

       $cantidad_pax_en_reserva = $reserva->cantidad_adultos + $reserva->cantidad_niños + $reserva->cantidad_niños_gratis;
       $temp = $registro->cantidad_reservas - $cantidad_pax_en_reserva;
       $registro->cantidad_reservas = $temp;
       $registro->save();

       $reserva->delete();
       return response("", 204);
   }

    //    Get tilopay_transaction by hash
    public function getTilopayTransaction($hash)
    {
        info('getTilopayTransaction');
        $tilopay_transaction = TilopayTransaction::where('hashKey', $hash)->first();

        // Verificar si la transacción fue encontrada
        if (!$tilopay_transaction) {
            // Manejar el caso en que la transacción no existe
            // Por ejemplo, puedes devolver un mensaje de error o lanzar una excepción
            return response()->json(['error' => 'Transacción no encontrada'], 404);
        }

        // Cargar relaciones adicionales en la reserva asociada
        $tilopay_transaction->load('reserva.tour', 'reserva.horario', 'reserva.fecha_tour');

        // Devolver los datos como respuesta JSON
        return response()->json($tilopay_transaction);
    }

    public function updateFromWeb(Request $request, $hash)
    {
        info('updateFromWeb');
        // $request->validate([
        //     'query.OrderHash' => 'required',
        //     'query.tilopay-transaction' => 'required',
        //     'query.code' => 'required',
        //     'query.auth' => 'required',
        //     'paymentStatus' => 'required',
        // ]);

        $tilopayTransaction = TilopayTransaction::where('hashKey', $hash)->first();
        if (!$tilopayTransaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }
        
        // Actualizar datos de TilopayTransaction
        $tilopayTransaction->update([
            'order_hash' => $request->input('query.OrderHash'),
            'transaction_code' => $request->input('query.tilopay-transaction'),
            'transaction_status' => $request->input('query.code') === '1' ? 'SUCCESS' : 'FAILED',
            'auth_code' => $request->input('query.auth'),
            'response' => $request->input('query'),
        ]);
        
        $dataToEmail = $tilopayTransaction->load('reserva.tour', 'reserva.horario', 'reserva.fecha_tour');

        // Obtener la reserva asociada
        $reservation = $tilopayTransaction->reserva;

        info('reservation', $reservation->toArray());

        if ($request->input('query.code') === '1') {
            // Transacción exitosa
            info('emial'. $dataToEmail->billToEmail);
            $paymentStatus = 'Transacción exitosa';
            Mail::to($dataToEmail->billToEmail)->send(new ReservationConfirmation($dataToEmail, $paymentStatus));

            $reservation->update(['payment_status' => 'Pagado']);
        } else {
            // Transacción fallida - soft delete de la reserva
            $reservation->delete(); // Esto realizará un soft delete
        }

        // Devolver los datos actualizados
        return response()->json([
            'message' => 'Reservation updated successfully',
            'reservation' => $reservation,
            'tilopay_transaction' => $tilopayTransaction
        ]);
    }
}

