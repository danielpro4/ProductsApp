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

<main id="root" class="uk-container uk-container-expand">
    <div class="uk-grid">
        <aside class="uk-width-1-6@l uk-margin-top uk-margin-bottom">
            <?php echo $__env->make('partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </aside>
        <section class="uk-width-expand@m uk-margin-top">
            <?php echo $__env->make('partials.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo $__env->yieldContent('main-panel-before'); ?>

            <div class="uk-card uk-card-default">
                <div class="uk-card-header"> <?php echo $__env->yieldContent('panel-header'); ?> </div>
                <div class="uk-card-body"> <?php echo $__env->yieldContent('panel-content'); ?> </div>
                <div class="uk-card-footer"> <?php echo $__env->yieldContent('panel-footer'); ?></div>
            </div>

            <?php echo $__env->yieldContent('main-panel-after'); ?>

            <div class="uk-margin-top">
                <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </section>
    </div>
</main>

<!-- Scripts -->
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
