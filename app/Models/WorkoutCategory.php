<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkoutItem;

class WorkoutCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image_url',
    ];

    public function workoutItems()
    {
        return $this->hasMany(WorkoutItem::class);
    }

    
}
