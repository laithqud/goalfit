@extends('layouts.public.app')

@section('title', 'Workout List - GoalFit')

@section('content')
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
                    <h5 class="fw-bold mb-3">Workout instructions</h5>
                    <p id="workoutInstructions" class="text-muted">Select a workout to view instructions.</p>
                    <div id="equipmentSection" class="mb-3 d-none">
                        <h6 class="fw-bold">Equipment Needed</h6>
                        <div id="equipmentList" class="d-flex flex-wrap gap-2"></div>
                    </div>
                    <div id="musclesSection" class="mb-3 d-none">
                        <h6 class="fw-bold">Target Muscles</h6>
                        <div class="d-flex flex-wrap gap-2">
                            <div id="primaryMuscles" class="d-flex flex-wrap gap-2"></div>
                            <div id="secondaryMuscles" class="d-flex flex-wrap gap-2"></div>
                        </div>
                    </div>
                </div>

                <div class="mt-auto d-flex gap-2">
                    <button class="btn btn-danger flex-grow-1">Start Workout</button>
                    <button class="btn btn-outline-secondary">Save for Later</button>
                </div>
            </div>
        </div>

        <!-- Workout Session Videos List -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <h4 class="mb-0 fw-bold">Your Workout Session</h4>
                        <p class="text-muted mb-0">{{ $workoutItems->count() }} exercises</p>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            @foreach($workoutItems as $workout)
                                <a href="javascript:void(0)"
                                    class="list-group-item list-group-item-action workout-item {{ $loop->first ? 'active-workout' : '' }}"
                                    onclick="loadWorkoutDetails(
                                                                        {{ $workout->id }}, 
                                                                        '{{ addslashes($workout->name) }}', 
                                                                        '{{ $workout->difficulty }}', 
                                                                        {{ $workout->recommended_sets ?? 'null' }}, 
                                                                        {{ $workout->recommended_reps ?? 'null' }}, 
                                                                        '{{ $workout->video }}', 
                                                                        '{{ json_encode($workout->equipment_needed) }}', 
                                                                        '{{ json_encode($workout->target_muscles) }}', 
                                                                        '{{ addslashes($workout->instructions) }}',
                                                                        '{{ $workout->createdBy->name ?? 'Trainer' }}'
                                                                    )">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                <div class="{{ $loop->first ? 'bg-danger' : 'bg-secondary' }} bg-opacity-10 {{ $loop->first ? 'text-danger' : 'text-secondary' }} rounded-circle d-flex align-items-center justify-content-center"
                                                    style="width: 40px; height: 40px;">
                                                    <i class="fas fa-{{ $loop->first ? 'play' : 'dumbbell' }}"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 {{ $loop->first ? 'fw-bold' : '' }}">{{ $workout->name }}</h6>
                                                <small class="text-muted">
                                                    @if($workout->durations_in_minutes)
                                                        {{ $workout->durations_in_minutes['exercise'] ?? 'N/A' }} min
                                                    @else
                                                        N/A
                                                    @endif
                                                </small>
                                            </div>
                                        </div>
                                        <div>
                                            <span
                                                class="badge bg-light text-dark">{{ $loop->first ? 'Now Playing' : 'Up Next' }}</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
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
@endpush

@push('scripts')
    <script>
        function loadWorkoutDetails(id, name, difficulty, sets, reps, video, equipmentNeeded, targetMuscles, instructions, trainerName) {
            // Update active state in the list
            document.querySelectorAll('.workout-item').forEach(item => {
                item.classList.remove('active-workout');
                item.querySelector('h6').classList.remove('fw-bold');
                const iconDiv = item.querySelector('div.me-3 > div');
                iconDiv.classList.remove('bg-danger', 'text-danger');
                iconDiv.classList.add('bg-secondary', 'text-secondary');
                const icon = item.querySelector('i');
                icon.classList.remove('fa-play');
                icon.classList.add('fa-dumbbell');
                item.querySelector('.badge').textContent = 'Up Next';
            });

            // Set the clicked item as active
            const clickedItem = document.querySelector(`.workout-item[onclick*="${id}"]`);
            if (clickedItem) {
                clickedItem.classList.add('active-workout');
                clickedItem.querySelector('h6').classList.add('fw-bold');
                const iconDiv = clickedItem.querySelector('div.me-3 > div');
                iconDiv.classList.remove('bg-secondary', 'text-secondary');
                iconDiv.classList.add('bg-danger', 'text-danger');
                const icon = clickedItem.querySelector('i');
                icon.classList.remove('fa-dumbbell');
                icon.classList.add('fa-play');
                clickedItem.querySelector('.badge').textContent = 'Now Playing';
            }

            // Update workout details
            document.getElementById('workoutTitle').textContent = name;
            document.getElementById('workoutTrainer').textContent = `With Trainer ${trainerName}`;
            document.getElementById('workoutDifficulty').textContent = difficulty;
            document.getElementById('workoutSets').textContent = sets || 'N/A';
            document.getElementById('workoutReps').textContent = reps || 'N/A';
            document.getElementById('workoutInstructions').textContent = instructions || 'No instructions provided.';

            // Update video
            const videoContainer = document.getElementById('videoContainer');
            if (video) {
                videoContainer.innerHTML = `
                                    <video width="100%" height="100%" controls autoplay>
                                        <source src="/images/${video}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                `;
            } else {
                videoContainer.innerHTML = '<div class="d-flex align-items-center justify-content-center bg-dark text-white h-100">No video available</div>';
            }

            // Update equipment needed
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

            // Update target muscles
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

        // Load first workout by default
        document.addEventListener('DOMContentLoaded', function () {
            @if($workoutItems->count() > 0)
                const firstWorkout = @json($workoutItems->first());
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
            @endif
                        });
    </script>
@endpush