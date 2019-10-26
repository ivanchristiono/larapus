<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
    <?php echo Form::label('name', 'Nama', ['class'=>'col-md-2 control-label']); ?>

    <div class="col-md-4">
        <?php echo Form::text('name', null, ['class'=>'form-control']); ?>

        <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group">
    <div class="col-md-4 col-md-offset-2">
        <?php echo Form::submit('Simpan', ['class'=>'btn btn-primary']); ?>

    </div>
</div>