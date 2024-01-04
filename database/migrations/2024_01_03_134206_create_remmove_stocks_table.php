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
        Schema::create('remmove_stocks', function (Blueprint $table) {
            $table->id();
            $table->date('curdate');
            $table->string('rsku');
            // $table->string('pupc')->nullable();
            $table->string('rsmrn')->nullable()->unique();
            $table->string('rname');
            $table->string('rcat');
            $table->string('rdept');
            $table->date('expdate');
            $table->string('rquantity');
            $table->text('rnotes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remmove_stocks');
    }
};
