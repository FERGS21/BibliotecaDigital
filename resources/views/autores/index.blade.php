@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">autores</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-autore')
                        <a class="btn btn-warning" href="{{ route('autores.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Apellido Paterno</th> 
                                    <th style="color:#fff;">Apellido Materno</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($autores as $autore)
                            <tr>
                                <td style="display: none;">{{ $autore->id }}</td>                                
                                <td>{{ $autore->nombre }}</td>
                                <td>{{ $autore->ap }}</td>
                                <td>{{ $autore->am }}</td>
                                <td>
                                    <form action="{{ route('autores.destroy',$autore->id) }}" method="POST">                                        
                                        @can('editar-autore')
                                        <a class="btn btn-info" href="{{ route('autores.edit',$autore->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-autore')
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
                            {!! $autores->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection