<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveMenuIdFromOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Hapus foreign key constraint terlebih dahulu
            $table->dropForeign(['menu_id']); // Asumsi: Nama constraint adalah 'orders_menu_id_foreign'
            $table->dropColumn('menu_id');
        });
    }

    public function down()
    {
        // Opsional: Jika Anda perlu mengembalikan kolom ini di masa mendatang.
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('menu_id')->nullable();
            // Tambahkan foreign key constraint kembali
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('restrict');
        });
    }
}