

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Ejemplares</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
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


                    <form action="<?php echo e(route('ejemplares.update',$ejemplare->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <?php echo method_field('PUT'); ?>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('Libro')); ?>

                                    <?php echo e(Form::select('id_libro', $libros, $ejemplare->id_libro, ['class' => 'form-control' . ($errors->has('id_libro') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona'])); ?>

                                    <?php echo $errors->first('id_libro', '<div class="invalid-feedback">:message</div>'); ?>

                                </div>
                            </div>
                  
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                   <label for="copia">Copia</label>
                                   <input type="text" name="copia" class="form-control" value="<?php echo e($ejemplare->copia); ?>">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FER\Documents\5TO_SEMESTRE\BASE_DE_DATOS\BibliotecaDigital\resources\views/ejemplares/editar.blade.php ENDPATH**/ ?>