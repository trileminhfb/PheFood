<?php

use App\Enums\Types\StatusTypes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('Name')->unique();
            $table->integer('Status')->default(StatusTypes::ACTIVATED);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('types');
    }
};
