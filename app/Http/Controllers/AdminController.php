<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\EmailFactura;
use App\Models\Agencia;
use App\Models\Horario;
use App\Models\Precio;
use App\Models\Reserva;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
    public function agregarReserva()
    {
        $tours      = Tour::all();
        $horarios   = Horario::all();
        $agencias   = Agencia::all();
        $precios    = Precio::all();

        $view_data['tours']     = $tours;
        $view_data['horarios']  = $horarios;
        $view_data['agencias']  = $agencias;
        $view_data['precios']   = $precios;

        return view('admin.reservas.agregar', $view_data);
    }
    public function editarReserva($id)
    {
        $reserva    = Reserva::find($id);
        $tours      = Tour::all();
        $horarios   = Horario::all();
        $agencias   = Agencia::all();
        $precios    = Precio::all();

        $view_data['reserva']   = $reserva;
        $view_data['tours']     = $tours;
        $view_data['horarios']  = $horarios;
        $view_data['agencias']  = $agencias;
        $view_data['precios']   = $precios;

        return view('admin.reservas.editar', $view_data);
    }

    public function verReserva($id)
    {
        $query = request()->query();
        $reserva = Reserva::find($id);

        $locale = 'en';

        if($query){
            $lang = $query['lang'];
        } 

        App::setLocale($locale);

        return view('admin.reservas.ver',compact('reserva', 'locale'));
    }
    public function agencias()
    {
        $agencas = Agencia::all();
        return view('admin.agencias', compact('agencias'));
    }
    public function tours()
    {
        $tours = Tour::all();
        $horarios = Horario::all();
        $precios = Precio::all();
        return view('admin.tours.index', compact('tours'));
    }
    public function enviarCorreo(Request $request, $id)
    {
        $reserva = Reserva::with('agencia','tour','fecha_tour','horario')->find($id)->toArray();

        Mail::to($request->email)->send(new EmailFactura($reserva));

        return response(['mensaje' => 'correo enviado']);
    }
}
