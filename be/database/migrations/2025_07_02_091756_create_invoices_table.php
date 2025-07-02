<?php

use App\Enums\Invoices\StatusInvoices;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('ID_Table');
            $table->foreignId('ID_User')->constrained('Users')->onDelete('cascade');
            $table->foreignId('ID_Customer')->constrained('Customers')->onDelete('cascade');
            $table->integer('ID_Sale');
            $table->integer('Total');
            $table->integer('Status')->default(StatusInvoices::PENDING);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
