<?php

namespace App\Http\Controllers;

use App\Models\FoodItem;
use App\Models\NutritionCategory;
use Illuminate\Http\Request;

class FoodItemController extends Controller
{
    public function index(Request $request)
    {
        $categories = NutritionCategory::all();
    
        if ($request->has('category')) {
            $category = NutritionCategory::with('foodItems')->findOrFail($request->category);
            return view('public.food-desc', compact('category', 'categories'));
        }
    
        // Optional fallback if no category is selected
        return redirect()->route('nutrition.index')->with('error', 'Please select a category.');
    }
    
    
}