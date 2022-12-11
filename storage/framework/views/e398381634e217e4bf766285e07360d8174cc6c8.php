

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Ejemplares</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear-ejemplar')): ?>
                        <a class="btn btn-warning" href="<?php echo e(route('ejemplares.create')); ?>">Nuevo</a>
                        <?php endif; ?>
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Libro</th>
                                    <th style="color:#fff;">Copia</th> 
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear-ejemplar')): ?>                                   
                                    <th style="color:#fff;">Acciones</th>   
                                    <?php endif; ?>                                                                
                              </thead>
                              <tbody>
                            <?php $__currentLoopData = $ejemplares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ejemplar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="display: none;"><?php echo e($ejemplar->id); ?></td>                                
                                <td><?php echo e($ejemplar->libro->titulo); ?></td>
                                <td><?php echo e($ejemplar->copia); ?></td>

                                <td>
                                    <form action="<?php echo e(route('ejemplares.destroy',$ejemplar->id)); ?>" method="POST">                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editar-ejemplar')): ?>
                                        <a class="btn btn-info" href="<?php echo e(route('ejemplares.edit',$ejemplar->id)); ?>">Editar</a>
                                        <?php endif; ?>

                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('borrar-ejemplar')): ?>
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
                            <?php echo $ejemplares->links(); ?>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FER\Documents\5TO_SEMESTRE\BASE_DE_DATOS\BibliotecaDigital\resources\views/ejemplares/index.blade.php ENDPATH**/ ?>