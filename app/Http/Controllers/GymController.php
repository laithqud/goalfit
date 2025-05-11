<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use Illuminate\Http\Request;

class GymController extends Controller
{
    public function index()
    {
        $gyms=Gym::all();
        return view('public.gym', compact('gyms'));
    }
    public function detailes(){
        $gyms = Gym::all();
        return view("public.gym-card", compact('gyms'));
    }

    
}
