<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Gym;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class GymController extends Controller
{
    public function index()
    {
        $gyms = Gym::all();
        return view("admin.gyms.index", compact('gyms'));
    }

    public function create()
    {
        return view('admin.gyms.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'images' => 'nullable|array|max:3',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            'is_active' => 'sometimes|boolean',
            'opening_hours' => 'required|array',
            'facilities' => 'required|array',
            'pricing.monthly' => 'required|numeric|min:0',
            'pricing.yearly' => 'required|numeric|min:0',
        ]);

        $images = [];
        
        // Process each image input (max 3 images)
        foreach ($request->file('images', []) as $key => $image) {
            if ($image) {
                // Store in public disk (storage/app/public/gym_images)
                $path = $image->store('gym_images', 'public');
                $images[$key+1] = $path; // Save just the relative path
            }
        }

        Gym::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'location' => $validated['location'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'images' => !empty($images) ? $images : null,
            'is_active' => $request->boolean('is_active'),
            'opening_hours' => $validated['opening_hours'],
            'facilities' => $validated['facilities'],
            'pricing' => [
                'monthly' => $validated['pricing']['monthly'],
                'yearly' => $validated['pricing']['yearly']
            ],
        ]);

        return redirect()->route('admin.gyms.index')->with('success', 'Gym added successfully');
    }

    public function edit(Gym $gym)
    {
        return view('admin.gyms.edit', compact('gym'));
    }


    public function update(Request $request, $id)
    {
        $gym = Gym::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'images' => 'nullable|array|max:3',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
            'is_active' => 'sometimes|boolean',
            'opening_hours' => 'required|array',
            'facilities' => 'required|array',
            'pricing.monthly' => 'required|numeric|min:0',
            'pricing.yearly' => 'required|numeric|min:0',
        ]);

        // Start with existing images or empty
        $existingImages = $gym->media ?? [];

        // Handle image removals
        if ($request->has('remove_images')) {
            foreach ($request->remove_images as $index) {
                if (isset($existingImages[$index])) {
                    Storage::delete('public/gym_images/' . $existingImages[$index]);
                    unset($existingImages[$index]);
                }
            }
        }

        // Process new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                if ($image) {
                    // Delete existing image if replacing
                    if (isset($existingImages[$index])) {
                        Storage::delete('public/gym_images/' . $existingImages[$index]);
                    }

                    // Store new image and save just the filename
                    $path = $image->store('gym_images', 'public');
                    $existingImages[$index] = basename($path);
                }
            }
        }

        // Reindex media array to 1, 2, 3 (optional)
        ksort($existingImages);
        $media = array_values($existingImages);

        // Update the gym
        $gym->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'location' => $validated['location'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'media' => $media,
            'is_active' => $request->boolean('is_active'),
            'opening_hours' => $validated['opening_hours'],
            'facilities' => $validated['facilities'],
            'pricing' => [
                'monthly' => $validated['pricing']['monthly'],
                'yearly' => $validated['pricing']['yearly'],
            ],
        ]);

        return redirect()->route('admin.gyms.index')->with('success', 'Gym updated successfully.');
    }



    public function destroy(Gym $gym)
    {
        $gym->delete();
        return redirect()->route('admin.gyms.index')->with('success', 'Gym soft deleted successfully.');
    }

    public function trashed()
    {
        $gyms = Gym::onlyTrashed()->get();
        return view('admin.gyms.trashed', compact('gyms'));
    }

    public function restore($id)
    {
        $gym = Gym::onlyTrashed()->findOrFail($id);
        $gym->restore();
        return redirect()->route('admin.gyms.index')->with('success', 'Gym restored successfully.');
    }

    public function forceDelete($id)
    {
        $gym = Gym::onlyTrashed()->findOrFail($id);

        // Delete associated images
        if ($gym->images) {
            foreach ($gym->images as $image) {
                Storage::delete('public/gym_images/'.basename($image));
            }
        }

        $gym->forceDelete();
        return redirect()->route('admin.gyms.trashed')->with('success', 'Gym permanently deleted.');
    }
}