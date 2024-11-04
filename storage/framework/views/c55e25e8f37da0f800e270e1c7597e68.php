<?php $__env->startSection('title'); ?>
    <?php echo e(config('app.name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_header'); ?>
    <div class="row align-items-center">
        <div class="col-6 d-flex">
            <h1 class="me-auto">
                <span class="card-title"><?php echo e(__('Show')); ?> <?php echo e(__('Status')); ?></span>
            </h1>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <a href="<?php echo e(route('statuses.index')); ?>" class="btn btn-sm btn-primary">
                <?php echo e(__('Back')); ?>

            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body bg-white">

                        <div class="form-group mb-2 mb20">
                            <strong><?php echo e(__('Name')); ?>:</strong>
                            <?php echo e($status->name); ?>

                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong><?php echo e(__('Description')); ?>:</strong>
                            <?php echo e($status->description); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\MyTaskManager\resources\views/status/show.blade.php ENDPATH**/ ?>