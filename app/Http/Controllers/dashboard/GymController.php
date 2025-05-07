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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'sometimes|boolean',
            'opening_hours' => 'required|array',
            'facilities' => 'required|array',
            'pricing' => 'required|array',
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
            'address' => $validated['address'],
            'media' => $media,
            'is_active' => $request->boolean('is_active'),
            'opening_hours' => $validated['opening_hours'],
            'facilities' => $validated['facilities'],
            'pricing' => $validated['pricing'],
        ]);

        return redirect()->route('admin.gyms.index')->with('success', 'Gym added successfully');
    }


    public function edit(Gym $gym)
    {
        return view('admin.gyms.edit', compact('gym'));
    }

    public function update(Request $request, Gym $gym)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'sometimes|boolean',
            'opening_hours' => 'required|array',
            'facilities' => 'required|array',
            'pricing' => 'required|array',
        ]);

        $media = $gym->media ?? ['images' => []];

        if ($request->has('remove_image') && isset($media['images'][0]['url'])) {
            Storage::delete($media['images'][0]['url']);
            $media['images'] = [];
        }

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
                'location' => $validated['location'],
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'media' => $media,
                'is_active' => $request->boolean('is_active', $gym->is_active),
                'opening_hours' => $validated['opening_hours'],
                'facilities' => $validated['facilities'],
                'pricing' => $validated['pricing'],
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating gym: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update gym');
        }

        return redirect()->route('admin.gyms.index')->with('success', 'Gym updated successfully');
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

        if ($gym->media && isset($gym->media['images'][0]['url'])) {
            Storage::delete($gym->media['images'][0]['url']);
        }

        $gym->forceDelete();

        return redirect()->route('admin.gyms.trashed')->with('success', 'Gym permanently deleted.');
    }
}
