

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Editorial</h3>
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


                    <form action="<?php echo e(route('editoriales.update',$editoriale->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <?php echo method_field('PUT'); ?>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="titulo">Editorial</label>
                                   <input type="text" name="nombre_editorial" class="form-control" value="<?php echo e($editoriale->nombre_editorial); ?>">
                                </div>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\fersa\OneDrive\Documentos\5TO SEMESTRE\TALLER DE BASE DE DATOS\biblioteca_prueba\resources\views/editoriales/editar.blade.php ENDPATH**/ ?>