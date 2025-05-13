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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cart_id'); // Foreign key ke tabel carts
            $table->unsignedBigInteger('menu_id'); // Foreign key ke tabel menus
            $table->integer('quantity')->default(1); // Jumlah item di cart
            $table->decimal('price', 10, 2); // Harga item saat ditambahkan ke cart (penting jika harga berubah)

            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade'); // Relasi ke tabel carts
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade'); // Relasi ke tabel menus

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};