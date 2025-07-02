<?php

use App\Enums\Sales\StatusSales;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('Name')->unique();
            $table->dateTime('Start');
            $table->dateTime('End');
            $table->double('Percent');
            $table->integer('Status')->default(StatusSales::UNACTIVATED);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
