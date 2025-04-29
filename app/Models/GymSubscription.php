<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gym;

class GymSubscription extends Model
{
    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
    
}
