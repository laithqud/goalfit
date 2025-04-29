
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('nutrition_categories', function (Blueprint $table) {
            
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('image_url');
            $table->integer('calories');
            $table->float('protien');
            $table->float('carbs');
            $table->float('fat');
            $table->json('nutrients')->comment('
                {
                    "calories": 250,
                    "macros": {
                        "protein": 20.5,
                        "carbs": 30.2,
                        "fats": 10.8,
                        "fiber": 5.1
                    },
                    "micronutrients": {
                        "vitamin_c": "15%",
                        "iron": "8%"
                    }
                }
            ');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nutrition_categories');
    }
};