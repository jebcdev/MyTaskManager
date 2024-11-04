<?php $__env->startSection('title'); ?>
    <?php echo e(config('app.name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_header'); ?>
    <div class="row align-items-center">
        <div class="col-6 d-flex">
            <h1 class="me-auto">
                <span class="card-title"><?php echo e(__('Create')); ?> <?php echo e(__('Note')); ?></span>
            </h1>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <a href="<?php echo e(route('notes.index')); ?>" class="btn btn-sm btn-primary">
                <?php echo e(__('Back')); ?>

            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-body bg-white">
                        <form method="POST" action="<?php echo e(route('notes.store')); ?>" role="form"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <?php echo $__env->make('note.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        </form>
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\MyTaskManager\resources\views/note/create.blade.php ENDPATH**/ ?>