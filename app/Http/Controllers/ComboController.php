<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ComboService;
use Illuminate\Http\Request;

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
        $this->comboService->create($request->all());
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
