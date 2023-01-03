@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Libros</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-libro')
                        <a class="btn btn-warning" href="{{ route('libros.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Titulo</th>
                                    <!--<th style="color:#fff;">Paginas</th> 
                                    <th style="color:#fff;">ISBN</th>
                                    <th style="color:#fff;">Año Edicion</th>
                                    <th style="color:#fff;">Editorial</th>
                                    <th style="color:#fff;">Edicion</th>
                                    <th style="color:#fff;">Area</th> 
                                    <th style="color:#fff;">Autor(s)</th> -->
                                    <th style="color:#fff;">Descripcion</th>
                                    <th style="color:#fff;">Imagen</th>
                                    @can('crear-libro')                                   
                                    <th style="color:#fff;">Acciones</th>   
                                    @endcan                                                                
                              </thead>
                              <tbody>
                            @foreach ($libros as $libro)
                            <tr>
                                <td style="display: none;">{{ $libro->id }}</td>                                
                                <td>{{ $libro->titulo }}</td>
                               <!-- <td>{{ $libro->no_paginas }}</td>
                                <td>{{ $libro->isbn }}</td>
                                <td>{{ $libro->anio_edicion}}</td>
                                <td>{{ $libro->editorial->nombre_editorial }}</td>
                                <td>{{ $libro->edicion->no_edicion }}</td>
                                <td>{{ $libro->area->nombre_area }}</td>
                                <td>
                                     @foreach ($libro->autores as $autor)
                                        {{$autor->nombre.' '.$autor->ap.' '.$autor->am.', '}}
                                     @endforeach
                                </td>-->
                                <td>{{ $libro->descripcion }}</td>
                                <td>
                                @foreach ($imagenes as $imagen)
                                    @if($imagen->id == $libro->id)
                                    <img src="images/{{$imagen->image}}" class="img-responsive" style="max-height:200px; max-width:200px">
                                    @endif
                                @endforeach
                                </td>

                                

                                <td>
                                    <form action="{{ route('libros.destroy',$libro->id) }}" method="POST">                                        
                                        @can('editar-libro')
                                        <a class="btn btn-info" href="{{ route('libros.edit',$libro->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-libro')
                                        <!-- onclick confirmacion --> 
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure')">Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $libros->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection