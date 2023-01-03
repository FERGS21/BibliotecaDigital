<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Edicione;
use App\Models\Editoriale;
use App\Models\Area;
use App\Models\Autore;
use App\Models\Ejemplare;
use App\Models\Asignaautore;
use App\Models\Image;
use File;


class LibroController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-libro|crear-libro|editar-libro',['only'=>['index']]);
        $this->middleware('permission:ver-libro',['only'=>['show']]);
        $this->middleware('permission:crear-libro',['only'=>['create','store']]);
        $this->middleware('permission:editar-libro',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-libro',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::paginate(10);
        $imagenes = Image::all();
        return view ('libros.index',compact('libros','imagenes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libro = new Libro();
        $ediciones=Edicione::pluck('no_edicion','id');
        $editoriales=Editoriale::pluck('nombre_editorial','id');
        $areas=Area::pluck('nombre_area','id');
        $lisautores=Autore::all();
        return view('libros.crear', compact('libro','ediciones','editoriales','areas', 'lisautores'));

        //return view('libros.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $rules = [
            'titulo'=> 'required | min:3',
            'no_paginas'=> 'required',
            'isbn'=> 'required',
            'anio_edicion'=> 'required',
            'id_editorial'=> 'required',
            'id_edicion'=> 'required',
            'id_area'=> 'required',
            //'autores[]'=> 'required',
            'copia' => 'required',
            'descripcion' => 'required',
        ];
        $this->validate($request, $rules);

        $libro=Libro::create(
            $request->only('titulo','no_paginas','isbn','anio_edicion','id_editorial',
            'id_edicion','id_area','descripcion')
        );


        $libro->autores()->attach($request->input('autores'));
        
        $cantidad="1";
        for($i=1;$i<=$request->copia  ; $i++)
        {

            Ejemplare::create(['id_libro'=>$libro->id,'copia'=>$i,'cantidad'=>$cantidad]);
        }
///////////////////////////////////////////////////////////////////
        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file)
            $imageName=time().''.$file->getClientOriginalName();
            $request['libro_id']=$libro->id;
            $request['image']=$imageName;
            $file->move(\public_path("/images"),$imageName);
            Image::create($request->all());
            
        }
///////////////////////////////////////////////////////////////////

        return redirect()->route('libros.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        $ediciones=Edicione::pluck('no_edicion','id');
        $editoriales=Editoriale::pluck('nombre_editorial','id');
        $areas=Area::pluck('nombre_area','id');
        $lisautores=Autore::all();
        return view('libros.editar',compact('libro','ediciones','editoriales','areas','lisautores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        request()-> validate([
            'titulo'=> 'required',
            'no_paginas'=> 'required',
            'isbn'=> 'required',
            'anio_edicion'=> 'required',
            'id_editorial'=> 'required',
            'id_edicion'=> 'required',
            'id_area'=> 'required',
        ]);

        $libro ->update($request->all());
        return redirect()->route('libros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $libros=Libro::findOrFail($id);

        $images=Image::where("libro_id",$libros->id)->get();
        foreach($images as $image){
            if(File::exists("images/".$image->image)){
                File::delete("images/".$image->image);
            }
        }
        $libros->delete();
        return redirect()->route('libros.index');
    }
    /*public function destroy(Libro $libro)
    {
        
       // $libroi=Libro::findOrFail($libro);
        $images=Image::where("libro_id",$libro)->get();
        foreach($images as $image){
            if(File::exists("images/".$image->image)){
                File::delete("images/".$image->image);
            }
        }
        $libro->delete();
        return redirect()->route('libros.index');
    }*/
}