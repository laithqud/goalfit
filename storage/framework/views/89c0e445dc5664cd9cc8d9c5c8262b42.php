

<?php $__env->startSection('title', 'Edit Workout'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-black bg-opacity-75 rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0 text-light">Edit Workout</h6>
                    <a href="<?php echo e(route('admin.videos.index')); ?>" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Back
                    </a>
                </div>

                <form method="POST" action="<?php echo e(route('admin.videos.update', $video->id)); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <?php
                        // Decode JSON fields with proper fallbacks
                        $targetMuscles = json_decode($video->target_muscles, true) ?? ['primary' => [], 'secondary' => []];
                        $equipment = json_decode($video->equipment_needed, true) ?? [];
                        $durations = json_decode($video->durations_in_minutes, true) ?? [
                            'warmup' => 0,
                            'exercise' => 0,
                            'cooldown' => 0
                        ];
                    ?>

                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label text-light">Workout Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control bg-dark text-light <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="name" name="name" value="<?php echo e(old('name', $video->name)); ?>" required maxlength="191">
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
                    </div>

                    <div class="row mb-3">
                        <label for="instructions" class="col-sm-2 col-form-label text-light">Instructions</label>
                        <div class="col-sm-10">
                            <textarea class="form-control bg-dark text-light <?php $__errorArgs = ['instructions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                      id="instructions" name="instructions" rows="5"><?php echo e(old('instructions', $video->instructions)); ?></textarea>
                            <?php $__errorArgs = ['instructions'];
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
                        <label for="video_url" class="col-sm-2 col-form-label text-light">Video Embed Code</label>
                        <div class="col-sm-10">
                            <textarea class="form-control bg-dark text-light <?php $__errorArgs = ['video_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                      id="video_url" name="video_url" rows="3" required><?php echo e(old('video_url', $video->video_url)); ?></textarea>
                            <?php $__errorArgs = ['video_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <small class="text-muted">Paste full iframe embed code (e.g., YouTube iframe)</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="difficulty" class="col-sm-2 col-form-label text-light">Difficulty</label>
                        <div class="col-sm-10">
                            <select class="form-select bg-dark text-light <?php $__errorArgs = ['difficulty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    id="difficulty" name="difficulty" required>
                                <option value="">Select Difficulty</option>
                                <option value="beginner" <?php echo e(old('difficulty', $video->difficulty) == 'beginner' ? 'selected' : ''); ?>>Beginner</option>
                                <option value="intermediate" <?php echo e(old('difficulty', $video->difficulty) == 'intermediate' ? 'selected' : ''); ?>>Intermediate</option>
                                <option value="advanced" <?php echo e(old('difficulty', $video->difficulty) == 'advanced' ? 'selected' : ''); ?>>Advanced</option>
                            </select>
                            <?php $__errorArgs = ['difficulty'];
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
                        <label for="recommended_reps" class="col-sm-2 col-form-label text-light">Recommended Reps</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control bg-dark text-light <?php $__errorArgs = ['recommended_reps'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="recommended_reps" name="recommended_reps" value="<?php echo e(old('recommended_reps', $video->recommended_reps)); ?>" min="0" max="255">
                            <?php $__errorArgs = ['recommended_reps'];
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
                        <label for="recommended_sets" class="col-sm-2 col-form-label text-light">Recommended Sets</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control bg-dark text-light <?php $__errorArgs = ['recommended_sets'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   id="recommended_sets" name="recommended_sets" value="<?php echo e(old('recommended_sets', $video->recommended_sets)); ?>" min="0" max="255">
                            <?php $__errorArgs = ['recommended_sets'];
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
                        <label class="col-sm-2 col-form-label text-light">Target Muscles</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="text-light">Primary Muscles</h6>
                                    <?php $__currentLoopData = ['chest', 'back', 'shoulders', 'arms', 'legs', 'abs', 'glutes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $muscle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" 
                                                   id="primary_<?php echo e($muscle); ?>" name="primary_muscles[]" 
                                                   value="<?php echo e($muscle); ?>" <?php echo e(in_array($muscle, old('primary_muscles', $targetMuscles['primary'] ?? [])) ? 'checked' : ''); ?>>
                                            <label class="form-check-label text-light" for="primary_<?php echo e($muscle); ?>">
                                                <?php echo e(ucfirst($muscle)); ?>

                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-light">Secondary Muscles</h6>
                                    <?php $__currentLoopData = ['chest', 'back', 'shoulders', 'arms', 'legs', 'abs', 'glutes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $muscle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" 
                                                   id="secondary_<?php echo e($muscle); ?>" name="secondary_muscles[]" 
                                                   value="<?php echo e($muscle); ?>" <?php echo e(in_array($muscle, old('secondary_muscles', $targetMuscles['secondary'] ?? [])) ? 'checked' : ''); ?>>
                                            <label class="form-check-label text-light" for="secondary_<?php echo e($muscle); ?>">
                                                <?php echo e(ucfirst($muscle)); ?>

                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <?php $__errorArgs = ['target_muscles'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-light">Equipment Needed</label>
                        <div class="col-sm-10">
                            <?php $__currentLoopData = ['dumbbells', 'yoga_mat', 'resistance_bands', 'kettlebell', 'pull_up_bar']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipmentItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" 
                                           id="equipment_<?php echo e($equipmentItem); ?>" name="equipment_needed[]" 
                                           value="<?php echo e($equipmentItem); ?>" <?php echo e(in_array($equipmentItem, old('equipment_needed', $equipment ?? [])) ? 'checked' : ''); ?>>
                                    <label class="form-check-label text-light" for="equipment_<?php echo e($equipmentItem); ?>">
                                        <?php echo e(ucfirst(str_replace('_', ' ', $equipmentItem))); ?>

                                    </label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__errorArgs = ['equipment_needed'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label text-light">Durations (minutes)</label>
                        <div class="col-sm-10">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="warmup" class="form-label text-light">Warmup</label>
                                    <input type="number" class="form-control bg-dark text-light <?php $__errorArgs = ['durations.warmup'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="warmup" name="durations[warmup]" value="<?php echo e(old('durations.warmup', $durations['warmup'] ?? 0)); ?>" min="0">
                                    <?php $__errorArgs = ['durations.warmup'];
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
                                <div class="col-md-4">
                                    <label for="exercise" class="form-label text-light">Exercise</label>
                                    <input type="number" class="form-control bg-dark text-light <?php $__errorArgs = ['durations.exercise'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="exercise" name="durations[exercise]" value="<?php echo e(old('durations.exercise', $durations['exercise'] ?? 0)); ?>" min="0">
                                    <?php $__errorArgs = ['durations.exercise'];
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
                                <div class="col-md-4">
                                    <label for="cooldown" class="form-label text-light">Cooldown</label>
                                    <input type="number" class="form-control bg-dark text-light <?php $__errorArgs = ['durations.cooldown'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                           id="cooldown" name="durations[cooldown]" value="<?php echo e(old('durations.cooldown', $durations['cooldown'] ?? 0)); ?>" min="0">
                                    <?php $__errorArgs = ['durations.cooldown'];
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
                    </div>

                    <div class="row mb-3">
                        <label for="category_id" class="col-sm-2 col-form-label text-light">Category</label>
                        <div class="col-sm-10">
                            <select class="form-select bg-dark text-light <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    id="category_id" name="category_id" required>
                                <option value="">Select Category</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id', $video->category_id) == $category->id ? 'selected' : ''); ?>>
                                        <?php echo e($category->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['category_id'];
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
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_premium" 
                                       name="is_premium" value="1" <?php echo e(old('is_premium', $video->is_premium) ? 'checked' : ''); ?>>
                                <label class="form-check-label text-light" for="is_premium">
                                    Premium Content (Only for paid members)
                                </label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="created_by" value="<?php echo e(auth()->id()); ?>">

                    <div class="row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Update Workout</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize any needed JavaScript here
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.dashboard.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/admin/videos/edit.blade.php ENDPATH**/ ?>