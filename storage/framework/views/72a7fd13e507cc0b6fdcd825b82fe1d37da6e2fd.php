<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">

                <li><a href="<?php echo e(url('/')); ?>">Dashboard</a></li>
                <li class="active">Penulis</li>
                </ul>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h2 class="panel-title">Penulis</h2>
                    </div>
                    <div class="panel-body">
                        <p> <a class="btn btn-primary" href="<?php echo e(route('authors.create')); ?>">Tambah</a> </p>
                        <?php echo $html->table(['class'=>'table-striped']); ?>

                    </div>
                    </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo $html->scripts(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>