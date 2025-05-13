<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // Kolom ID otomatis (primary key, auto-increment)

            // Definisikan Kolom
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('menu_id');
            $table->integer('quantity')->default(1); // Default 1 jika tidak diisi
            $table->decimal('price', 10, 2); // Total 10 digit, 2 di belakang koma

            $table->timestamps(); // created_at dan updated_at

            // Definisikan Foreign Key (opsional, tapi SANGAT disarankan jika tabel orders dan menus ada)
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade'); // Jika order dihapus, item juga dihapus
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('restrict'); // Jika menu dihapus, item tidak bisa dihapus
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}