<?php

use App\Enums\Bookings\StatusBookings;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ID_Customer')->constrained('Customers')->onDelete('cascade');
            $table->dateTime('Time');
            $table->integer('Amount');
            $table->integer('Status')->default(StatusBookings::PENDING);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
