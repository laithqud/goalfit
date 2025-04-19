<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video; // Assuming you have a Video model

class VideoController extends Controller
{
    public function index() 
    {
        $videos = Video::all();
        return view('admin.videos.index', compact('videos'));
    }
}
