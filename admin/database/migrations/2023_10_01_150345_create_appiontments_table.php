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
        Schema::create('appiontments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('selling_product_id');
            $table->enum('status', ['pending', 'assigned', 'late', 'complete'])->default('pending');
            $table->string('date')->default('null');
            $table->string('time')->default('null');
            $table->foreign('selling_product_id')->references('id')->on('selling_products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appiontments');
    }
};
