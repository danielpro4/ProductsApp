<?php $__env->startSection('page-title'); ?>
    ##parent-placeholder-f4a7fc8c543204b13cdacff162f6030819d5ae37##
    - Producto
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="uk-flex uk-flex-between uk-flex-middle">
        <h5 class="uk-card-title uk-margin-remove">Detalles del Producto: <?php echo e($product->sku); ?></h5>
        <status-button :data-task="<?php echo e($product); ?>" :data-exists="<?php echo e($product->exists ? 1 : 0); ?>"></status-button>
        <img src="/images/product.jpg" alt="<?php echo e($product->name); ?>" style="width: 120px"/>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-panel-content'); ?>
    <ul class="uk-list uk-list-striped">
        <li>
            <span class="uk-text-muted uk-float-right">Nombre</span>
            <span class="uk-float-left"><?php echo e(str_limit($product->name, 80)); ?></span>
        </li>
        <li>
            <span class="uk-text-muted uk-float-right">Descripción</span>
            <span class="uk-float-left"><?php echo e($product->description); ?></span>
        </li>
        <li>
            <span class="uk-text-muted uk-float-right">Precio</span>
            <span class="uk-float-left"><?php echo e($product->price); ?></span>
        </li>
    </ul>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-panel-footer'); ?>
    <div class="uk-flex uk-flex-between uk-flex-middle">
        <span>
            <a href="<?php echo e(route('product.edit', $product)); ?>" class="uk-button uk-button-primary uk-button-small">Edit</a>
            <form class="uk-display-inline" action="<?php echo e(route('product.delete', $product)); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('delete')); ?>

                <button type="submit" class="uk-button uk-button-danger uk-button-small">Delete</button>
            </form>
        </span>
        <a href="" class="uk-button uk-button-primary uk-button-small">Execute</a>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('additional-panels'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>