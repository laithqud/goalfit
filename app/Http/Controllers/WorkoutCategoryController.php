<?php

namespace App\Http\Controllers;

use App\Models\WorkoutCategory;
use Illuminate\Http\Request;

class WorkoutCategoryController extends Controller
{
    public function index()
    {
        $categories=WorkoutCategory::all();
        return view('public.workout', compact('categories'));
    }

    
}