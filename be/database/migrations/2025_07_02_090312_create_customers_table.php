<?php

use App\Enums\Customers\ActiveCustomers;
use App\Enums\Customers\StatusCustomers;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('Image')->nullable();
            $table->string('Phone')->unique();
            $table->string('OTP')->nullable();
            $table->date('Birth');
            $table->integer('Status')->default(StatusCustomers::PENDING);
            $table->integer('Points')->default(0);
            $table->integer('is_Active')->default(ActiveCustomers::UNACTIVATED);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
