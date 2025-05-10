<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('country_locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('latitude');
            $table->string('longitude');
            $table->foreignId('type_id')->constrained('transport_types')->onDelete('cascade');
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('country_locations');
    }
};