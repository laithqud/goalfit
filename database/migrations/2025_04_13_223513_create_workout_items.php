<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('workout_items', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->text('instructions')->nullable();
            $table->string('video')->nullable();
            $table->enum('difficulty', ['beginner', 'intermediate', 'advanced']);
            $table->unsignedTinyInteger('recommended_reps')->nullable();
            $table->unsignedTinyInteger('recommended_sets')->nullable();
            $table->json('equipment_needed')->nullable();
            $table->json('target_muscles')->nullable();
            $table->string('durations_in_minutes')->nullable(); 
            $table->foreignId('category_id')->constrained('workout_categories')->cascadeOnDelete();
            $table->foreignId('created_by')->references('id')->on('users')->comment('Trainer who created this');
            $table->boolean('is_premium')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('workout_items');
    }
};