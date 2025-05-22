<?php 

namespace App\Http\Controllers;
use App\Models\Gym; 
use App\Models\WorkoutCategory;
use App\Models\Home;
use Illuminate\Http\Request;
 
class ProfileController extends Controller
{
    public function index()
    {
        return view("public.profile");
    }
}