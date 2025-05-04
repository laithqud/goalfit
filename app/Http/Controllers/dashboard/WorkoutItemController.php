<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkoutItem;
use App\Models\WorkoutCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WorkoutItemController extends Controller
{
    public function index()
    {
        $videos = WorkoutItem::with('category')->get();
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        $categories = WorkoutCategory::all();
        $difficultyLevels = ['beginner', 'intermediate', 'advanced'];
        $equipmentOptions = ['dumbbells', 'yoga_mat', 'resistance_bands', 'kettlebell', 'pull_up_bar'];
        $muscleGroups = ['chest', 'back', 'arms', 'shoulders', 'legs', 'abs', 'glutes', 'full_body'];
        
        return view('admin.videos.create', compact('categories', 'difficultyLevels', 'equipmentOptions', 'muscleGroups'));
    }

    public function edit(WorkoutItem $video)
    {
        $categories = WorkoutCategory::all(); // Or your category model name
        return view('admin.videos.edit', compact('video', 'categories'));
    }
    public function update(Request $request, WorkoutItem $video)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'video_url' => 'required|url',
            'instructions' => 'nullable|string',
            'difficulty' => 'required|in:beginner,intermediate,advanced',
            'recommended_reps' => 'nullable|integer|min:1',
            'recommended_sets' => 'nullable|integer|min:1',
            'primary_muscles' => 'nullable|string',
            'secondary_muscles' => 'nullable|string',
            'equipment' => 'nullable|array',
            'warmup_duration' => 'nullable|numeric|min:0',
            'exercise_duration' => 'nullable|numeric|min:0',
            'cooldown_duration' => 'nullable|numeric|min:0',
            'category_id' => 'required|exists:workout_categories,id',
            'is_premium' => 'nullable|boolean'
        ]);

        // Prepare JSON data
        $targetMuscles = [
            'primary' => $request->primary_muscles ? 
                array_map('trim', explode(',', $request->primary_muscles)) : [],
            'secondary' => $request->secondary_muscles ? 
                array_map('trim', explode(',', $request->secondary_muscles)) : []
        ];

        $durations = [
            'warmup' => $request->warmup_duration,
            'exercise' => $request->exercise_duration,
            'cooldown' => $request->cooldown_duration
        ];

        // Update the video
        $video->update([
            'name' => $validated['name'],
            'video_url' => $validated['video_url'],
            'instructions' => $validated['instructions'],
            'difficulty' => $validated['difficulty'],
            'recommended_reps' => $validated['recommended_reps'],
            'recommended_sets' => $validated['recommended_sets'],
            'target_muscles' => json_encode($targetMuscles),
            'equipment_needed' => json_encode($request->equipment ?? []),
            'durations_in_minutes' => json_encode(array_filter($durations)),
            'category_id' => $validated['category_id'],
            'is_premium' => $request->has('is_premium') ? 1 : 0,
        ]);

        return redirect()->route('admin.videos.index')
            ->with('success', 'Video updated successfully');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'video_url' => 'nullable|url',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'difficulty' => 'required|in:beginner,intermediate,advanced',
            'recommended_reps' => 'nullable|integer',
            'recommended_sets' => 'nullable|integer',
            'category_id' => 'required|exists:workout_categories,id',
            'instructions' => 'nullable|string',
            'equipment_needed' => 'nullable|array',
            'primary_muscles' => 'nullable|array',
            'secondary_muscles' => 'nullable|array',
            'durations' => 'nullable|array',
        ]);

        // Handle image upload
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // Merge muscles
        $targetMuscles = [
            'primary' => $request->input('primary_muscles', []),
            'secondary' => $request->input('secondary_muscles', []),
        ];

        // Create the workout item
        WorkoutItem::create([
            'name' => $request->input('name'),
            'instructions' => $request->input('instructions'),
            'video_url' => $request->input('video_url'),
            'difficulty' => $request->input('difficulty'),
            'recommended_reps' => $request->input('recommended_reps'),
            'recommended_sets' => $request->input('recommended_sets'),
            'equipment_needed' => json_encode($request->input('equipment_needed', [])),
            'target_muscles' => json_encode($targetMuscles),
            'durations_in_minutes' => json_encode($request->input('durations', [])),
            'category_id' => $request->input('category_id'),
            'created_by' => 1, // or null
            'is_premium' => $request->has('is_premium'),
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->route('admin.videos.index')->with('success', 'Workout video created successfully.');
    }


    public function destroy(WorkoutItem $video)
    {
        // Optional: delete the thumbnail if it exists
        if ($video->thumbnail_url && Storage::disk('public')->exists($video->thumbnail_url)) {
            Storage::disk('public')->delete($video->thumbnail_url);
        }

        $video->delete();

        return redirect()->route('admin.videos.index')
            ->with('success', 'Video deleted successfully!');
    }

}