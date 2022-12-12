<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edicione;

class EdicioneController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-edicion|crear-edicion|editar-edicion',['only'=>['index']]);
        $this->middleware('permission:crear-edicion',['only'=>['create','store']]);
        $this->middleware('permission:editar-edicion',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-edicion',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ediciones = Edicione::paginate(10);
        
        return view('ediciones.index',compact('ediciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ediciones.crear');
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
            'no_edicion'=> 'required',
        ]);
        
        Edicione::create($request->all());
        return redirect()->route('libros.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Edicione $edicione)
    {
        return view('ediciones.editar',compact('edicione')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Edicione $edicione)
    {
        request()-> validate([
            'no_edicion'=> 'required',
        ]);

        $edicione ->update($request->all());
        return redirect()->route('ediciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edicione $edicione)
    {
        $edicione->delete();
    
        return redirect()->route('ediciones.index');
    }
}
