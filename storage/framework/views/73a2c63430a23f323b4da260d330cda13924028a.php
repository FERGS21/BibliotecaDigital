
<?php $__env->startSection('title'); ?>
    Inicio
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Inicio</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                          
                                <div class="row">

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-area')): ?>
                                    <div class="col-md-3 col-xl-3">
                                        <div class="card bg-c-orange order-card">
                                            <div class="card-block">
                                                <h5>Areas</h5> <?php endif; ?>                                              
                                                <?php
                                                 use App\Models\Area;
                                                $cant_areas = Area::count();                                                
                                                ?> 
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-area')): ?>
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span><?php echo e($cant_areas); ?></span></h2>
                                                <p class="m-b-0 text-right"><a href="/areas" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div><?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-autor')): ?>
                                    <div class="col-md-3 col-xl-3">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>Autores</h5><?php endif; ?>                                               
                                                <?php
                                                 use App\Models\Autore;
                                                $cant_autores = Autore::count();                                                
                                                ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-autor')): ?>
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span><?php echo e($cant_autores); ?></span></h2>
                                                <p class="m-b-0 text-right"><a href="/areas" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div><?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-edicion')): ?>
                                    <div class="col-md-3 col-xl-3">
                                        <div class="card bg-c-orange order-card">
                                            <div class="card-block">
                                                <h5>Ediciones</h5> <?php endif; ?>                                              
                                                <?php
                                                 use App\Models\Edicione;
                                                $cant_ediciones = Edicione::count();                                                
                                                ?> 
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-edicion')): ?>
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span><?php echo e($cant_ediciones); ?></span></h2>
                                                <p class="m-b-0 text-right"><a href="/areas" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div><?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-editorial')): ?>
                                    <div class="col-md-3 col-xl-3">
                                        <div class="bg-c-blue order-card">
                                            <div class="card-block">
                                                <h5>Editoriales</h5>  <?php endif; ?>                                             
                                                <?php
                                                 use App\Models\Editoriale;
                                                $cant_editoriales = Editoriale::count();                                                
                                                ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-editorial')): ?>
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span><?php echo e($cant_editoriales); ?></span></h2>
                                                <p class="m-b-0 text-right"><a href="/areas" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div><?php endif; ?>
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
                                    <table class="table table-striped mt-2">
                                    <thead style="background-color:#6777ef">                                     
                                        <th style="display: none;">ID</th>
                                        <th style="color:#fff;">Titulo</th>
                                        <th style="color:#fff;">Paginas</th> 
                                        <th style="color:#fff;">ISBN</th>
                                        <th style="color:#fff;">Año Edicion</th>
                                        <th style="color:#fff;">Editorial</th>
                                        <th style="color:#fff;">Edicion</th>
                                        <th style="color:#fff;">Area</th> 
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear-libro')): ?>                                   
                                        <th style="color:#fff;">Acciones</th>   
                                        <?php endif; ?>                                                                
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="display: none;"><?php echo e($libro->id); ?></td>                                
                                    <td><?php echo e($libro->titulo); ?></td>
                                    <td><?php echo e($libro->no_paginas); ?></td>
                                    <td><?php echo e($libro->isbn); ?></td>
                                    <td><?php echo e($libro->anio_edicion); ?></td>
                                    <td><?php echo e($libro->editorial->nombre_editorial); ?></td>
                                    <td><?php echo e($libro->edicion->no_edicion); ?></td>
                                    <td><?php echo e($libro->area->nombre_area); ?></td>

                                    <td>
                                        <form action="<?php echo e(route('libros.destroy',$libro->id)); ?>" method="POST">                                        
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editar-libro')): ?>
                                            <a class="btn btn-info" href="<?php echo e(route('libros.edit',$libro->id)); ?>">Editar</a>
                                            <?php endif; ?>

                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('borrar-libro')): ?>
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                            <?php endif; ?>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                                </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FER\Documents\5TO_SEMESTRE\BASE_DE_DATOS\BibliotecaDigital\resources\views/home.blade.php ENDPATH**/ ?>