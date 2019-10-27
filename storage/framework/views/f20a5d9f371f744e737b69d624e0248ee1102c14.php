<?php $__env->startSection('content'); ?>
<div class="content">
      <form name="form_sample_1"   id="form_sample_1" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                        <?php echo e(csrf_field()); ?>

          <h3 class="form-title">Acceso al Gestor</h3>
          <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?> control-group">
              <label for="email" class="control-label visible-ie8 visible-ie9">Usuario</label>

              <div class="controls">
                  <div class="input-icon left">
                      <i class="icon-user"></i>
                      <input id="email" type="email" class="m-wrap placeholder-no-fix" name="email" value="<?php echo e(old('email')); ?>">
                  </div>
                  <?php if($errors->has('email')): ?>
                      <span class="help-block">
                          <strong><?php echo e($errors->first('email')); ?></strong>
                      </span>
                  <?php endif; ?>
              </div>
          </div>

          <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?> control-group">
              <label for="password" class="control-label visible-ie8 visible-ie9">Password</label>
              <div class="controls">
                  <div class="input-icon left">
                      <i class="icon-lock"></i>
                      <input id="password" type="password" class="form-control m-wrap placeholder-no-fix" name="password">
                  </div>
                  <?php if($errors->has('password')): ?>
                      <span class="help-block">
                          <strong><?php echo e($errors->first('password')); ?></strong>
                      </span>
                  <?php endif; ?>
              </div>
          </div>

          <div class="form-actions">

              <button type="submit" class="btn red">
                  <i class="fa fa-btn fa-sign-in"></i> E N T R A R
              </button>
              <?php /*No resetemos password*/ ?>
              <?php /*<a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>">Forgot Your Password?</a>*/ ?>
          </div>
    </form>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>