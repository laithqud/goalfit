<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\WorkoutCategory;

class WorkoutCategoryController extends Controller
{
    public function index()
    {
        $categories = WorkoutCategory::all();
        return view('admin.videoCategory.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.videoCategory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('workout_categories', 'public');
        }

        // Create the category with all fields including image_url
        WorkoutCategory::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_url' => $imagePath ?? null, // Store the path or null if upload failed
        ]);

        return redirect()->route('admin.workout-categories.index')->with('success', 'Category created successfully.');
    }

    // Add these methods to your WorkoutCategoryController

    public function edit(WorkoutCategory $category)
    {
        return view('admin.videoCategory.edit', compact('category'));
    }

    public function update(Request $request, WorkoutCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:workout_categories,name,'.$category->id,
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Handle image update if new image is provided
        if ($request->hasFile('image')) {
            // Delete old image
            if ($category->image_url) {
                Storage::disk('public')->delete($category->image_url);
            }
            
            // Store new image
            $validated['image_url'] = $request->file('image')->storeAs(
                'workout_categories',
                Str::slug($validated['name']) . '-' . time() . '.' . $request->file('image')->extension(),
                'public'
            );
        }

        $category->update($validated);

        return redirect()->route('admin.workout-categories.index')
            ->with('success', 'Category updated successfully');
    }
    public function destroy($id)
    {
        try {
            $category = WorkoutCategory::findOrFail($id);
            
            // Delete the associated image file if it exists
            if ($category->image_url && Storage::disk('public')->exists($category->image_url)) {
                Storage::disk('public')->delete($category->image_url);
            }
            
            $category->delete();
            
            return redirect()->route('admin.workout-categories.index')
                ->with('success', 'Category deleted successfully');
                
        } catch (\Exception $e) {
            return redirect()->route('admin.workout-categories.index')
                ->with('error', 'Error deleting category: ' . $e->getMessage());
        }
    }
}