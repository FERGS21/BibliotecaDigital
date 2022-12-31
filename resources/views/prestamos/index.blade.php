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
                        <a class="btn btn-warning" href="{{ url('prestamos/crear') }}">Prestar libro</a>
                        @endcan
            
                        <table class="table table-striped mt-2" id="table-data">
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
                            @foreach ($prestamos as $data)
                            <tr>
                                <td style="display: none;">{{ $data->id }}</td>                                
                                <td>{{ $data->ejemplar->libro->titulo }}</td>
                                <td>{{ $data->ejemplar->copia }}</td>
                                <td>{{ $data->usuario->name }}</td>
                                <td>{{ $data->fecha_prestamo }}</td>
                                <td class="fecha-devolucion">{{ $data->fecha_devolucion ?? 'Prestado'}}</td>
                                <td>
                                    @if(!$data->fecha_devolucion)
                                        <a href="{{route('libro-prestamo.devolver', $data->ejemplar->id)}}" class="libro-devolucion btn-accion-tabla tooltipsC" title="Devolver este libro">
                                            <i class="fa fa-fw fa-reply-all"></i>
                                        </a>
                                    @endif
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
    <script>
        $(document).ready(function () {
            $('.libro-devolucion').on('click', function (event) {
                event.preventDefault();
                const url = $(this).attr('href');
                const data = {
                    _token: $('input[name=_token]').val(),
                    _method: 'put'
                }
                ajaxRequest(data, url, $(this));
            });

            function ajaxRequest(data, url, link){
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    success: function (respuesta) {
                        const fecha = respuesta.fecha_devolucion;
                        link.closest('tr').find('td.fecha-devolucion').text(fecha);
                        link.remove();
                    },
                    error: function () {

                    }
                });
            }
        });
    </script>
@endsection