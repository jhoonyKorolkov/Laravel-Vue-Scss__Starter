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
            $table->foreignId('cart_id')->constrained('carts')->cascadeOnDelete(); // связь с carts
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete(); // связь с products
            $table->integer('quantity')->default(1);
            $table->decimal('price_at_time', 10, 2)->nullable(); // цена товара на момент добавления в корзину
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
