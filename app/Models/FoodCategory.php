<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Add this
use Illuminate\Database\Eloquent\Model;
use App\Models\FoodItem; // Add this

class FoodCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    public function foodItems()
    {
        return $this->hasMany(FoodItem::class);
    }

}