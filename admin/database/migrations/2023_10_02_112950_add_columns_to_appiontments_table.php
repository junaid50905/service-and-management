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
        Schema::table('appiontments', function (Blueprint $table) {
            $table->enum('status', ['pending', 'assigned', 'late', 'complete'])->default('pending')->after('selling_product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appiontments', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
