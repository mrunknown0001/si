<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            // $table->integer('level_id')->unsigned();
            // $table->foreign('level_id')->references('id')->on('grade_levels');
            // $table->string('code', 30)->unique();
            $table->string('level', 20);
            $table->string('title', 30);
            $table->string('description', 150)->nullable();
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
        Schema::dropIfExists('subjects');
    }
}
