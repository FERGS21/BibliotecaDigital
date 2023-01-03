<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Ejemplare;
use App\Models\Area;
use App\Models\Image;

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

      //$libros = Libro::paginate(10);
      $ejemplares=Ejemplare::paginate(12);
      $areas=Area::all();
      $imagenes=Image::all();
      return view('home',compact('ejemplares','areas','imagenes'));
    }
}
