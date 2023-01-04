@extends('layouts.app')
@section('title')
    Inicio
@endsection
@section('content')

    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                         
                                <div class="row">
                                    <a href="/home">TODAS</a>  
                                    @foreach($areas as $area)
                                        <a href="" class="ml-4">{{$area->nombre_area}}</a>
                                    @endforeach
                                </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    

                    <div class="card">
                            <div class="card-body">   

                                               
                    
                            <div class="row"> 
                                
                                @foreach($ejemplares as $ejemplar)
                                @if($ejemplar->cantidad > $ejemplar->prestamo_count)
                                    <div class="col-md-3 col-xl-3">
                                        <div class="card bg-c-gray black-card">
                                            <div class="card-block">
                                                <form action="{{ url('/prestamos/crear') }}" method="POST">
                                                    @csrf
                                                    <div>
                                                        <h6>{{$ejemplar->libro->titulo}}</h5> 
                                                        @foreach ($imagenes as $imagen)
                                                            @if($imagen->id == $ejemplar->libro->id)
                                                            <img src="images/{{$imagen->image}}" class="img-responsive" style="max-height:200px; max-width:200px">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <div class="form-group">
                                                        <select name="ejemplare_id" id="ejemplare_id" class="form-control">
                                                             <option value="{{$ejemplar->id}}">{{$ejemplar->copia.' ('.$ejemplar->libro->titulo.')'}}</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="fecha_prestamo" class="form-control" value="{{old('fecha_prestamo', date('y-m-d'))}}" required >
                                                    </div>
                                                    <div class=" mt-2">
                                                        <button type="submit" class="btn btn-primary">Agregar a estante</button> 
                                                    </div>
                                                </form>
                                            </div>
                                        </div> 
                                    </div> 
                                @endif
                                @endforeach         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection