<?php

namespace App\Http\Controllers;

use App\Models\SiteSection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

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
        // return response()->download($this->disk .'/'.$name);

        if(Storage::disk($this->disk)->exists($name)){
            return Storage::disk($this->disk)->download($name);
        }

        return response('', 404);
    }

}
