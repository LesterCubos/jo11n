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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('tron');
            $table->date('ordate');
            $table->string('orsupname');
            $table->string('orsupnumber');
            $table->string('orsku');
            $table->string('orpname');
            $table->string('orpcat');
            $table->string('orpdept');
            $table->string('orpmins');
            $table->string('orpcurs');
            $table->string('orquan');
            $table->string('orpcost');
            $table->string('ortcost');
            $table->string('orstatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};