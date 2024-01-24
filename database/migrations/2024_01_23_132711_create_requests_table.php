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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('reqNo')->unique()->default(0);
            $table->date('request_date');
            $table->string('requester_name');
            $table->string('department');
            $table->string('requester_email');
            $table->string('product_sku');
            $table->string('product_category');
            $table->string('product_name');
            $table->string('requested_quantity');
            $table->text('request_purpose');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
