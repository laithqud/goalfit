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
    
        foreach ($request->file('images', []) as $key => $image) {
            if ($image) {
                $path = $image->store('gym_images', 'public');
                $filename = basename($path); // remove "gym_images/"
                $images[$key] = $filename;
            }
        }
    
        // Process opening hours to handle closed days
        $processedOpeningHours = [];
        foreach ($validated['opening_hours'] as $day => $hours) {
            // If the day is not marked as open, set it as closed
            if (!isset($hours['is_open']) || $hours['is_open'] != 1) {
                $processedOpeningHours[$day] = [
                    'is_open' => false
                ];
            } else {
                // If it's open, check if it's 24 hours
                if (isset($hours['is_24h']) && $hours['is_24h'] == 1) {
                    $processedOpeningHours[$day] = [
                        'is_open' => true,
                        'is_24h' => true
                    ];
                } else {
                    // Regular opening hours
                    $processedOpeningHours[$day] = [
                        'is_open' => true,
                        'open' => $hours['open'],
                        'close' => $hours['close']
                    ];
                }
            }
        }

        // dd($validated);
    
        Gym::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'location' => $validated['location'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'media' => !empty($images) ? $images : null,
            'is_active' => $request->boolean('is_active'),
            'opening_hours' => $processedOpeningHours,
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


    // public function update(Request $request, $id)
    // {
    //     $gym = Gym::findOrFail($id);

    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'location' => 'required|string',
    //         'phone' => 'required|string|max:20',
    //         'address' => 'required|string|max:255',
    //         'images' => 'nullable|array|max:3',
    //         'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120',
    //         'is_active' => 'sometimes|boolean',
    //         'opening_hours' => 'required|array',
    //         'facilities' => 'required|array',
    //         'pricing.monthly' => 'required|numeric|min:0',
    //         'pricing.yearly' => 'required|numeric|min:0',
    //     ]);

    //     // Start with existing images or empty
    //     $existingImages = $gym->media ?? [];

    //     // Handle image removals
    //     if ($request->has('remove_images')) {
    //         foreach ($request->remove_images as $index) {
    //             if (isset($existingImages[$index])) {
    //                 Storage::delete('public/gym_images/' . $existingImages[$index]);
    //                 unset($existingImages[$index]);
    //             }
    //         }
    //     }

    //     // Process new images
    //     if ($request->hasFile('images')) {
    //         foreach ($request->file('images') as $index => $image) {
    //             if ($image) {
    //                 // Delete existing image if replacing
    //                 if (isset($existingImages[$index])) {
    //                     Storage::delete('public/gym_images/' . $existingImages[$index]);
    //                 }

    //                 // Store new image and save just the filename
    //                 $path = $image->store('gym_images', 'public');
    //                 $existingImages[$index] = basename($path);
    //             }
    //         }
    //     }

    //     // Reindex media array to 1, 2, 3 (optional)
    //     ksort($existingImages);
    //     $media = $existingImages; // keep keys intact


    //     // Update the gym
    //     $gym->update([
    //         'name' => $validated['name'],
    //         'description' => $validated['description'],
    //         'location' => $validated['location'],
    //         'phone' => $validated['phone'],
    //         'address' => $validated['address'],
    //         'media' => $media,
    //         'is_active' => $request->boolean('is_active'),
    //         'opening_hours' => $validated['opening_hours'],
    //         'facilities' => $validated['facilities'],
    //         'pricing' => [
    //             'monthly' => $validated['pricing']['monthly'],
    //             'yearly' => $validated['pricing']['yearly'],
    //         ],
    //     ]);

    //     return redirect()->route('admin.gyms.index')->with('success', 'Gym updated successfully.');
    // }


    public function update(Request $request, $id)
    {
        $gym = Gym::findOrFail($id);
    
        // dd($request->all());
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
        $media = $existingImages; // keep keys intact
    
        // Process opening hours to handle closed days (same as store method)
        $processedOpeningHours = [];
        foreach ($validated['opening_hours'] as $day => $hours) {
            $isOpen = isset($hours['is_open']) && $hours['is_open'] == 1;
            $is24h = isset($hours['is_24h']) && $hours['is_24h'] == 1;
        
            if (!$isOpen) {
                // Always save is_open as false for closed days
                $processedOpeningHours[$day] = [
                    'is_open' => false
                ];
            } elseif ($is24h) {
                // Open 24h
                $processedOpeningHours[$day] = [
                    'is_open' => true,
                    'is_24h' => true
                ];
            } else {
                // Validate presence of open/close keys to avoid errors
                $processedOpeningHours[$day] = [
                    'is_open' => true,
                    'open' => $hours['open'] ?? '00:00',
                    'close' => $hours['close'] ?? '23:59',
                ];
            }
        }
        
    
        // Update the gym
        $gym->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'location' => $validated['location'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'media' => $media,
            'is_active' => $request->boolean('is_active'),
            'opening_hours' => $processedOpeningHours, // Use processed opening hours
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
        if ($gym->media) {
            foreach ($gym->media as $image) {
                Storage::disk('public')->delete('gym_images/' . $image);
            }
        }
        $gym->delete();
        return redirect()->route('admin.gyms.index')->with('success', 'Gym soft deleted successfully.');
    }
}