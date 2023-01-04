@extends('layouts.app')
@section('title')
    Inicio
@endsection
@section('content')

    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                         
                                <div class="row">
                                    <a href="/home">TODAS</a>  
                                    @foreach($areas as $area)
                                        <a href="" class="ml-4">{{$area->nombre_area}}</a>
                                    @endforeach
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
                                <div cass="col-md-1 col-xl-3">
                                    <div class="card bg-c-yellow black-card">
                                        <div class="card-block">
                                           <h4 class="text-center text-mute">Ejemplares disponibles</h4>
                                        </div>
                                    </div> 
                                 </div>  
                                <div class="row"> 
                                @foreach($ejemplares as $ejemplar)
                                @if($ejemplar->cantidad > $ejemplar->prestamo_count)
                                    <div class="col-md-3 col-xl-3">
                                        <div class="card bg-c-gray black-card">
                                            <div class="card-block">
                                                <form action="{{ url('/prestamos/crear') }}" method="POST">
                                                    @csrf
                                                    <div>
                                                        <h6>{{$ejemplar->libro->titulo}}</h5> 
                                                        @foreach ($imagenes as $imagen)
                                                            @if($imagen->id == $ejemplar->libro->id)
                                                            <img src="images/{{$imagen->image}}" class="img-responsive" style="max-height:180px; max-widt:h180px">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="ejemplare_id" id="ejemplare_id" class="form-control" value="{{$ejemplar->id}}" required >
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="fecha_prestamo" class="form-control" value="{{old('fecha_prestamo', date('y-m-d'))}}" required >
                                                    </div>
                                                    <div>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detallesModal">
                                                            Detalles
                                                        </button>
                                                    </div>
                                                    <div class=" mt-2">
                                                        <button type="submit" class="btn btn-primary">Agregar a estante</button> 
                                                    </div>
                                                </form>
                                            </div>
                                        </div> 
                                    </div> 
                                @endif
                                @endforeach         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<body>
    <div class="modal fade" id="detallesModal" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detalleModalLabel">Detalles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div>
                                <p>{{$ejemplar->libro->titulo}}</p>
                            </div>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>                  
                </div>
            </div>
        </div>
    </div> 

    <div class="modal fade" id="estanteModal" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detalleModalLabel">Detalles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div>
                                    <table class="table table-striped mt-2" id="table-data">
                                        <thead style="background-color:#6777ef">                                     
                                            <th style="display: none;">ID</th>
                                            <th style="color:#fff;">Libro</th> 
                                            @can('crear-prestamo')                                   
                                            <th style="color:#fff;">Acciones</th>   
                                            @endcan                                                                
                                    </thead>
                                    <tbody>
                                    @foreach ($prestamos as $data)
                                    <tr>
                                        <td style="display: none;">{{ $data->id }}</td>                                
                                        <td>{{ $data->ejemplar->libro->titulo }}</td>
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
                            </div>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>                  
                </div>
            </div>
        </div>
    </div>   
</body>


@endsection