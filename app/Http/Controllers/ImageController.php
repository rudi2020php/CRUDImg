<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Image; 

use App\Models\User;

class ImageController extends Controller{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagenes = Image::orderBy('id', 'desc')->paginate();
        //return $imagenes;
        return view('imagen.datatables', compact('imagenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image'
    ]);

        $img = $request->file('file')->store('public/imagenes');
        $url = Storage::url($img);

        $image = new Image();
        $image->url = $url;
        $image->save();
        return redirect()->route('files.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imagen = Image::find($id);
        return view('imagen.show', compact('imagen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $id)
    {
        return view('files.show', compact(id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $imagen)   {
        
        $request->validate([
            'file' => 'required|image'
    ]);

        $img = $request->file('file')->store('public/imagenes');
        $url = Storage::url($img);
        $imagen->url = $url;
        $imagen->save();

        return redirect()->route('files.show', $imagen);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $imagen)
    {
        $imagen->delete();
        return redirect()->route('files.index');

    }
}
