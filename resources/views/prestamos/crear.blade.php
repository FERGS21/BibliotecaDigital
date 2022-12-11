@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Prestamo</h3>
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

                    <form action="{{ route('prestamos.store') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="ejemplare_id" id="ejemplare_id"  >Ejemplar</label>
                                    <select name="ejemplare_id" id="ejemplare_id" class="form-control">
                                        <option value="">Selecciona un ejemplar</option>
                                        @foreach($ejemplares as $ejemplar)
                                            @if($ejemplar->cantidad > $ejemplar->prestamo_count)
                                                <option value="{{$ejemplar->id}}">{{$ejemplar->copia}}</option>
                                           
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="fecha_prestamo" >Fecha Prestamo</label>
                                    <input type="text" name="fecha_prestamo" class="form-control" value="{{old('fecha_prestamo', date('y-m-d'))}}" required >
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