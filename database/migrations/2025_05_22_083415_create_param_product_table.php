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
        Schema::create('param_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('param_id')->constrained('params');
            $table->foreignId('product_id')->constrained('products');
            $table->primary(['param_id', 'product_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('param_product');
    }
};
