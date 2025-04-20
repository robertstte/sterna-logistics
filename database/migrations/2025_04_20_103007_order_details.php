<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->string('origin');
            $table->string('destination');
            $table->date('departure_date');
            $table->date('arrival_date');
            $table->decimal('distance_km', 8, 2);
            $table->foreignId('transport_id')->constrained('transports')->onDelete('cascade');
            $table->decimal('total_cost', 8, 2);
            $table->decimal('weight', 8, 2);
            $table->string('location');
            $table->foreignId('package_type_id')->constrained('package_types')->onDelete('cascade');
            $table->string('description');
            $table->string('observations')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};