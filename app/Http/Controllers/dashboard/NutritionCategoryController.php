<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NutritionCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class NutritionCategoryController extends Controller
{
    public function index() 
    {
        $categories = NutritionCategory::withCount('foodItems')->get();
        return view('admin.nutrition-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.nutrition-categories.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'calories' => 'required|integer',
            'protien' => 'required|numeric',
            'carbs' => 'required|numeric',
            'fat' => 'required|numeric',
            'nutrients' => ['nullable', function ($attribute, $value, $fail) {
                if (!empty($value) && json_decode($value) === null) {
                    $fail("The $attribute must be valid JSON.");
                }
            }],
        ]);

        try {
            $data = $request->only([
                'name', 'description', 'calories', 'protien', 'carbs', 'fat'
            ]);

            $data['nutrients'] = $request->filled('nutrients') ? json_decode($request->nutrients, true) : null;

            if ($request->hasFile('image')) {
                $data['image_url'] = $request->file('image')->store('nutrition-categories', 'public');
            }

            NutritionCategory::create($data);

            return redirect()->route('admin.nutrition-categories.index')
                ->with('success', 'Nutrition category created successfully.');

        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Failed to create category: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $category = NutritionCategory::findOrFail($id);
        return view('admin.nutrition-categories.edit', compact('category'));
    }

    public function update(Request $request, NutritionCategory $category)
    {
        // $test='hi';
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'calories' => 'required|integer',
            'protien' => 'required|numeric',
            'carbs' => 'required|numeric',
            'fat' => 'required|numeric',
            'nutrients' => ['nullable', function ($attribute, $value, $fail) {
                if (!empty($value) && json_decode($value) === null) {
                    $fail("The $attribute must be valid JSON.");
                }
            }],
        ]);
        
        if ($validator->fails()) {
            dd($validator->errors()->all());
        }
        
        $validated = $validator->validated();
        
        // dd($test);

        try {
            $imagePath = $category->image_url;

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('nutrition-categories', 'public');
            }

            $nutrientsData = !empty($validated['nutrients']) 
                ? json_decode($validated['nutrients'], true)
                : null;

            $category->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'image_url' => $imagePath,
                'calories' => $validated['calories'],
                'protien' => $validated['protien'],
                'carbs' => $validated['carbs'],
                'fat' => $validated['fat'],
                'nutrients' => $nutrientsData
            ]);

            return redirect()->route('admin.nutrition-categories.index')
                ->with('success', 'Category updated successfully');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors([
                'error' => 'Failed to update category: ' . $e->getMessage()
            ]);
        }
    }


    public function destroy(NutritionCategory $category)
    {
        try {
            // Delete the associated image file if it exists
            if ($category->image_url && Storage::disk('public')->exists($category->image_url)) {
                Storage::disk('public')->delete($category->image_url);
            }

            $category->delete();

            return redirect()->route('admin.nutrition-categories.index')
                ->with('success', 'Category deleted successfully');

        } catch (\Exception $e) {
            return back()->withErrors([
                'error' => 'Failed to delete category: ' . $e->getMessage()
            ]);
        }
    }

}