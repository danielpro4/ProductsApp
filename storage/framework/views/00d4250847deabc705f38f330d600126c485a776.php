<?php $__env->startSection('page-title'); ?>
    ##parent-placeholder-f4a7fc8c543204b13cdacff162f6030819d5ae37##
    -  Registrar Venta
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <h1 class="uk-card-title">Ventas</h1>
    <form class="uk-form-horizontal selling">
        <div class="uk-margin">
            <label class="uk-form-label">Cliente</label>
            <div class="uk-form-controls">
                <input class="uk-input" placeholder="Nombre del cliente"
                       name="customer"
                       id="customer"
                       v-model="order.customer"
                       type="text">
                <?php if($errors->has('customer')): ?>
                    <div class="uk-text-danger"><?php echo e($errors->first('customer')); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-panel-content'); ?>
    <div class="uk-card-body">
        <div class="uk-flex uk-flex-between uk-flex-middle">
            <form class="uk-display-inline uk-search uk-search-default uk-search-selling uk-margin-right">

                <div class="uk-inline">
                            <span class="uk-icon uk-search-icon" href="#" uk-icon="icon: pencil">
                                <svg version="1.1" role="presentation"
                                     width="17.857142857142858" height="17.857142857142858"
                                     viewBox="0 0 20 20" class="svg-icon active"
                                     style="font-size: 100em;"><path
                                            d="M2 9a7 7 0 1 0 14 0a7 7 0 1 0 -14 0z" fill="none" stroke="#000"></path><path
                                            d="M14,14 L18,18 L14,14 Z" fill="none" stroke="#000"></path></svg>
                            </span>
                    <input v-model="searchQuery"
                           class="uk-search-input"
                           value="usb 32gb"
                           ref="search"
                           type="search" placeholder="Buscar producto...">

                    <a @click="clearSearch" class="uk-form-icon uk-form-icon-flip" href="#" uk-icon="icon: link">x</a>
                </div>

                <div v-show="isOpen" class="uk-search-products">
                    <div @click="handleItemClick(product)" class="uk-search-products-item" v-for="product in products">
                        (<span v-html="product.sku"></span>) - <span v-html="product.name "></span> $ <span
                                v-html="product.sellingpricewithvat"></span>
                    </div>
                    <div class="search-loading uk-text-small">{{searching}}</div>
                </div>
            </form>

            <div class="uk-flex-right">
                <button @click="handleAddProduct()" class="uk-button uk-button-primary uk-button-small">Agregar</button>
            </div>
        </div>

        <div class="uk-products">
            <table class="uk-table uk-table-middle uk-table-responsive uk-table-divider">
                <thead>
                <tr>
                    <th style="width: 80px">Cantidad</th>
                    <th class="uk-table-expand">Producto</th>
                    <th class="uk-width-small">Precio</th>
                    <th class="uk-width-small">Importe</th>
                    <th class="uk-width-small">Opciones</th>
                </tr>
                </thead>
                <tbody v-if="order.items.length">
                <tr v-for="item in order.items">
                    <td><input class="uk-input" type="text" v-model="item.qty"/></td>
                    <td>{{item.product}}</td>
                    <td class="text-right"><input class="uk-input" type="text" v-model="item.price"/></td>
                    <td class="text-right">$ {{item.amount}}</td>
                    <td>
                        <button class="uk-button uk-button-small uk-button-danger" type="button">Eliminar</button>
                    </td>
                </tr>
                </tbody>
                <tbody v-else>
                <tr>
                    <td class="uk-text-center" colspan="5">
                        <img class="uk-svg" width="50" height="50" src="/images/funnel.svg">
                        <p>No hay productos agregados.</p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-panel-footer'); ?>
    <table class="uk-table uk-table-total">
        <tbody>
            <tr>
                <td colspan="3">
                    <div class="uk-margin-small">
                        <input class="uk-input"
                               placeholder="Cantidad con letra"
                               name="letter"
                               id="letter"
                               v-model="order.letter"
                               type="text">
                    </div>

                    <div class="uk-margin-small">
                        <textarea name="notes" id="notes"
                                  v-model="order.notes"
                                  cols="30" rows="4"
                                  class="uk-textarea"
                                  placeholder="Notas"></textarea>
                    </div>
                </td>
                <td class="uk-width-medium">
                    <div class="uk-form-horizontal selling">
                        <div class="uk-margin-small">
                            <label for="subtotal" class="uk-form-label">Sub Total: </label>
                            <div class="uk-form-controls">
                                <input class="uk-input text-right"
                                       placeholder="SubTotal"
                                       name="subtotal"
                                       id="subtotal"
                                       v-model="order.subtotal"
                                       type="text">
                            </div>
                        </div>

                        <div class="uk-margin-small">
                            <label for="discount" class="uk-form-label">Descuento: </label>
                            <div class="uk-form-controls">
                                <input class="uk-input text-right"
                                       placeholder="Descuento"
                                       name="discount"
                                       id="discount"
                                       v-model="order.discount"
                                       type="text">
                            </div>
                        </div>

                        <div class="uk-margin-small">
                            <label for="vat" class="uk-form-label">IVA: </label>
                            <div class="uk-form-controls">
                                <input class="uk-input text-right"
                                       placeholder="IVA"
                                       name="vat"
                                       id="vat"
                                       v-model="order.vat"
                                       type="text">
                            </div>
                        </div>

                        <div class="uk-margin-small">
                            <label for="total" class="uk-form-label">Total: </label>
                            <div class="uk-form-controls">
                                <input class="uk-input uk-form-large text-right"
                                       placeholder="Total"
                                       name="total"
                                       id="total"
                                       v-model="order.total"
                                       type="text">
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>