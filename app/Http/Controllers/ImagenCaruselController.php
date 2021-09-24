<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ImagenCarusel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenCaruselController extends Controller
{
    public function index()
    {
        $imagenesCarusel = ImagenCarusel::all();

        return view('admin.slider', compact('imagenesCarusel'));
    }
    public function all()
    {
        return ImagenCarusel::all();
    }

    public function upload(Request $request)
    {
        $destino = 'carusel';
        $url     = Storage::disk('public')->put($destino, $request->file('file'));

        ImagenCarusel::create([
            'titulo'       => $request->titulo,
            'url'          => $url,
        ]);

        return response([
            'message'   => 'imagen subida',
            'status'    => 201,
            'errors'    => false
        ]);
    }

    public function destroy($id)
    {
        ImagenCarusel::destroy($id);
    }
}
