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
        Schema::create('receive_issues', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('smrn')->nullable()->unique();
            $table->string('psku');
            $table->string('pupc')->nullable();
            $table->string('pname');
            $table->string('pcategory');
            $table->string('department');
            $table->string('sname');
            $table->string('quantity');
            $table->string('purchase_cost')->nullable();
            $table->string('selling_cost')->nullable();
            $table->date('expiry_date')->nullable();
            $table->text('notes')->nullable();
            $table->string('movement')->nullable();
            $table->boolean('revstock')->default(0);
            $table->string('issuesmrn')->nullable();
            $table->string('issuequan')->nullable();
            $table->string('issuetype')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receive_issues');
    }
};
