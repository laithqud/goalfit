@extends('layouts.public.app')

@section('title', 'GoalFit - Protein Nutrition')

@section('content')

    <div class="container" style="margin-top: 6rem;">

        <!-- Product Main Section -->
        <div class="row g-4">
            {{-- {{dd($categories)}} --}}
            <!-- Product Image -->
            <div class="col-lg-6">
                <div class="bg-light p-4 rounded-3 shadow-sm">
                    <img src="{{asset(Storage::url($category->image_url))}}" alt="Protein Sources"
                        class="img-fluid rounded-3">
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h1 class="display-6 fw-bold">{{$category->name}}</h1>
                        {{-- <span class="badge bg-warning text-dark mb-3">Muscle Building</span> --}}

                        <!-- Nutrition Highlights -->
                        <div class="row g-3 mb-4">
                            <div class="col-6 col-md-3 text-center">
                                <div class="p-3 bg-light rounded">
                                    <i class="fas fa-fire text-danger mb-2"></i>
                                    <p class="mb-0 fw-bold">{{$category->calories}} cal</p>
                                    <small class="text-muted">per serving</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 text-center">
                                <div class="p-3 bg-light rounded">
                                    <i class="fas fa-dumbbell text-primary mb-2"></i>
                                    <p class="mb-0 fw-bold">{{$category->protien}}</p>
                                    <small class="text-muted">protein</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 text-center">
                                <div class="p-3 bg-light rounded">
                                    <i class="fas fa-seedling text-success mb-2"></i>
                                    <p class="mb-0 fw-bold">{{$category->carbs}}</p>
                                    <small class="text-muted">carbs</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 text-center">
                                <div class="p-3 bg-light rounded">
                                    <i class="fas fa-oil-can text-warning mb-2"></i>
                                    <p class="mb-0 fw-bold">{{$category->fat}}</p>
                                    <small class="text-muted">fat</small>
                                </div>
                            </div>
                        </div>

                        <p class="lead">{{$category->description}}</p>

                        <!-- NEW: Additional Protein Information -->
                        {{-- <div class="mt-4">
                            <h4 class="h5 text-success mb-3"><i class="fas fa-info-circle me-2"></i> Key Protein Facts</h4>
                            <ul class="list-unstyled">
                                <li class="mb-2 d-flex">
                                    <i class="fas fa-check text-success me-2 mt-1"></i>
                                    <span><strong>Bioavailability:</strong> 90-100% absorption rate (highest of all protein
                                        types)</span>
                                </li>
                                <li class="mb-2 d-flex">
                                    <i class="fas fa-check text-success me-2 mt-1"></i>
                                    <span><strong>Digestion Speed:</strong> Fast-absorbing (ideal post-workout)</span>
                                </li>
                                <li class="mb-2 d-flex">
                                    <i class="fas fa-check text-success me-2 mt-1"></i>
                                    <span><strong>PDCAAS Score:</strong> 1.0 (perfect protein quality score)</span>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

        <!-- Nutritional Details Section -->
        <div class="row mt-5">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-success text-white">
                        <h2 class="h5 mb-0">Protein Nutrition Guide</h2>
                    </div>
                    <div class="card-body">
                        <!-- Combined Section 1 -->
                        {{-- <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div class="h-100 p-3 bg-light rounded">
                                    <h3 class="h5 text-success"><i class="fas fa-check-circle me-2"></i> Essential Amino
                                        Acids</h3>
                                    <p>Contains all 9 essential amino acids crucial for muscle protein synthesis.</p>
                                    <div class="d-flex mt-3">
                                        <div class="flex-shrink-0">
                                            <img src="{{asset('./images/eggs.jpg')}}" class="rounded" width="60" height="60"
                                                alt="Eggs">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h4 class="h6 mb-1">Complete Proteins</h4>
                                            <p class="small mb-1">Eggs, chicken, fish</p>
                                            <p class="small text-muted">Contain all essential amino acids</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="h-100 p-3 bg-light rounded">
                                    <h3 class="h5 text-success"><i class="fas fa-check-circle me-2"></i> Vitamin B Complex
                                    </h3>
                                    <p>B vitamins help convert food into energy and support metabolism.</p>
                                    <div class="d-flex mt-3">
                                        <div class="flex-shrink-0">
                                            <img src="{{asset('./images/salmon.jpg')}}" class="rounded" width="60"
                                                height="60" alt="Salmon">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h4 class="h6 mb-1">Rich Sources</h4>
                                            <p class="small mb-1">Salmon, beef, dairy</p>
                                            <p class="small text-muted">High in B12 and other B vitamins</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Combined Section 2 -->
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div class="h-100 p-3 bg-light rounded">
                                    <h3 class="h5 text-success"><i class="fas fa-check-circle me-2"></i> Muscle Recovery
                                    </h3>
                                    <p>High leucine content stimulates muscle protein synthesis.</p>
                                    <div class="d-flex mt-3">
                                        <div class="flex-shrink-0">
                                            <img src="{{asset('./images/chicken.jpg')}}" class="rounded" width="60"
                                                height="60" alt="Chicken">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h4 class="h6 mb-1">Best Post-Workout</h4>
                                            <p class="small mb-1">Chicken, whey protein</p>
                                            <p class="small text-muted">31g protein per 100g chicken</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="h-100 p-3 bg-light rounded">
                                    <h3 class="h5 text-success"><i class="fas fa-check-circle me-2"></i> Immune Support</h3>
                                    <p>Contains compounds that support immune system function.</p>
                                    <div class="d-flex mt-3">
                                        <div class="flex-shrink-0">
                                            <img src="{{asset('./images/tofu.jpg')}}" class="rounded" width="60" height="60"
                                                alt="Tofu">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h4 class="h6 mb-1">Plant Options</h4>
                                            <p class="small mb-1">Tofu, lentils, beans</p>
                                            <p class="small text-muted">8g protein per 100g tofu</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <!-- Additional Food Sources -->
                        <div class="p-3 bg-light rounded">
                            <h3 class="h5 text-success mb-3"><i class="fas fa-utensils me-2"></i> Example Food Sources</h3>
                            </h3>
                            <div class="row g-3 gap-2">
                                @foreach ($category->foodItems as $food)
                                    <div class="col-6 col-md-3 border p-3 text-center">
                                        <img src="{{asset(Storage::url($food->image_url))}}" class="rounded mb-2" width="60"
                                            height="60" alt="Beef">
                                        <h4 class="h6 mb-1">{{$food->name}}</h4>
                                        <p class="small mb-1">{{$food->description}}</p>
                                        {{-- <p class="small text-muted">26g/100g</p> --}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Usage Tips Sidebar -->
            <div class="col-lg-4">
                {{-- <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-success text-white">
                        <h2 class="h5 mb-0">When to Use</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-clock text-success me-3"></i>
                                <div>
                                    <h5 class="h6 mb-1">Post-Workout</h5>
                                    <p class="small mb-0">Take within 30 minutes after training for optimal recovery</p>
                                </div>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-sun text-success me-3"></i>
                                <div>
                                    <h5 class="h6 mb-1">Morning Boost</h5>
                                    <p class="small mb-0">Start your day with protein to maintain muscle mass</p>
                                </div>
                            </li>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="fas fa-moon text-success me-3"></i>
                                <div>
                                    <h5 class="h6 mb-1">Before Bed</h5>
                                    <p class="small mb-0">Casein protein provides slow-release amino acids overnight</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> --}}

                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h2 class="h5 mb-0">Nutrition Facts</h2>
                    </div>
                    <div class="card-body">
                        {{-- <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <th scope="row">Serving Size</th>
                                    <td class="text-end">1 scoop (30g)</td>
                                </tr>
                                <tr>
                                    <th scope="row">Calories</th>
                                    <td class="text-end">120</td>
                                </tr>
                                <tr>
                                    <th scope="row">Protein</th>
                                    <td class="text-end">24g</td>
                                </tr>
                                <tr>
                                    <th scope="row">Carbohydrates</th>
                                    <td class="text-end">2g</td>
                                </tr>
                                <tr>
                                    <th scope="row">Fat</th>
                                    <td class="text-end">1.5g</td>
                                </tr>
                                <tr>
                                    <th scope="row">Calcium</th>
                                    <td class="text-end">15% DV</td>
                                </tr>
                                <tr>
                                    <th scope="row">Iron</th>
                                    <td class="text-end">10% DV</td>
                                </tr>
                            </tbody>
                        </table> --}}
                        <ol>
                            @foreach($category->nutrients as $key => $value)
                                <li class="mb-2 fs-5">{{ $key }}: {{ $value }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection