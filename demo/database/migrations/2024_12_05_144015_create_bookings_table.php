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
        // Periksa apakah tabel sudah ada sebelum membuatnya
        if (!Schema::hasTable('booking')) {
            Schema::create('booking', function (Blueprint $table) {
                $table->id();
                $table->string('full_name');
                $table->string('email');
                $table->string('room_type');
                $table->date('check_in');
                $table->date('check_out');
                $table->string('phone_number');
                $table->integer('total_rooms');
                $table->string('payment_method');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
