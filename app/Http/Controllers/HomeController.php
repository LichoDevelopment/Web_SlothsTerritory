<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
use App\Models\Estado;
use App\Models\Fecha_tour;
use App\Models\Horario;
use App\Models\Image;
use App\Models\ImageType;
use App\Models\Reserva;
use App\Models\Reservacion;
use App\Models\SiteSection;
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

        $images = Image::with('type')->get();
        $imageTypes = ImageType::all();
        $siteSections = SiteSection::all()->where('language', $locale)->groupBy('title');

        return view('home', compact('locale', 'images', 'imageTypes', 'siteSections'));
    }
    public function admin(Request $request)
    {
        // $startedAt = time();
        $current_date_time = Carbon::now();
            $date = $current_date_time->setTimezone('America/Costa_Rica');
            $date = $date->format('Y-m-d');
        if (rol_usuario()->id === 2){

            $reservas = DB::select('CALL filtrar_reservas(?,?,?,?)',[$date, $date, null,null]);
            $totales  = DB::select('CALL totales(?,?,?,?)',[$date, $date, null,null]);
        }
        else{
            $reservas = DB::select('CALL filtrar_reservas(?,?,?,?)',[null, null, null,null]);
            // $reservas = Reserva::all();
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

        }
        // $finishedAt = time();
        
        // echo 'Tiempo: ' . ($finishedAt - $startedAt);
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

    public function combos($locale)
    {
        App::setLocale($locale);
        return view('/combo/combo', compact('locale'));
    }
}
