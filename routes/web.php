<?php

use App\Http\Controllers\dashboard\AdminController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\FoodItemController;
use App\Http\Controllers\dashboard\GymController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\VideoCategoryController;
use App\Http\Controllers\dashboard\VideoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index'])->name('home.index');

Route::get('/dashboard', function () {
    return view('admin.dashboard.dashboard');
})->name('dashboard');


Route::view('/gym', 'public.gym');
Route::view('/workout', 'public.workout');
Route::view('/nutrition', 'public.nutrition');
Route::view('/food-desc', 'public.food-desc');
Route::view('/gym-card', 'public.gym-card');
Route::view('/workout-list', 'public.workout-list');
Route::view('/paymint', 'public.paymint');
Route::view('/paymint2', 'public.paymint2');



Route::get('/admins',[AdminController::class,'index'])->name('dashboard.admin.index');
Route::get('/users',[UserController::class,'index'])->name('dashboard.user.index');
Route::get('/gyms',[GymController::class,'index'])->name('gym.index');
Route::get('/video-category',[VideoCategoryController::class,'index'])->name('dashboard.videoCategory.index');
Route::get('/videos',[VideoController::class,'index'])->name('dashboard.video.index');
Route::get('/category',[CategoryController::class,'index'])->name('dashboard.category.index');
Route::get('/fooditem',[FoodItemController::class,'index'])->name('dashboard.foodItem.index');