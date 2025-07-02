<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evaluates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ID_Food')->constrained()->onDelete('cascade');
            $table->foreignId('ID_Customer')->constrained()->onDelete('cascade');
            $table->string('Image')->nullable();
            $table->double('Stars');
            $table->text('Comment')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluates');
    }
};
