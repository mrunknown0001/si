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
            $table->string('w1')->nullable();
            $table->string('w2')->nullable();
            $table->string('w3')->nullable();
            $table->string('w4')->nullable();
            $table->string('w5')->nullable();
            $table->string('w6')->nullable();
            $table->string('w7')->nullable();
            $table->string('w8')->nullable();
            $table->string('w9')->nullable();
            $table->string('w10')->nullable();
            $table->string('wtotal')->nullable();
            $table->string('wps')->nullable();
            $table->string('wws')->nullable();
            $table->string('p1')->nullable();
            $table->string('p2')->nullable();
            $table->string('p3')->nullable();
            $table->string('p4')->nullable();
            $table->string('p5')->nullable();
            $table->string('p6')->nullable();
            $table->string('p7')->nullable();
            $table->string('p8')->nullable();
            $table->string('p9')->nullable();
            $table->string('p10')->nullable();
            $table->string('ptotal')->nullable();
            $table->string('pps')->nullable();
            $table->string('pws')->nullable();
            $table->string('q')->nullable();
            $table->string('qps')->nullable();
            $table->string('qws')->nullable();
            $table->string('initial')->nullable();
            $table->string('grade'); // Quarterly grade
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
