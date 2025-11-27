<?php

// database/migrations/xxxx_xx_xx_create_history_records_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('history_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('health_record_id');
            $table->date('consultation_date');
            $table->string('visit_purpose');
            $table->string('medical_diagnosis');
            $table->timestamps();

            $table->foreign('health_record_id')->references('id')->on('health_records')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('history_records');
    }
}
