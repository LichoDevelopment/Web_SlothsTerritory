<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function home($locale)
    {
        App::setLocale($locale);
        return view('home');
    }
    public function admin()
    {
        return view('admin.index');
    }
    public function sales()
    {
        return view('admin.sales');
    }
    public function reservations()
    {
        return view('admin.reservations');
    }

    public function privacy($locale)
    {
        App::setLocale($locale);
        return view('privacy-policy');
    }

    public function terms($locale)
    {
        App::setLocale($locale);
        return view('terms-conditions');
    }
}
