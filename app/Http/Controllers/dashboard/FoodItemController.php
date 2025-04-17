<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FoodItemController extends Controller
{
    public function index()
    {
        return view('admin.foodItems.index');
    }
}
