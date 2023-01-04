@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Libros</h3>
        </div>
        <div class="section-body">
            <div class="row">
            <div class="col-lg-1">
            </div>
            <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">     

                        @if ($errors->any())                                                
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>                        
                                @foreach ($errors->all() as $error)                                    
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif

                    <form action="{{ route('libros.store') }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                   <label for="titulo">Titulo</label>
                                   <input type="text" name="titulo" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                   <label for="titulo">Paginas</label>
                                   <input type="text" name="no_paginas" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                   <label for="titulo">ISBN</label>
                                   <input type="text" name="isbn" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                   <label for="titulo">Año de Edicion</label>
                                   <input type="text" name="anio_edicion" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    {{ Form::label('Editorial') }}
                                    {{ Form::select('id_editorial', $editoriales, $libro->id_editorial, ['class' => 'form-control' . ($errors->has('id_editorial') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona']) }}
                                    {!! $errors->first('id_editorial', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-1">
                                <div>
                                
                                @can('crear-editorial')
                                <a class="fa fa-book f-left" data-toggle="modal" data-target="#modal1">
                                +
                                </a>
                                @endcan
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    {{ Form::label('Edicion') }}
                                    {{ Form::select('id_edicion', $ediciones, $libro->id_edicion, ['class' => 'form-control' . ($errors->has('id_edicion') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona']) }}
                                    {!! $errors->first('id_edicion', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-1">
                                <div>
                                @can('crear-edicion')
                                    <a class="fa fa-book f-left" data-toggle="modal" data-target="#modal2">+</a>                                
                                @endcan
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    {{ Form::label('Area') }}
                                    {{ Form::select('id_area', $areas, $libro->id_area, ['class' => 'form-control' . ($errors->has('id_area') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona']) }}
                                    {!! $errors->first('id_area', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>    
                            <div class="col-xs-12 col-sm-12 col-md-1">
                                <div>
                                @can('crear-area')
                                    <a class="fa fa-book f-left" data-toggle="modal" data-target="#modal3">+</a> 
                                @endcan
                                </div>
                            </div>
                            <div class=" col-xs-12 col-sm-12 col-md-8">
                                <div class="form-group">
                                    {{ Form::label('Selecciona Autor(es)') }}
                                    <select title="Seleccionar autor(es)" name="autores[]" id="autores" class="select2 form-control"   multiple require>
                                           @foreach($lisautores as $autores)
                                           <option value="{{$autores->id}}">  {{$autores->nombre.' '.$autores->ap .''.$autores->am}} </option>
                                           @endforeach
                                    </select> 
                                </div>                          
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-1">
                                <div>
                                @can('crear-autor')
                                    <a class="fa fa-book f-left" data-toggle="modal" data-target="#modal4">+</a>     
                                @endcan
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                   <label for="titulo">Numero de Copias</label>
                                   <input type="text" name="copia" class="form-control">
                                </div>
                            </div>
                            <!-- /////////////////////////////-->
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                   <label for="descripcion">Descripcion</label>
                                    <textarea name="descripcion"  cols="20" rows="4" class="form-control m-2"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                   <label for="descripcion">Imagen</label>
                                   <input type="file" id="input-file-now-custom-3" class="form-control m-2"  name="images[]" multiple>
                                </div>
                            </div>

                            <!--////////////////////////////////////////-->

                            <div class=" col-xs-12 col-sm-12 col-md-5"></div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                 <button type="submit" class="btn btn-primary">Guardar</button> 
                            </div>                          
                    </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



<body>
    <!-- Modal -->
    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Editorial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('editoriales.store') }}" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="titulo">Editorial</label>
                                    <input type="text" name="nombre_editorial" class="form-control">
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Guardar</button> 
                            </div> 
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal2 -->
    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Ediciones</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ediciones.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="titulo">Numero de Edicion</label>
                                   <input type="text" name="no_edicion" class="form-control">
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Guardar</button> 
                            </div> 
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal3-->
    <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Ediciones</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('areas.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="titulo">area</label>
                                   <input type="text" name="nombre_area" class="form-control">
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Guardar</button> 
                            </div>
                        </div>   
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal4 -->
    <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Ediciones</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('autores.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="titulo">Nombre</label>
                                   <input type="text" name="nombre" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="titulo">Apellido Paterno</label>
                                   <input type="text" name="ap" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="titulo">Apellido Materno</label>
                                   <input type="text" name="am" class="form-control">
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Guardar</button> 
                            </div>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    
</body>


@endsection