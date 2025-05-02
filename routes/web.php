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
Route::get('/admins',[AdminController::class,'index'])->name('dashboard.admin.index');
Route::get('/users',[UserController::class,'index'])->name('dashboard.user.index');
Route::get('/gyms',[GymController::class,'index'])->name('gym.index');
Route::get('/video-category',[WorkoutCategoryController::class,'index'])->name('dashboard.videoCategory.index');
Route::get('/videos',[WorkoutItemController::class,'index'])->name('dashboard.video.index');
Route::get('/category',[NutritionCategoryController::class,'index'])->name('dashboard.category.index');
Route::get('/fooditem',[FoodItemController::class,'index'])->name('dashboard.foodItem.index');


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
