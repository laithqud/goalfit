<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\WorkoutCategory;

class WorkoutItem extends Model
{
    public function workoutCategories()
    {
        return $this->belongsToMany(WorkoutCategory::class);
    }

}
