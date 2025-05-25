<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('order_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('package_type_id')->constrained('package_types')->onDelete('restrict');
            $table->decimal('weight', 10, 2);
            $table->foreignId('transport_id')->constrained('transports')->onDelete('restrict');
            $table->foreignId('origin')->constrained('countries')->onDelete('restrict');
            $table->foreignId('destination')->constrained('countries')->onDelete('restrict');
            $table->foreignId('departure_location')->constrained('country_locations')->onDelete('restrict');
            $table->foreignId('arrival_location')->constrained('country_locations')->onDelete('restrict');
            $table->date('departure_date');
            $table->date('arrival_date');
            $table->text('description');
            $table->text('observations')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_requests');
    }
}; 