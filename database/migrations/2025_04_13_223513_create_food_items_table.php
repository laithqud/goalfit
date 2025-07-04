
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('food_items', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image_url');
            $table->boolean('is_featured')->default(false);
            $table->foreignId('category_id')->constrained('nutrition_categories')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
            $table->index('is_featured');
        });
    }

    public function down()
    {
        Schema::dropIfExists('food_items');
    }
};