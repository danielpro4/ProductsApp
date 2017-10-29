<?php $__env->startSection('page-title'); ?>
    ##parent-placeholder-f4a7fc8c543204b13cdacff162f6030819d5ae37##
    - Productos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="uk-flex uk-flex-between uk-flex-middle">
        <h1 class="uk-card-title uk-margin-remove">
            Productos
            <div class="uk-text-small">Gestión de su catálogo de productos</div>
        </h1>

        <a class="uk-button uk-button-primary uk-button-small" href="<?php echo e(route('product.create')); ?>">Nuevo Producto</a>
    </div>
    <div class="uk-flex uk-flex-right uk-flex-middle" style="margin-top: 15px">
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
<?php $__env->startSection('main-panel-content'); ?>
    <table class="uk-table uk-table-middle uk-table-responsive uk-table-divider uk-table-hover" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>SKU</th>
                <th>Producto</th>
                <th>Precio Compra</th>
                <th>Precio Venta</th>
                <th>Precio Venta C/IVA</th>
                <th>Existencias</th>
                <th>Activo</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="table-row">
                    <td><?php echo e((++$i)); ?></td>

                    <td><?php echo e($product->sku); ?></td>
                    <td>
                        <a href="<?php echo e(route('product.edit', $product)); ?>"><?php echo e(str_limit($product->name, 30)); ?></a>
                    </td>

                    <td><?php echo e($product->buyingPrice); ?></td>
                    <td><?php echo e($product->sellingPrice); ?></td>
                    <td><?php echo e($product->sellingPriceWithVat); ?></td>
                    <td><?php echo e($product->existences); ?></td>
                    <td><input class="uk-checkbox" type="checkbox" <?php echo e($product->active == 1 ? 'checked' : ''); ?>></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td class="uk-text-center" colspan="9">
                        <img class="uk-svg" width="50" height="50" src="/images/funnel.svg">
                        <p>No Products Found.</p>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-panel-footer'); ?>
    <a class="uk-button uk-button-primary uk-button-small" href="<?php echo e(route('product.create')); ?>">Nuevo Producto</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>