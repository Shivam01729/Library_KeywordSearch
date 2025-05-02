<form action="<?php echo e(route('books.update', $book)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <!-- Form fields -->
    <button type="submit" class="btn btn-primary">Update</button>
    
    <a href="<?php echo e(route('books.show', $book)); ?>" class="btn btn-secondary">Cancel</a>
</form>

<form action="<?php echo e(route('books.destroy', $book)); ?>" method="POST" class="mt-3">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <button type="submit" class="btn btn-danger"
            onclick="return confirm('Delete this book permanently?')">
        Delete Book
    </button>
</form><?php /**PATH C:\Users\shiva\OneDrive\Desktop\mvc\library-keyword-search\resources\views/library/books/edit.blade.php ENDPATH**/ ?>