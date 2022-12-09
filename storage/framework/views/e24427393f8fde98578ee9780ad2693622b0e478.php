<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(config('app.name')); ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 4.1.1 -->
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link href="//fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="<?php echo e(asset('assets/css/@fortawesome/fontawesome-free/css/all.css')); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/iziToast.min.css')); ?>">
    <link href="<?php echo e(asset('assets/css/sweetalert.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/css/select2.min.css')); ?>" rel="stylesheet" type="text/css"/>

    <!-- Selectores-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

     <!--scrips-->
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>   


    

   

<?php echo $__env->yieldContent('page_css'); ?>
<!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('web/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/css/components.css')); ?>">
    <?php echo $__env->yieldContent('page_css'); ?>

    <?php echo $__env->yieldContent('css'); ?>
</head>
<body>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </nav>
        <div class="main-sidebar main-sidebar-postion">
            <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- Main Content -->
        <div class="main-content">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

    </div>
</div>

<?php echo $__env->make('profile.change_password', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('profile.edit_profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
<script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/iziToast.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.nicescroll.js')); ?>"></script>

<!-- Template JS File -->
<script src="<?php echo e(asset('web/js/stisla.js')); ?>"></script>
<script src="<?php echo e(asset('web/js/scripts.js')); ?>"></script>
<script src="<?php echo e(mix('assets/js/profile.js')); ?>"></script>
<script src="<?php echo e(mix('assets/js/custom/custom.js')); ?>"></script>
<?php echo $__env->yieldContent('page_js'); ?>
<?php echo $__env->yieldContent('scripts'); ?>
<script>
    let loggedInUser =<?php echo json_encode(\Illuminate\Support\Facades\Auth::user(), 15, 512) ?>;
    let loginUrl = '<?php echo e(route('login')); ?>';
    const userUrl = '<?php echo e(url('users')); ?>';
    // Loading button plugin (removed from BS4)
    (function ($) {
        $.fn.button = function (action) {
            if (action === 'loading' && this.data('loading-text')) {
                this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
            }
            if (action === 'reset' && this.data('original-text')) {
                this.html(this.data('original-text')).prop('disabled', false);
            }
        };
    }(jQuery));
</script>
</html>
<?php /**PATH C:\Users\FER\Documents\5TO_SEMESTRE\BASE_DE_DATOS\BibliotecaDigital\resources\views/layouts/app.blade.php ENDPATH**/ ?>