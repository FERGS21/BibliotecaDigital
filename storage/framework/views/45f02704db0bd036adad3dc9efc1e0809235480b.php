

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Libros</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear-libro')): ?>
                        <a class="btn btn-warning" href="<?php echo e(route('libros.create')); ?>">Nuevo</a>
                        <?php endif; ?>
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Titulo</th>
                                    <!--<th style="color:#fff;">Paginas</th> 
                                    <th style="color:#fff;">ISBN</th>
                                    <th style="color:#fff;">Año Edicion</th>
                                    <th style="color:#fff;">Editorial</th>
                                    <th style="color:#fff;">Edicion</th>
                                    <th style="color:#fff;">Area</th> 
                                    <th style="color:#fff;">Autor(s)</th> -->
                                    <th style="color:#fff;">Descripcion</th>
                                    <th style="color:#fff;">Imagen</th>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear-libro')): ?>                                   
                                    <th style="color:#fff;">Acciones</th>   
                                    <?php endif; ?>                                                                
                              </thead>
                              <tbody>
                            <?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="display: none;"><?php echo e($libro->id); ?></td>                                
                                <td><?php echo e($libro->titulo); ?></td>
                               <!-- <td><?php echo e($libro->no_paginas); ?></td>
                                <td><?php echo e($libro->isbn); ?></td>
                                <td><?php echo e($libro->anio_edicion); ?></td>
                                <td><?php echo e($libro->editorial->nombre_editorial); ?></td>
                                <td><?php echo e($libro->edicion->no_edicion); ?></td>
                                <td><?php echo e($libro->area->nombre_area); ?></td>
                                <td>
                                     <?php $__currentLoopData = $libro->autores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $autor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($autor->nombre.' '.$autor->ap.' '.$autor->am.', '); ?>

                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>-->
                                <td><?php echo e($libro->descripcion); ?></td>
                                <td>
                                <?php $__currentLoopData = $imagenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imagen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($imagen->id == $libro->id): ?>
                                    <img src="images/<?php echo e($imagen->image); ?>" class="img-responsive" style="max-height:200px; max-width:200px">
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>

                                

                                <td>
                                    <form action="<?php echo e(route('libros.destroy',$libro->id)); ?>" method="POST">                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editar-libro')): ?>
                                        <a class="btn btn-info" href="<?php echo e(route('libros.edit',$libro->id)); ?>">Editar</a>
                                        <?php endif; ?>

                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('borrar-libro')): ?>
                                        <!-- onclick confirmacion --> 
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure')">Borrar</button>
                                        <?php endif; ?>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            <?php echo $libros->links(); ?>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FER\Documents\5TO_SEMESTRE\BASE_DE_DATOS\BibliotecaDigital\resources\views/libros/index.blade.php ENDPATH**/ ?>