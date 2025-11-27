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
    Schema::table('users', function (Blueprint $table) {
    $table->enum('role', ['physician', 'nurse', 'midwife', 'dentist','user'])->after('email')->default('nurse');
});
}

public function down()
{
   Schema::table('users', function (Blueprint $table) {
    $table->enum('role', ['physician', 'nurse', 'midwife', 'dentist','user'])->after('email')->default('nurse');
});
}

};
