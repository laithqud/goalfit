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
            $table->json('opening_hours');
            $table->json('facilities');
            $table->json('pricing');
            $table->json('media')->nullable();
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