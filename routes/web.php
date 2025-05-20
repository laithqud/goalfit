<?php

use App\Http\Controllers\dashboard\AdminController;
use App\Http\Controllers\dashboard\NutritionCategoryController;
use App\Http\Controllers\dashboard\FoodItemController;
use App\Http\Controllers\dashboard\GymController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\WorkoutCategoryController;
use App\Http\Controllers\dashboard\WorkoutItemController;



use App\Http\Controllers\HomeController;
use App\Http\Controllers\GymController as PublicGymController;
use App\Http\Controllers\WorkoutCategoryController as PublicWorkoutCategoryController;
use App\Http\Controllers\WorkoutItemCategoryController as PublicWorkoutItemCategoryController;
use App\Http\Controllers\NutritionCategoryController as PublicNutritionCategoryController;
use App\Http\Controllers\FoodItemController as PublicFoodItemController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/gym', [PublicGymController::class, 'index'])->name('gym.index');
Route::get('/gyms/search', [PublicGymController::class, 'search'])->name('gym.search');
Route::get('/gym-details/{id}', [PublicGymController::class, 'detailes'])->name('gym.detailes');
Route::get('/workout', [PublicWorkoutCategoryController::class, 'index'])->name('workout.index');
Route::get('/workout-schedule', [PublicWorkoutItemCategoryController::class, 'index'])->name('schedule.index');
Route::get('/nutrition', [PublicNutritionCategoryController::class, 'index'])->name('nutrition.index');
Route::get('/food-item', [PublicFoodItemController::class, 'index'])->name('food-item.index');

Route::view('/food-desc', 'public.food-desc');
Route::view('/gym-card', 'public.gym-card');
Route::view('/workout-list', 'public.workout-list');
Route::view('/paymint', 'public.paymint');
Route::view('/paymint2', 'public.paymint2');


//-------------------------------dashboard routes---------------------------------
Route::prefix('dashboard')->name('admin.')->middleware('auth')->group(function () {
    
    Route::prefix('admins')->name('admins.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/create', [AdminController::class, 'create'])->name('create');
        Route::post('/', [AdminController::class, 'store'])->name('store');
        Route::get('/{admin}/edit', [AdminController::class, 'edit'])->name('edit');
        Route::put('/{admin}', [AdminController::class, 'update'])->name('update');
        Route::delete('/{admin}', [AdminController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('gyms')->name('gyms.')->group(function () {
        Route::get('/', [GymController::class, 'index'])->name('index');
        Route::get('/create', [GymController::class, 'create'])->name('create');
        Route::post('/', [GymController::class, 'store'])->name('store');
        Route::get('/{gym}/edit', [GymController::class, 'edit'])->name('edit');
        Route::put('/{gym}', [GymController::class, 'update'])->name('update');
        Route::delete('/{gym}', [GymController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('workout-categories')->name('workout-categories.')->group(function () {
        Route::get('/', [WorkoutCategoryController::class, 'index'])->name('index');
        Route::get('/create', [WorkoutCategoryController::class, 'create'])->name('create');
        Route::post('/', [WorkoutCategoryController::class, 'store'])->name('store');
        Route::get('/{category}/edit', [WorkoutCategoryController::class, 'edit'])->name('edit');
        Route::put('/{category}', [WorkoutCategoryController::class, 'update'])->name('update');
        Route::delete('/{category}', [WorkoutCategoryController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('videos')->name('videos.')->group(function () {
        Route::get('/', [WorkoutItemController::class, 'index'])->name('index');
        Route::get('/create', [WorkoutItemController::class, 'create'])->name('create');
        Route::post('/', [WorkoutItemController::class, 'store'])->name('store');
        Route::get('/{video}/edit', [WorkoutItemController::class, 'edit'])->name('edit');
        Route::put('/{video}', [WorkoutItemController::class, 'update'])->name('update');
        Route::delete('/{video}', [WorkoutItemController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('nutrition-categories')->name('nutrition-categories.')->group(function () {
        Route::get('/', [NutritionCategoryController::class, 'index'])->name('index');
        Route::get('/create', [NutritionCategoryController::class, 'create'])->name('create');
        Route::post('/', [NutritionCategoryController::class, 'store'])->name('store');
        Route::get('/{category}/edit', [NutritionCategoryController::class, 'edit'])->name('edit'); // Added edit route
        Route::put('/{category}', [NutritionCategoryController::class, 'update'])->name('update');
        Route::delete('/{category}', [NutritionCategoryController::class, 'destroy'])->name('destroy');
    });
    
    Route::prefix('food-items')->name('food-items.')->group(function () {
        Route::get('/', [FoodItemController::class, 'index'])->name('index');
        Route::get('/create', [FoodItemController::class, 'create'])->name('create');
        Route::post('/', [FoodItemController::class, 'store'])->name('store');
        Route::get('/{foodItem}/edit', [FoodItemController::class, 'edit'])->name('edit');
        Route::put('/{foodItem}', [FoodItemController::class, 'update'])->name('update');
        Route::delete('/{foodItem}', [FoodItemController::class, 'destroy'])->name('destroy');
    });
});



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
