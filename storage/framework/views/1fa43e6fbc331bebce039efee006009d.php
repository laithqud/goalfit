

<?php $__env->startSection('title', 'GoalFit - Edit Profile'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container py-5" style="background-color: #121212;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg" style="background-color: #1e1e1e;">
                    <div class="card-header bg-transparent border-bottom border-secondary">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="text-white mb-0">
                                <i class="fas fa-user-edit me-2"></i> Edit Profile
                            </h2>
                            <a href="<?php echo e(route('profile')); ?>" class="btn btn-sm btn-outline-light">
                                <i class="fas fa-arrow-left me-1"></i> Back to Profile
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('profile.update')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <!-- Profile Photo Section -->
                            <div class="row mb-4">
                                <div class="col-md-4 text-center">
                                    <div class="position-relative mx-auto" style="width: 150px;">
                                        <img id="profilePhotoPreview"
                                            src="<?php echo e(Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) : asset('images/default-profile.jpg')); ?>"
                                            class="rounded-circle border border-secondary" width="150" height="150"
                                            alt="Profile Photo">
                                        <label for="profile_photo"
                                            class="position-absolute bottom-0 end-0 bg-primary rounded-circle p-2"
                                            style="width: 40px; height: 40px; cursor: pointer;">
                                            <i class="fas fa-camera text-white"></i>
                                        </label>
                                        <input type="file" id="profile_photo" name="profile_photo" class="d-none"
                                            accept="image/*">
                                    </div>
                                    <?php $__errorArgs = ['profile_photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger small"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-8 d-flex flex-column justify-content-center">
                                    <h4 class="text-white"><?php echo e(Auth::user()->name); ?></h4>
                                    <p class="text-muted"><?php echo e(Auth::user()->email); ?></p>
                                    <div class="d-flex gap-2 flex-wrap">
                                        <span class="badge bg-dark text-white px-3 py-1">
                                            Member since <?php echo e(Auth::user()->created_at->format('M Y')); ?>

                                        </span>
                                        <?php if(Auth::user()->homeGym): ?>
                                            <span class="badge bg-dark text-white px-3 py-1">
                                                <i class="fas fa-dumbbell me-1"></i>
                                                <?php echo e(Auth::user()->homeGym->name); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Personal Information Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="text-white mb-3 border-bottom border-secondary pb-2">
                                        <i class="fas fa-id-card me-2"></i> Personal Information
                                    </h5>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label text-white">Full Name</label>
                                    <input type="text" class="form-control bg-dark text-white border-secondary" id="name"
                                        name="name" value="<?php echo e(old('name', Auth::user()->name)); ?>" required>
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger small"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label text-white">Email Address</label>
                                    <input type="email" class="form-control bg-dark text-white border-secondary" id="email"
                                        name="email" value="<?php echo e(old('email', Auth::user()->email)); ?>" required>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger small"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label text-white">Phone Number</label>
                                    <input type="tel" class="form-control bg-dark text-white border-secondary" id="phone"
                                        name="phone" value="<?php echo e(old('phone', Auth::user()->phone)); ?>">
                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger small"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="birth_date" class="form-label text-white">Date of Birth</label>
                                    <input type="date" class="form-control bg-dark text-white border-secondary"
                                        id="birth_date" name="birth_date" value="">
                                    <?php $__errorArgs = ['birth_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger small"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-white">Gender</label>
                                    <div class="d-flex gap-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="gender_male"
                                                value="male" <?php echo e(old('gender', Auth::user()->gender) == 'male' ? 'checked' : ''); ?>>
                                            <label class="form-check-label text-white" for="gender_male">Male</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender" id="gender_female"
                                                value="female" <?php echo e(old('gender', Auth::user()->gender) == 'female' ? 'checked' : ''); ?>>
                                            <label class="form-check-label text-white" for="gender_female">Female</label>
                                        </div>
                                    </div>
                                    <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger small"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>


                            </div>

                            <!-- Health Metrics Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="text-white mb-3 border-bottom border-secondary pb-2">
                                        <i class="fas fa-heartbeat me-2"></i> Health Metrics
                                    </h5>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="height_cm" class="form-label text-white">Height (cm)</label>
                                    <input type="number" step="0.1" class="form-control bg-dark text-white border-secondary"
                                        id="height_cm" name="height_cm"
                                        value="<?php echo e(old('height_cm', Auth::user()->height_cm)); ?>">
                                    <?php $__errorArgs = ['height_cm'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger small"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="weight_kg" class="form-label text-white">Weight (kg)</label>
                                    <input type="number" step="0.1" class="form-control bg-dark text-white border-secondary"
                                        id="weight_kg" name="weight_kg"
                                        value="<?php echo e(old('weight_kg', Auth::user()->weight_kg)); ?>">
                                    <?php $__errorArgs = ['weight_kg'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger small"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <!-- Password Update Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="text-white mb-3 border-bottom border-secondary pb-2">
                                        <i class="fas fa-lock me-2"></i> Password Update
                                    </h5>
                                    <p class="text-muted small">Leave these fields blank if you don't want to change your
                                        password</p>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="current_password" class="form-label text-white">Current Password</label>
                                    <input type="password" class="form-control bg-dark text-white border-secondary"
                                        id="current_password" name="current_password">
                                    <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger small"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="new_password" class="form-label text-white">New Password</label>
                                    <input type="password" class="form-control bg-dark text-white border-secondary"
                                        id="new_password" name="new_password">
                                    <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="text-danger small"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="new_password_confirmation" class="form-label text-white">Confirm
                                        Password</label>
                                    <input type="password" class="form-control bg-dark text-white border-secondary"
                                        id="new_password_confirmation" name="new_password_confirmation">
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="row">
                                <div class="col-12 d-flex justify-content-between">
                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteAccountModal">
                                        <i class="fas fa-trash-alt me-1"></i> Delete Account
                                    </button>
                                    <button type="submit" class="btn px-4"
                                        style="background-color: #4d0909; color: #ffffff;">
                                        <i class="fas fa-save me-1"></i> Save Changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Account Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #1e1e1e; color: white;">
                <div class="modal-header border-bottom border-secondary">
                    <h5 class="modal-title" id="deleteAccountModalLabel">Confirm Account Deletion</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete your account? This action cannot be undone.</p>
                    <p class="text-danger"><strong>Warning:</strong> All your data, including workout history and gym
                        memberships, will be permanently deleted.</p>
                    <form id="deleteAccountForm" method="POST" action="<?php echo e(route('profile.destroy')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <div class="mb-3">
                            <label for="delete_password" class="form-label text-white">Enter your password to
                                confirm</label>
                            <input type="password" class="form-control bg-dark text-white border-secondary"
                                id="delete_password" name="password" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-top border-secondary">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="deleteAccountForm" class="btn btn-danger">
                        <i class="fas fa-trash-alt me-1"></i> Delete Account
                    </button>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        // Profile photo preview
        document.getElementById('profile_photo').addEventListener('change', function (e) {
            const [file] = e.target.files;
            if (file) {
                document.getElementById('profilePhotoPreview').src = URL.createObjectURL(file);
            }
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function (e) {
            const newPassword = document.getElementById('new_password').value;
            const confirmPassword = document.getElementById('new_password_confirmation').value;

            if (newPassword || confirmPassword) {
                const currentPassword = document.getElementById('current_password').value;
                if (!currentPassword) {
                    e.preventDefault();
                    alert('Please enter your current password to change it.');
                    document.getElementById('current_password').focus();
                } else if (newPassword !== confirmPassword) {
                    e.preventDefault();
                    alert('New password and confirmation do not match.');
                    document.getElementById('new_password_confirmation').focus();
                }
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.public.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/public/edit-profile.blade.php ENDPATH**/ ?>