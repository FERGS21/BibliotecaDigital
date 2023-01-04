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
        //eloquen
       // $prestamos = Prestamo::with('usuario:id,name','ejemplar')->get();
        //dd($prestamos);
        //return view ('prestamos.index',compact('prestamos'));
        $prestamos = Prestamo::paginate(10);
        return view ('prestamos.index', compact('prestamos'));

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
        return redirect()->route('home');

    }

    public function devolucion(Request $request, $ejemplare_id)
    {
        if($request->ajax()){
            //dd($request->all());
            Prestamo::where('ejemplare_id',$ejemplare_id)
            ->whereNull('fecha_devolucion')
            ->update( [  'fecha_devolucion' => date('Y-m-d') ] );
            return response()->json(['fecha_devolucion'=>date('Y-m-d')]);
        }else{
            abort(404);
        }
    }

}
