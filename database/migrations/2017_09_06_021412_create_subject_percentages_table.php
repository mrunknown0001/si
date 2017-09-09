<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectPercentagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_percentages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id')->unsigned();
            $table->integer('section_id')->unsigned(); // block id
            $table->integer('user_id')->unsigned();
            $table->smallinteger('activity')->unsigned();
            $table->smallinteger('assignment')->unsigned();
            $table->smallinteger('attendance')->unsigned();
            $table->smallinteger('quiz')->unsigned();
            $table->smallinteger('other')->unsigned()->nullable();
            $table->smallinteger('project')->unsigned();
            $table->smallinteger('exam')->unsigned();
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
        Schema::dropIfExists('subject_percentages');
    }
}
