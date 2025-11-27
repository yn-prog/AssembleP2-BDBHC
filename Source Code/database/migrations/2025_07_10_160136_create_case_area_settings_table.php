<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('case_area_settings', function (Blueprint $table) {
        $table->id();
        $table->string('type'); // 'high', 'medium', 'low'
        $table->integer('min_cases');
        $table->integer('max_cases')->nullable(); // allow 999 or null for ∞
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_area_settings');
    }
};
