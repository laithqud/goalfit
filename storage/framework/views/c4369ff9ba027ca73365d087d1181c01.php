

<?php $__env->startSection('title', 'Video Management'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-black bg-opacity-75 rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0 text-light">Video Library</h6>
                        <a href="<?php echo e(route('admin.videos.create')); ?>

                                                                                                                                                                                                                                                     "
                            class="btn btn-sm btn-primary">
                            <i class="fas fa-plus me-1"></i> Add New Video
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

                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Instructions</th>
                                    <th scope="col">Video-URL</th>
                                    <th scope="col">Difficulty</th>
                                    <th scope="col">reps</th>
                                    <th scope="col">sets</th>
                                    <th scope="col">Equipment Needed</th>
                                    <th scope="col">Target Muscles</th>
                                    <th scope="col">Durations/minutes</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Created by</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($video->id); ?></td>
                                        <td class="text-truncate" style="max-width: 150px;">
                                            <?php echo e($video->name ?? 'No name'); ?>

                                        </td>
                                        <td class="text-truncate" style="max-width: 200px;">
                                            <?php echo e($video->instructions ?? 'No instructions'); ?>

                                        </td>
                                        <td class="text-truncate" style="max-width: 200px;">
                                            <?php echo e($video->video ?? 'No video'); ?>

                                        </td>
                                        <td><?php echo e($video->difficulty ?? 'No difficulty'); ?></td>
                                        <td><?php echo e($video->recommended_reps); ?></td>
                                        <td><?php echo e($video->recommended_sets); ?></td>
                                        <td>
                                            <?php
                                                // Handle equipment_needed
                                                try {
                                                    $equipment = is_string($video->equipment_needed)
                                                        ? json_decode(str_replace('\"', '"', $video->equipment_needed), true)
                                                        : $video->equipment_needed;

                                                    if (!is_array($equipment)) {
                                                        $equipment = [];
                                                    }
                                                } catch (Exception $e) {
                                                    $equipment = [];
                                                }
                                            ?>

                                            <?php if(!empty($equipment)): ?>
                                                <?php echo e(is_array($equipment) ? implode(', ', $equipment) : $equipment); ?>

                                            <?php else: ?>
                                                <span class="text-muted">No equipment needed</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php
                                                // Handle target_muscles
                                                try {
                                                    $targetMuscles = is_string($video->target_muscles)
                                                        ? json_decode(str_replace('\"', '"', $video->target_muscles), true)
                                                        : $video->target_muscles;

                                                    if (is_array($targetMuscles)) {
                                                        $primaryMuscles = $targetMuscles['primary'] ?? [];
                                                        $secondaryMuscles = $targetMuscles['secondary'] ?? [];
                                                    } else {
                                                        $primaryMuscles = [];
                                                        $secondaryMuscles = [];
                                                    }
                                                } catch (Exception $e) {
                                                    $primaryMuscles = [];
                                                    $secondaryMuscles = [];
                                                }
                                            ?>

                                            <?php if(!empty($primaryMuscles) || !empty($secondaryMuscles)): ?>
                                                <?php if(!empty($primaryMuscles)): ?>
                                                    <strong>Primary:</strong>
                                                    <?php echo e(is_array($primaryMuscles) ? implode(', ', $primaryMuscles) : $primaryMuscles); ?><br>
                                                <?php endif; ?>
                                                <?php if(!empty($secondaryMuscles)): ?>
                                                    <strong>Secondary:</strong>
                                                    <?php echo e(is_array($secondaryMuscles) ? implode(', ', $secondaryMuscles) : $secondaryMuscles); ?>

                                                <?php endif; ?>
                                            <?php else: ?>
                                                <span class="text-muted">No target muscles specified</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php
                                                // Handle durations_in_minutes
                                                try {
                                                    $durations = is_string($video->durations_in_minutes)
                                                        ? json_decode(str_replace('\"', '"', $video->durations_in_minutes), true)
                                                        : $video->durations_in_minutes;

                                                    if (!is_array($durations)) {
                                                        $durations = [
                                                            'warmup' => null,
                                                            'exercise' => null,
                                                            'cooldown' => null
                                                        ];
                                                    }
                                                } catch (Exception $e) {
                                                    $durations = [
                                                        'warmup' => null,
                                                        'exercise' => null,
                                                        'cooldown' => null
                                                    ];
                                                }
                                            ?>

                                            <div class="durations-container">
                                                <?php if($durations['warmup']): ?>
                                                    <div><small>Warmup:</small> <?php echo e($durations['warmup']); ?> min</div>
                                                <?php endif; ?>
                                                <?php if($durations['exercise']): ?>
                                                    <div><small>Exercise:</small> <?php echo e($durations['exercise']); ?> min</div>
                                                <?php endif; ?>
                                                <?php if($durations['cooldown']): ?>
                                                    <div><small>Cooldown:</small> <?php echo e($durations['cooldown']); ?> min</div>
                                                <?php endif; ?>
                                                <?php if(empty(array_filter($durations))): ?>
                                                    <span class="text-muted">No durations set</span>
                                                <?php endif; ?>
                                            </div>
                                        </td>

                                        <td><?php echo e($video->category->name ?? 'No category'); ?></td>
                                        <td><?php echo e($video->created_by ?? 'No creator'); ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="<?php echo e(route('admin.videos.edit', $video->id)); ?>"
                                                    class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form
                                                    action="
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <?php echo e(route('admin.videos.destroy', $video->id)); ?>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "
                                                    method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this video?')">
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
    
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.dashboard.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/admin/videos/index.blade.php ENDPATH**/ ?>