<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FoodItem;
use Illuminate\Database\Eloquent\SoftDeletes;

class NutritionCategory extends Model
{
    use HasFactory , SoftDeletes;

    protected $table = 'nutrition_categories';
    protected $fillable = [
        'name',
        'description',
        'image_url',
        'calories',
        'protien',
        'carbs',
        'fat',
        'nutrients',
    ];

    protected $casts = [
        'nutrients' => 'array',
    ];
    

    public function foodItems()
    {
        return $this->hasMany(FoodItem::class, 'category_id');
    }
}
