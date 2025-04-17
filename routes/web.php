<?php

use App\Http\Controllers\dashboard\GymController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index'])->name('home.index');

Route::get('/dashboard', function () {
    return view('admin.dashboard.dashboard');
})->name('dashboard');

Route::get('/gyms',[GymController::class,'index'])->name('gym.index');