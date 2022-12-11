<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autore;

class AutoreController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-autor | crear-autor | editar-autor',['only'=>['index']]);
        $this->middleware('permission:crear-autor',['only'=>['create','store']]);
        $this->middleware('permission:editar-autor',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-autor',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores = Autore::paginate(10);
        return view ('autores.index',compact('autores'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('autores.crear');
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
            'nombre'=> 'required',
            'ap'=> 'required',
            'am' => 'required',
        ]);
        Autore::create($request->all());
        return redirect()->route('libros.index');

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
    public function edit(Autore $autore)
    {

        return view('autores.editar',compact('autore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autore $autore)
    {
        request()-> validate([
            'nombre'=> 'required',
            'ap'=> 'required',
            'am' => 'required',
        ]);

        $autore ->update($request->all());
        return redirect()->route('autores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autore $autore)
    {
        $autore->delete();
    
        return redirect()->route('autores.index');
    }
}