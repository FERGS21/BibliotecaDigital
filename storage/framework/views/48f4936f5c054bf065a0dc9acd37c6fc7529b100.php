

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Asigna Autor(s)</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear-asignaautor')): ?>
                        <a class="btn btn-warning" href="<?php echo e(route('asignaautores.create')); ?>">Nuevo</a>
                        <?php endif; ?>
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Libro</th>
                                    <th style="color:#fff;">Autor</th> 
                                    <th style="color:#fff;"></th> 
                                    <th style="color:#fff;"></th> 

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear-asignaautor')): ?>                                   
                                    <th style="color:#fff;">Acciones</th>   
                                    <?php endif; ?>                                                                
                              </thead>
                              <tbody>
                            <?php $__currentLoopData = $asignaautores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asignaautore): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="display: none;"><?php echo e($asignaautore->id); ?></td>  
                                <td><?php echo e($asignaautore->libro->titulo); ?></td>
                                <td><?php echo e($asignaautore->autor->nombre); ?></td>
                                <td><?php echo e($asignaautore->autor->ap); ?></td>
                                <td><?php echo e($asignaautore->autor->am); ?></td>

                                <td>
                                    <form action="<?php echo e(route('asignaautores.destroy',$asignaautore->id)); ?>" method="POST">                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editar-asignaautor')): ?>
                                        <a class="btn btn-info" href="<?php echo e(route('asignaautores.edit',$asignaautore->id)); ?>">Editar</a>
                                        <?php endif; ?>

                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('borrar-asignaautor')): ?>
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
                            <?php echo $asignaautores->links(); ?>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\fersa\OneDrive\Documentos\5TO SEMESTRE\TALLER DE BASE DE DATOS\biblioteca_prueba\resources\views/asignaautores/index.blade.php ENDPATH**/ ?>