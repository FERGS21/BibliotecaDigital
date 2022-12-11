

<?php $__env->startSection('content'); ?>
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

                    <form action="<?php echo e(route('prestamos.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="ejemplare_id" id="ejemplare_id"  >Ejemplar</label>
                                    <select name="ejemplare_id" id="ejemplare_id" class="form-control">
                                        <option value="">Selecciona un ejemplar</option>
                                        <?php $__currentLoopData = $ejemplares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ejemplar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($ejemplar->cantidad > $ejemplar->prestamo_count): ?>
                                                <option value="<?php echo e($ejemplar->id); ?>"><?php echo e($ejemplar->copia); ?></option>
                                           
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="fecha_prestamo" >Fecha Prestamo</label>
                                    <input type="text" name="fecha_prestamo" class="form-control" value="<?php echo e(old('fecha_prestamo', date('y-m-d'))); ?>" required >
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FER\Documents\5TO_SEMESTRE\BASE_DE_DATOS\BibliotecaDigital\resources\views/prestamos/crear.blade.php ENDPATH**/ ?>