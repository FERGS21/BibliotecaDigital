<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Ejemplare;
use App\Models\Area;
use App\Models\Image;
use App\Models\Prestamo;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
      $ejemplares = Ejemplare::withCount(['prestamo'=>function($query )
      {
          $query->whereNull('fecha_devolucion');
      }])->get();
      $areas=Area::all();
      $imagenes=Image::all();
      $prestamos=Prestamo::all();
      
      return view('home',compact('ejemplares','areas','imagenes','prestamos'));
    }
}
