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
            $table->integer('ID_User');
            $table->integer('ID_Evaluate');
            $table->text('Comment');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluates__managers');
    }
};
