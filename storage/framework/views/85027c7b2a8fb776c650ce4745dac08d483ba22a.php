

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">autores</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear-autore')): ?>
                        <a class="btn btn-warning" href="<?php echo e(route('autores.create')); ?>">Nuevo</a>
                        <?php endif; ?>
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Apellido Paterno</th> 
                                    <th style="color:#fff;">Apellido Materno</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            <?php $__currentLoopData = $autores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $autore): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="display: none;"><?php echo e($autore->id); ?></td>                                
                                <td><?php echo e($autore->nombre); ?></td>
                                <td><?php echo e($autore->ap); ?></td>
                                <td><?php echo e($autore->am); ?></td>
                                <td>
                                    <form action="<?php echo e(route('autores.destroy',$autore->id)); ?>" method="POST">                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editar-autore')): ?>
                                        <a class="btn btn-info" href="<?php echo e(route('autores.edit',$autore->id)); ?>">Editar</a>
                                        <?php endif; ?>

                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('borrar-autore')): ?>
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
                            <?php echo $autores->links(); ?>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FER\Documents\5TO_SEMESTRE\BASE_DE_DATOS\BibliotecaDigital\resources\views/autores/index.blade.php ENDPATH**/ ?>