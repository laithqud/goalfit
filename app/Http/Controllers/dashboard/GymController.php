<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Gym;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class GymController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gyms = Gym::all();
        return view("admin.gyms.index",compact('gyms'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Display the specified resource.
     */
    public function show(Gym $gym)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gym $gym)
    {
        return view('admin.gyms.edit', compact('gym'));
    }

    
    
    public function update(Request $request, Gym $gym)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'location' => 'required|string',
            'phone' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'sometimes|boolean'
        ]);

        $media = $gym->media ?? ['images' => []];

        // Remove existing image if requested
        if ($request->has('remove_image') && isset($media['images'][0]['url'])) {
            Storage::delete($media['images'][0]['url']);
            $media['images'] = [];
        }

        // Upload new image if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('gym_images');
            $media['images'] = [[
                'url' => $imagePath,
                'caption' => 'Main gym image',
                'is_featured' => true
            ]];
        }

        try {
            $gym->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'address' => $validated['address'],
                'location' => $validated['location'],
                'phone' => $validated['phone'],
                'media' => $media,
                'is_active' => $request->boolean('is_active', $gym->is_active),
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating gym: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update gym');
        }

        return redirect()->route('admin.gyms.index')->with('success', 'Gym updated successfully');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'sometimes|boolean'
        ]);

        $media = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('gym_images');
            $media = [
                'images' => [[
                    'url' => $imagePath,
                    'caption' => 'Main gym image',
                    'is_featured' => true
                ]]
            ];
        }

        Gym::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'location' => $validated['location'],
            'phone' => $validated['phone'],
            'media' => $media,
            'is_active' => $request->boolean('is_active'),
            'address' => $request->input('address', ''), // Add other fields as needed
        ]);

        return redirect()->route('admin.gyms.index')->with('success', 'Gym added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gym $gym)
    {
        echo 'hi';
    }
}
