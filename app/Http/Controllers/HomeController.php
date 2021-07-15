<?php

namespace App\Http\Controllers;

use App\Models\Fecha_tour;
use App\Models\Reserva;
use App\Models\Reservacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
        $fecha_seleccionada = '';
        $reservaciones = [];
        
        if($query){
            if($query['fecha']){
                $fecha_seleccionada = $query['fecha'];
                $fecha = Fecha_tour::where('fecha',$fecha_seleccionada)->first();
                if($fecha){
                    $reservaciones = Reserva::where('id_fecha_tour',$fecha->id)->get();
                }
            }


        }



        return view('admin.index', compact('reservaciones'));
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
