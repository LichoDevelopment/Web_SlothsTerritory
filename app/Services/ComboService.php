<?php

namespace App\Services;

use App\Models\Combo;

class ComboService
{
    public function getAll()
    {
        return Combo::all();
    }

    public function getCombo($id)
    {
        return Combo::find($id);
    }

    public function create($data)
    {
        return Combo::create($data);
    }

    public function update($id, $data)
    {
        $combo = Combo::find($id);
        $combo->update($data);
        return $combo;
    }

    public function delete($id)
    {
        $combo = Combo::find($id);
        $combo->delete();
        return $combo;
    }

}