<?php

namespace App\Services;

use App\Models\Combo;
use Illuminate\Support\Facades\Storage;

class ComboService
{
    public function getAll()
    {
        return Combo::all()->groupBy('uuid');
    }

    public function getCombos($id)
    {
        $combos = Combo::where('uuid', $id)->get();

        $arrayCombos = [];

        foreach ($combos as $combo) {
            $combo->image = Storage::url($combo->image);
            if ($combo->language === 'en') {
                $arrayCombos['en'] = $combo;
            } else {
                $arrayCombos['es'] = $combo;
            }
        }

        return $arrayCombos;
    }

    public function create($data)
    {
        return Combo::create($data);
    }

    public function update($id, $data, $language)
    {
        $combo = Combo::where('uuid', $id)->where('language', $language)->first();
        $combo->update($data);
        return $combo;
    }

    public function delete($id)
    {
        $combos = Combo::where('uuid',$id)->get();

        foreach ($combos as $combo) {
            $combo->delete();
        }
    }

}