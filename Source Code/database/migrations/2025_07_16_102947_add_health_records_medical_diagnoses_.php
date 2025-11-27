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
        Schema::create('health_records_medical_diagnoses', function (Blueprint $table) {
            $table->foreignId('health_record_id')->constrained('health_records')->onDelete('cascade');
            $table->foreignId('diagnosis_id')->constrained('diagnoses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_records_medical_diagnoses');
    }
};
