<?php 

namespace App\Http\Controllers;

use App\Models\WorkoutItemCategory;
use App\Models\WorkoutCategory;
use Illuminate\Http\Request;
use App\Models\Workoutitem;

class WorkoutItemCategoryController extends Controller
{
    public function index()
    {
        $categories = WorkoutCategory::pluck('name');
        $workoutItems=Workoutitem::all();

        return view('public.workout-list', compact('categories', 'workoutItems'));
    }

    
}