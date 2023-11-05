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
        Schema::create('recruiting_engineers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('appiontment_id');
            $table->unsignedBigInteger('engineer_id');
            $table->foreign('appiontment_id')->references('id')->on('appiontments')->onDelete('cascade');
            $table->foreign('engineer_id')->references('id')->on('engineers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruiting_engineers');
    }
};
