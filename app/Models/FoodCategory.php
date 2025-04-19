<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Add this
use Illuminate\Database\Eloquent\Model;

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

    public function foods()
    {
        return $this->hasMany(FoodItem::class);
    }
}