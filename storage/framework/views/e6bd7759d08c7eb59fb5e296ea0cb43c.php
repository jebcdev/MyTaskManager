<?php $__env->startSection('title'); ?>
    <?php echo e(config('app.name')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_header'); ?>
    <div class="row align-items-center card p-1">

        <h1 class="me-auto">
            <?php echo e(__('My Task Manager')); ?>

        </h1>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">


        


        <div class="container-fluid">
            <h2 class="text-center">
                <?php echo e(__('Tasks Analytics')); ?>

            </h2>

            <hr>


            
            <div>
                <h1>
                    <?php echo e(__('By Categories')); ?>

                </h1>
                <div class="row">

                    <?php $__empty_1 = true; $__currentLoopData = $categoriesAnalytics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoriesAnalytic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="small-box <?php echo e($categoriesAnalytic['color'] ?? 'bg-info'); ?> col m-2 p-1">
                            <div class="inner">
                                <h3><?php echo e($categoriesAnalytic['total']); ?></h3>

                                <p><?php echo e($categoriesAnalytic['category']); ?></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="alert alert-warning">
                            <?php echo e(__('Nothing To Show')); ?>

                        </div>
                    <?php endif; ?>

                </div>
            </div>
            


            
            <div>
                <h1>
                    <?php echo e(__('By Statuses')); ?>

                </h1>
                <div class="row">

                    <?php $__empty_1 = true; $__currentLoopData = $statusesAnalytics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusesAnalytic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="small-box <?php echo e($statusesAnalytic['color'] ?? 'bg-info'); ?> col m-2 p-1">
                            <div class="inner">
                                <h3><?php echo e($statusesAnalytic['total']); ?></h3>

                                <p><?php echo e($statusesAnalytic['status']); ?></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="alert alert-warning">
                            <?php echo e(__('Nothing To Show')); ?>

                        </div>
                    <?php endif; ?>

                </div>
            </div>
            
        </div>

        

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\MyTaskManager\resources\views/modules/admin/index.blade.php ENDPATH**/ ?>