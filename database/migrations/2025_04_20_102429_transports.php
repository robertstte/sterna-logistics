<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->decimal('cost_per_km', 8, 2);
            $table->decimal('capacity', 8, 2);
            $table->string('license_plate')->unique();
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transports');
    }
};