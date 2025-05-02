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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama pemesan
            $table->string('email'); // Email pemesan
            $table->string('phone'); // Nomor telepon pemesan
            $table->dateTime('reservation_time'); // Waktu reservasi
            $table->integer('number_of_guests'); // Jumlah tamu
            $table->text('notes')->nullable(); // Catatan tambahan (opsional)
            $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending'); // Status reservasi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};