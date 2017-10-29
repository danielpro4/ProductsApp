<?php $__env->startSection('page-title'); ?>
    ##parent-placeholder-f4a7fc8c543204b13cdacff162f6030819d5ae37##
    - Login
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-panel-content'); ?>
    <form class="uk-form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo e(csrf_field()); ?>


        <?php $__env->startSection('title'); ?>
            <div class="uk-flex uk-flex-between uk-flex-middle">
                <h4 class="uk-card-title uk-margin-remove">Iniciar Sesión</h4>
            </div>
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('main-panel-content'); ?>
            <div class="uk-margin<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                <label for="email" class="uk-form-label">E-Mail Address</label>

                <div class="uk-form-controls">
                    <input id="email" type="email" class="uk-input" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                    <?php if($errors->has('email')): ?>
                        <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="uk-margin<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                <label for="password" class="uk-form-label">Password</label>

                <div class="uk-form-controls">
                    <input id="password" type="password" class="uk-input" name="password" required>

                    <?php if($errors->has('password')): ?>
                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="fuk-margin">
                <div class="uk-uk-inputs col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                        </label>
                    </div>
                </div>
            </div>
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('main-panel-footer'); ?>
            <button type="submit" class="uk-button uk-button-primary uk-button-small">
                Login
            </button>
            <a class="uk-button uk-button-link uk-button-small" href="<?php echo e(route('password.request')); ?>">
                Forgot Your Password?
            </a>
        <?php $__env->stopSection(); ?>

        <?php $__env->startSection('main-panel-after'); ?>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>