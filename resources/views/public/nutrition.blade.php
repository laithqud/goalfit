@extends('layouts.public.app')

@section('title', 'GoalFit - Nutrition')

@section('content')
    <!-- Hero Section -->
    <div class="nutrition-hero position-relative" style="background-image: url('{{ asset('images/nutrition-hero.jpg') }}'); height: 60vh;">
        <div class="hero-overlay"></div>
        <div class="hero-content container text-center text-white">
            <h1 class="display-4 fw-bold mb-4">Fuel Your Fitness Journey</h1>
            <p class="lead fs-3 mb-5">Discover the power of proper nutrition with our comprehensive food database</p>
        </div>
    </div>

    <!-- Food Categories Section -->
    <section class="py-5" style="background-color: #4d0909;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold display-5 text-light">Food Categories</h2>
                <p class="lead text-light">Explore different food groups and their nutritional benefits</p>
            </div>

            <div class="row g-4">
                @foreach([
                    ['name' => 'Proteins', 'icon' => 'drumstick-bite', 'color' => 'danger'],
                    ['name' => 'Carbohydrates', 'icon' => 'bread-slice', 'color' => 'warning'],
                    ['name' => 'Fats', 'icon' => 'oil-can', 'color' => 'success'],
                    ['name' => 'Vegetables', 'icon' => 'carrot', 'color' => 'primary'],
                    ['name' => 'Fruits', 'icon' => 'apple-alt', 'color' => 'info'],
                    ['name' => 'Dairy', 'icon' => 'cheese', 'color' => 'secondary']
                ] as $category)
                <div class="col-md-4 col-6">
                    <div class="card category-card h-100 border-0 overflow-hidden shadow-sm" style="background-color: lightgray">
                        <div class="card-body text-center p-4">
                            <div class="icon-box bg-{{ $category['color'] }} bg-opacity-10 text-{{ $category['color'] }} rounded-circle mx-auto mb-4">
                                <i class="fas fa-{{ $category['icon'] }} fs-3"></i>
                            </div>
                            <h3 class="h4 fw-bold">{{ $category['name'] }}</h3>
                            <a href="#{{ strtolower($category['name']) }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Food Items by Category -->
    <section class="py-5 bg-light">
        <div class="container">
            <!-- Proteins -->
            <div id="proteins" class="mb-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold display-6">Proteins</h2>
                    <a href="#" class="btn btn-outline-danger">View All</a>
                </div>

                <div class="row g-4">
                    @foreach([
                        ['name' => 'Chicken Breast', 'calories' => 165, 'protein' => 31, 'carbs' => 0, 'fat' => 3.6, 'image' => 'chicken.jpg'],
                        ['name' => 'Salmon', 'calories' => 208, 'protein' => 20, 'carbs' => 0, 'fat' => 13, 'image' => 'salmon.jpg'],
                        ['name' => 'Eggs', 'calories' => 143, 'protein' => 13, 'carbs' => 1.1, 'fat' => 9.5, 'image' => 'eggs.jpg']
                    ] as $food)
                    <div class="col-md-4">
                        <div class="card food-card h-100 border-0 overflow-hidden shadow-sm">
                            <div class="food-card-img" style="background-image: url('{{ asset('images/food/' . $food['image']) }}');"></div>
                            <div class="card-body">
                                <h3 class="h5 fw-bold">{{ $food['name'] }}</h3>
                                
                                <!-- Nutrition Facts -->
                                <div class="nutrition-facts mt-3">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Calories</span>
                                        <span class="fw-bold">{{ $food['calories'] }} kcal</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Protein</span>
                                        <span class="fw-bold">{{ $food['protein'] }}g</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Carbs</span>
                                        <span class="fw-bold">{{ $food['carbs'] }}g</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Fat</span>
                                        <span class="fw-bold">{{ $food['fat'] }}g</span>
                                    </div>
                                </div>
                                
                                <!-- Benefits -->
                                <div class="mt-3">
                                    <h5 class="h6 fw-bold">Benefits:</h5>
                                    <ul class="small text-muted">
                                        <li>Builds and repairs muscle tissue</li>
                                        <li>Supports immune function</li>
                                        <li>Provides essential amino acids</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Vegetables -->
            <div id="vegetables" class="mb-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold display-6">Vegetables</h2>
                    <a href="#" class="btn btn-outline-success">View All</a>
                </div>

                <div class="row g-4">
                    @foreach([
                        ['name' => 'Broccoli', 'calories' => 55, 'protein' => 3.7, 'carbs' => 11, 'fat' => 0.6, 'image' => 'broccoli.jpg'],
                        ['name' => 'Spinach', 'calories' => 23, 'protein' => 2.9, 'carbs' => 3.6, 'fat' => 0.4, 'image' => 'spinach.jpg'],
                        ['name' => 'Carrots', 'calories' => 41, 'protein' => 0.9, 'carbs' => 10, 'fat' => 0.2, 'image' => 'carrots.jpg']
                    ] as $food)
                    <div class="col-md-4">
                        <div class="card food-card h-100 border-0 overflow-hidden shadow-sm">
                            <div class="food-card-img" style="background-image: url('{{ asset('images/food/' . $food['image']) }}');"></div>
                            <div class="card-body">
                                <h3 class="h5 fw-bold">{{ $food['name'] }}</h3>
                                
                                <!-- Nutrition Facts -->
                                <div class="nutrition-facts mt-3">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Calories</span>
                                        <span class="fw-bold">{{ $food['calories'] }} kcal</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Protein</span>
                                        <span class="fw-bold">{{ $food['protein'] }}g</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Carbs</span>
                                        <span class="fw-bold">{{ $food['carbs'] }}g</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Fat</span>
                                        <span class="fw-bold">{{ $food['fat'] }}g</span>
                                    </div>
                                </div>
                                
                                <!-- Benefits -->
                                <div class="mt-3">
                                    <h5 class="h6 fw-bold">Benefits:</h5>
                                    <ul class="small text-muted">
                                        <li>Rich in vitamins and minerals</li>
                                        <li>High in dietary fiber</li>
                                        <li>Low in calories</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Nutrition Tips Section -->
    <section class="py-5 text-white" style="background-color: #4d0909;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold display-5">Nutrition Tips</h2>
                <p class="lead">Expert advice for optimal health and performance</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 bg-dark bg-opacity-25">
                        <div class="card-body p-4">
                            <div class="icon-box bg-danger bg-opacity-10 text-danger rounded-circle mb-4" style="width: 60px; height: 60px;">
                                <i class="fas fa-utensils fs-4"></i>
                            </div>
                            <h3 class="h5 fw-bold">Balanced Meals</h3>
                            <p class="mb-0">Aim for meals that include protein, healthy fats, and complex carbohydrates to maintain energy levels throughout the day.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 bg-dark bg-opacity-25">
                        <div class="card-body p-4">
                            <div class="icon-box bg-danger bg-opacity-10 text-danger rounded-circle mb-4" style="width: 60px; height: 60px;">
                                <i class="fas fa-tint fs-4"></i>
                            </div>
                            <h3 class="h5 fw-bold">Stay Hydrated</h3>
                            <p class="mb-0">Drink at least 2-3 liters of water daily. Proper hydration improves metabolism and energy levels.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 bg-dark bg-opacity-25">
                        <div class="card-body p-4">
                            <div class="icon-box bg-danger bg-opacity-10 text-danger rounded-circle mb-4" style="width: 60px; height: 60px;">
                                <i class="fas fa-clock fs-4"></i>
                            </div>
                            <h3 class="h5 fw-bold">Meal Timing</h3>
                            <p class="mb-0">Eat smaller, more frequent meals (every 3-4 hours) to maintain steady blood sugar levels and prevent overeating.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .nutrition-hero {
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

        .food-card-img {
            height: 200px;
            background-size: cover;
            background-position: center;
        }

        .category-card:hover, .food-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }

        .nutrition-facts {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
        }
    </style>
@endpush