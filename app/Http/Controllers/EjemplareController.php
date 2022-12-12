<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edicione;
use App\Models\Editoriale;
use App\Models\Area;
use App\Models\Autore;
use App\Models\Ejemplare;
use App\Models\Libro;

class EjemplareController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-ejemplar|crear-ejemplar|editar-ejemplar',['only'=>['index']]);
        $this->middleware('permission:ver-ejemplar',['only'=>['show']]);
        $this->middleware('permission:crear-ejemplar',['only'=>['create','store']]);
        $this->middleware('permission:editar-ejemplar',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-ejemplar',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ejemplares = Ejemplare::paginate(10);
        return view ('ejemplares.index',compact('ejemplares'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ejemplar = new Ejemplare();
        $libros=Libro::pluck('titulo','id');
        $ediciones=edicione::pluck('no_edicion','id');
        return view('ejemplares.crear', compact('ejemplar','libros','ediciones'));
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
            'id_libro'=> 'required ',
            'copia'=> 'required | min:3',
            'cantidad'=>'required|integer',
        ];
        $this->validate($request, $rules);
        
        Ejemplare::create(
            $request->only('id_libro','copia','cantidad')
        );

        return redirect()->route('ejemplares.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_ejemplar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ejemplare $ejemplare)
    {
        $libros=Libro::pluck('titulo','id');

        return view('ejemplares.editar',compact('ejemplare', 'libros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ejemplare $ejemplare)
    {
        request()-> validate([
            'id_libro'=> 'required',
            'copia'=> 'required',
            'cantidad'=> 'required',
        ]);

        $ejemplare ->update($request->all());

        return redirect()->route('ejemplares.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ejemplare $ejemplare)
    {
        $ejemplare->delete();
    
        return redirect()->route('ejemplares.index');
    }
}
