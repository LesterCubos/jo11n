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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->text('supplier_image');
            $table->string('supplier_name');
            $table->string('supplier_email')->unique();
            $table->string('supplier_kpn');
            $table->string('supplier_address');
            $table->string('supplier_number');
            $table->string('emergency_contact');
            $table->string('econtact_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
