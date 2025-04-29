<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('gyms', function (Blueprint $table) {
            
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('address');
            $table->string('location');
            $table->string('phone');
            $table->json('opening_hours')->comment('
                {
                    "monday": {"open": "08:00", "close": "22:00", "is_24h": false},
                    "tuesday": {"open": "06:00", "close": "23:00"},
                    ...
                }
            ');
            
            $table->json('facilities')->comment('
                [
                    {"name": "parking", "available": true, "description": "Free for members"},
                    {"name": "pool", "available": true, "requires_booking": true},
                    ...
                ]
            ');
            
            $table->json('pricing')->comment('
                {
                    "plans": {
                        "basic": {"monthly": 39.99, "annual": 399.99},
                        "premium": {"monthly": 59.99, "annual": 599.99}
                    },
                    "day_pass": 15.00,
                    "currency": "USD"
                }
            ');
            
            $table->json('media')->nullable()->comment('
                {
                    "images": [
                        {"url": "gyms/1/main.jpg", "caption": "Main Entrance", "is_featured": true},
                        {"url": "gyms/1/equipment.jpg", "caption": "Weight Area"}
                    ],
                    "videos": [
                        {"url": "gyms/1/tour.mp4", "thumbnail": "gyms/1/video-thumb.jpg"}
                    ]
                }
            ');
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gyms');
    }
};