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
    Schema::table('history_records', function (Blueprint $table) {
        $table->string('status')->nullable()->after('given_medicine');
    });
}

public function down()
{
    Schema::table('history_records', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}
};
