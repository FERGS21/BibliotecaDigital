
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
                                <?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-3 col-xl-3">
                                        <div class="card bg-c-orange order-card">
                                            <div class="card-block">
                                                <h5><?php echo e($libro->titulo); ?></h5>   
                                                <h6 class="text-right">
                                                    <?php echo e($libro->edicion->no_edicion); ?></h4>
                                                <?php $__currentLoopData = $libro->autores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $autor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <h6 class="text-right"><?php echo e($autor->nombre.' '.$autor->ap.' '.$autor->am.', '); ?></h6>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <p class="m-b-0 text-right"><a href="/prestamos/create" class="text-white">Ejemplares</a></p>
                                            </div>
                                        </div> 
                                    </div> 
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