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
                                    <table class="table table-striped mt-2">
                                    <thead style="background-color:#6777ef">                                     
                                        <th style="display: none;">ID</th>
                                        <th style="color:#fff;">Titulo</th>
                                        <th style="color:#fff;">Paginas</th> 
                                        <th style="color:#fff;">ISBN</th>
                                        <th style="color:#fff;">Año Edicion</th>
                                        <th style="color:#fff;">Editorial</th>
                                        <th style="color:#fff;">Edicion</th>
                                        <th style="color:#fff;">Area</th> 
                                        @can('crear-libro')                                   
                                        <th style="color:#fff;">Acciones</th>   
                                        @endcan                                                                
                                </thead>
                                <tbody>
                                @foreach ($libros as $libro)
                                <tr>
                                    <td style="display: none;">{{ $libro->id }}</td>                                
                                    <td>{{ $libro->titulo }}</td>
                                    <td>{{ $libro->no_paginas }}</td>
                                    <td>{{ $libro->isbn }}</td>
                                    <td>{{ $libro->anio_edicion}}</td>
                                    <td>{{ $libro->editorial->nombre_editorial }}</td>
                                    <td>{{ $libro->edicion->no_edicion }}</td>
                                    <td>{{ $libro->area->nombre_area }}</td>

                                    <td>
                                        <form action="{{ route('libros.destroy',$libro->id) }}" method="POST">                                        
                                            @can('editar-libro')
                                            <a class="btn btn-info" href="{{ route('libros.edit',$libro->id) }}">Editar</a>
                                            @endcan

                                            @csrf
                                            @method('DELETE')
                                            @can('borrar-libro')
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                                </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection