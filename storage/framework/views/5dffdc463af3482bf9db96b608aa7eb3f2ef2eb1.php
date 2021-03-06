<?php $__env->startSection('page-title'); ?>
    ##parent-placeholder-f4a7fc8c543204b13cdacff162f6030819d5ae37##
    -  Buscar Productos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="uk-flex uk-flex-between uk-flex-middle">
        <form class="uk-display-inline uk-search uk-search-home uk-search-default">
            <span class="uk-icon uk-search-icon">
                <icon name="search" :scale="100">
                    <svg version="1.1" role="presentation" width="18" height="18"
                         viewBox="0 0 20 20" class="svg-icon active" style="font-size: 100em;"><path
                                d="M2 9a7 7 0 1 0 14 0a7 7 0 1 0 -14 0z" fill="none" stroke="#000"></path><path
                                d="M14,14 L18,18 L14,14 Z" fill="none" stroke="#000"></path></svg>
                </icon>
            </span>

            <input class="uk-search-input" type="search" placeholder="Buscar producto...">
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-panel-content'); ?>
    <table class="uk-table uk-table-middle uk-table-responsive uk-table-divider uk-table-hov2er" cellpadding="0" cellspacing="0" class="mb1">
        <thead>
            <tr>
                <th>Producto</th>
            </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="table-row">
                <td>
                    <div class="pg-product-list__item">
                        <figure class="product-picture">
                            <img class="uk-preserve-width uk-border-circle" src="/images/product.jpg" width="40" alt="<?php echo e($product->name); ?>">
                        </figure>
                        <div class="product-name">
                            <a href="<?php echo e(route('product.view', $product)); ?>"> <?php echo e($product->sku); ?> - <?php echo e(str_limit($product->name, 30)); ?></a>
                            <div class="uk-text-small"><?php echo e($product->category); ?></div>
                        </div>

                        <div class="product-price">
                            $ <?php echo e($product->sellingPrice); ?>

                        </div>

                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td class="uk-text-center" colspan="4">
                    <img class="uk-svg" width="50" height="50" src="/images/funnel.svg">
                    <p>No Users Found.</p>
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-panel-footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.search", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>