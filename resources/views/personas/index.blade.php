@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Personas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-persona')
                        <a class="btn btn-warning" href="{{ route('personas.create') }}">Nuevo</a>
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
                            @foreach ($personas as $persona)
                            <tr>
                                <td style="display: none;">{{ $persona->id }}</td>                                
                                <td>{{ $persona->nombre }}</td>
                                <td>{{ $persona->ap }}</td>
                                <td>{{ $persona->am }}</td>
                                <td>
                                    <form action="{{ route('personas.destroy',$persona->id) }}" method="POST">                                        
                                        @can('editar-persona')
                                        <a class="btn btn-info" href="{{ route('personas.edit',$persona->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-persona')
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
                            {!! $personas->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection