@extends('layouts.public.app')

@section('title', 'Workout List - GoalFit')

@section('content')
    <section class="container p-3 border rounded bg-secondary" style="margin-top:120px; margin-bottom: 25px;">
        <!-- Workout List -->
        <h1 class="fs-1 my-3 pb-3 fw-bold text-center">Full Body</h1>
        @foreach([1] as $workout)
        <div class="row g-4 mb-4 border rounded overflow-hidden" style="background-color: #f8f9fa;">
            <!-- Workout Video -->
            <div class="col-lg-6 p-0">
                <div class="position-relative" style="height: 100%; min-height: 300px;">
                    <video class="w-100 h-100 object-fit-cover" poster="" controls>
                        <source src="{{ asset('videos/workout-'.$workout.'.mp4') }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>

            <!-- Workout Details -->
            <div class="col-lg-6 p-4 d-flex flex-column">
                <div class="d-flex align-items-start mb-3">
                    <img src="{{ asset('images/coach1.jpg') }}" alt="Trainer" class="rounded-circle me-3" width="60" height="60">
                    <div>
                        <h2 class="fw-bold mb-1 fs-4">Biceps Workout</h2>
                        <p class="text-muted mb-2">With Trainer Alex</p>
                        <div class="d-flex align-items-center">
                            <div class="text-warning me-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <small class="text-muted">(128 reviews)</small>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold mb-3">Workout Details</h5>
                    <div class="row">
                        <div class="col-4 mb-3">
                            <div class="bg-white p-2 rounded text-center">
                                <small class="text-muted d-block">Sets</small>
                                <strong class="fs-5">3</strong>
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="bg-white p-2 rounded text-center">
                                <small class="text-muted d-block">Reps</small>
                                <strong class="fs-5">12</strong>
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="bg-white p-2 rounded text-center">
                                <small class="text-muted d-block">Rest</small>
                                <strong class="fs-5">30s</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold mb-3">Target Muscles</h5>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-danger bg-opacity-10 text-danger fs-5">Biceps</span>
                        <span class="badge bg-warning bg-opacity-10 text-warning fs-5">Forearms</span>
                        <span class="badge bg-primary bg-opacity-10 text-primary fs-5">Shoulders</span>
                    </div>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold mb-3">Equipment Needed</h5>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-dark bg-opacity-10 text-dark fs-6">Dumbbells</span>
                        <span class="badge bg-secondary bg-opacity-10 text-secondary fs-6">Resistance Bands</span>
                    </div>
                </div>

                <div class="mt-auto d-flex gap-2">
                    <button class="btn btn-danger flex-grow-1">Start Workout</button>
                    <button class="btn btn-outline-secondary">Save for Later</button>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Workout Session Videos List -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <h4 class="mb-0 fw-bold">Your Workout Session</h4>
                        <p class="text-muted mb-0">5 exercises • 45 minutes total</p>
                    </div>
                    <div class="card-body p-0">
                        <div class="list-group list-group-flush">
                            @foreach([
                                ['name' => 'Bicep Curls', 'duration' => '3:45', 'active' => true],
                                ['name' => 'Hammer Curls', 'duration' => '3:30', 'active' => false],
                                ['name' => 'Concentration Curls', 'duration' => '4:15', 'active' => false],
                                ['name' => 'Preacher Curls', 'duration' => '3:50', 'active' => false],
                                ['name' => 'Reverse Curls', 'duration' => '4:00', 'active' => false]
                            ] as $exercise)
                            <div class="list-group-item {{ $exercise['active'] ? 'bg-light' : '' }}">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div class="bg-{{ $exercise['active'] ? 'danger' : 'secondary' }} bg-opacity-10 text-{{ $exercise['active'] ? 'danger' : 'secondary' }} rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="fas fa-{{ $exercise['active'] ? 'play' : 'dumbbell' }}"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 {{ $exercise['active'] ? 'fw-bold' : '' }}">{{ $exercise['name'] }}</h6>
                                            <small class="text-muted">{{ $exercise['duration'] }} duration</small>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="badge bg-light text-dark">{{ $exercise['active'] ? 'Now Playing' : 'Up Next' }}</span>
                                    </div>
                                </div>
                            </div>
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
        
        video {
            background-color: #000;
        }
        
        .badge {
            padding: 0.35em 0.65em;
            font-weight: 500;
        }
        
        .list-group-item {
            padding: 1rem 1.25rem;
            border-left: 0;
            border-right: 0;
        }
        
        .list-group-item:first-child {
            border-top: 0;
        }
        
        .list-group-item:last-child {
            border-bottom: 0;
        }
    </style>
@endpush