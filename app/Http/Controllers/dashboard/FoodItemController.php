<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\NutritionCategory;
use App\Models\FoodItem;
use Illuminate\Http\Request;

class FoodItemController extends Controller
{
    public function index()
    {
        $categories = NutritionCategory::all(); 
        $foodItems=FoodItem::with('nutritionCategory')->paginate(10);
        return view('admin.foodItems.index', compact('categories','foodItems'));
    }
}
