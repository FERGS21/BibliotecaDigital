

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Prestamos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear-prestamo')): ?>
                        <a class="btn btn-warning" href="<?php echo e(route('prestamos.create')); ?>">Nuevo</a>
                        <?php endif; ?>
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Libro</th>
                                    <th style="color:#fff;">Ejemplar</th>
                                    <th style="color:#fff;">Usuario</th> 
                                    <th style="color:#fff;">Fecha prestamo</th> 
                                    <th style="color:#fff;">Fecha devolucion</th> 
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear-prestamo')): ?>                                   
                                    <th style="color:#fff;">Acciones</th>   
                                    <?php endif; ?>                                                                
                              </thead>
                              <tbody>
                            <?php $__currentLoopData = $prestamos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prestamo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="display: none;"><?php echo e($prestamo->id); ?></td>                                
                                <td><?php echo e($prestamo->ejemplar->libro->titulo); ?></td>
                                <td><?php echo e($prestamo->ejemplar->copia); ?></td>
                                <td><?php echo e($prestamo->usuario->name); ?></td>
                                <td><?php echo e($prestamo->fecha_prestamo); ?></td>
                                <td><?php echo e($prestamo->fecha_devolucion ?? 'Prestado'); ?></td>
                                <td>
                                                                           

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            <?php echo $prestamos->links(); ?>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FER\Documents\5TO_SEMESTRE\BASE_DE_DATOS\BibliotecaDigital\resources\views/prestamos/index.blade.php ENDPATH**/ ?>