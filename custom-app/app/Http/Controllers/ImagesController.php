<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Imagen::where('cuenta_user', (auth()->user()->user))->get();
        return view('images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('archivo');
        $new_file_name = auth()->user()->user . "_" . $file->getClientOriginalName();
        $path = $file->storeAs('images', $new_file_name);

        Imagen::create([
            'titulo' => $request->get('titulo'),
            'archivo' => $path,
            'cuenta_user' => auth()->user()->user
        ]);

        Session::flash('message', 'Image has been created successfully.');
        return Redirect::to('images');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $image = Imagen::find($id);

        if(!$image) {
            return redirect()->route('images.index')
                ->withErrors('Image does not exist.');
        }

        return view('images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $image = Imagen::find($id);

        if(!$image) {
            Session::flash('message', 'Image does not exist.');
            return Redirect::to('images');
        }

        if ($request->hasFile('archivo')){
            $image_path = public_path($image->archivo);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $file = $request->file('archivo');
            $new_file_name = auth()->user()->user . "_" . $file->getClientOriginalName();
            $path = $file->storeAs('images', $new_file_name);
        } else {
            $path = $image->archivo;
        }

        $image->titulo = $request->get('titulo');
        $image->archivo = $path;
        $image->save();

        Session::flash('message', 'Image has been updated successfully.');
        return Redirect::to('images');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $image = Imagen::find($id);

        if(!$image) {
            return redirect()->route('images.index')
                ->withErrors('Image does not exist.');
        }

        $image_path = public_path($image->archivo);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $image->delete();

        Session::flash('message', 'Image has been deleted successfully.');
        return Redirect::to('images');
    }
}
