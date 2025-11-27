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
        Schema::table('action_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('patient_id')->nullable()->after('user_id');
            $table->string('action_type')->nullable()->after('patient_id');
            $table->text('details')->nullable()->after('action_type');

            $table->foreign('patient_id')->references('id')->on('health_records')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('action_logs', function (Blueprint $table) {
            $table->dropForeign(['patient_id']);
            $table->dropColumn(['patient_id', 'action_type', 'details']);
        });
    }
};
