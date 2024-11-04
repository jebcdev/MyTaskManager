<div class="card-body bg-white">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead">
                <tr>
                    <th>No</th>
                    <th><?php echo e(__('Task')); ?></th>
                    <th><?php echo e(__('Content')); ?></th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $task->notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($note->id); ?></td>


                        <td><?php echo e($note->task->name); ?></td>
                        <td><?php echo e($note->content); ?></td>


                        <td>
                            <form action="<?php echo e(route('notes.destroy', $note->id)); ?>" method="POST">
                                <a class="btn btn-sm btn-primary " href="<?php echo e(route('notes.show', $note->id)); ?>"><i
                                        class="fa fa-fw fa-eye"></i> <?php echo e(__('Show')); ?></a>
                                <a class="btn btn-sm btn-success" href="<?php echo e(route('notes.edit', $note->id)); ?>"><i
                                        class="fa fa-fw fa-edit"></i> <?php echo e(__('Edit')); ?></a>
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i
                                        class="fa fa-fw fa-trash"></i> <?php echo e(__('Delete')); ?></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH D:\laragon\www\MyTaskManager\resources\views/task/notes-table.blade.php ENDPATH**/ ?>