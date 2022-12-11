

<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Libros</h3>
        </div>
        <div class="section-body">
            <div class="row">
            <div class="col-lg-1">
            </div>
            <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">     

                        <?php if($errors->any()): ?>                                                
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>                        
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                    
                                    <span class="badge badge-danger"><?php echo e($error); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        <?php endif; ?>

                    <form action="<?php echo e(route('libros.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                   <label for="titulo">Titulo</label>
                                   <input type="text" name="titulo" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                   <label for="titulo">Paginas</label>
                                   <input type="text" name="no_paginas" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                   <label for="titulo">ISBN</label>
                                   <input type="text" name="isbn" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                   <label for="titulo">Año de Edicion</label>
                                   <input type="text" name="anio_edicion" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                <div class="form-group">
                                    <?php echo e(Form::label('Editorial')); ?>

                                    <?php echo e(Form::select('id_editorial', $editoriales, $libro->id_editorial, ['class' => 'form-control' . ($errors->has('id_editorial') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona'])); ?>

                                    <?php echo $errors->first('id_editorial', '<div class="invalid-feedback">:message</div>'); ?>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-1">
                                <div>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear-editorial')): ?>
                                <a class="fa fa-book f-left" href="<?php echo e(route('editoriales.create')); ?>">+</a>
                                <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('Edicion')); ?>

                                    <?php echo e(Form::select('id_edicion', $ediciones, $libro->id_edicion, ['class' => 'form-control' . ($errors->has('id_edicion') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona'])); ?>

                                    <?php echo $errors->first('id_edicion', '<div class="invalid-feedback">:message</div>'); ?>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-1">
                                <div>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear-edicion')): ?>
                                <a class="fa fa-book f-left" href="<?php echo e(route('ediciones.create')); ?>">+</a>
                                <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-3">
                                <div class="form-group">
                                    <?php echo e(Form::label('Area')); ?>

                                    <?php echo e(Form::select('id_area', $areas, $libro->id_area, ['class' => 'form-control' . ($errors->has('id_area') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona'])); ?>

                                    <?php echo $errors->first('id_area', '<div class="invalid-feedback">:message</div>'); ?>

                                </div>
                            </div>    
                            <div class="col-xs-12 col-sm-12 col-md-1">
                                <div>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear-area')): ?>
                                <a class="fa fa-book f-left" href="<?php echo e(route('areas.create')); ?>">+</a>
                                <?php endif; ?>
                                </div>
                            </div>
                            <div class=" col-xs-12 col-sm-12 col-md-7">
                                <div class="form-group">
                                    <?php echo e(Form::label('Selecciona Autor(es)')); ?>

                                    <select title="Seleccionar autor(es)" name="autores[]" id="autores" class="select2 form-control"   multiple require>
                                           <?php $__currentLoopData = $lisautores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $autores): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <option value="<?php echo e($autores->id); ?>">  <?php echo e($autores->nombre.' '.$autores->ap .''.$autores->am); ?> </option>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select> 
                                </div>                          
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-1">
                                <div>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crear-autor')): ?>
                                <a class="fa fa-book f-left" href="<?php echo e(route('autores.create')); ?>">+</a>
                                <?php endif; ?>
                                </div>
                            </div>
                            <div class=" col-xs-12 col-sm-12 col-md-5"></div>
                            <div class="col-xs-12 col-sm-12 col-md-2">
                                 <button type="submit" class="btn btn-primary">Guardar</button> 
                            </div>                          
                    </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FER\Documents\5TO_SEMESTRE\BASE_DE_DATOS\BibliotecaDigital\resources\views/libros/crear.blade.php ENDPATH**/ ?>