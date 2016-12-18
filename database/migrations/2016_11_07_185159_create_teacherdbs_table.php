<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherdbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacherdbs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('teacher_code')->unique();
            $table->string('department');
            $table->string('college');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teacherdbs');
    }
}
