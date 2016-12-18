<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('gender');
            $table->bigInteger('phone')->unique();
            $table->string('email')->unique();
            $table->string('teacher_code')->unique();
            $table->string('college')->default('SKNCOE');
            $table->string('department');
            $table->longText('address');
            $table->string('qualification');
            $table->string('post');
            $table->string('subject');
            $table->string('interests');
            $table->string('year_assigned');
            $table->string('divisions_assigned');
            $table->tinyInteger('accredited')->default(0);
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
        Schema::drop('teachers');
    }
}
