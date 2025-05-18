

<?php $__env->startSection('title', 'Workout List - GoalFit'); ?>

<?php $__env->startSection('content'); ?>
    <section class="container p-3 border rounded bg-secondary" style="margin-top:120px; margin-bottom: 25px;">
        <!-- Workout Display Area -->
        <div id="workoutDisplay" class="row g-4 mb-4 border rounded overflow-hidden"
            style="background-color: #f8f9fa; margin-top: 5px;">
            <div class="col-lg-6 p-0">
                <div id="videoContainer" class="position-relative" style="height: 100%; min-height: 300px;">
                    <!-- Video will be inserted here by JavaScript -->
                </div>
            </div>

            <!-- Workout Details -->
            <div class="col-lg-6 p-4 d-flex flex-column">
                <h2 id="workoutTitle" class="fw-bold mb-1 fs-4">Select a Workout</h2>
                <p id="workoutTrainer" class="text-muted mb-2">With Trainer</p>
                <div class="d-flex align-items-center mb-3">
                    <div class="text-warning me-2">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        <i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    </div>
                    <small class="text-muted">(128 reviews)</small>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold mb-3">Workout Details</h5>
                    <div class="row">
                        <div class="col-4 mb-3">
                            <div class="bg-white p-2 rounded text-center">
                                <small class="text-muted d-block">Sets</small>
                                <strong class="fs-5" id="workoutSets">N/A</strong>
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="bg-white p-2 rounded text-center">
                                <small class="text-muted d-block">Reps</small>
                                <strong class="fs-5" id="workoutReps">N/A</strong>
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="bg-white p-2 rounded text-center">
                                <small class="text-muted d-block">Difficulty</small>
                                <strong class="fs-5 text-capitalize" id="workoutDifficulty">N/A</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold mb-2">Workout instructions</h5>
                    <p id="workoutInstructions" class="text-muted">Select a workout to view instructions.</p>
                    <div id="equipmentSection" class="mb-3 d-none">
                        <h6 class="fw-bold mt-3 mb-2">Equipment Needed</h6>
                        <div id="equipmentList" class="d-flex flex-wrap gap-2"></div>
                    </div>
                    <div id="musclesSection" class="mb-3 d-none">
                        <h6 class="fw-bold mb-2">Target Muscles</h6>
                        <div class="d-flex flex-wrap gap-2">
                            <div id="primaryMuscles" class="d-flex flex-wrap gap-2"></div>
                            <div id="secondaryMuscles" class="d-flex flex-wrap gap-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Workout Session Videos List -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <h4 class="mb-0 fw-bold">Your Workout Session</h4>
                        <p class="text-muted mb-0"><?php echo e($workoutItems->count()); ?> exercises</p>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            <?php $__currentLoopData = $workoutItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="javascript:void(0)"
                                    class="list-group-item list-group-item-action workout-item <?php echo e($loop->first ? 'active-workout' : ''); ?>"
                                    onclick="loadWorkoutDetails(
                                                                                                                                                                                                                        <?php echo e($workout->id); ?>, 
                                                                                                                                                                                                                        '<?php echo e(addslashes($workout->name)); ?>', 
                                                                                                                                                                                                                        '<?php echo e($workout->difficulty); ?>', 
                                                                                                                                                                                                                        <?php echo e($workout->recommended_sets ?? 'null'); ?>, 
                                                                                                                                                                                                                        <?php echo e($workout->recommended_reps ?? 'null'); ?>, 
                                                                                                                                                                                                                        '<?php echo e($workout->video); ?>', 
                                                                                                                                                                                                                        '<?php echo e(json_encode($workout->equipment_needed)); ?>', 
                                                                                                                                                                                                                        '<?php echo e(json_encode($workout->target_muscles)); ?>', 
                                                                                                                                                                                                                        '<?php echo e(addslashes($workout->instructions)); ?>',
                                                                                                                                                                                                                        '<?php echo e($workout->createdBy->name ?? 'Trainer'); ?>'
                                                                                                                                                                                                                    )">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                <div class="<?php echo e($loop->first ? 'bg-danger' : 'bg-secondary'); ?> bg-opacity-10 <?php echo e($loop->first ? 'text-danger' : 'text-secondary'); ?> rounded-circle d-flex align-items-center justify-content-center"
                                                    style="width: 40px; height: 40px;">
                                                    <i class="fas fa-<?php echo e($loop->first ? 'play' : 'dumbbell'); ?>"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 <?php echo e($loop->first ? 'fw-bold' : ''); ?>"><?php echo e($workout->name); ?></h6>
                                                <small class="text-muted">
                                                    <?php if($workout->durations_in_minutes): ?>
                                                        <?php echo e($workout->durations_in_minutes['exercise'] ?? 'N/A'); ?> min
                                                    <?php else: ?>
                                                        N/A
                                                    <?php endif; ?>
                                                </small>
                                            </div>
                                        </div>
                                        <div>
                                            <span
                                                class="badge bg-light text-dark"><?php echo e($loop->first ? 'Now Playing' : 'Up Next'); ?></span>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        .workout-card {
            transition: all 0.3s ease;
        }

        video,
        iframe {
            background-color: #000;
            border: none;
        }

        .badge {
            padding: 0.35em 0.65em;
            font-weight: 500;
        }

        .list-group-item {
            padding: 1rem 1.25rem;
            border-left: 0;
            border-right: 0;
            cursor: pointer;
        }

        .list-group-item:first-child {
            border-top: 0;
        }

        .list-group-item:last-child {
            border-bottom: 0;
        }

        .active-workout {
            background-color: #f8f9fa;
        }

        .active-workout h6 {
            font-weight: bold;
        }

        .equipment-badge {
            background-color: #e9ecef;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
        }

        .muscle-badge {
            background-color: #f8d7da;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
        }

        .secondary-muscle-badge {
            background-color: #fff3cd;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        function loadWorkoutDetails(id, name, difficulty, sets, reps, video, equipmentNeeded, targetMuscles, instructions, trainerName) {
            const workoutItems = document.querySelectorAll('.workout-item');

            workoutItems.forEach(item => {
                item.classList.remove('active-workout');

                const itemTitle = item.querySelector('h6');
                if (itemTitle) itemTitle.classList.remove('fw-bold');

                const iconContainer = item.querySelector('.rounded-circle');
                if (iconContainer) {
                    iconContainer.classList.remove('bg-danger', 'text-danger');
                    iconContainer.classList.add('bg-secondary', 'text-secondary');
                }

                const icon = item.querySelector('.rounded-circle i');
                if (icon) {
                    icon.classList.remove('fa-play');
                    icon.classList.add('fa-dumbbell');
                }

                const badge = item.querySelector('.badge');
                if (badge) badge.textContent = 'Up Next';
            });

            const clickedItem = document.querySelector(`.workout-item[onclick*="${id}"]`);
            if (clickedItem) {
                clickedItem.classList.add('active-workout');

                const clickedTitle = clickedItem.querySelector('h6');
                if (clickedTitle) clickedTitle.classList.add('fw-bold');

                const clickedIconContainer = clickedItem.querySelector('.rounded-circle');
                if (clickedIconContainer) {
                    clickedIconContainer.classList.remove('bg-secondary', 'text-secondary');
                    clickedIconContainer.classList.add('bg-danger', 'text-danger');
                }

                const clickedIcon = clickedItem.querySelector('.rounded-circle i');
                if (clickedIcon) {
                    clickedIcon.classList.remove('fa-dumbbell');
                    clickedIcon.classList.add('fa-play');
                }

                const clickedBadge = clickedItem.querySelector('.badge');
                if (clickedBadge) clickedBadge.textContent = 'Now Playing';
            }

            document.getElementById('workoutTitle').textContent = name;
            document.getElementById('workoutTrainer').textContent = `With Trainer ${trainerName}`;
            document.getElementById('workoutDifficulty').textContent = difficulty;
            document.getElementById('workoutSets').textContent = sets || 'N/A';
            document.getElementById('workoutReps').textContent = reps || 'N/A';

            let formattedInstructions = '';
            if (instructions) {
                const steps = instructions
                    .split(/(?=\d+\.\s)/)
                    .map(step => step.replace(/,\s*$/, ''))
                    .map(step => step.trim());

                formattedInstructions = steps.join('<br>');

                document.getElementById('workoutInstructions').innerHTML = formattedInstructions;
            } else {
                document.getElementById('workoutInstructions').textContent = 'No instructions provided.';
            }

            const videoContainer = document.getElementById('videoContainer');
            if (video) {

                const videoPath = `/storage/${video}`;
                const fallbackPath = `/images/Biceps.mp4`;

                fetch(videoPath, { method: 'HEAD' })
                    .then(response => {
                        const sourcePath = response.ok ? videoPath : fallbackPath;
                        videoContainer.innerHTML = `
                                                                                                    <video width="100%" height="100%" controls autoplay>
                                                                                                        <source src="${sourcePath}" type="video/mp4">
                                                                                                        Your browser does not support the video tag.
                                                                                                    </video>
                                                                                                `;
                    })
                    .catch(() => {
                        videoContainer.innerHTML = `
                                                                                                    <video width="100%" height="100%" controls autoplay>
                                                                                                        <source src="${fallbackPath}" type="video/mp4">
                                                                                                        Your browser does not support the video tag.
                                                                                                    </video>
                                                                                                `;
                    });

            } else {
                videoContainer.innerHTML = '<div class="d-flex align-items-center justify-content-center bg-dark text-white h-100">No video available</div>';
            }

            const equipmentSection = document.getElementById('equipmentSection');
            const equipmentList = document.getElementById('equipmentList');
            equipmentList.innerHTML = '';

            try {
                const equipment = JSON.parse(equipmentNeeded);
                if (equipment && equipment.length > 0) {
                    equipment.forEach(item => {
                        const badge = document.createElement('span');
                        badge.className = 'equipment-badge';
                        badge.textContent = item;
                        equipmentList.appendChild(badge);
                    });
                    equipmentSection.classList.remove('d-none');
                } else {
                    equipmentSection.classList.add('d-none');
                }
            } catch (e) {
                equipmentSection.classList.add('d-none');
            }

            const musclesSection = document.getElementById('musclesSection');
            const primaryMuscles = document.getElementById('primaryMuscles');
            const secondaryMuscles = document.getElementById('secondaryMuscles');
            primaryMuscles.innerHTML = '';
            secondaryMuscles.innerHTML = '';

            try {
                const muscles = JSON.parse(targetMuscles);
                if (muscles && (muscles.primary || muscles.secondary)) {
                    if (muscles.primary && muscles.primary.length > 0) {
                        muscles.primary.forEach(muscle => {
                            const badge = document.createElement('span');
                            badge.className = 'muscle-badge';
                            badge.textContent = muscle;
                            primaryMuscles.appendChild(badge);
                        });
                    }

                    if (muscles.secondary && muscles.secondary.length > 0) {
                        muscles.secondary.forEach(muscle => {
                            const badge = document.createElement('span');
                            badge.className = 'muscle-badge secondary-muscle-badge';
                            badge.textContent = muscle;
                            secondaryMuscles.appendChild(badge);
                        });
                    }
                    musclesSection.classList.remove('d-none');
                } else {
                    musclesSection.classList.add('d-none');
                }
            } catch (e) {
                musclesSection.classList.add('d-none');
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            <?php if($workoutItems->count() > 0): ?>
                const firstWorkout = <?php echo json_encode($workoutItems->first(), 15, 512) ?>;
                loadWorkoutDetails(
                    firstWorkout.id,
                    firstWorkout.name,
                    firstWorkout.difficulty,
                    firstWorkout.recommended_sets,
                    firstWorkout.recommended_reps,
                    firstWorkout.video,
                    JSON.stringify(firstWorkout.equipment_needed),
                    JSON.stringify(firstWorkout.target_muscles),
                    firstWorkout.instructions,
                    firstWorkout.created_by?.name || 'Trainer'
                );
            <?php endif; ?>
                                                                                                });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.public.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\leoqu\Desktop\goalfit\resources\views/public/workout-list.blade.php ENDPATH**/ ?>