<!-- Main Content -->
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo Form::open(['url'=>'/password/email', 'class'=>'form-horizontal']); ?>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('email', 'Alamat Email', ['class'=>'col-md-4 control-label']); ?>

                            <div class="col-md-6">
                            <?php echo Form::email('email', null, ['class'=>'form-control']); ?>

                            <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-envelope"></i> Kirim link reset password
                                </button>
                            </div>
                        </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>