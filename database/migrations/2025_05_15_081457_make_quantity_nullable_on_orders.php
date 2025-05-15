<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // ubah jadi nullable (atau pakai default jika perlu)
            $table->integer('quantity')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // kembalikan ke NOT NULL tanpa default
            $table->integer('quantity')->nullable(false)->change();
        });
    }
};
