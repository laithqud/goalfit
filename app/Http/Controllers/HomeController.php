<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\WorkoutCategory;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view("home");
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'search' => 'required|string|max:255',
        ]);

        $search = strtolower($validated['search']);

        // Search for matching gym
        $gym = Gym::whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
                ->orWhereRaw('LOWER(address) LIKE ?', ["%{$search}%"])
                ->orWhereRaw('LOWER(description) LIKE ?', ["%{$search}%"])
                ->first();

        if ($gym) {
            return redirect()->route('gym.index', $gym->id);
        }

        // Search for matching nutrition category
        $category = WorkoutCategory::whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])
            ->orWhereRaw('LOWER(description) LIKE ?', ["%{$search}%"])
            ->first();

        if ($category) {
            return redirect()->route('workout.index', $category->id);
        }

        // If nothing found, return a "no results" page
        return view('public.no_results', ['search' => $search]);
    }

}
