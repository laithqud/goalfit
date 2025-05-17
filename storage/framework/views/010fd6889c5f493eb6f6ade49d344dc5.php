

<?php $__env->startSection('title', 'User Management'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light"> Users</h6>
                    </div>
                    <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show">
                            <?php echo e(session('success')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if(session('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <?php echo e(session('error')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">BMI</th>
                                    <th scope="col">Joined</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($user->id); ?></td>
                                                            <td>
                                                                <?php if($user->profile_photo_path): ?>
                                                                    <img src="<?php echo e($user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : asset('images/default-profile.png')); ?>" class="rounded-circle"
                                                                        width="40" height="40" alt="Profile"
                                                                        onerror="this.onerror=null;this.src='<?php echo e(asset('images/default-profile.png')); ?>'">
                                                                <?php else: ?>
                                                                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center"
                                                                        style="width: 40px; height: 40px;">
                                                                        <i class="fas fa-user text-light"></i>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td><?php echo e($user->name); ?></td>
                                                            <td><?php echo e($user->email); ?></td>
                                                            <td><?php echo e($user->gender ? ucfirst($user->gender) : 'N/A'); ?></td>
                                                            <td>
                                                                <?php if($user->birth_date): ?>
                                                                    <?php echo e(\Carbon\Carbon::parse($user->birth_date)->age); ?>

                                                                <?php else: ?>
                                                                    N/A
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <?php if($user->weight && $user->height): ?>
                                                                                                <?php
                                                                                                    $bmi = $user->weight / (($user->height / 100) ** 2);
                                                                                                ?>
                                                                                                <?php echo e(number_format($bmi, 1)); ?>

                                                                <?php else: ?>
                                                                    N/A
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo e($user->created_at->format('M d, Y')); ?>

                                                            </td>
                                                            <td>
                                                                <div class="d-flex justify-content-center gap-2">
                                                                    <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>"
                                                                        class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top" title="Edit">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                    <form action="<?php echo e(route('admin.users.destroy', $user->id)); ?>" method="POST">
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php echo method_field('DELETE'); ?>
                                                                        <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Delete"
                                                                            onclick="return confirm('Are you sure you want to permanently delete this user?')">
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
<?php echo $__env->make('layouts.dashboard.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/admin/users/index.blade.php ENDPATH**/ ?>