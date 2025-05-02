

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Search Results for "<?php echo e($query); ?>"</h1>
    <p><?php echo e($results->total()); ?> results found</p>

    <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="search-result mb-4 p-3 border rounded">
            <h3><?php echo e($resource->title); ?></h3>
            <p class="text-muted">by <?php echo e($resource->author); ?></p>
            <p><?php echo e(Str::limit($resource->description, 150)); ?></p>
            
            <div class="d-flex gap-2">
                <!-- View Details link -->
                <!-- <a href="<?php echo e(route('resources.show', $resource)); ?>" class="btn btn-primary btn-sm">
                    View Details
                </a> -->
                
                <!-- Delete button -->
                <form action="<?php echo e(route('resources.destroy', $resource)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger btn-sm" 
                            onclick="return confirm('Are you sure you want to delete this book?')">
                        Delete Book
                    </button>
                </form>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="mt-4">
        <?php echo e($results->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\shiva\OneDrive\Desktop\mvc\library-keyword-search\resources\views/library/results.blade.php ENDPATH**/ ?>