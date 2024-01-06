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
            $table->text('product_image')->nullable();
            $table->string('product_sku')->default(0);
            $table->string('product_upc')->nullable();
            $table->string('product_name');
            $table->string('product_category');
            $table->string('product_weight')->nullable();
            $table->string('product_variant')->nullable();
            $table->string('packaging_type')->nullable();
            $table->string('min_stock');
            $table->string('pdept')->nullable();
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
