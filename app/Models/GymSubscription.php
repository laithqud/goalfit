<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'gym_id',
        'user_id',
        'start_date',
        'end_date',
        'price',
        'status',
    ];

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
