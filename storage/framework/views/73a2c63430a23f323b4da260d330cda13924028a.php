
<?php $__env->startSection('title'); ?>
    Inicio
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                         
                                <div class="row">
                                    <a href="/home">TODAS</a>  
                                    <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="" class="ml-4"><?php echo e($area->nombre_area); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                                               
                    
                            <div class="row"> 
                                
                                <?php $__currentLoopData = $ejemplares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ejemplar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($ejemplar->cantidad > $ejemplar->prestamo_count): ?>
                                    <div class="col-md-3 col-xl-3">
                                        <div class="card bg-c-gray black-card">
                                            <div class="card-block">
                                                <form action="<?php echo e(url('/prestamos/crear')); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <div>
                                                        <h6><?php echo e($ejemplar->libro->titulo); ?></h5> 
                                                        <?php $__currentLoopData = $imagenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imagen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($imagen->id == $ejemplar->libro->id): ?>
                                                            <img src="images/<?php echo e($imagen->image); ?>" class="img-responsive" style="max-height:200px; max-width:200px">
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <select name="ejemplare_id" id="ejemplare_id" class="form-control">
                                                             <option value="<?php echo e($ejemplar->id); ?>"><?php echo e($ejemplar->copia.' ('.$ejemplar->libro->titulo.')'); ?></option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="fecha_prestamo" class="form-control" value="<?php echo e(old('fecha_prestamo', date('y-m-d'))); ?>" required >
                                                    </div>
                                                    <div class=" mt-2">
                                                        <button type="submit" class="btn btn-primary">Agregar a estante</button> 
                                                    </div>
                                                </form>
                                            </div>
                                        </div> 
                                    </div> 
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FER\Documents\5TO_SEMESTRE\BASE_DE_DATOS\BibliotecaDigital\resources\views/home.blade.php ENDPATH**/ ?>