<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('parentname');
            $table->bigInteger('parentnumber');
            $table->string('gender');
            $table->bigInteger('phone')->unique();
            $table->string('email')->unique();
            $table->string('student_code')->unique();
            $table->string('college')->default('SKNCOE');
            $table->string('department');
            $table->string('year');
            $table->longText('address');
            $table->integer('division');
            $table->string('roll');
            $table->tinyInteger('accredited')->default(0);
            $table->tinyInteger('feedback')->default(0);
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
        Schema::drop('students');
    }
}
