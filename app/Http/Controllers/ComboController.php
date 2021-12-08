<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ComboService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ComboController extends Controller
{

    private $comboService;

    public function __construct(ComboService $comboService) 
    {
        $this->comboService = $comboService;
    }
    public function index()
    {
        $combos = $this->comboService->getAll();
        return view('admin.combos.index', compact('combos'));
    }

    public function show($id)
    {
        $combo = $this->comboService->getCombo($id);

        return view('admin.combos.show', compact('combo'));
    }

    public function create()
    {
       return view('admin.combos.create');
    }

    public function store(Request $request)
    {
        $destino = 'combos';
        $url     = Storage::disk('public')->put($destino, $request->file('file'));
        $uuid = Str::uuid()->toString();

        $ComboEnglish = json_decode($request->en, true);
        $ComboEnglish['uuid'] = $uuid;
        $ComboEnglish['image'] = $url;
        
        $ComboSpanish = json_decode($request->es, true);
        $ComboSpanish['uuid'] = $uuid;        
        $ComboSpanish['image'] = $url;

        $this->comboService->create($ComboEnglish);
        $this->comboService->create($ComboSpanish);
    }

    public function update(Request $request, $id)
    {
        $this->comboService->update($id, $request->all());
    }

    public function destroy($id)
    {
        $this->comboService->delete($id);
    }
}
