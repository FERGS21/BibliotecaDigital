@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Prestamos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-prestamo')
                        <a class="btn btn-warning" href="{{ route('prestamos.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Libro</th>
                                    <th style="color:#fff;">Ejemplar</th>
                                    <th style="color:#fff;">Usuario</th> 
                                    <th style="color:#fff;">Fecha prestamo</th> 
                                    <th style="color:#fff;">Fecha devolucion</th> 
                                    @can('crear-prestamo')                                   
                                    <th style="color:#fff;">Acciones</th>   
                                    @endcan                                                                
                              </thead>
                              <tbody>
                            @foreach ($prestamos as $prestamo)
                            <tr>
                                <td style="display: none;">{{ $prestamo->id }}</td>                                
                                <td>{{ $prestamo->ejemplar->libro->titulo }}</td>
                                <td>{{ $prestamo->ejemplar->copia }}</td>
                                <td>{{ $prestamo->usuario->name }}</td>
                                <td>{{ $prestamo->fecha_prestamo }}</td>
                                <td>{{ $prestamo->fecha_devolucion ?? 'Prestado'}}</td>
                                <td>
                                    <form action="{{ route('prestamos.destroy',$prestamo->id) }}" method="POST">                                        
                                        @can('editar-prestamo')
                                        <a class="btn btn-info" href="{{ route('prestamos.edit',$prestamo->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-prestamo')
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
                            {!! $prestamos->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection