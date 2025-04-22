@extends('layouts.public.app')

@section('title', 'GoalFit - Workout')

@section('content')
    <!-- Hero Section -->
    <div class="workout-hero position-relative"
        style="background-image: url('{{ asset('images/workout-hero.jpg') }}'); height: 600px;">
        <div class="hero-overlay"></div>
        <div class="hero-content container text-center text-white">
            <h1 class="display-3 fw-bold mb-4">Find Your Perfect Workout</h1>
            <p class="lead fs-3 mb-5">Discover personalized workout plans tailored to your goals and fitness level</p>
            <div class="search-box mx-auto bg-white rounded-pill p-2">
                <form class="d-flex align-items-center">
                    <i class="fas fa-search text-dark ms-3 me-2"></i>
                    <input type="text" class="form-control border-0 shadow-none" placeholder="Search workouts...">
                    <button class="btn btn-danger rounded-pill px-4" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Workout Categories -->
    <section class="py-5" style="background-color: #4d0909">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold display-6 text-light">Workout Categories</h2>
                <a href="#" class="btn btn-outline-danger">View All</a>
            </div>

            <div class="scroller-wrapper">
                <div class="category-scroller row flex-nowrap g-4 py-2 pb-4">
                    @foreach(['Strength', 'Cardio', 'HIIT', 'Yoga', 'Pilates', 'CrossFit', 'Bodyweight', 'Recovery'] as $category)
                        <div class="col-md-3 col-sm-4 col-8">
                            <div class="card category-card h-100 border-0 overflow-hidden shadow-sm">
                                <div class="category-card-img"
                                    style="background-image: url('{{ asset('images/workout-' . strtolower($category) . '.jpg') }}');">
                                    <div class="category-overlay"></div>
                                    <div class="category-content text-white text-center p-3">
                                        <h3 class="h4 fw-bold">{{ $category }}</h3>
                                        <p class="small mb-0">50+ workouts</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Workouts -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold display-6">Featured Workouts</h2>
                <a href="#" class="btn btn-outline-danger">View All</a>
            </div>

            <div class="row g-4">
                @for($i = 0; $i < 3; $i++)
                    <div class="col-md-4">
                        <div class="card workout-card h-100 border-0 overflow-hidden shadow-sm">
                            <div class="position-relative">
                                <div class="workout-card-img"
                                    style="background-image: url('{{ asset('images/workout-' . ($i + 1) . '.jpg') }}');"></div>
                                <span class="badge bg-danger position-absolute top-0 end-0 m-2">30 min</span>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h3 class="h5 fw-bold mb-0">Full Body Burn</h3>
                                    <span class="badge bg-success">4.7 <i class="fas fa-star"></i></span>
                                </div>
                                <p class="text-muted mb-3"><i class="fas fa-fire text-danger me-2"></i> Advanced Intensity</p>

                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <span class="badge bg-light text-dark border"><i class="fas fa-dumbbell me-1"></i>
                                        Strength</span>
                                    <span class="badge bg-light text-dark border"><i class="fas fa-heartbeat me-1"></i>
                                        Cardio</span>
                                </div>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('images/trainer-' . ($i + 1) . '.jpg') }}" class="rounded-circle me-2"
                                            width="30" height="30" alt="Trainer">
                                        <small class="text-muted">Trainer Alex</small>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-danger">Start Workout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <!-- Personalized Plans -->
    <section class="py-5 bg-dark text-white">
        <div class="container text-center">
            <h2 class="fw-bold display-5 mb-3">Get Your Personalized Workout Plan</h2>
            <p class="lead opacity-75 mb-5">Answer a few questions and we'll create a plan tailored to your goals</p>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card bg-secondary bg-opacity-10 border-0 p-4">
                        <div class="card-body">
                            <form>
                                <div class="mb-4 text-start">
                                    <label class="form-label">What are your primary fitness goals?</label>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach(['Weight Loss', 'Muscle Gain', 'Endurance', 'Flexibility', 'General Fitness'] as $goal)
                                            <input type="checkbox" class="btn-check"
                                                id="goal-{{ str_replace(' ', '-', strtolower($goal)) }}" autocomplete="off">
                                            <label class="btn btn-outline-light"
                                                for="goal-{{ str_replace(' ', '-', strtolower($goal)) }}">{{ $goal }}</label>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mb-4 text-start">
                                    <label class="form-label">How often can you workout?</label>
                                    <select class="form-select bg-dark text-white border-secondary">
                                        <option>1-2 times per week</option>
                                        <option>3-4 times per week</option>
                                        <option>5+ times per week</option>
                                    </select>
                                </div>

                                <div class="mb-4 text-start">
                                    <label class="form-label">What's your current fitness level?</label>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach(['Beginner', 'Intermediate', 'Advanced'] as $level)
                                            <input type="radio" class="btn-check" name="fitness-level"
                                                id="level-{{ strtolower($level) }}" autocomplete="off">
                                            <label class="btn btn-outline-light"
                                                for="level-{{ strtolower($level) }}">{{ $level }}</label>
                                        @endforeach
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-danger btn-lg px-5">Generate My Plan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Stories -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold display-5">Success Stories</h2>
                <p class="lead text-muted">Real people, real results with GoalFit workouts</p>
            </div>

            <div class="row g-4">
                @for($i = 0; $i < 3; $i++)
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body p-4 text-center">
                                <img src="{{ asset('images/user-' . ($i + 1) . '.jpg') }}" class="rounded-circle mb-3" width="100"
                                    height="100" alt="User">
                                <h4 class="fw-bold mb-2">Sarah Johnson</h4>
                                <div class="mb-3 text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="mb-0">"The personalized workout plans helped me lose 20 pounds in 3 months. I've never
                                    felt stronger or more confident!"</p>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <small class="text-muted">Followed the "Weight Loss Journey" plan</small>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .workout-hero {
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .search-box {
            max-width: 600px;
        }

        .category-card-img,
        .workout-card-img {
            height: 150px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .category-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(77, 9, 9, 0.7);
        }

        .category-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .category-card:hover,
        .workout-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }

        .scroller-wrapper {
            position: relative;
        }

        .category-scroller {
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
            margin-right: -15px;
            margin-left: -15px;
            padding-right: 15px;
            padding-left: 15px;
        }

        .category-scroller::-webkit-scrollbar {
            height: 8px;
        }

        .category-scroller::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .category-scroller::-webkit-scrollbar-thumb {
            background: #dc3545;
            border-radius: 10px;
        }

        .category-scroller::-webkit-scrollbar-thumb:hover {
            background: #bb2d3b;
        }

        @media (min-width: 992px) {
            .category-scroller {
                overflow-x: hidden;
                flex-wrap: wrap;
            }
        }
    </style>
@endpush