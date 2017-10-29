<?php $__env->startSection('page-title'); ?>
    ##parent-placeholder-f4a7fc8c543204b13cdacff162f6030819d5ae37##
    - <?php echo e($user->exists ? 'Update' : 'Create'); ?> Task
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-panel-before'); ?>
    <form action="<?php echo e(request()->fullUrl()); ?>" method="POST" class="uk-form-horizontal">
        <?php echo e(csrf_field()); ?>

        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('title'); ?>
            <div class="uk-flex uk-flex-between uk-flex-middle">
                <h5 class="uk-card-title uk-margin-remove"><?php echo e($user->exists ? 'Actualizar' : 'Crear'); ?> Usuario</h5>
            </div>
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('main-panel-content'); ?>
            <div class="uk-margin">
                <label class="uk-form-label">Nombre</label>
                <div class="uk-form-controls">
                    <input class="uk-input" placeholder="Escribir nombre de usuario, e.g. Daniel" name="name" id="name"
                           value="<?php echo e(old('name', $user->name)); ?>" type="text">
                    <?php if($errors->has('name')): ?>
                        <div class="uk-text-danger"><?php echo e($errors->first('name')); ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">Correo Electrónico</label>
                <div class="uk-form-controls">
                    <input class="uk-input" placeholder="Escribir email de usuario, e.g. daniel.perez.atanacio@gmail.com" name="email" id="email"
                           value="<?php echo e(old('email', $user->email)); ?>" type="text">
                    <?php if($errors->has('email')): ?>
                        <div class="uk-text-danger"><?php echo e($errors->first('email')); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('main-panel-footer'); ?>
            <button class="uk-button uk-button-primary uk-button-small" type="submit">Guardar</button>
        <?php $__env->stopSection(); ?>

        <?php $__env->startSection('main-panel-after'); ?>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>