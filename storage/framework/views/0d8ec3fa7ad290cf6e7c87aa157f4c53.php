

<?php $__env->startSection('title', 'Add New Gym'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light">Add New Gym</h6>
                        <a href="<?php echo e(route('admin.gyms.index')); ?>" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Back to List
                        </a>
                    </div>

                    <form action="<?php echo e(route('admin.gyms.store')); ?>" method="POST" enctype="multipart/form-data" id="gymForm">
                        <?php echo csrf_field(); ?>

                        <!-- Basic Information Section -->
                        <div class="card bg-dark mb-4">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Basic Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label text-light">Gym Name *</label>
                                        <input type="text"
                                            class="form-control bg-dark text-light <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="name" name="name" value="<?php echo e(old('name')); ?>" required>
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label text-light">Contact Number *</label>
                                        <input type="text"
                                            class="form-control bg-dark text-light <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="phone" name="phone" value="<?php echo e(old('phone')); ?>" required>
                                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="address" class="form-label text-light">Address *</label>
                                        <input type="text"
                                            class="form-control bg-dark text-light <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="address" name="address" value="<?php echo e(old('address')); ?>" required>
                                        <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="location" class="form-label text-light">Location (City/Area) *</label>
                                        <input type="text"
                                            class="form-control bg-dark text-light <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="location" name="location" value="<?php echo e(old('location')); ?>" required>
                                        <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label text-light">Description *</label>
                                    <textarea
                                        class="form-control bg-dark text-light <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="description" name="description" rows="3"
                                        required><?php echo e(old('description')); ?></textarea>
                                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <!-- Media Section -->
                                <div class="card bg-dark mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <h5 class="mb-0">Media (Max 3 Images)</h5>
                                    </div>
                                    <div class="card-body">
                                        <?php for($i = 1; $i <= 3; $i++): ?>
                                            <div class="row mb-3">
                                                <div class="col-md-10">
                                                    <label for="image_<?php echo e($i); ?>" class="form-label text-light">Image
                                                        <?php echo e($i); ?></label>
                                                    <input type="file"
                                                        class="form-control bg-dark text-light <?php $__errorArgs = ['images.' . $i];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="image_<?php echo e($i); ?>" name="images[<?php echo e($i); ?>]" accept="image/*">
                                                    <?php $__errorArgs = ['images.' . $i];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Opening Hours Section -->
                        <div class="card bg-dark mb-4">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Opening Hours</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                    $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
                                ?>

                                <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row mb-3 opening-hour-row" data-day="<?php echo e($day); ?>">
                                        <div class="col-md-2">
                                            <label class="form-label text-light text-capitalize"><?php echo e(ucfirst($day)); ?></label>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label text-light">Opening Time</label>
                                            <input type="time" class="form-control bg-dark text-light opening-time"
                                                name="opening_hours[<?php echo e($day); ?>][open]"
                                                value="<?php echo e(old("opening_hours.$day.open", '08:00')); ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label text-light">Closing Time</label>
                                            <input type="time" class="form-control bg-dark text-light closing-time"
                                                name="opening_hours[<?php echo e($day); ?>][close]"
                                                value="<?php echo e(old("opening_hours.$day.close", '22:00')); ?>">
                                        </div>
                                        <div class="col-md-2 d-flex align-items-end">
                                            <div class="form-check">
                                                <input class="form-check-input is-24h" type="checkbox"
                                                    name="opening_hours[<?php echo e($day); ?>][is_24h]" value="1"
                                                    id="is24h<?php echo e(ucfirst($day)); ?>">
                                                <label class="form-check-label text-light" for="is24h<?php echo e(ucfirst($day)); ?>">
                                                    24 Hours
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <!-- Facilities Section -->
                        <div class="card bg-dark mb-4">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Facilities</h5>
                            </div>
                            <div class="card-body">
                                <div id="facilities-container">
                                    <div class="row mb-3 facility-row">
                                        <div class="col-md-4">
                                            <label class="form-label text-light">Facility Name</label>
                                            <input type="text" class="form-control bg-dark text-light"
                                                name="facilities[0][name]">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label text-light">Available</label>
                                            <select class="form-select bg-dark text-light" name="facilities[0][available]">
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label text-light">Description</label>
                                            <input type="text" class="form-control bg-dark text-light"
                                                name="facilities[0][description]">
                                        </div>
                                        <div class="col-md-1 d-flex align-items-end">
                                            <button type="button" class="btn btn-danger remove-facility">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="add-facility" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-plus me-1"></i> Add Facility
                                </button>
                            </div>
                        </div>

                        <!-- Pricing Section -->
                        <div class="card bg-dark mb-4">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Pricing</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label text-light">Monthly Price *</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" step="0.01"
                                                class="form-control bg-dark text-light <?php $__errorArgs = ['pricing.monthly'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="pricing[monthly]" value="<?php echo e(old('pricing.monthly', '49.99')); ?>"
                                                required>
                                            <?php $__errorArgs = ['pricing.monthly'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <small class="text-muted">Price per month in USD</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-light">Yearly Price *</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" step="0.01"
                                                class="form-control bg-dark text-light <?php $__errorArgs = ['pricing.yearly'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                name="pricing[yearly]" value="<?php echo e(old('pricing.yearly', '149.99')); ?>"
                                                required>
                                            <?php $__errorArgs = ['pricing.yearly'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <small class="text-muted">Price per year in USD</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status Section -->
                        <div class="card bg-dark mb-4">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Status</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="is_active"
                                        name="is_active" value="1" checked>
                                    <label class="form-check-label text-light" for="is_active">Active</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Save Gym
                            </button>
                            <a href="<?php echo e(route('admin.gyms.index')); ?>" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Handle 24h checkbox for opening hours
            document.querySelectorAll('.is-24h').forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    const row = this.closest('.opening-hour-row');
                    const timeInputs = row.querySelectorAll('.opening-time, .closing-time');

                    timeInputs.forEach(input => {
                        input.disabled = this.checked;
                        if (this.checked) {
                            input.value = '';
                        } else {
                            // Set default values if needed
                            const day = row.dataset.day;
                            if (input.classList.contains('opening-time')) {
                                input.value = '08:00';
                            } else {
                                input.value = '22:00';
                            }
                        }
                    });
                });
            });

            // Add new facility row
            let facilityCounter = 1;
            document.getElementById('add-facility').addEventListener('click', function () {
                const container = document.getElementById('facilities-container');
                const newRow = document.createElement('div');
                newRow.className = 'row mb-3 facility-row';
                newRow.innerHTML = `
                                <div class="col-md-4">
                                    <input type="text" class="form-control bg-dark text-light" 
                                        name="facilities[${facilityCounter}][name]">
                                </div>
                                <div class="col-md-3">
                                    <select class="form-select bg-dark text-light" 
                                        name="facilities[${facilityCounter}][available]">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control bg-dark text-light" 
                                        name="facilities[${facilityCounter}][description]">
                                </div>
                                <div class="col-md-1 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger remove-facility">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            `;
                container.appendChild(newRow);
                facilityCounter++;
            });

            // Remove facility row
            document.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-facility') ||
                    e.target.closest('.remove-facility')) {
                    const btn = e.target.classList.contains('remove-facility') ?
                        e.target : e.target.closest('.remove-facility');
                    btn.closest('.facility-row').remove();
                }
            });

            // Form submission handling
            document.getElementById('gymForm').addEventListener('submit', function (e) {
                // You can add additional validation here if needed
                // The form will automatically serialize the arrays/objects properly
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.dashboard.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/admin/gyms/create.blade.php ENDPATH**/ ?>