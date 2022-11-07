<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-persona|crear-persona|editar-persona',['only'=>['index']]);
        $this->middleware('permission:ver-persona',['only'=>['show']]);
        $this->middleware('permission:crear-persona',['only'=>['create','store']]);
        $this->middleware('permission:editar-persona',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-persona',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::paginate(10);
        return view ('personas.index',compact('personas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personas.crear');
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
        Persona::create($request->all());
        return redirect()->route('personas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {

        return view('personas.editar',compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        request()-> validate([
            'nombre'=> 'required',
            'ap'=> 'required',
            'am' => 'required',
        ]);

        $persona ->update($request->all());
        return redirect()->route('personas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();
    
        return redirect()->route('personas.index');
    }
}
