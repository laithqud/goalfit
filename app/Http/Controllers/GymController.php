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
    public function search(Request $request)
    {
        $location = $request->input('location');

        if(empty($location)) {
            return $this->index();
        }

        $gyms = Gym::where('address', $location)->get(); // or use 'city' column if you have it
    
        if ($gyms->isEmpty()) {
            return view('public.gym', compact('gyms'))->with('message', 'No gyms found in that location.');
        }
    
        return view('public.gym', compact('gyms'));
    }


    public function detailes($id)
    {
        // Find the gym by ID
        $gym = Gym::findOrFail($id);
        
        // You might want to load related data like reviews, trainers, etc.
        // $gym->load('reviews', 'trainers');
        
        // Return the view with the gym data
        return view("public.gym-card", compact('gym'));
        
    }

    
}
