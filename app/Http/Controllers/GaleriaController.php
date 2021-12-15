<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\ImageType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriaController extends Controller
{
    public function index()
    {
        $images = Image::all();

        return view('admin.gallery', compact('images'));
    }

    public function all()
    {
        return Image::with('tipo')->get();
    }

    public function getTypos()
    {
        return ImageType::all();
    }

    public function upload(Request $request)
    {
        $destino = 'galeria';
        $url     = Storage::disk('public')->put($destino, $request->file('file'));

        $tipo = ImageType::find($request->tipo);

        Image::create([
            'titulo'       => $request->titulo,
            'url'          => $url,
            'tipo'         => $tipo->id,
        ]);

        return response([
            'message'   => 'imagen subida',
            'status'    => 201,
            'errors'    => false
        ]);
    }

    public function destroy($id)
    {
        Storage::disk('public')->delete(Image::find($id)->url);
        Image::destroy($id);
    }
}
