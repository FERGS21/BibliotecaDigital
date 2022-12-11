<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\DAtabase\Eloquent\Builder;
use App\Http\Requests\ValidacionPrestamo;
use App\Models\Libro;
use App\Models\Edicione;
use App\Models\Editoriale;
use App\Models\Area;
use App\Models\Autore;
use App\Models\Prestamo;
use App\Models\Ejemplare;

class PrestamoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-prestamo|crear-prestamo|editar-prestamo',['only'=>['index']]);
        $this->middleware('permission:ver-prestamo',['only'=>['show']]);
        $this->middleware('permission:crear-prestamo',['only'=>['create','store']]);
        $this->middleware('permission:editar-prestamo',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-prestamo',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamos = Prestamo::paginate(10);
        return view ('prestamos.index',compact('prestamos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ejemplares = Ejemplare::withCount(['prestamo'=>function(Builder $query)
        {
            $query->whereNull('fecha_devolucion');
        }])->get();

        //dd($ejemplares);

        return view('prestamos.crear', compact('ejemplares'));
        /*
        $prestamo = new Prestamo();
        $ejemplares=Ejemplare::pluck('copia','id');;
        return view('prestamos.crear', compact('prestamo','ejemplares'));

        
        */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionPrestamo $request)
    {
        $ejemplar = Ejemplare::findOrFail($request->ejemplare_id);
        $ejemplar->prestamo()->create(
            [
                'fecha_prestamo'=>$request->fecha_prestamo,
                'id_usuario'=>auth()->user()->id
            ]
            );
        //dd($request->all());
        /*
        $rules = [
            'id_ejemplar'=> 'required ',
            'id_usuario'=> 'required ',
            'fecha_prestamo'=> 'required ',
        ];
        $this->validate($request, $rules);
        
        Ejemplare::create(
            $request->only('id_ejemplar','id_usuario','fecha_prestamo')
        );
        */
        return redirect()->route('prestamos.index');

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
