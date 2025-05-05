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
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); //->middleware('auth')

Route::view('/gym', 'public.gym');
Route::view('/workout', 'public.workout');
Route::view('/nutrition', 'public.nutrition');
Route::view('/food-desc', 'public.food-desc');
Route::view('/gym-card', 'public.gym-card');
Route::view('/workout-list', 'public.workout-list');
Route::view('/paymint', 'public.paymint');
Route::view('/paymint2', 'public.paymint2');


//dashboard routes
Route::prefix('dashboard')->name('admin.')->group(function () {
    // Admin management routes
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

    // Use either snake_case or kebab-case consistently
    Route::prefix('nutrition-categories')->name('nutrition-categories.')->group(function () {
        Route::get('/', [NutritionCategoryController::class, 'index'])->name('index');
        Route::get('/create', [NutritionCategoryController::class, 'create'])->name('create');
        Route::post('/', [NutritionCategoryController::class, 'store'])->name('store');
        Route::get('/{category}/edit', [NutritionCategoryController::class, 'edit'])->name('edit'); // Added edit route
        Route::put('/{category}', [NutritionCategoryController::class, 'update'])->name('update');
        Route::delete('/{category}', [NutritionCategoryController::class, 'destroy'])->name('destroy');
    });
    
    // Other dashboard routes...
});

// Route::get('/users',[UserController::class,'index'])->name('dashboard.user.index');
Route::get('/gyms',[GymController::class,'index'])->name('gym.index');
Route::get('/video-category',[WorkoutCategoryController::class,'index'])->name('dashboard.videoCategory.index');
Route::get('/videos',[WorkoutItemController::class,'index'])->name('dashboard.video.index');
Route::get('/category',[NutritionCategoryController::class,'index'])->name('dashboard.category.index');
Route::get('/fooditem',[FoodItemController::class,'index'])->name('dashboard.foodItem.index');


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
