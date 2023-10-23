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
            $table->unsignedBigInteger('sold_product_id');
            $table->enum('status', ['pending', 'assigned', 'late', 'complete'])->default('pending');
            $table->string('usertype');
            $table->date('appiontment_taken_date')->nullable();
            $table->time('appiontment_taken_time')->nullable();
            $table->date('inspection_date')->nullable();
            $table->time('inspection_time')->nullable();
            $table->foreign('sold_product_id')->references('id')->on('sold_products')->onDelete('cascade');
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
