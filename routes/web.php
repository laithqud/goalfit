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

Route::get('/admins',[AdminController::class,'index'])->name('dashboard.admin.index');
Route::get('/users',[UserController::class,'index'])->name('dashboard.user.index');
Route::get('/gyms',[GymController::class,'index'])->name('gym.index');
Route::get('/video-category',[VideoCategoryController::class,'index'])->name('dashboard.videoCategory.index');
Route::get('/videos',[VideoController::class,'index'])->name('dashboard.video.index');
Route::get('/category',[CategoryController::class,'index'])->name('dashboard.category.index');
Route::get('/fooditem',[FoodItemController::class,'index'])->name('dashboard.foodItem.index');