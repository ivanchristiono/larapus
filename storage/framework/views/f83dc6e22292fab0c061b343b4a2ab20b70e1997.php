<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Selamat datang di LARAPUS.
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="text-muted">Buku dipinjam</td>
                                <td>
                                    <?php if($borrowLogs->count() == 0): ?>
                                    Tidak ada buku dipinjam
                                    <?php endif; ?>
                                    <ul>
                                        <?php $__currentLoopData = $borrowLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $borrowLog): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <li>
                                            
                                                <?php echo Form::open([
                                                    'url'           =>route('member.books.return', $borrowLog->book_id),
                                                    'method'        =>'put',
                                                    'class'         =>'form-inline js-confirm',
                                                    'data-confirm'  =>'Anda yakin ingin mengembalikan buku '.$borrowLog->book->title . "?"
                                                    ]); ?>


                                                <?php echo e($borrowLog->book->title); ?>

                                                <?php echo Form::submit('Kembalikan', ['class' => 'btn btn-xs btn-default']); ?>

                                                
                                                <?php echo Form::close(); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>