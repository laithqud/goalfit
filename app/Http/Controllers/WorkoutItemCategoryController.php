<?php 

namespace App\Http\Controllers;

use App\Models\WorkoutItemCategory;
use App\Models\WorkoutCategory;
use Illuminate\Http\Request;
use App\Models\Workoutitem;

class WorkoutItemCategoryController extends Controller
{
    public function index(Request $request)
{
    $categories = WorkoutCategory::all();
    
    $selectedCategoryId = $request->input('category');

    if ($selectedCategoryId) {
        $workoutItems = Workoutitem::where('category_id', $selectedCategoryId)->get();
    } else {
        $workoutItems = Workoutitem::all();
    }

    return view('public.workout-list', compact('categories', 'workoutItems', 'selectedCategoryId'));
}


    
}