

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
                        <a class="btn btn-warning" href="<?php echo e(url('prestamos/crear')); ?>">Prestar libro</a>
                        <?php endif; ?>
            
                        <table class="table table-striped mt-2" id="table-data">
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
                            <?php $__currentLoopData = $prestamos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="display: none;"><?php echo e($data->id); ?></td>                                
                                <td><?php echo e($data->ejemplar->libro->titulo); ?></td>
                                <td><?php echo e($data->ejemplar->copia); ?></td>
                                <td><?php echo e($data->usuario->name); ?></td>
                                <td><?php echo e($data->fecha_prestamo); ?></td>
                                <td class="fecha-devolucion"><?php echo e($data->fecha_devolucion ?? 'Prestado'); ?></td>
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
    <script>
        $(document).ready(function () {
            $('.libro-devolucion').on('click', function (event) {
                event.preventDefault();
                const url = $(this).attr('href');
                const data = {
                    _token: $('input[name=_token]').val(),
                    _method: 'put'
                }
                ajaxRequest(data, url, $(this));
            });

            function ajaxRequest(data, url, link){
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    success: function (respuesta) {
                        const fecha = respuesta.fecha_devolucion;
                        link.closest('tr').find('td.fecha-devolucion').text(fecha);
                        link.remove();
                    },
                    error: function () {

                    }
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\FER\Documents\5TO_SEMESTRE\BASE_DE_DATOS\BibliotecaDigital\resources\views/prestamos/index.blade.php ENDPATH**/ ?>