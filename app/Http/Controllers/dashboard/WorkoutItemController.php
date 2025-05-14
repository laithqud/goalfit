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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'video' => 'nullable|file|mimetypes:video/mp4,video/quicktime,video/x-msvideo|max:102400',
            'difficulty' => 'required|in:beginner,intermediate,advanced',
            'recommended_reps' => 'nullable|integer|min:0',
            'recommended_sets' => 'nullable|integer|min:0',
            'instructions' => 'nullable|string',
            'equipment_needed' => 'nullable|array',
            'primary_muscles' => 'nullable|array',
            'secondary_muscles' => 'nullable|array',
            'durations' => 'nullable|array',
            'category_id' => 'required|exists:workout_categories,id',
            'is_premium' => 'nullable|boolean'
        ]);

        $targetMuscles = $validated['primary_muscles'] ?? ($video->target_muscles['primary'] ?? []);
        $secondaryMuscles = $validated['secondary_muscles'] ?? ($video->target_muscles['secondary'] ?? []);
        $durations = $validated['durations'] ?? $video->durations_in_minutes ?? ['warmup' => 0, 'exercise' => 0, 'cooldown' => 0];

        // Handle video file update
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos', 'public');
            $video->video = $videoPath;
        }

        // Then apply:
        $video->fill([
            'name' => $validated['name'],
            'instructions' => $validated['instructions'] ?? $video->instructions,
            'difficulty' => $validated['difficulty'],
            'recommended_reps' => $validated['recommended_reps'] ?? $video->recommended_reps,
            'recommended_sets' => $validated['recommended_sets'] ?? $video->recommended_sets,
            'equipment_needed' => $validated['equipment_needed'] ?? $video->equipment_needed,
            'target_muscles' => [
                'primary' => $targetMuscles,
                'secondary' => $secondaryMuscles,
            ],
            'durations_in_minutes' => $durations,
            'category_id' => $validated['category_id'],
            'is_premium' => $request->has('is_premium'),
        ])->save();


        return redirect()->route('admin.videos.index')->with('success', 'Workout video updated successfully.');
    }
    public function store(Request $request)
    {
        // $test='store';
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'video' => 'required|file|mimetypes:video/mp4,video/quicktime,video/x-msvideo,video/x-flv,video/x-matroska|max:102400',
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

        // Merge muscles
        $targetMuscles = [
            'primary' => $request->input('primary_muscles', []),
            'secondary' => $request->input('secondary_muscles', []),
        ];

        if ($request->hasFile('video')) {
            $path = $request->file('video')->store('videos', 'public');
            $validated['video'] = $path;
        }

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



