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
        Schema::create('parts_for_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('appiontment_id');
            $table->string('appliance_name');
            $table->foreign('appiontment_id')->references('id')->on('appiontments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parts_for_product');
    }
};
