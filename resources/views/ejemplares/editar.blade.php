@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Ejemplares</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
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


                    <form action="{{ route('ejemplares.update',$ejemplare->id) }}" method="POST">
                        @csrf

                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    {{ Form::label('Libro') }}
                                    {{ Form::select('id_libro', $libros, $ejemplare->id_libro, ['class' => 'form-control' . ($errors->has('id_libro') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona']) }}
                                    {!! $errors->first('id_libro', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                  
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                   <label for="copia">Copia</label>
                                   <input type="text" name="copia" class="form-control" value="{{ $ejemplare->copia}}">
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