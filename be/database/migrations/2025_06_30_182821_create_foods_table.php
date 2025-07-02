<?php

use App\Enums\Foods\BestSellerFoods;
use App\Enums\Foods\StatusFoods;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Image_Main')->nullable();
            $table->string('Image')->nullable();
            $table->integer('ID_Type');
            $table->integer('BestSeller')->default(BestSellerFoods::NORMAL);
            $table->integer('Status')->default(StatusFoods::ACTIVCE);
            $table->integer('Cost');
            $table->text('Detail')->nullable();
            $table->double('Rates')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};
