<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkoutCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes; 

class WorkoutItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'instructions',
        'video',
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

    protected $casts = [
        'equipment_needed' => 'array',
        'target_muscles' => 'array',
        'durations_in_minutes' => 'array',
        'is_premium' => 'boolean',
    ];
    

    public function category()
    {
        return $this->belongsTo(WorkoutCategory::class);
    }

    protected static function boot()
    {
        parent::boot();

        // For soft deletes — delete the video when moving to trash
        static::deleting(function ($item) {
            if (! $item->isForceDeleting()) return; // Prevent accidental delete during soft delete

            if ($item->video && Storage::disk('public')->exists($item->video)) {
                Storage::disk('public')->delete($item->video);
            }
        });

        // For force deletes — delete the video from storage
        static::forceDeleted(function ($item) {
            if ($item->video && Storage::disk('public')->exists($item->video)) {
                Storage::disk('public')->delete($item->video);
            }
        });
    }


}
