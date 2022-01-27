<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\SiteSectionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class SiteSectionController extends Controller
{
    private $siteSectionService;

    public function __construct(SiteSectionService $siteSectionService) 
    {
        $this->siteSectionService = $siteSectionService;
    }

    public function index()
    {
        $siteSections = $this->siteSectionService->getAll();
        
        return view('admin.site-sections.index', compact('siteSections'));
    }

    public function show($id)
    {
        $siteSections = $this->siteSectionService->getOne($id);

        return view('admin.site-sections.show', compact('siteSections'));
    }

    public function create($id)
    {
       return view('admin.site-sections.create', compact('id'));
    }

    public function store(Request $request)
    {
        $uuid    = Str::uuid()->toString();

        $siteSectionEnglish['title']    = $request->title;
        $siteSectionEnglish['content']  = $request->enContent;
        $siteSectionEnglish['uuid']     = $uuid;
        $siteSectionEnglish['language'] = 'en';
        
        $siteSectionSpanish['title']    = $request->title;
        $siteSectionSpanish['content']  = $request->esContent;
        $siteSectionSpanish['uuid']     = $uuid;  
        $siteSectionSpanish['language'] = 'es';  

        $this->siteSectionService->create($siteSectionEnglish);
        $this->siteSectionService->create($siteSectionSpanish);

        return redirect()->route('admin.site.sections.index');
    }

    public function update(Request $request, $id)
    {  
        $siteSectionSpanish['content']  = $request->enContent;
        $siteSectionEnglish['content']  = $request->esContent; 

        $this->siteSectionService->update($id, $siteSectionEnglish, 'en');
        $this->siteSectionService->update($id, $siteSectionSpanish, 'es');
    }

    public function destroy($id)
    {
        $this->siteSectionService->delete($id);
    }


}
