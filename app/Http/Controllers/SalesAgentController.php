<?php

namespace App\Http\Controllers;

use App\Models\SiteSection;
use Illuminate\Http\Request;

class SalesAgentController extends Controller
{
    //
    public function index()
    {
        $siteSections = SiteSection::all()->where('language', 'es')->groupBy('title');
        $locale = 'es';
        return view('salesAgent.sales_agent', compact('locale', 'siteSections'));
    }

}
