<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('password_tokens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('token')->unique();
            $table->timestamps();
            $table->timestamp('expires_at')->nullable();
            $table->boolean('used')->default(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('password_tokens');
    }
};