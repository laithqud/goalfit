

<?php $__env->startSection('title', 'Edit User'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-black bg-opacity-75 rounded p-4">
                <h6 class="mb-4 text-light">Edit User: <?php echo e($user->name); ?></h6>
                
                <form method="POST" action="<?php echo e(route('admin.users.update', $user->id)); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label text-light">Full Name</label>
                            <input type="text" class="form-control bg-dark text-light" id="name" name="name" 
                                   value="<?php echo e(old('name', $user->name)); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label text-light">Email</label>
                            <input type="email" class="form-control bg-dark text-light" id="email" name="email"
                                   value="<?php echo e(old('email', $user->email)); ?>" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="phone" class="form-label text-light">Phone</label>
                            <input type="tel" class="form-control bg-dark text-light" id="phone" name="phone"
                                   value="<?php echo e(old('phone', $user->phone)); ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="birth_date" class="form-label text-light">Birth Date</label>
                            <input type="date" class="form-control bg-dark text-light" id="birth_date" name="birth_date"
                                   value="<?php echo e(old('birth_date', $user->birth_date ? \Carbon\Carbon::parse($user->birth_date)->format('Y-m-d') : '')); ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="gender" class="form-label text-light">Gender</label>
                            <select class="form-select bg-dark text-light" id="gender" name="gender">
                                <option value="">Select Gender</option>
                                <option value="male" <?php echo e(old('gender', $user->gender) == 'male' ? 'selected' : ''); ?>>Male</option>
                                <option value="female" <?php echo e(old('gender', $user->gender) == 'female' ? 'selected' : ''); ?>>Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="height_cm" class="form-label text-light">Height (cm)</label>
                            <input type="number" step="0.1" class="form-control bg-dark text-light" id="height_cm" name="height_cm"
                                   value="<?php echo e(old('height_cm', $user->height_cm)); ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="weight_kg" class="form-label text-light">Weight (kg)</label>
                            <input type="number" step="0.1" class="form-control bg-dark text-light" id="weight_kg" name="weight_kg"
                                   value="<?php echo e(old('weight_kg', $user->weight_kg)); ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="home_gym_id" class="form-label text-light">Home Gym</label>
                            <select class="form-select bg-dark text-light" id="home_gym_id" name="home_gym_id">
                                <option value="">No Home Gym</option>
                                <?php $__currentLoopData = $gyms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gym): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($gym->id); ?>" <?php echo e(old('home_gym_id', $user->home_gym_id) == $gym->id ? 'selected' : ''); ?>>
                                        <?php echo e($gym->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="profile_photo" class="form-label text-light">Profile Photo</label>
                            <input class="form-control bg-dark text-light" type="file" id="profile_photo" name="profile_photo">
                            <?php if($user->profile_photo_path): ?>
                                <div class="mt-2">
                                    <img src="<?php echo e(asset('storage/' . $user->profile_photo_path)); ?>" width="100" class="img-thumbnail">
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-light">Account Status</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                                       <?php echo e($user->is_active ? 'checked' : ''); ?>>
                                <label class="form-check-label text-light" for="is_active">Active User</label>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>