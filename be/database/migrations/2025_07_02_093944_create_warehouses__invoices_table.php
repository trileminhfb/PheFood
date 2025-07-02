<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('warehouses__invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('ID_Ingredient');
            $table->integer('Amount');
            $table->integer('Cost');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('warehouses__invoices');
    }
};
