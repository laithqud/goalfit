<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Add this
use Illuminate\Database\Eloquent\Model;


class Gym extends Model
{
    use HasFactory; // Add this line to enable the factory method

    protected $fillable = [
        'name',
        'location',
        'phone',
        'description',
        'image',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'home_gym_id');
    }
    
    public function gymSubscriptions()
    {
        return $this->hasMany(GymSubscription::class);
    }
    

}
