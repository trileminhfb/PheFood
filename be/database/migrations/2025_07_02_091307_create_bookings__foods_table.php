<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('bookings__foods', function (Blueprint $table) {
            $table->id();
            $table->integer('ID_Food');
            $table->integer('ID_Booking');
            $table->integer('Amount');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings__foods');
    }
};
