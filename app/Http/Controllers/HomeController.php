<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
use App\Models\Estado;
use App\Models\Fecha_tour;
use App\Models\Horario;
use App\Models\Reserva;
use App\Models\Reservacion;
use Carbon\CarbonTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home($locale)
    {
        App::setLocale($locale);
        return view('home', compact('locale'));
    }
    public function admin(Request $request)
    {
        $current_date_time = Carbon::now();
            $date = $current_date_time->setTimezone('America/Costa_Rica');
            $date = $date->format('Y-m-d');
        if (rol_usuario()->id === 2){

            // dd($date);
            $reservas = DB::select('CALL filtrar_reservas(?,?,?,?)',[$date, $date, null,null]);
            $totales  = DB::select('CALL totales(?,?,?,?)',[$date, $date, null,null]);
        }
        else{
            $reservas = DB::select('CALL filtrar_reservas(?,?,?,?)',[null, null, null,null]);
            $totales  = DB::select('CALL totales(?,?,?,?)',[null, null, null,null]);  
        }
        

        DB::select('CALL actualizar_estados');

        $query = $request->query();
        $fechaInicio = '';
        $fechaFin = '';
        // $reservas = Reserva::orderBy('id_fecha_tour')->orderBy('id_estado','asc')->get();
        $agencias = Agencia::all();
        $estados = Estado::all();
        $horarios = Horario::all();
        
        $total_adultos = '';
        $total_niños = '';
        $total_niños_gratis = '';
        $total_pax= '';

        $total_comisiones = '';

        // $totales = Reserva::select('*')
        //                     ->select(
        //                         DB::raw('sum(cantidad_adultos) as adultos'),
        //                         DB::raw('sum(cantidad_niños) as niños'),
        //                         DB::raw('sum(cantidad_niños_gratis) as niños_gratis'),
        //                         DB::raw('sum(comision_agencia) as comisiones'),
        //                         DB::raw('sum(monto_total) as monto_total'),
        //                         DB::raw('sum(monto_neto) as monto_neto'),
        //                         )
        //                     ->first();

        // $reservas = DB::select('CALL filtrar_reservas(?,?,?,?)',[null, null, null,null]);
        // $totales  = DB::select('CALL totales(?,?,?,?)',[null, null, null,null]);              
                            
        if($query){
            if (rol_usuario()->id === 2){
                // $fechaInicio    = $date;
                // $fechaFin       = $date;
                $fechaInicio    = isset($query['fechaInicio']) ? $query['fechaInicio'] : null;
                $fechaFin       = isset($query['fechaFin']) ? $query['fechaFin'] : null;
            }
            else{
                $fechaInicio    = isset($query['fechaInicio']) ? $query['fechaInicio'] : null;
                $fechaFin       = isset($query['fechaFin']) ? $query['fechaFin'] : null;
            }
            $agencia        = isset($query['agencia']) ? $query['agencia'] : null;
            $horario        = isset($query['horario']) ? $query['horario'] : null;

            $reservas       = DB::select('CALL filtrar_reservas(?,?,?,?)',
                                    [$fechaInicio, $fechaFin, $agencia, $horario]);
            $totales        = DB::select('CALL totales(?,?,?,?)', 
                                    [$fechaInicio, $fechaFin, $agencia, $horario]);

            // if(!$query['fechaInicio'] && $query['agencia']){
            //     $id_agencias = [$query['agencia']];
            //     $reservaciones = Reserva::select('*')
            //                                 ->whereIn('id_agencia',$id_agencias)
            //                                 ->orderBy('id_fecha_tour')
            //                                 ->orderBy('id_estado','asc')
            //                                 ->get();
                                            
            //         $totales = Reserva::select('*')
            //                             ->whereIn('id_agencia',$id_agencias)
            //                             ->select(
            //                                 DB::raw('sum(cantidad_adultos) as adultos'),
            //                                 DB::raw('sum(cantidad_niños) as niños'),
            //                                 DB::raw('sum(cantidad_niños_gratis) as niños_gratis'),
            //                                 DB::raw('sum(comision_agencia) as comisiones'),
            //                                 DB::raw('sum(monto_total) as monto_total'),
            //                                 DB::raw('sum(monto_neto) as monto_neto'),
            //                                 )
            //                             ->first();
            // }
            // if($query['fechaInicio']){

                // if($query['agencia']){
                //     $id_agencias = [$query['agencia']];
                // }else{
                //     foreach($agencias as $agencia){
                //         $id_agencias[] = $agencia->id;
                //     }
                // }

                // $fechas = DB::table('fecha_tour')->whereBetween('fecha', [$fechaInicio, $fechaFin])->get();

                // $id_fechas = [];
                
                // foreach($fechas as $fecha){
                //     $id_fechas[] = $fecha->id;
                // }

                // if($id_fechas){
                //     $reservaciones = Reserva::select('*')
                //                             ->whereIn('id_fecha_tour', $id_fechas)
                //                             ->whereIn('id_agencia',$id_agencias)
                //                             ->orderBy('id_fecha_tour')
                //                             ->orderBy('id_estado','asc')
                //                             ->get();
                                            
                //     $totales = Reserva::select('*')
                //                         ->whereIn('id_fecha_tour', $id_fechas)
                //                         ->whereIn('id_agencia',$id_agencias)
                //                         ->select(
                //                             DB::raw('sum(cantidad_adultos) as adultos'),
                //                             DB::raw('sum(cantidad_niños) as niños'),
                //                             DB::raw('sum(cantidad_niños_gratis) as niños_gratis'),
                //                             DB::raw('sum(comision_agencia) as comisiones'),
                //                             DB::raw('sum(monto_total) as monto_total'),
                //                             DB::raw('sum(monto_neto) as monto_neto'),
                //                             )
                //                         ->first();
                // }
            // }
        }

        
        // $reservas = DB::select('CALL filtrar_reservas(?,?,?,?)',[null, null, "",null]);
        // $totales  = DB::select('CALL totales(?,?,?,?)',[null, null, "",null]);
        // print_r($totales);
        return view('admin.index', compact( 'agencias', 'totales','estados', 'reservas', 'horarios'));
    }
    public function sales($locale)
    {
        App::setLocale($locale);
        return view('admin.sales');
    }

    public function privacy($locale)
    {
        App::setLocale($locale);
        return view('privacy-policy', compact('locale'));
    }

    public function terms($locale)
    {
        App::setLocale($locale);
        return view('terms-conditions', compact('locale'));
    }
}
