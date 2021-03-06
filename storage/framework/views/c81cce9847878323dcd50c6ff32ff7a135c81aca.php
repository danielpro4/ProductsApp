<?php $__env->startSection('page-title'); ?>
    ##parent-placeholder-f4a7fc8c543204b13cdacff162f6030819d5ae37##
    - Usuarios
<?php $__env->stopSection(); ?>
<?php $__env->startSection('panel-header'); ?>
    <div class="uk-flex uk-flex-between uk-flex-middle">
        <h4 class="uk-card-title uk-margin-remove">Usuarios</h4>
        <form class="uk-display-inline uk-search uk-search-default">
            <span class="uk-icon uk-search-icon">
                <icon name="search" :scale="100">
                    <svg version="1.1" role="presentation" width="17.857142857142858" height="17.857142857142858"
                         viewBox="0 0 20 20" class="svg-icon active" style="font-size: 100em;"><path
                                d="M2 9a7 7 0 1 0 14 0a7 7 0 1 0 -14 0z" fill="none" stroke="#000"></path><path
                                d="M14,14 L18,18 L14,14 Z" fill="none" stroke="#000"></path></svg>
                </icon>
            </span>

            <input class="uk-search-input" type="search" placeholder="Search...">
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('panel-content'); ?>
    <table class="uk-table uk-table-middle uk-table-responsive uk-table-divider uk-table-hov2er" cellpadding="0" cellspacing="0" class="mb1">
        <thead>
            <tr>
                <th>Activo</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Última actualización</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="table-row">
                    <td><input class="uk-checkbox" type="checkbox"></td>
                    <td>
                        <img class="uk-preserve-width uk-border-circle" src="/images/avatar.png" width="40" alt="">

                        <a href="<?php echo e(route('user.view', $user)); ?>"><?php echo e(str_limit($user->name, 30)); ?></a>
                        <span class="uk-float-right uk-hidden@s uk-text-muted">Nombre</span>
                    </td>

                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->updated_at); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td class="uk-text-center" colspan="4">
                        <img class="uk-svg" width="50" height="50" src="/imgs/funnel.svg">
                        <p>No Users Found.</p>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('panel-footer'); ?>
    <a class="uk-button uk-button-primary uk-button-small" href="<?php echo e(route('user.create')); ?>">Nuevo usuario</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>