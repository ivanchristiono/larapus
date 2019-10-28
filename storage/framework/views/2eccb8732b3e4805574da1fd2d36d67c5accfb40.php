<?php echo Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm' => $confirm_message]); ?>

    <a href="<?php echo e($edit_url); ?>">Ubah</a> |
    <?php echo Form::submit('Hapus', ['class'=>'btn btn-xs btn-danger']); ?>

<?php echo Form::close(); ?>