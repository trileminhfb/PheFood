<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles__functions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ID_Role')->constrained()->onDelete('cascade');
            $table->foreignId('ID_Function')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles__functions');
    }
};
