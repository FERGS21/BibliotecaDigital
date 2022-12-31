@extends('layouts.app')
@section('title')
    Inicio
@endsection
@section('content')

    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Inicio</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                         
                                <div class="row">
                                    @can('ver-area')
                                    <div class="col-md-3 col-xl-3">
                                        <div class="card bg-c-orange order-card">
                                            <div class="card-block">
                                                <h5>Areas</h5> @endcan                                              
                                                @php
                                                 use App\Models\Area;
                                                $cant_areas = Area::count();                                                
                                                @endphp 
                                                @can('ver-area')
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_areas}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/areas" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>@endcan
                                    @can('ver-autor')
                                    <div class="col-md-3 col-xl-3">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>Autores</h5>@endcan                                               
                                                @php
                                                 use App\Models\Autore;
                                                $cant_autores = Autore::count();                                                
                                                @endphp
                                                @can('ver-autor')
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_autores}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/areas" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>@endcan
                                    @can('ver-edicion')
                                    <div class="col-md-3 col-xl-3">
                                        <div class="card bg-c-orange order-card">
                                            <div class="card-block">
                                                <h5>Ediciones</h5> @endcan                                              
                                                @php
                                                 use App\Models\Edicione;
                                                $cant_ediciones = Edicione::count();                                                
                                                @endphp 
                                                @can('ver-edicion')
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_ediciones}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/areas" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>@endcan

                                    @can('ver-editorial')
                                    <div class="col-md-3 col-xl-3">
                                        <div class="bg-c-blue order-card">
                                            <div class="card-block">
                                                <h5>Editoriales</h5>  @endcan                                             
                                                @php
                                                 use App\Models\Editoriale;
                                                $cant_editoriales = Editoriale::count();                                                
                                                @endphp @can('ver-editorial')
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span>{{$cant_editoriales}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/areas" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>@endcan
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
                                @foreach($libros as $libro)
                                    <div class="col-md-3 col-xl-3">
                                        <div class="card bg-c-orange order-card">
                                            <div class="card-block">
                                                <h5>{{$libro->titulo}}</h5>   
                                                <h6 class="text-right">
                                                    {{$libro->edicion->no_edicion}}</h4>
                                                @foreach ($libro->autores as $autor)
                                                <h6 class="text-right">{{$autor->nombre.' '.$autor->ap.' '.$autor->am.', '}}</h6>
                                                @endforeach
                                                <p class="m-b-0 text-right"><a href="/prestamos/create" class="text-white">Ejemplares</a></p>
                                            </div>
                                        </div> 
                                    </div> 
                                @endforeach         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection