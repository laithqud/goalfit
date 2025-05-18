

<?php $__env->startSection('title', 'Food Category Management'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light">Food Categories</h6>
                        <a href="
                                        <?php echo e(route('admin.nutrition-categories.create')); ?>

                                         " class="btn btn-sm btn-primary">
                            <i class="fas fa-plus me-1"></i> Add New Category
                        </a>
                    </div>
                   <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" id="success-alert">
                            <?php echo e(session('success')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <script>
                            setTimeout(function () {
                                $('#success-alert').alert('close');
                            }, 2000);
                        </script>
                    <?php endif; ?>

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Items Count</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Last Updated</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($category->id); ?></td>
                                        <td>
                                            <?php if($category->image_url): ?>
                                                <img src="<?php echo e(asset('storage/' . $category->image_url)); ?>" alt="Category Image"
                                                    width="50" height="50">
                                            <?php else: ?>
                                                No Image
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($category->name); ?></td>
                                        <td><?php echo e($category->food_items_count ?? 0); ?></td>
                                        <td><?php echo e($category->created_at->format('M d, Y')); ?></td>
                                        <td><?php echo e($category->updated_at->format('M d, Y')); ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="<?php echo e(route('admin.nutrition-categories.edit', $category->id)); ?>"
                                                    class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="
                                                                        <?php echo e(route('admin.nutrition-categories.destroy', $category->id)); ?>

                                                                         " method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this category? All related food items will be affected.')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.dashboard.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/admin/nutrition-categories/index.blade.php ENDPATH**/ ?>