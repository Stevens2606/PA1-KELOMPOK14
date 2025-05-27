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
        Schema::create('mejas', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis (auto-increment)
            $table->string('nomor_meja'); // Kolom untuk nomor meja (misalnya, "A1", "B2")
            $table->integer('kapasitas'); // Kolom untuk kapasitas meja (jumlah kursi)
            $table->enum('status', ['tersedia', 'dipesan', 'tidak_tersedia'])->default('tersedia'); // Kolom status (tersedia, dipesan, tidak_tersedia)
            $table->timestamps(); // Kolom created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mejas');
    }
};