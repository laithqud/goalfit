<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\WorkoutCategory;

class WorkoutCategoryController extends Controller
{
    public function index()
    {
        $categories = WorkoutCategory::all();
        return view('admin.videoCategory.index', compact('categories'));
    }
}
