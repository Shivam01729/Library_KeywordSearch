

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center mt-3">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center mb-0">Library Search</h1>
            </div>
            
            <div class="card-body">
                <!-- Search Form (accessible to all) -->
                <form action="<?php echo e(route('resources.index')); ?>" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" 
                               class="form-control" 
                               name="query" 
                               placeholder="Search by title, author, or description..."
                               value="<?php echo e($searchTerm ?? ''); ?>"
                               required>
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i> Search
                        </button>
                        <?php if($searchTerm): ?>
                            <a href="<?php echo e(route('resources.index')); ?>" class="btn btn-outline-secondary">
                                <i class="fas fa-times"></i> Clear
                            </a>
                        <?php endif; ?>
                    </div>
                </form>

                <?php if($searchTerm && $resources->isEmpty()): ?>
                    <div class="alert alert-info text-center">
                        No books found matching your search.
                    </div>
                <?php endif; ?>

                <?php if($resources->isNotEmpty()): ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Description</th>
                                <th>Actions</th> <!-- Always show actions because everyone can view -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($resource->title); ?></td>
                                <td><?php echo e($resource->author); ?></td>
                                <td><?php echo e(Str::limit($resource->description, 50)); ?></td>
                                <td>
                                    <!-- View button for everyone -->
                                    <a href="<?php echo e(route('resources.show', $resource)); ?>" 
                                       class="btn btn-sm btn-info" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <?php if(auth()->guard()->check()): ?> <!-- Only admin can edit/delete -->
                                    <a href="<?php echo e(route('resources.edit', $resource)); ?>" 
                                       class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="<?php echo e(route('resources.destroy', $resource)); ?>" 
                                          method="POST" style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger" 
                                                title="Delete" onclick="return confirm('Delete this book?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-center mt-3">
                    <?php echo e($resources->appends(['query' => $searchTerm])->links()); ?>

                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\shiva\OneDrive\Desktop\mvc\library-keyword-search\resources\views/library/index.blade.php ENDPATH**/ ?>