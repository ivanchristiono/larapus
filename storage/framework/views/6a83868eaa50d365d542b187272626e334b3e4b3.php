<div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
    <?php echo Form::label('title', 'Judul', ['class'=>'col-md-2 control-label']); ?>

    <div class="col-md-4">
        <?php echo Form::text('title', null, ['class'=>'form-control']); ?>

        <?php echo $errors->first('title', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group<?php echo e($errors->has('author_id') ? ' has-error' : ''); ?>">
    <?php echo Form::label('author_id', 'Penulis', ['class'=>'col-md-2 control-label']); ?>

    <div class="col-md-4">
        <?php echo Form::select('author_id', [''=>'']+App\Author::pluck('name','id')->all(), null, [
            'class'=>'js-selectize',
            'placeholder' => 'Pilih Penulis'
            ]); ?>

        <?php echo $errors->first('author_id', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group<?php echo e($errors->has('amount') ? ' has-error' : ''); ?>">
    <?php echo Form::label('amount', 'Jumlah', ['class'=>'col-md-2 control-label']); ?>

    <div class="col-md-4">
        <?php echo Form::text('amount', null, ['class'=>'form-control', 'min'=>1]); ?>

        <?php echo $errors->first('amount', '<p class="help-block">:message</p>'); ?>

        <?php if(isset($book)): ?>
            <p class="help-block"><?php echo e($book->borrowed); ?> buku sedang dipinjam</p>
        <?php endif; ?>
    </div>
</div>

<div class="form-group<?php echo e($errors->has('amount') ? ' has-error' : ''); ?>">
    <?php echo Form::label('cover', 'Cover', ['class'=>'col-md-2 control-label']); ?>

    <div class="col-md-4">
        <?php echo Form::file('cover'); ?>

        
        <!-- memeriksa ada tidaknya cover -->
        <?php if(isset($book) && $book->cover ): ?>
        <p>
            <?php echo Html::image(asset('img/'.$book->cover), null, ['class'=>'img-rounded img-responsive']); ?>

        </p>
        <?php endif; ?>

        <?php echo $errors->first('cover', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group">
    <div class="col-md-4 col-md-offset-2">
        <?php echo Form::submit('Simpan', ['class'=>'btn btn-primary']); ?>

    </div>
</div>