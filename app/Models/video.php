<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;  // This is necessary to enable the factory

    protected $fillable = [
        'title',
        'description',
        'video_url',
        'category_id',
    ];

    // If the relationship with Category is set up correctly
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
