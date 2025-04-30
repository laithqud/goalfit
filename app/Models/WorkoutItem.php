<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkoutCategory;

class WorkoutItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'instructions',
        'video_url',
        'difficulty',
        'recommended_reps',
        'recommended_sets',
        'equipment_needed',
        'target_muscles',
        'durations_in_minutes',
        'category_id',
        'created_by',
        'is_premium',
    ];

    public function category()
    {
        return $this->belongsTo(WorkoutCategory::class);
    }

    public function workoutCategories()
    {
        return $this->belongsToMany(WorkoutCategory::class, 'workout_category_workout_item');
    }

}
