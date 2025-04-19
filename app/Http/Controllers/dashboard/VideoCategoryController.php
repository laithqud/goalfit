<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VideoCategory;

class VideoCategoryController extends Controller
{
    public function index()
    {
        $categories = VideoCategory::all();
        return view('admin.videoCategory.index', compact('categories'));
    }
}
