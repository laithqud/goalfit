@extends('layouts.public.app')

@section('title', 'GoalFit - My Profile')

@section('content')

    <div class="container py-5" style="background-color: #121212; margin-top: 100px; margin-bottom: 20px;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg" style="background-color: #1e1e1e;">
                    <!-- Profile Header -->
                    <div class="card-header bg-transparent border-bottom border-secondary">
                        <div class="d-flex justify-content-between align-items-center">
                            <h2 class="text-white mb-0">
                                <i class="fas fa-user me-2"></i> My Profile
                            </h2>
                            <a href="{{ route('profile.edit') }}" class="btn btn-sm px-3"
                                style="background-color: #4d0909; color: #ffffff;">
                                <i class="fas fa-edit me-1"></i> Edit Profile
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <!-- Profile Photo Column -->
                            <div class="col-md-4 text-center mb-4 mb-md-0">
                                <div class="position-relative mx-auto" style="width: 180px;">
                                    <img src="{{ Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) : asset('images/default-profile.jpg') }}"
                                        class="rounded-circle border border-secondary" width="180" height="180"
                                        alt="Profile Photo">
                                </div>
                            </div>

                            <!-- Profile Details Column -->
                            <div class="col-md-8">
                                <div class="d-flex flex-column h-100">
                                    <!-- Basic Info -->
                                    <div class="mb-4">
                                        <h3 class="text-white">{{ Auth::user()->name }}</h3>
                                        <p class="text-muted mb-2">
                                            <i class="fas fa-envelope me-2"></i> {{ Auth::user()->email }}
                                            @if(Auth::user()->email_verified_at)
                                                <span class="badge bg-success ms-2">Verified</span>
                                            @else
                                                <span class="badge bg-warning ms-2">Unverified</span>
                                            @endif
                                        </p>
                                        @if(Auth::user()->phone)
                                            <p class="text-muted mb-2">
                                                <i class="fas fa-phone me-2"></i> {{ Auth::user()->phone }}
                                            </p>
                                        @endif
                                    </div>

                                    <!-- Stats Badges -->
                                    <div class="d-flex gap-2 flex-wrap mb-4">
                                        @if(Auth::user()->birth_date)
                                            <span class="badge bg-dark text-white px-3 py-2">
                                                <i class="fas fa-birthday-cake me-2" style="color: #FF69B4;"></i>
                                                {{ \Carbon\Carbon::parse(Auth::user()->birth_date)->age }} years
                                            </span>
                                        @endif

                                        @if(Auth::user()->gender)
                                            <span class="badge bg-dark text-white px-3 py-2">
                                                <i class="fas fa-{{ Auth::user()->gender == 'male' ? 'mars' : 'venus' }} me-2"
                                                    style="color: {{ Auth::user()->gender == 'male' ? '#1E90FF' : '#FF69B4' }};"></i>
                                                {{ ucfirst(Auth::user()->gender) }}
                                            </span>
                                        @endif

                                        @if(Auth::user()->height_cm)
                                            <span class="badge bg-dark text-white px-3 py-2">
                                                <i class="fas fa-ruler-vertical me-2" style="color: #7CFC00;"></i>
                                                {{ Auth::user()->height_cm }} cm
                                            </span>
                                        @endif

                                        @if(Auth::user()->weight_kg)
                                            <span class="badge bg-dark text-white px-3 py-2">
                                                <i class="fas fa-weight me-2" style="color: #FF6347;"></i>
                                                {{ Auth::user()->weight_kg }} kg
                                            </span>
                                        @endif

                                        @if(Auth::user()->height_cm && Auth::user()->weight_kg)
                                            @php
                                                $bmi = Auth::user()->weight_kg / ((Auth::user()->height_cm / 100) ** 2);
                                            @endphp
                                            <span class="badge bg-dark text-white px-3 py-2">
                                                <i class="fas fa-heartbeat me-2" style="color: 
                                                                                                @if($bmi < 18.5) #ADD8E6
                                                                                                @elseif($bmi >= 18.5 && $bmi < 25) #90EE90
                                                                                                @elseif($bmi >= 25 && $bmi < 30) #FFA500
                                                                                                @else #FF4500
                                                                                                @endif
                                                                                            ;"></i>
                                                BMI: {{ number_format($bmi, 1) }}
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Additional Info -->
                                    <div class="mt-auto">
                                        @if(Auth::user()->homeGym)
                                            <div class="d-flex align-items-center mb-3">
                                                <i class="fas fa-dumbbell me-3 fa-lg" style="color: #4d0909;"></i>
                                                <div>
                                                    <h6 class="text-white mb-0">Home Gym</h6>
                                                    <p class="text-muted mb-0">{{ Auth::user()->homeGym->name }}</p>
                                                    <small class="text-muted">{{ Auth::user()->homeGym->location }}</small>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-user-clock me-3 fa-lg" style="color: #4d0909;"></i>
                                            <div>
                                                <h6 class="text-white mb-0">Member Since</h6>
                                                <p class="text-muted mb-0">{{ Auth::user()->created_at->format('F j, Y') }}
                                                </p>
                                                <small
                                                    class="text-muted">{{ Auth::user()->created_at->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection