@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Asigna Autor(s)</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-asignaautor')
                        <a class="btn btn-warning" href="{{ route('asignaautores.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Libro</th>
                                    <th style="color:#fff;">Autor</th> 
                                    <th style="color:#fff;"></th> 
                                    <th style="color:#fff;"></th> 

                                    @can('crear-asignaautor')                                   
                                    <th style="color:#fff;">Acciones</th>   
                                    @endcan                                                                
                              </thead>
                              <tbody>
                            @foreach ($asignaautores as $asignaautore)
                            <tr>
                                <td style="display: none;">{{ $asignaautore->id }}</td>  
                                <td>{{ $asignaautore->libro->titulo }}</td>
                                <td>{{ $asignaautore->autor->nombre}}</td>
                                <td>{{ $asignaautore->autor->ap}}</td>
                                <td>{{ $asignaautore->autor->am}}</td>

                                <td>
                                    <form action="{{ route('asignaautores.destroy',$asignaautore->id) }}" method="POST">                                        
                                        @can('editar-asignaautor')
                                        <a class="btn btn-info" href="{{ route('asignaautores.edit',$asignaautore->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-asignaautor')
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
                            {!! $asignaautores->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection