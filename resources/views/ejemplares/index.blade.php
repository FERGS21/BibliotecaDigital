@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Ejemplares</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                        <div class="pagination justify-content-end">
                            {!! $ejemplares->links() !!}
                        </div>
            <!--
                        @can('crear-ejemplar')
                        <a class="btn btn-warning" href="{{ route('ejemplares.create') }}">Nuevo</a>
                        @endcan
            -->
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Libro</th>
                                    <th style="color:#fff;">Copia</th>
                                    <!-- 
                                    @can('crear-ejemplar')                                   
                                    <th style="color:#fff;">Acciones</th>   
                                    @endcan       -->                                                         
                              </thead>
                              <tbody>
                            @foreach ($ejemplares as $ejemplar)
                            <tr>
                                <td style="display: none;">{{ $ejemplar->id }}</td>                                
                                <td>{{ $ejemplar->libro->titulo }}</td>
                                <td>{{ $ejemplar->copia }}</td>
                                <!--
                                <td>
                                    <form action="{{ route('ejemplares.destroy',$ejemplar->id) }}" method="POST">                                        
                                        @can('editar-ejemplar')
                                        <a class="btn btn-info" href="{{ route('ejemplares.edit',$ejemplar->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-ejemplar')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        @endcan
                                    </form>
                                </td>-->
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $ejemplares->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection