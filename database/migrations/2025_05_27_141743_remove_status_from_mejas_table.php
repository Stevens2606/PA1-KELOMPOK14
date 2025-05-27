<?php
// database/migrations/xxxx_xx_xx_remove_status_from_mejas_table.php

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
        Schema::table('mejas', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mejas', function (Blueprint $table) {
            $table->enum('status', ['tersedia', 'dipesan', 'tidak_tersedia'])->default('tersedia'); // Atau status default Anda
        });
    }
};