<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gyms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->string('phone')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
        // Schema::create('gyms', function (Blueprint $table) {
        //     $table->id(); // Auto-increment primary key
        //     $table->string('name');
        //     $table->string('location')->nullable(); // Nullable, as it’s optional
        //     $table->text('description');
        //     $table->json('opening_hours'); // JSON format for opening hours
        //     $table->json('facilities'); // JSON format for facilities
        //     $table->decimal('price', 8, 2); // Price column for the gym subscription
        //     $table->json('images'); // JSON format to store image URLs
        //     $table->timestamps(); // created_at and updated_at
        // });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gyms');
    }
};
