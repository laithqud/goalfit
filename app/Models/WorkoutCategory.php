<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\WorkoutItem;

class WorkoutCategory extends Model
{
    public function workoutItems()
    {
        return $this->belongsToMany(WorkoutItem::class);
    }

}
