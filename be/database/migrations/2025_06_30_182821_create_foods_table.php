<?php

use App\Enums\Foods\BestSellerFoods;
use App\Enums\Foods\StatusFoods;
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
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Image');
            $table->integer('ID_Type');
            $table->integer('BestSeller')->default(BestSellerFoods::NORMAL);
            $table->integer('Status')->default(StatusFoods::ACTIVCE);
            $table->integer('Cost');
            $table->text('Detail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};
