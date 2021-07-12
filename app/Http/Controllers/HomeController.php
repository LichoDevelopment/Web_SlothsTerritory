<?php

namespace App\Http\Controllers;

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
    public function admin()
    {
        $reservaciones = Reserva::all();
        return view('admin.index', compact('reservaciones'));
    }
    public function sales()
    {
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
