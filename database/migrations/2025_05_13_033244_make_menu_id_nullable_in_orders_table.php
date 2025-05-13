<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Ubah menu_id jadi boleh null
            $table->unsignedBigInteger('menu_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Kembalikan jadi NOT NULL jika rollback
            $table->unsignedBigInteger('menu_id')->nullable(false)->change();
        });
    }
};
