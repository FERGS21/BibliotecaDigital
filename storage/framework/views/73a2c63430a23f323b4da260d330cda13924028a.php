
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
                                <div cass="col-md-1 col-xl-3">
                                    <div class="card bg-c-yellow black-card">
                                        <div class="card-block">
                                           <h4 class="text-center text-mute">Ejemplares disponibles</h4>
                                        </div>
                                    </div> 
                                 </div>  
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
                                                            <img src="images/<?php echo e($imagen->image); ?>" class="img-responsive" style="max-height:180px; max-widt:h180px">
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="ejemplare_id" id="ejemplare_id" class="form-control" value="<?php echo e($ejemplar->id); ?>" required >
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="fecha_prestamo" class="form-control" value="<?php echo e(old('fecha_prestamo', date('y-m-d'))); ?>" required >
                                                    </div>
                                                    <div>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detallesModal">
                                                            Detalles
                                                        </button>
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

<body>
    <div class="modal fade" id="detallesModal" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detalleModalLabel">Detalles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div>
                                <p><?php echo e($ejemplar->libro->titulo); ?></p>
                            </div>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>                  
                </div>
            </div>
        </div>
    </div> 

    <div class="modal fade" id="estanteModal" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detalleModalLabel">Detalles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div>
                                    <table class="table table-striped mt-2" id="table-data">
                                        <thead style="background-color:#6777ef">                                     
                                            <th style="display: none;">ID</th>
                                            <th style="color:#fff;">Libro</th> 
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear-prestamo')): ?>                                   
                                            <th style="color:#fff;">Acciones</th>   
                                            <?php endif; ?>                                                                
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $prestamos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="display: none;"><?php echo e($data->id); ?></td>                                
                                        <td><?php echo e($data->ejemplar->libro->titulo); ?></td>
                                        <td>
                                            <?php if(!$data->fecha_devolucion): ?>
                                                <a href="<?php echo e(route('libro-prestamo.devolver', $data->ejemplar->id)); ?>" class="libro-devolucion btn-accion-tabla tooltipsC" title="Devolver este libro">
                                                    <i class="fa fa-fw fa-reply-all"></i>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>                  
                </div>
            </div>
        </div>
    </div>   
</body>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FER\Documents\5TO_SEMESTRE\BASE_DE_DATOS\BibliotecaDigital\resources\views/home.blade.php ENDPATH**/ ?>