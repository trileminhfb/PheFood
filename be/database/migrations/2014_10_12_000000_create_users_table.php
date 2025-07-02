<?php

use App\Enums\Users\ActiveUsers;
use App\Enums\Users\StatusUsers;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('Image')->nullable();
            $table->string('Phone');
            $table->string('Password');
            $table->date('Birth');
            $table->integer('Status')->default(StatusUsers::PENDING);
            $table->integer('is_Active')->default(ActiveUsers::UNACTIVCE);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
