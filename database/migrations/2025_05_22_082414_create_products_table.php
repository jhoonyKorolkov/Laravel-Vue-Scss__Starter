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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('sku')->unique(); // 🔹 Добавляем артикул
            $table->text('content');
            $table->decimal('price');
            $table->decimal('old_price');
            $table->foreignId('category_id')->index()->constrained('categories');
            $table->foreignId('product_parent_id')->index()->constrained('product_parents');
            $table->unsignedBigInteger('qty')->nullable(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
