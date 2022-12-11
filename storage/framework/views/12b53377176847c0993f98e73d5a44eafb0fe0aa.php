

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Areas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear-area')): ?>
                        <a class="btn btn-warning" href="<?php echo e(route('areas.create')); ?>">Nuevo</a>
                        <?php endif; ?>
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Areas</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="display: none;"><?php echo e($area->id); ?></td>                                
                                <td><?php echo e($area->nombre_area); ?></td>
                                <td>

                                    <form action="<?php echo e(route('areas.destroy',$area->id)); ?>" method="POST">                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editar-area')): ?>
                                        <a class="btn btn-info" href="<?php echo e(route('areas.edit',$area->id)); ?>">Editar</a>
                                        <?php endif; ?>

                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('borrar-area')): ?>
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        <?php endif; ?>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            <?php echo $areas->links(); ?>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FER\Documents\5TO_SEMESTRE\BASE_DE_DATOS\BibliotecaDigital\resources\views/areas/index.blade.php ENDPATH**/ ?>