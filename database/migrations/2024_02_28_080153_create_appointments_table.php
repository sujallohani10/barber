<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('barber_id');
            $table->string('branch')->nullable();
            $table->date('date');
            $table->time('time');
            // Foreign key relationships
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('barber_id')->references('id')->on('barbers')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
