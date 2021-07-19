<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
use App\Models\Fecha_tour;
use App\Models\Reserva;
use App\Models\Reservacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home($locale)
    {
        App::setLocale($locale);
        return view('home', compact('locale'));
    }
    public function admin(Request $request)
    {
        $query = $request->query();
        $fechaInicio = '';
        $fechaFin = '';
        $reservaciones = Reserva::all();
        $agencias = Agencia::all();

        $total_adultos = '';
        $total_niños = '';
        $total_niños_gratis = '';
        $total_pax= '';

        $total_comisiones = '';
        
        if($query){
            if($query['fechaInicio']){
                $fechaInicio = $query['fechaInicio'];
                $fechaFin = $query['fechaFin'];
                $id_agencias = [];

                if($query['agencia']){
                    $id_agencias = [$query['agencia']];
                }else{
                    foreach($agencias as $agencia){
                        $id_agencias[] = $agencia->id;
                    }
                }

                $fechas = DB::table('fecha_tour')->whereBetween('fecha', [$fechaInicio, $fechaFin])->get();

                $id_fechas = [];
                
                foreach($fechas as $fecha){
                    $id_fechas[] = $fecha->id;
                }

                if($id_fechas){
                    $reservaciones = Reserva::select('*')
                                            ->whereIn('id_fecha_tour', $id_fechas)
                                            ->whereIn('id_agencia',$id_agencias)
                                            ->get();
                }
            }
        }




        return view('admin.index', compact('reservaciones', 'agencias'));
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
