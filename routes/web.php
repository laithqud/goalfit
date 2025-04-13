<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[HomeController::class,'index'])->name('home.index');

Route::get('/dashboard', function () {
    return view('admin.dashboard.dashboard');
});