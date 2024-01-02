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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('stock_sku')->nullable();
            $table->string('stock_category')->nullable();
            $table->string('product_name')->nullable();
            $table->string('stock_quantity')->nullable();
            $table->string('purchase_cost')->nullable();
            $table->string('total_stock_cost')->nullable();
            $table->string('selling_cost')->nullable();
            $table->string('total_stock_value')->nullable();
            $table->string('availability')->nullable();
            $table->string('availability_stock')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
