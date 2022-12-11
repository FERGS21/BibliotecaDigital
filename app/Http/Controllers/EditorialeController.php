<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Editoriale;

class EditorialeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-editorial|crear-editorial| editar-editorial',['only'=>['index']]);
        
        $this->middleware('permission:crear-editorial',['only'=>['create','store']]);
        $this->middleware('permission:editar-editorial',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-editorial',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editoriales = Editoriale::paginate(10);
        
        return view('editoriales.index',compact('editoriales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editoriales.crear');
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
            'nombre_editorial'=> 'required',
        ]);
        
        Editoriale::create($request->all());
        return redirect()->route('libros.index');
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
    public function edit(Editoriale $editoriale)
    {
        return view('editoriales.editar',compact('editoriale')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Editoriale $editoriale)
    {
        request()-> validate([
            'nombre_editorial'=> 'required',
        ]);

        $editoriale ->update($request->all());
        return redirect()->route('editoriales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Editoriale $editoriale)
    {
        $editoriale->delete();
    
        return redirect()->route('editoriales.index');
    }
}
