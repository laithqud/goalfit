<?php

namespace App\Http\Controllers;

use App\Models\NutritionCategory;
use Illuminate\Http\Request;

class NutritionCategoryController extends Controller
{
    public function index()
    {
        $categories=NutritionCategory::all();
        return view('public.nutrition', compact('categories'));
    }

    
}