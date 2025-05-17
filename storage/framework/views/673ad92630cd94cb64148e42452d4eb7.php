

<?php $__env->startSection('title', 'Food Item Management'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light">Food Items</h6>
                        
                        
                        <div class="d-flex gap-2">
                            <a href="
                                                        <?php echo e(route('admin.food-items.create')); ?>

                                                         " class="btn btn-sm btn-primary">
                                <i class="fas fa-plus me-1"></i> Add New Food
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Food Name</th>
                                    <th scope="col">Category</th>

                                    <th scope="col">Description</th>
                                    <th scope="col">Added</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $foodItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->id); ?></td>
                                        <td>
                                            <?php echo e($item->name); ?>


                                        </td>
                                        <td>
                                            <span class="badge bg-secondary">
                                                <?php echo e($item->nutritionCategory->name ?? 'No category'); ?>

                                            </span>
                                        </td>

                                        <td class="text-truncate" style="max-width: 200px;" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="
                                                                                            <?php echo e($item->description ?? 'No description'); ?>

                                                                                             ">
                                            <?php echo e($item->description ? Str::limit($item->description, 30) : '-'); ?>

                                        </td>
                                        <td><?php echo e($item->created_at->format('M d, Y')); ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="
                                                                                                <?php echo e(route('admin.food-items.edit', $item->id)); ?>

                                                                                                 "
                                                    class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="
                                                                                                <?php echo e(route('admin.food-items.destroy', $item->id)); ?>

                                                                                                 " method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this food item?')">
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
<?php echo $__env->make('layouts.dashboard.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/admin/foodItems/index.blade.php ENDPATH**/ ?>