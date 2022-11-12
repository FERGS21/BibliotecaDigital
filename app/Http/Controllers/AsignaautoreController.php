<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asignaautore;
use App\Models\Libro;
use App\Models\Autore;

class AsignaautoreController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-asignaautor | crear-asignaautor | editar-asignaautor',['only'=>['index']]);
        $this->middleware('permission:crear-asignaautor',['only'=>['create','store']]);
        $this->middleware('permission:editar-asignaautor',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-asignaautor',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $asignaautores = Asignaautore::paginate(10);
        return view ('asignaautores.index',compact('asignaautores'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        

        $asignaautore = new Asignaautore();
        $libros=Libro::pluck('titulo','id');
        $autores=Autor::pluck('nombre','id');
        return view('asignaautores.crear', compact('asignaautore','libros','autores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()-> validate([
            'id_libro'=> 'required',
            'id_autor'=> 'required',
        ]);
        Asignautore::create($request->all());
        return redirect()->route('asignaautores.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_autore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignautore $asignaautore)
    {

        return view('asignaautores.editar',compact('asignaautore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignautore $asignaautore)
    {
        request()-> validate([
            'id_libro'=> 'required',
            'id_autor' => 'required',
        ]);

        $asignaautore ->update($request->all());
        return redirect()->route('asignaautores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignautore $asignaautore)
    {
        $asignaautore->delete();
    
        return redirect()->route('asignaautores.index');
    }
}