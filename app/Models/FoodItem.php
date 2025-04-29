<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FoodCategory;


class FoodItem extends Model
{
    use HasFactory;
    protected $table = "food_items";
    protected $fillable = [
        'name',
        'calories',
        'food_category_id',
    ];
    public function foodCategory()
    {
        return $this->belongsTo(FoodCategory::class);
    }

}
