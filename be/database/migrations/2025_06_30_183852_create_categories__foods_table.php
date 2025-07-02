<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories__foods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ID_Food')->constrained('Foods')->onDelete('cascade');
            $table->foreignId('ID_Category')->constrained('Categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories__foods');
    }
};
