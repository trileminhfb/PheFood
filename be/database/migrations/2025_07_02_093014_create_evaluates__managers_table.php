<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evaluates__managers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ID_User')->constrained('Users')->onDelete('cascade');
            $table->foreignId('ID_Evaluate')->constrained('Evaluates')->onDelete('cascade');
            $table->text('Comment');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluates__managers');
    }
};
