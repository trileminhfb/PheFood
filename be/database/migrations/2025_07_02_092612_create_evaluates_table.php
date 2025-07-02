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
            $table->integer('ID_Food');
            $table->integer('ID_Customer');
            $table->string('Image');
            $table->double('Stars');
            $table->text('Comment');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluates');
    }
};
