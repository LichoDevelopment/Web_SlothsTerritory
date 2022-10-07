<?php

namespace App\Http\Controllers;

use App\Models\SiteSection;
use Illuminate\Support\Facades\Response as FacadeResponse;

class SalesAgentController extends Controller
{
    private $disk = 'public/salesAgent';
    //
    public function index()
    {
        $siteSections = SiteSection::all()->where('language', 'es')->groupBy('title');
        $locale = 'es';
        return view('salesAgent.sales_agent', compact('locale', 'siteSections'));
    }

    public function download($name){

        return $this->downloadFile($name);
    }

    public function downloadFile($name){
        $file= public_path(). "/agents_zip_files/$name";
        return FacadeResponse::download($file);
    }

}
