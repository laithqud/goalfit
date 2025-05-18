<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NutritionCategory;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image_url',
        'is_featured',
        'category_id',
    ];

    public function nutritionCategory()
    {
        return $this->belongsTo(NutritionCategory::class, 'category_id');
    }
}
