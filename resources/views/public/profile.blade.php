@extends('layouts.public.app')

@section('title', 'GoalFit - My Profile')

@section('content')

    <div class="container-fluid py-4" style="background-color: #121212;">
        <div class="container">
            <!-- Profile Header Section -->
            <div class="row mb-4" style="margin-top: 75px">
                <div class="col-12">
                    <div class="card border-0 shadow-lg" style="background-color: #1e1e1e;">
                        <div class="card-body p-4">
                            <div class="d-flex flex-column flex-md-row align-items-center gap-4">
                                <div class="position-relative">
                                    <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}"
                                        class="rounded-circle" width="120" height="120" alt="Profile">
                                </div>
                                <div class="flex-grow-1">
                                    <h2 class="text-white mb-1">{{ Auth::user()->name }}</h2>
                                    <p class="text-muted mb-2">{{ Auth::user()->email }}</p>
                                    <div class="d-flex gap-2 flex-wrap">
                                        <span class="badge bg-dark text-white px-3 py-2">
                                            <i class="fas fa-trophy me-2" style="color: #FFD700;"></i>
                                            {{ $workoutStats['completed'] ?? 0 }} Workouts
                                        </span>
                                        <span class="badge bg-dark text-white px-3 py-2">
                                            <i class="fas fa-fire me-2" style="color: #FF4500;"></i>
                                            {{ $workoutStats['calories'] ?? 0 }} kcal
                                        </span>
                                        <span class="badge bg-dark text-white px-3 py-2">
                                            <i class="fas fa-clock me-2" style="color: #1E90FF;"></i>
                                            {{ $workoutStats['minutes'] ?? 0 }} mins
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column gap-2">
                                    <a href="/profile/edit" class="btn btn-sm px-4"
                                        style="background-color: #4d0909; color: #ffffff;">
                                        Edit Profile
                                    </a>
                                    <a href="/settings" class="btn btn-outline-light btn-sm px-4">
                                        Settings
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Sections -->
            <div class="row g-4">
                <!-- Subscribed Gyms Section -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-lg h-100" style="background-color: #1e1e1e;">
                        <div class="card-header bg-transparent border-bottom border-secondary">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="text-white mb-0">
                                    <i class="fas fa-dumbbell me-2"></i> My Gyms
                                </h3>
                                <a href="/gyms" class="btn btn-sm px-3" style="background-color: #4d0909; color: #ffffff;">
                                    Explore More
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @php
                                $subscribedGyms = '';
                                $activeWorkouts = '';
                                $recentActivities = '';
                            @endphp
                            @if($subscribedGyms && count($subscribedGyms) > 0)
                                <div class="row g-3">
                                    @foreach($subscribedGyms as $gym)
                                        <div class="col-md-6">
                                            <div class="card bg-dark border-0 h-100">
                                                <img src="{{ asset('storage/' . $gym->image) }}" class="card-img-top"
                                                    style="height: 120px; object-fit: cover;" alt="{{ $gym->name }}">
                                                <div class="card-body">
                                                    <h5 class="text-white">{{ $gym->name }}</h5>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <i class="fas fa-map-marker-alt text-danger me-2"></i>
                                                        <small class="text-muted">{{ $gym->location }}</small>
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="badge bg-secondary">
                                                            {{ $gym->pivot->membership_type }}
                                                        </span>
                                                        <small class="text-warning">
                                                            Expires:
                                                            {{ \Carbon\Carbon::parse($gym->pivot->expiry_date)->format('M d, Y') }}
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="card-footer bg-transparent border-top border-secondary">
                                                    <a href="/gyms/{{ $gym->id }}" class="btn btn-sm btn-outline-light w-100">
                                                        View Details
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-dumbbell fa-3x text-secondary mb-3"></i>
                                    <h5 class="text-white">No Gym Memberships</h5>
                                    <p class="text-muted">You haven't subscribed to any gyms yet</p>
                                    <a href="/gyms" class="btn px-4" style="background-color: #4d0909; color: #ffffff;">
                                        Find a Gym
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Workout Programs Section -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-lg h-100" style="background-color: #1e1e1e;">
                        <div class="card-header bg-transparent border-bottom border-secondary">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="text-white mb-0">
                                    <i class="fas fa-running me-2"></i> My Workouts
                                </h3>
                                <a href="/workouts" class="btn btn-sm px-3"
                                    style="background-color: #4d0909; color: #ffffff;">
                                    Browse Workouts
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if($activeWorkouts && count($activeWorkouts) > 0)
                                <div class="row g-3">
                                    @foreach($activeWorkouts as $workout)
                                        <div class="col-md-6">
                                            <div class="card bg-dark border-0 h-100">
                                                <div class="position-relative">
                                                    <img src="{{ asset('storage/' . $workout->image) }}" class="card-img-top"
                                                        style="height: 120px; object-fit: cover;" alt="{{ $workout->name }}">
                                                    <span class="position-absolute top-0 end-0 m-2 badge bg-success">
                                                        {{ $workout->pivot->progress }}% Complete
                                                    </span>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="text-white">{{ $workout->name }}</h5>
                                                    <p class="text-muted small mb-2">{{ $workout->category->name }}</p>
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <span class="badge bg-primary">
                                                            {{ $workout->difficulty }}
                                                        </span>
                                                        <small class="text-info">
                                                            {{ $workout->duration }} minutes
                                                        </small>
                                                    </div>
                                                    <div class="progress mb-3" style="height: 6px;">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: {{ $workout->pivot->progress }}%"
                                                            aria-valuenow="{{ $workout->pivot->progress }}" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="card-footer bg-transparent border-top border-secondary">
                                                    <a href="/workouts/{{ $workout->id }}"
                                                        class="btn btn-sm btn-outline-light w-100">
                                                        Continue Workout
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-running fa-3x text-secondary mb-3"></i>
                                    <h5 class="text-white">No Active Workouts</h5>
                                    <p class="text-muted">You haven't started any workout programs yet</p>
                                    <a href="/workouts" class="btn px-4" style="background-color: #4d0909; color: #ffffff;">
                                        Start Training
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Recent Activity Section -->
                <div class="col-12">
                    <div class="card border-0 shadow-lg" style="background-color: #1e1e1e;">
                        <div class="card-header bg-transparent border-bottom border-secondary">
                            <h3 class="text-white mb-0">
                                <i class="fas fa-history me-2"></i> Recent Activity
                            </h3>
                        </div>
                        <div class="card-body">
                            @if($recentActivities && count($recentActivities) > 0)
                                <div class="list-group list-group-flush">
                                    @foreach($recentActivities as $activity)
                                        <div class="list-group-item bg-transparent border-bottom border-secondary">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <div class="me-3">
                                                        @if($activity->type == 'workout')
                                                            <i class="fas fa-running text-primary fa-lg"></i>
                                                        @elseif($activity->type == 'gym')
                                                            <i class="fas fa-dumbbell text-warning fa-lg"></i>
                                                        @else
                                                            <i class="fas fa-check-circle text-success fa-lg"></i>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <h6 class="text-white mb-1">{{ $activity->title }}</h6>
                                                        <small class="text-muted">{{ $activity->description }}</small>
                                                    </div>
                                                </div>
                                                <small class="text-muted">{{ $activity->created_at->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="text-center mt-3">
                                    <a href="/activity" class="btn btn-sm btn-outline-light">
                                        View All Activity
                                    </a>
                                </div>
                            @else
                                <div class="text-center py-4">
                                    <i class="fas fa-history fa-3x text-secondary mb-3"></i>
                                    <h5 class="text-white">No Recent Activity</h5>
                                    <p class="text-muted">Your workout activities will appear here</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection