<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FoodItem;

class NutritionCategory extends Model
{
    use HasFactory;

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

    public function foodItems()
    {
        return $this->hasMany(FoodItem::class, 'category_id');
    }
}
