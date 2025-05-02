<div class="card">
    <div class="card-body">
        <h3><?php echo e($book->title); ?></h3>
        <p>by <?php echo e($book->author); ?></p>
        <p><?php echo e($book->description); ?></p>
        
        <div class="mt-4">
            <a href="<?php echo e(route('books.edit', $book)); ?>" class="btn btn-primary">Edit</a>
            
            <form action="<?php echo e(route('books.destroy', $book)); ?>" method="POST" style="display:inline;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger ml-2"
                        onclick="return confirm('Permanently delete this book?')">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div><?php /**PATH C:\Users\shiva\OneDrive\Desktop\mvc\library-keyword-search\resources\views/library/books/show.blade.php ENDPATH**/ ?>