<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gym extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'address',
        'location',
        'phone',
        'opening_hours',
        'facilities',
        'pricing',
        'media',
        'is_active'
    ];

    protected $casts = [
        'opening_hours' => 'array',
        'facilities' => 'array',
        'pricing' => 'array',
        'media' => 'array',
        'is_active' => 'boolean'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'home_gym_id');
    }
    
    public function gymSubscriptions()
    {
        return $this->hasMany(GymSubscription::class);
    }

    // Helper method to get featured image
    public function getFeaturedImageAttribute()
    {
        if (empty($this->media) || !isset($this->media['images'])) {
            return null;
        }
        
        return collect($this->media['images'])->firstWhere('is_featured', true);
    }
}