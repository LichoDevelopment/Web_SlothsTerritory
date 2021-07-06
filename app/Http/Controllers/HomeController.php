<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
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

    public function privacy()
    {
        return view('privacy-policy');
    }

    public function terms()
    {
        return view('terms-conditions');
    }
}
