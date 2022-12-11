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

                    <form action="{{ route('libros.store') }}" method="POST">
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
                            <div class="col-xs-12 col-sm-12 col-md-3">
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
                                <a class="fa fa-book f-left" href="{{ route('editoriales.create') }}">+</a>
                                @endcan
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    {{ Form::label('Edicion') }}
                                    {{ Form::select('id_edicion', $ediciones, $libro->id_edicion, ['class' => 'form-control' . ($errors->has('id_edicion') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona']) }}
                                    {!! $errors->first('id_edicion', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-1">
                                <div>
                                @can('crear-edicion')
                                <a class="fa fa-book f-left" href="{{ route('ediciones.create') }}">+</a>
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
                                <a class="fa fa-book f-left" href="{{ route('areas.create') }}">+</a>
                                @endcan
                                </div>
                            </div>
                            <div class=" col-xs-12 col-sm-12 col-md-7">
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
                                <a class="fa fa-book f-left" href="{{ route('autores.create') }}">+</a>
                                @endcan
                                </div>
                            </div>
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
@endsection