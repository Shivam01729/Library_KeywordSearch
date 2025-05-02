

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Book Details</h2>
        </div>
        <div class="card-body">
            <h4>Title:</h4>
            <p><?php echo e($resource->title); ?></p>

            <h4>Author:</h4>
            <p><?php echo e($resource->author); ?></p>

            <h4>Description:</h4>
            <p><?php echo e($resource->description); ?></p>

            <h4>Shelf No:</h4>
            <p><?php echo e($resource->shelf ?? 'Not assigned'); ?></p>

            <a href="<?php echo e(route('resources.index')); ?>" class="btn btn-primary mt-3">Back to List</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\shiva\OneDrive\Desktop\mvc\library-keyword-search\resources\views/library/show.blade.php ENDPATH**/ ?>