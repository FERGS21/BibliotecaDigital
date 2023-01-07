
<?php $__env->startSection('title'); ?>
    Iniciar sesión
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/home')); ?>" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        <?php endif; ?>
                    <?php endif; ?>

    <div class="card card-primary">
        <div class="card-header"><h4>Inicio de Sesión </h4></div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger p-0">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input aria-describedby="emailHelpBlock" id="email" type="email"
                           class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email"
                           placeholder="Introducir correo" tabindex="1"
                           value="<?php echo e((Cookie::get('email') !== null) ? Cookie::get('email') : old('email')); ?>" autofocus
                           required>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('email')); ?>

                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Contraseña</label>
                    </div>
                    <input aria-describedby="passwordHelpBlock" id="password" type="password"
                           value="<?php echo e((Cookie::get('password') !== null) ? Cookie::get('password') : null); ?>"
                           placeholder="Introducir la contraseña"
                           class="form-control<?php echo e($errors->has('password') ? ' is-invalid': ''); ?>" name="password"
                           tabindex="2" required>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('password')); ?>

                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                               id="remember"<?php echo e((Cookie::get('remember') !== null) ? 'checked' : ''); ?>>
                        <label class="custom-control-label" for="remember">Recordar contraseña</label>
                    </div>
                    <div class="float-right">
                            <a href="<?php echo e(route('password.request')); ?>" class="text-small">
                            ¿Has olvidado tu contraseña?
                            </a>
                        </div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Acceder
                    </button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\52722\Documents\bases de datos\BibliotecaDigital\resources\views/auth/login.blade.php ENDPATH**/ ?>