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

    protected static function booted()
    {
        static::deleting(function ($category) {
            if ($category->isForceDeleting()) {
                // Hard delete: Let DB handle cascade
                return;
            }

            // Soft delete: Manually soft delete related food items
            foreach ($category->foodItems as $item) {
                $item->delete();
            }
        });

        static::restoring(function ($category) {
            // Optionally restore related food items
            foreach ($category->foodItems()->withTrashed()->get() as $item) {
                $item->restore();
            }
        });
    }

}
