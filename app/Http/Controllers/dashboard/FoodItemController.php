<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\NutritionCategory;
use App\Models\FoodItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class FoodItemController extends Controller
{
    public function index()
    {
        $categories = NutritionCategory::all(); 
        $foodItems=FoodItem::with('nutritionCategory')->paginate(10);
        return view('admin.foodItems.index', compact('categories','foodItems'));
    }
    
    public function create()
    {
        $categories = NutritionCategory::all();
        return view('admin.foodItems.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:nutrition_categories,id',
            'image' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('image')->store('food_images', 'public');

        FoodItem::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_url' => $imagePath,
            'category_id' => $request->category_id,
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('admin.food-items.index')->with('success', 'Food item created successfully.');
    }

    public function edit(FoodItem $foodItem)
    {
        $categories = NutritionCategory::all();
        return view('admin.foodItems.edit', compact('foodItem', 'categories'));
    }

    public function update(Request $request, FoodItem $foodItem)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:nutrition_categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($foodItem->image_url);
            $foodItem->image_url = $request->file('image')->store('food_images', 'public');
        }

        $foodItem->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('admin.food-items.index')->with('success', 'Food item updated successfully.');
    }

    public function destroy(FoodItem $foodItem)
    {
        Storage::disk('public')->delete($foodItem->image_url);
        $foodItem->delete();
        return redirect()->route('admin.food-items.index')->with('success', 'Food item deleted.');
    }
}
