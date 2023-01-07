<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BIBLIOTECA TESVB</title>


        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-image: url('https://lavozdelmuro.net/wp-content/uploads/2021/01/bibliotecas-del-mundo-6.jpg');
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <?php if(Route::has('login')): ?>
            <center>
                <div class="hidden fixed top-0 right-0 sm:block text-center" border-color:#6777ef; style="width:1000px">
                    <font color="#6777ef">
                    <font face="serif">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="card rounded">
                        <h1 class="display-3">BIBLIOTECA TESVB</h1>
                        </div>
                        <br>
                        </font>
                        </font>
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/home')); ?>" class="btn btn-primary text-sm text-gray-700 dark:text-gray-500">Inicio</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary text-sm text-gray-700 dark:text-gray-500" style="width:100px">Acceder</a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>" class="btn btn-primary text-sm text-primary-700 dark:text-gray-500 underline ml-4"  style="height:40px; width:110px background-color:#6777ef;">Registrarse</a>
                            <?php endif; ?>
        </center>
                    <?php endif; ?>
        
                </div>
            <?php endif; ?>
    </body>
</html>
<?php /**PATH C:\Users\52722\Documents\bases de datos\BibliotecaDigital\resources\views/welcome.blade.php ENDPATH**/ ?>