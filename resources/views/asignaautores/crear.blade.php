@extends('layouts.app')

@section('content')
   
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Asigna autores</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-8">
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

                    <form action="{{ route('asignaautores.store') }}" method="POST">
                        @csrf
                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('Libro') }}
                                    {{ Form::select('id_libro', $libros, $asignaautore->id_libro, ['class' => 'form-control' . ($errors->has('id_libro') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona']) }}
                                    {!! $errors->first('id_libro', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
 
                            <div class="col-md-8">
                                    <label for="">Selecciona Autor(s)</label>
                                    <select name="autores[]" class="select2 form-control"   multiple="multiple">
                                        <?php
                                            $con = mysqli_connect("localhost","root","","biblioteca");
                                            $query  = "SELECT * FROM autores";
                                            $query_run = mysqli_query($con, $query);
                                            if(mysqli_num_rows($query_run ) > 0)
                                            {
                                                foreach($query_run as $autor)
                                                {
                                                    ?>
                                                        <option value="<?php echo $autor['id']; ?>"> <?php echo $autor['nombre'].' '.$autor['ap'].' '.$autor['am'];?> </option>
                                                    <?php   
                                                }
                                                
                                            }
                                            else 
                                            {
                                                echo "No existen autores";
                                            }
                                        ?>
                                    </select>                            
                            </div>   
                            <div></div>                        
                    </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        /*$(document).ready(function(){
            $(".js-example-basic-multiple").select2({
                placeholder: "Select",
                allowClear: true
            });
        });*/   
        $(".js-example-basic-multiple").select2({

        });
    </script>
@endsection