<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // 1) Lepas dulu foreign key constraint sebelum drop kolom menu_id
            $table->dropForeign(['menu_id']);
            // 2) Kemudian drop kolom-kolom yang tidak perlu
            $table->dropColumn(['menu_id', 'quantity', 'price', 'total_price']);
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Tambal balik:
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('price', 12, 2)->nullable();
            $table->decimal('total_price', 12, 2)->nullable();

            // Restore foreign key (asumsikan menu.id adalah parent)
            $table->foreign('menu_id')->references('id')->on('menu')->onDelete('cascade');
        });
    }
};
