<?php

namespace App\Http\Controllers;

use App\Mail\ReservationConfirmation;
use App\Models\Caja;
use App\Models\Fecha_tour;
use App\Models\Horario;
use App\Models\Registro;
use App\Models\Reserva;
use App\Models\Reservacion;
use App\Models\Estado;
use App\Models\MovimientoCaja;
use App\Models\TilopayTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        'monto_con_descuento' => 'required',
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

    public function __construct(Request $request)
    {
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
        $fecha_tour = Fecha_tour::where('fecha', $this->request->fecha_tour)->first();
        if (!$fecha_tour) {
            $fecha_tour = Fecha_tour::create(['fecha' => $this->request->fecha_tour]);
        }

        $total_pax_en_reserva =
            $this->request->cantidad_adultos + $this->request->cantidad_niños + $this->request->cantidad_niños_gratis;

        $validator = Validator::make($this->request->all(), $this->reglasValidacion, $this->mensajesValidacion);

        if ($validator->fails()) {
            return response([
                "status"    => 422,
                "message"   => "Error",
                "errors"    => $validator->errors()
            ], 422);
        }
        DB::beginTransaction();
        try {
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
                'payment_status'        => 'recepcion',
                'id_fecha_tour'          => $fecha_tour->id,
                'factura'                => $this->request->factura,
                'id_estado'              => 1,
                'pendiente_cobrar'       => $this->request->has('pendiente_cobrar') ? true : false, // Captura el valor del checkbox
            ]);

            // Llamar a la función que maneja la creación/actualización del movimiento en caja
            $this->handleMovimientoCaja($reservacion, $this->request);

            DB::commit();
            return redirect('/ver_reserva/' . $reservacion->id);
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                "status"  => 500,
                "message" => "Error interno: " . $e->getMessage()
            ], 500);
        }
    }

    public function updateEstado(Request $request, $id)
    {
        $response = response(["message" => "Estado actualizado"], 202);

        Reserva::find($id)->update([
            'id_estado' => $request->estado
        ]);
        return $response;
    }

    public function updateEstadoEliminado($id)
    {
        $reserva = Reserva::onlyTrashed()->find($id);
        // $registro = Registro::where('id_horario', $reserva->id_horario)
        //     ->where('id_fecha', $reserva->id_fecha_tour)
        //     ->first();
        $cantidad_pax_en_reserva = $reserva->cantidad_adultos + $reserva->cantidad_niños + $reserva->cantidad_niños_gratis;
        // $temp = $registro->cantidad_reservas + $cantidad_pax_en_reserva;
        // $registro->cantidad_reservas = $temp;
        // $registro->save();
        $response = response(["message" => "Reserva integrada nuevamente"], 202);
        Reserva::withTrashed()->find($id)->restore();
        // 'deleted_at'     =>$this->request->deleted_at,
        // 'deleted_at'     =>null,
        // ]);


        return $response;
    }

    public function update($id)
    {
        $fecha_tour = Fecha_tour::where('fecha', $this->request->fecha_tour)->first();
        if (!$fecha_tour) {
            $fecha_tour = Fecha_tour::create(['fecha' => $this->request->fecha_tour]);
        }

        $reserva = Reserva::find($id);

        $validator = Validator::make($this->request->all(), $this->reglasValidacion, $this->mensajesValidacion);

        if ($validator->fails()) {
            return response([
                "status"    => 422,
                "message"   => "Error",
                "errors"    => $validator->errors()
            ], 422);
        } else {
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
                'id_fecha_tour'          => $fecha_tour->id,
                'factura'                => $this->request->factura,
                'pendiente_cobrar'       => $this->request->has('pendiente_cobrar') ? true : false, // Captura el valor del checkbox
            ]);

            $reserva->save();

            // Manejamos la creación/actualización/eliminación del Movimiento en Caja
            $this->handleMovimientoCaja($reserva, $this->request);

            return redirect('/ver_reserva/' . $id);
        }
    }

    public function destroy($id)
    {
        // 1. Buscar la reserva
        $reserva = Reserva::findOrFail($id);

        // 2. Verificar si es “vieja” según tu criterio (por ejemplo, la fecha del tour es anterior a hoy)
        //    Asumiendo que en tu relación: $reserva->fechaTour->fecha es la fecha del tour (tipo date)
        if (Carbon::parse($reserva->fechaTour->fecha)->lt(Carbon::today())) {
            // Si la fecha de tour es menor a hoy => ya pasó => consideramos reserva vieja
            return response()->json([
                'message' => 'No se puede eliminar una reserva que ya pasó'
            ], 403);
        }

        // Si no es vieja, procedemos a borrarla
        DB::beginTransaction();
        try {
            // 3. Borrar el movimiento de caja asociado (si existe)
            //    (Suponiendo que en movimientos_caja hay un id_reserva)
            $movCaja = MovimientoCaja::where('id_reserva', $reserva->id)->first();
            if ($movCaja) {
                $movCaja->delete();
            }

            // 4. Borrar la reserva
            $reserva->delete();

            DB::commit();
            return response()->json([
                'message' => 'Reserva eliminada exitosamente'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Error al eliminar la reserva: ' . $e->getMessage()
            ], 500);
        }
    }

    //    Get tilopay_transaction by hash
    public function getTilopayTransaction($hash)
    {
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

        if ($request->input('query.code') === '1') {
            // Transacción exitosa
            $paymentStatus = 'Transacción exitosa';
            Mail::to($dataToEmail->billToEmail)->send(new ReservationConfirmation($dataToEmail, $paymentStatus));
            $reservation->correo_enviado = true;
            $reservation->save();

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

    public function marcarLlego(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);

        $reserva->update(['llego' => $request->llego]);

        return response()->json(['message' => 'Estado actualizado correctamente']);
    }

    public function togglePago(Request $request, $id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->pendiente_cobrar = $request->pendiente;
        $reserva->save();

        return response()->json(['success' => true, 'message' => 'Estado de pago actualizado.']);
    }

    private function getOrCreateCajaAbiertaHoy()
    {
        $hoy = Carbon::today();  // 00:00:00 de hoy

        // Buscamos una caja que tenga fecha_apertura = HOY (en su parte de fecha) y estado = 'abierta'
        $cajaAbierta = Caja::whereDate('fecha_apertura', $hoy)
            ->where('estado', 'abierta')
            ->first();

        if (!$cajaAbierta) {
            // Crear una nueva caja
            // fecha_apertura podría ser now() o la medianoche de hoy, 
            // pero para el ejemplo la ponemos en 'now()'
            $cajaAbierta = Caja::create([
                'fecha_apertura' => Carbon::now(),
                'estado'         => 'abierta',
                'monto_inicial_crc' => 0,
                'monto_inicial_usd' => 0,
                'created_by' => Auth::id(),
                'updated_by' => Auth::id(),
            ]);
        }

        return $cajaAbierta;
    }

    private function handleMovimientoCaja(Reserva $reserva, Request $request)
    {
        // 1. Si la reserva está pendiente de cobrar o no hay montos, eliminamos movimiento (si existe).
        $efectivo_crc      = $request->efectivo_crc ?? 0;
        $efectivo_usd      = $request->efectivo_usd ?? 0;
        $tarjeta_crc       = $request->tarjeta_crc ?? 0;
        $tarjeta_usd       = $request->tarjeta_usd ?? 0;
        $transferencia_crc = $request->transferencia_crc ?? 0;
        $transferencia_usd = $request->transferencia_usd ?? 0;

        $totalPago = $efectivo_crc + $efectivo_usd
            + $tarjeta_crc + $tarjeta_usd
            + $transferencia_crc + $transferencia_usd;

        if (!$totalPago > 0) {
            return;
        }

        // $pendiente = $reserva->pendiente_cobrar; // true/false

        // Buscamos si hay un movimiento ya existente
        $movCaja = MovimientoCaja::where('id_reserva', $reserva->id)->first();


        // Caso 2: Necesitamos una caja abierta para hoy
        $caja = $this->getOrCreateCajaAbiertaHoy();

        // Caso 3: Crear o actualizar el movimiento de ingreso
        if (!$movCaja) {
            // Crear uno nuevo
            $movCaja = new MovimientoCaja();
            $movCaja->id_reserva      = $reserva->id;
            $movCaja->id_caja         = $caja->id;
            $movCaja->tipo_movimiento = 'ingreso';
            $movCaja->motivo          = 'Reserva';
            $movCaja->fecha_movimiento = now();
            $movCaja->created_by      = Auth::id();
        }

        // Actualizamos los montos
        $movCaja->efectivo_crc       = $efectivo_crc;
        $movCaja->efectivo_usd       = $efectivo_usd;
        $movCaja->tarjeta_crc        = $tarjeta_crc;
        $movCaja->tarjeta_usd        = $tarjeta_usd;
        $movCaja->transferencia_crc  = $transferencia_crc;
        $movCaja->transferencia_usd  = $transferencia_usd;
        $movCaja->descripcion        = 'Pago de Reserva #' . $reserva->id;
        $movCaja->updated_by         = Auth::id();
        $movCaja->save();
    }
}
