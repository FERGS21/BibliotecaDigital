

<?php $__env->startSection('content'); ?>
   
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Asigna autores</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">     

                        <?php if($errors->any()): ?>                                                
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>                        
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                    
                                    <span class="badge badge-danger"><?php echo e($error); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        <?php endif; ?>

                    <form action="<?php echo e(route('asignaautores.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('Libro')); ?>

                                    <?php echo e(Form::select('id_libro', $libros, $asignaautore->id_libro, ['class' => 'form-control' . ($errors->has('id_libro') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona'])); ?>

                                    <?php echo $errors->first('id_libro', '<div class="invalid-feedback">:message</div>'); ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FER\Documents\5TO_SEMESTRE\BASE_DE_DATOS\BibliotecaDigital\resources\views/asignaautores/crear.blade.php ENDPATH**/ ?>