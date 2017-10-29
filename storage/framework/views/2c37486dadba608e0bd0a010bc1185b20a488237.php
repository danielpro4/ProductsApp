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
        <div class="uk-grid">
            <?php echo $__env->make('partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <section class="uk-width-5-6@l">
                <?php echo $__env->make('partials.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->yieldContent('main-panel-before'); ?>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header">
                        <?php echo $__env->yieldContent('title'); ?>
                    </div>
                    <div class="uk-card-body">
                        <?php echo $__env->yieldContent('main-panel-content'); ?>
                    </div>
                    <div class="uk-card-footer">
                        <?php echo $__env->yieldContent('main-panel-footer'); ?>
                    </div>
                </div>
                <?php echo $__env->yieldContent('main-panel-after'); ?>
                <?php echo $__env->yieldContent('additional-panels'); ?>
                <div class="uk-margin-top">
                    <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </section>
        </div>
    </div>
</main>

<!-- Scripts -->
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
