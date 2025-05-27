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
        Schema::table('reservations', function (Blueprint $table) {
            $table->dateTime('start_time')->nullable()->after('phone');
            $table->dateTime('end_time')->nullable()->after('start_time');
            $table->dropColumn('reservation_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dateTime('reservation_time')->after('phone'); // Buat kembali kolom yang lama (jika perlu)
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');
        });
    }
};