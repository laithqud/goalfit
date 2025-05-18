@extends('layouts.public.app')

@section('title', 'GoalFit - Protein Nutrition')

@section('content')
    <div class="container py-5 ">
        <!-- Product Main Section -->
        <div class="row g-4 mb-5" style="margin-top: 50px;">
            <!-- Product Image -->
            <div class="col-lg-6">
                <div class="bg-light p-3 rounded-3 shadow-sm h-100">
                    <img src="{{ asset(Storage::url($category->image_url)) }}" alt="{{ $category->name }}"
                        class="img-fluid rounded-3 w-100" style="max-height: 400px; object-fit: contain;">
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <h1 class="display-5 fw-bold text-success mb-3">{{ $category->name }}</h1>

                        <!-- Nutrition Highlights -->
                        <div class="row g-3 mb-4">
                            <div class="col-6 col-md-3">
                                <div class="p-3 bg-light rounded text-center">
                                    <i class="fas fa-fire text-danger mb-2 fs-4"></i>
                                    <p class="mb-0 fw-bold fs-5">{{ $category->calories }} cal</p>
                                    <small class="text-muted">per 100g</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="p-3 bg-light rounded text-center">
                                    <i class="fas fa-dumbbell text-primary mb-2 fs-4"></i>
                                    <p class="mb-0 fw-bold fs-5">{{ $category->protien }}g</p>
                                    <small class="text-muted">protein</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="p-3 bg-light rounded text-center">
                                    <i class="fas fa-seedling text-success mb-2 fs-4"></i>
                                    <p class="mb-0 fw-bold fs-5">{{ $category->carbs }}g</p>
                                    <small class="text-muted">carbs</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="p-3 bg-light rounded text-center">
                                    <i class="fas fa-oil-can text-warning mb-2 fs-4"></i>
                                    <p class="mb-0 fw-bold fs-5">{{ $category->fat }}g</p>
                                    <small class="text-muted">fat</small>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h3 class="h5 text-dark mb-3">Description</h3>
                            <p class="lead">{{ $category->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nutritional Details Section -->
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Food Sources Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-success text-white">
                        <h2 class="h4 mb-0">Food Sources</h2>
                    </div>
                    <div class="card-body">
                        @if($category->foodItems->count() > 0)
                            <div class="row g-3">
                                @foreach ($category->foodItems as $food)
                                    <div class="col-md-4 col-6">
                                        <div class="border p-3 h-100 text-center bg-light rounded">
                                            <div class="mb-3" style="height: 100px;">
                                                <img src="{{ asset(Storage::url($food->image_url)) }}"
                                                    class="img-fluid h-100 object-fit-cover rounded" alt="{{ $food->name }}">
                                            </div>
                                            <h4 class="h5 mb-1">{{ $food->name }}</h4>
                                            <p class="small mb-2">{{ Str::limit($food->description, 60) }}</p>
                                            <div class="d-flex justify-content-center gap-2 flex-wrap">
                                                @if($food->calories)
                                                    <span class="badge bg-danger">{{ $food->calories }} cal</span>
                                                @endif
                                                @if($food->protein)
                                                    <span class="badge bg-primary">{{ $food->protein }}g protein</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info">No food items available for this category.</div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Nutrition Facts Sidebar -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm sticky-top" style="top: 20px;">
                    <div class="card-header bg-success text-white">
                        <h2 class="h4 mb-0">Nutrition Facts</h2>
                        <small>Serving Size: 100g</small>
                    </div>
                    <div class="card-body">
                        @if(count($category->nutrients) > 0)
                            <div class="list-group list-group-flush">
                                @foreach($category->nutrients as $key => $value)
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="fw-bold">{{ $key }}</span>
                                        <span class="badge bg-success rounded-pill">{{ $value }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info">No nutrition facts available.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .object-fit-cover {
            object-fit: cover;
        }

        .card {
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .nutrition-badge {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 auto 10px;
        }
    </style>
@endsection