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
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-usuario')): ?>
                                    <div class="col-md-3 col-xl-3">
                                        <div class="card bg-c-blue order-card">
                                            <div class="card-block">
                                            <h5>Usuarios</h5>   
                                    <?php endif; ?>                                            
                                                <?php
                                                 use App\Models\User;
                                                $cant_usuarios = User::count();                                                
                                                ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-usuario')): ?>
                                                <h2 class="text-right"><i class="fa fa-users f-left"></i><span><?php echo e($cant_usuarios); ?></span></h2>
                                                <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Ver más</a></p>
                                            </div>                                            
                                        </div>                                    
                                    </div>
                                    <?php endif; ?> 
                                   
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-rol')): ?>
                                    <div class="col-md-3 col-xl-3">
                                        <div class="card bg-c-green order-card">
                                            <div class="card-block">
                                            <h5>Roles</h5> 
                                    <?php endif; ?>
                                                <?php
                                                use Spatie\Permission\Models\Role;
                                                 $cant_roles = Role::count();                                                
                                                ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-rol')): ?>
                                                <h2 class="text-right"><i class="fa fa-user-lock f-left"></i><span><?php echo e($cant_roles); ?></span></h2>
                                                <p class="m-b-0 text-right"><a href="/roles" class="text-white">Ver más</a></p>  
                                            </div>
                                        </div>
                                    </div>                                                                
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-persona')): ?>
                                    <div class="col-md-3 col-xl-3">
                                        <div class="card bg-c-pink order-card">
                                            <div class="card-block">
                                                <h5>Personas</h5>
                                      <?php endif; ?>                                             
                                                <?php
                                                 use App\Models\Persona;
                                                $cant_personas = Persona::count();                                                
                                                ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-persona')): ?>
                                                <h2 class="text-right"><i class="fa fa-blog f-left"></i><span><?php echo e($cant_personas); ?></span></h2>
                                                <p class="m-b-0 text-right"><a href="/personas" class="text-white">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div><?php endif; ?>
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
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-libro')): ?>
                                    <div class="col-md-3 col-xl-3">
                                        <div class="bg-c-blue order-card">
                                            <div class="card-block">
                                                <h5>Libros</h5>  <?php endif; ?>                                             
                                                <?php
                                                 use App\Models\Libro;
                                                $cant_libros = Libro::count();                                                
                                                ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-libro')): ?>
                                                <h2 class="text-right"><i class="fa fa-book f-left" ></i>
                                                <span><?php echo e($cant_libros); ?></span></h2>
                                                <p class="m-b-0 text-right"><a href="/libros" class="text-white">Ver más</a></p>
                                                
                                            </div>
                                        </div>
                                    </div><?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-asignaautor')): ?>
                                    <div class="col-md-3 col-xl-3">
                                        <div class="bg-c-blue order-card">
                                            <div class="card-block">
                                                <h5>Asignacion de autores</h5>  <?php endif; ?>                                             
                                                <?php
                                                 use App\Models\Asignaautore;
                                                $cant_asignaautores = Asignaautore::count();                                                
                                                ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ver-asignaautor')): ?>
                                                <h2 class="text-right"><i class="fa fa-book f-left" ></i>
                                                <span><?php echo e($cant_asignaautores); ?></span></h2>
                                                <p class="m-b-0 text-right"><a href="/asignaautores" class="text-white">Ver más</a></p>
                                                
                                            </div>
                                        </div>
                                    </div><?php endif; ?>
                                </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\fersa\OneDrive\Documentos\5TO SEMESTRE\TALLER DE BASE DE DATOS\biblioteca_prueba\resources\views/home.blade.php ENDPATH**/ ?>