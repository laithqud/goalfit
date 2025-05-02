<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkoutItem;

class WorkoutItemController extends Controller
{
    public function index() 
    {
        $videos = WorkoutItem::all();
        return view('admin.videos.index', compact('videos'));
    }
}
