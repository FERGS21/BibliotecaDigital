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