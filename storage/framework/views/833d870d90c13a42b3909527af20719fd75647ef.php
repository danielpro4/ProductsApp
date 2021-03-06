<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>

<?php echo $__env->make('partials.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<main id="root">
    <div class="uk-container uk-section">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</main>


<!-- Scripts -->
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
