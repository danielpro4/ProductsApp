<?php $__env->startSection('page-title'); ?>
    ##parent-placeholder-f4a7fc8c543204b13cdacff162f6030819d5ae37##
    - <?php echo e($product->exists ? 'Update' : 'Create'); ?> Producto
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-panel-before'); ?>
    <form action="<?php echo e(request()->fullUrl()); ?>" method="POST" class="uk-form-horizontal">
        <?php echo e(csrf_field()); ?>

        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('title'); ?>
            <div class="uk-flex uk-flex-between uk-flex-middle">
                <h5 class="uk-card-title uk-margin-remove"><?php echo e($product->exists ? 'Actualizar' : 'Crear'); ?> Producto</h5>
            </div>
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('main-panel-content'); ?>
            <div class="uk-margin">
                <label class="uk-form-label">SKU</label>
                <div class="uk-form-controls">
                    <input class="uk-input" placeholder="Sku producto, e.g. CHP-23" name="sku" id="sku"
                           value="<?php echo e(old('sku', $product->sku)); ?>" type="text">
                    <?php if($errors->has('sku')): ?>
                        <div class="uk-text-danger"><?php echo e($errors->first('sku')); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        
            <div class="uk-margin">
                <label class="uk-form-label">Código de Proveedor</label>
                <div class="uk-form-controls">
                    <input class="uk-input" placeholder="Código de Proveedor" name="suppliercode" id="suppliercode"
                           value="<?php echo e(old('suppliercode', $product->suppliercode)); ?>" type="text"/>
                    <span class="hint uk-text-small"></span>
                    <?php if($errors->has('suppliercode')): ?>
                        <div class="uk-text-danger"><?php echo e($errors->first('suppliercode')); ?></div>
                    <?php endif; ?>
                </div>
             </div>
             

            <div class="uk-margin">
                <label class="uk-form-label">Nombre</label>
                <div class="uk-form-controls">
                    <input class="uk-input" placeholder="Escribir nombre de producto, e.g. Cartucho HP 23" name="name" id="name"
                           value="<?php echo e(old('name', $product->name)); ?>" type="text">
                    <?php if($errors->has('name')): ?>
                        <div class="uk-text-danger"><?php echo e($errors->first('name')); ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">Descripción</label>
                <div class="uk-form-controls">
                    <textarea class="uk-textarea" placeholder="Descripción detallada del producto" name="description" id="description"
                           value="<?php echo e(old('description', $product->description)); ?>" rows="5"></textarea>
                    <?php if($errors->has('description')): ?>
                        <div class="uk-text-danger"><?php echo e($errors->first('description')); ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">Código de Barras</label>
                <div class="uk-form-controls">
                    <input class="uk-input" placeholder="Código de Barras" name="barcode" id="barcode"
                           value="<?php echo e(old('barcode', $product->barcode)); ?>" type="text"/>
                    <span class="hint uk-text-small"></span>
                    <?php if($errors->has('barcode')): ?>
                        <div class="uk-text-danger"><?php echo e($errors->first('barcode')); ?></div>
                    <?php endif; ?>
                </div>
             </div>


            <div class="uk-margin">
                <label class="uk-form-label">Precio Compra</label>
                <div class="uk-form-controls">
                    <input class="uk-input" placeholder="Precio compra" name="buy_price" id="buy_price"
                           value="<?php echo e(old('buy_price', $product->buy_price)); ?>" type="text"/>
                    <span class="hint uk-text-small">Precio de compra (Sin IVA)</span>
                    <?php if($errors->has('buy_price')): ?>
                        <div class="uk-text-danger"><?php echo e($errors->first('buy_price')); ?></div>
                    <?php endif; ?>
                </div>
            </div>

             <div class="uk-margin">
                <label class="uk-form-label">Precio Venta</label>
                <div class="uk-form-controls">
                    <input class="uk-input" placeholder="Precio venta" name="sell_price" id="sell_price"
                           value="<?php echo e(old('sell_price', $product->sell_price)); ?>" type="text"/>
                    <span class="hint uk-text-small">Precio de venta (Sin IVA)</span>
                    <?php if($errors->has('sell_price')): ?>
                        <div class="uk-text-danger"><?php echo e($errors->first('sell_price')); ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">Categoría</label>
                <div class="uk-form-controls">
                    <select class="uk-select" placeholder="Categoría del producto, e.g. CARTUCHOS" name="category" id="category"
                           value="<?php echo e(old('category', $product->category)); ?>" >
                        <option value="Accesorio">ACCESORIOS</option>
                        <option value="Cartucho">CARTUCHOS</option>
                        <option value="Impresora">IMPRESORAS</option>
                        <option value="Toner">TONER</option>
                    </select>
                    <?php if($errors->has('category')): ?>
                        <div class="uk-text-danger"><?php echo e($errors->first('category')); ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="uk-margin">
                <label class="uk-form-label">Activo</label>
                <div class="uk-form-controls">
                    <label>
                        <input class="uk-radio" name="active" id="active-yes"
                               value="1" <?php echo e(old('active', $product->active) == true ? 'checked' : ''); ?> type="radio"/>Sí
                    </label>
                    <label>
                        <input class="uk-radio"  name="active" id="active-no"
                               value="0" <?php echo e(old('active', $product->active) == false ? 'checked' : ''); ?> type="radio"/>No
                    </label>

                    <?php if($errors->has('active')): ?>
                        <div class="uk-text-danger"><?php echo e($errors->first('active')); ?></div>
                    <?php endif; ?>
                </div>
            </div>


            <div class="uk-margin">
                <label class="uk-form-label">Existencias</label>
                <div class="uk-form-controls">
                    <input class="uk-input" placeholder="Existencias" name="existences" id="existences"
                           value="<?php echo e(old('existences', $product->existences)); ?>" type="number"/>
                    <span class="hint uk-text-small">Existencias totales</span>
                    <?php if($errors->has('existences')): ?>
                        <div class="uk-text-danger"><?php echo e($errors->first('existences')); ?></div>
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