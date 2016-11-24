<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id', 15); // LRN number
            $table->integer('grade_level')->unsigned(); // Grade Level ID
            $table->foreign('grade_level')->references('id')->on('grade_levels')->onDelete('cascade');
            $table->integer('class_block')->unsigned(); // Class Block ID
            $table->foreign('class_block')->references('id')->on('class_blocks')->onDelete('cascade');
            $table->string('status', 30)->default('1');
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
        Schema::dropIfExists('student_infos');
    }
}
