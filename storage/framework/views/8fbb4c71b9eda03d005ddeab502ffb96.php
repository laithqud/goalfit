

<?php $__env->startSection('title', 'Admin Management'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-dark rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light">Admin Users</h6>
                        <?php if(auth()->user()->role === 'superadmin'): ?>
                            <a href="<?php echo e(route('admin.admins.create')); ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus me-1"></i> Add Admin
                            </a>
                        <?php endif; ?>

                    </div>

                    <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo e(session('success')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-light">ID</th>
                                    <th class="text-light">Name</th>
                                    <th class="text-light">Email</th>
                                    <th class="text-light">Role</th>
                                    <th class="text-light">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th class="text-light"><?php echo e($admin->id); ?></td>
                                        <th class="text-light"><?php echo e($admin->name); ?></td>
                                        <th class="text-light"><?php echo e($admin->email); ?></td>
                                        <td>
                                            <span class="badge bg-<?php echo e($admin->role === 'superadmin' ? 'danger' : 'primary'); ?>">
                                                <?php echo e(ucfirst($admin->role)); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                
                                                <?php if(auth()->user()->role === 'superadmin' || auth()->id() === $admin->id): ?>
                                                    <a href="<?php echo e(route('admin.admins.edit', $admin->id)); ?>"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>

                                                
                                                <?php if(auth()->user()->role === 'superadmin' && auth()->id() !== $admin->id): ?>
                                                    <form action="<?php echo e(route('admin.admins.destroy', $admin->id)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        <?php echo e($admins->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/admin/admins/index.blade.php ENDPATH**/ ?>