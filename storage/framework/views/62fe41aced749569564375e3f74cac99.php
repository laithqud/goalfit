

<?php $__env->startSection('title', 'Edit Gym'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light">Edit Gym: <?php echo e($gym->name); ?></h6>
                        <a href="<?php echo e(route('admin.gyms.index')); ?>" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Back to List
                        </a>
                    </div>

                    <form action="<?php echo e(route('admin.gyms.update', $gym->id)); ?>" method="POST" enctype="multipart/form-data" id="gymForm">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <!-- Basic Information Section -->
                        <div class="card bg-dark mb-4">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Basic Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label text-light">Gym Name *</label>
                                        <input type="text" class="form-control bg-dark text-light <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                            id="name" name="name" value="<?php echo e(old('name', $gym->name)); ?>" required>
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
                                        <input type="text" class="form-control bg-dark text-light <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                            id="phone" name="phone" value="<?php echo e(old('phone', $gym->phone)); ?>" required>
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
                                        <input type="text" class="form-control bg-dark text-light <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                            id="address" name="address" value="<?php echo e(old('address', $gym->address)); ?>" required>
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
                                        <input type="text" class="form-control bg-dark text-light <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                            id="location" name="location" value="<?php echo e(old('location', $gym->location)); ?>" required>
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
                                    <textarea class="form-control bg-dark text-light <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                        id="description" name="description" rows="3" required><?php echo e(old('description', $gym->description)); ?></textarea>
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
                            </div>
                        </div>

                        <!-- Media Section - Modified for 3 specific inputs -->
                        <div class="card bg-dark mb-4">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0">Media (Max 3 Images)</h5>
                            </div>
                            <div class="card-body">
                                <?php for($i = 1; $i <= count($gym->media); $i++): ?>
                                <div class="row mb-3">
                                    <div class="col-md-10">
                                        <label for="image_<?php echo e($i); ?>" class="form-label text-light">Image <?php echo e($i); ?></label>
                                        <input type="file" 
                                            class="form-control bg-dark text-light <?php $__errorArgs = ['images.'.$i];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                            id="image_<?php echo e($i); ?>" 
                                            name="images[<?php echo e($i); ?>]" 
                                            accept="image/*">
                                        <?php if(isset($gym->images[$i])): ?>
                                            <div class="mt-2 text-light">
                                                <small>Current: <?php echo e(basename($gym->images[$i])); ?></small>
                                                <input type="hidden" name="existing_images[<?php echo e($i); ?>]" value="<?php echo e($gym->images[$i]); ?>">
                                            </div>
                                        <?php endif; ?>
                                        <?php $__errorArgs = ['images.'.$i];
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
                                    <div class="col-md-2 d-flex align-items-end">
                                        <?php if(isset($gym->images[$i])): ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" 
                                                    id="remove_image_<?php echo e($i); ?>" 
                                                    name="remove_images[]" 
                                                    value="<?php echo e($i); ?>">
                                                <label class="form-check-label text-danger" for="remove_image_<?php echo e($i); ?>">
                                                    Remove
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <?php if(isset($gym->images[$i])): ?>
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="current-image-preview">
                                            <span class="text-light">Current Image <?php echo e($i); ?>:</span>
                                            <img src="<?php echo e(Storage::url($gym->images[$i])); ?>" 
                                                class="img-thumbnail mt-2" 
                                                style="max-height: 150px;"
                                                alt="Current Image <?php echo e($i); ?>">
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php endfor; ?>
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
                                    $defaultHours = [
                                        'is_open' => true,
                                        'open' => '08:00',
                                        'close' => '22:00',
                                        'is_24h' => false
                                    ];
                                ?>

                                <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        // Get stored hours or use defaults
                                        $hours = $gym->opening_hours[$day] ?? $defaultHours;
                                        $isOpen = isset($hours['is_open']) ? (bool)$hours['is_open'] : false;
                                        $is24h = isset($hours['is_24h']) ? (bool)$hours['is_24h'] : false;
                                    ?>

                                    <div class="row mb-3 opening-hour-row" data-day="<?php echo e($day); ?>">
                                        <div class="col-md-2">
                                            <label class="form-label text-light text-capitalize"><?php echo e(ucfirst($day)); ?></label>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-check">
                                                <input class="form-check-input is-open" type="checkbox"
                                                    name="opening_hours[<?php echo e($day); ?>][is_open]" value="1"
                                                    id="isOpen<?php echo e(ucfirst($day)); ?>" <?php echo e($isOpen ? 'checked' : ''); ?>>
                                                <label class="form-check-label text-light" for="isOpen<?php echo e(ucfirst($day)); ?>">
                                                    Open
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 time-inputs">
                                            <label class="form-label text-light">Opening Time</label>
                                            <input type="time" class="form-control bg-dark text-light opening-time"
                                                name="opening_hours[<?php echo e($day); ?>][open]"
                                                value="<?php echo e(old("opening_hours.$day.open", $hours['open'] ?? '08:00')); ?>"
                                                <?php echo e(!$isOpen || $is24h ? 'disabled' : ''); ?>>
                                        </div>
                                        <div class="col-md-3 time-inputs">
                                            <label class="form-label text-light">Closing Time</label>
                                            <input type="time" class="form-control bg-dark text-light closing-time"
                                                name="opening_hours[<?php echo e($day); ?>][close]"
                                                value="<?php echo e(old("opening_hours.$day.close", $hours['close'] ?? '22:00')); ?>"
                                                <?php echo e(!$isOpen || $is24h ? 'disabled' : ''); ?>>
                                        </div>
                                        <div class="col-md-2 time-inputs">
                                            <div class="form-check mt-4">
                                                <input class="form-check-input is-24h" type="checkbox"
                                                    name="opening_hours[<?php echo e($day); ?>][is_24h]" value="1"
                                                    id="is24h<?php echo e(ucfirst($day)); ?>" <?php echo e($is24h ? 'checked' : ''); ?>>
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
                                    <?php
                                        $facilities = $gym->facilities ?? [];
                                        $facilityIndex = 0;
                                    ?>

                                    <?php $__empty_1 = true; $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="row mb-3 facility-row">
                                            <div class="col-md-4">
                                                <label class="form-label text-light">Facility Name</label>
                                                <input type="text" class="form-control bg-dark text-light" 
                                                    name="facilities[<?php echo e($facilityIndex); ?>][name]" 
                                                    value="<?php echo e(old("facilities.$facilityIndex.name", $facility['name'] ?? '')); ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label text-light">Available</label>
                                                <select class="form-select bg-dark text-light" 
                                                    name="facilities[<?php echo e($facilityIndex); ?>][available]">
                                                    <option value="1" <?php echo e((($facility['available'] ?? true) ? 'selected' : '')); ?>>Yes</option>
                                                    <option value="0" <?php echo e(!($facility['available'] ?? true) ? 'selected' : ''); ?>>No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label text-light">Description</label>
                                                <input type="text" class="form-control bg-dark text-light" 
                                                    name="facilities[<?php echo e($facilityIndex); ?>][description]" 
                                                    value="<?php echo e(old("facilities.$facilityIndex.description", $facility['description'] ?? '')); ?>">
                                            </div>
                                            <div class="col-md-1 d-flex align-items-end">
                                                <button type="button" class="btn btn-danger remove-facility">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <?php $facilityIndex++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="row mb-3 facility-row">
                                            <div class="col-md-4">
                                                <label class="form-label text-light">Facility Name</label>
                                                <input type="text" class="form-control bg-dark text-light" 
                                                    name="facilities[0][name]">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label text-light">Available</label>
                                                <select class="form-select bg-dark text-light" 
                                                    name="facilities[0][available]">
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
                                    <?php endif; ?>
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
                                <?php
                                    $pricing = $gym->pricing ?? ['monthly' => 49.99, 'yearly' => 149.99];
                                ?>

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
                                                name="pricing[monthly]" 
                                                value="<?php echo e(old('pricing.monthly', $pricing['monthly'] ?? '49.99')); ?>" 
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
                                                name="pricing[yearly]" 
                                                value="<?php echo e(old('pricing.yearly', $pricing['yearly'] ?? '149.99')); ?>" 
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
                                    <input class="form-check-input" type="checkbox" role="switch" 
                                        id="is_active" name="is_active" value="1"
                                        <?php echo e(old('is_active', $gym->is_active) ? 'checked' : ''); ?>>
                                    <label class="form-check-label text-light" for="is_active">Active</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Update Gym
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

<?php $__env->startPush('styles'); ?>
<style>
    .current-image-preview {
        background-color: #2a3038;
        padding: 10px;
        border-radius: 5px;
        margin-top: 5px;
    }
    .img-thumbnail {
        background-color: #1a1e21;
        border: 1px solid #444;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle 24h checkbox for opening hours
        document.querySelectorAll('.is-24h').forEach(checkbox => {
            checkbox.dispatchEvent(new Event('change'));
            
            checkbox.addEventListener('change', function() {
                const row = this.closest('.opening-hour-row');
                const timeInputs = row.querySelectorAll('.opening-time, .closing-time');
                
                timeInputs.forEach(input => {
                    input.disabled = this.checked;
                });
            });
        });

        // Add new facility row
        let facilityCounter = <?php echo e(count($gym->facilities ?? [])); ?>;
        document.getElementById('add-facility').addEventListener('click', function() {
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
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-facility') || 
                e.target.closest('.remove-facility')) {
                const btn = e.target.classList.contains('remove-facility') ? 
                    e.target : e.target.closest('.remove-facility');
                btn.closest('.facility-row').remove();
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.dashboard.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/admin/gyms/edit.blade.php ENDPATH**/ ?>