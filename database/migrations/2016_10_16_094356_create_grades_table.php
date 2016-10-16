<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id');
            $table->string('grade');
            $table->integer('subject_id')->unsigned();
            $table->integer('block_id')->unsigned();
            $table->integer('grade_level_id')->unsigned();
            $table->integer('quarter_id')->unsigned();
            $table->integer('school_year_id')->unsigned();
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
        Schema::dropIfExists('grades');
    }
}
