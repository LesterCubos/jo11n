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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transNo')->unique()->default(0);
            $table->string('transaction_type');
            $table->date('transaction_date');
            $table->string('product_sku');
            $table->string('product_name');
            $table->string('product_category');
            $table->string('department');
            $table->string('transaction_quantity');
            $table->string('total_stock_cost');
            $table->text('transaction_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
