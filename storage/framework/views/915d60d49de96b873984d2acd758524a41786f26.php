

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Edit Book</h2>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('resources.update', $resource)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" 
                        value="<?php echo e(old('title', $resource->title)); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" name="author" id="author" class="form-control" 
                        value="<?php echo e(old('author', $resource->author)); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required><?php echo e(old('description', $resource->description)); ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="shelf" class="form-label">Shelf No</label>
                    <input type="text" name="shelf" id="shelf" class="form-control" 
                        value="<?php echo e(old('shelf', $resource->shelf)); ?>">
                </div>

                <button type="submit" class="btn btn-primary">Update Book</button>
                <a href="<?php echo e(route('resources.index')); ?>" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\shiva\OneDrive\Desktop\mvc\library-keyword-search\resources\views/library/edit.blade.php ENDPATH**/ ?>