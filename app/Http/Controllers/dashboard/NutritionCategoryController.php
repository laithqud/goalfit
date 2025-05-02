<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NutritionCategory;

class NutritionCategoryController extends Controller
{
    public function index() 
    {
        $categories = NutritionCategory::all();
        return view('admin.category.index', compact('categories'));
    }
}
