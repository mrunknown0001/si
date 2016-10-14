<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_assigns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('co_admin')->unsigned();
            $table->foreign('co_admin')->references('id')->on('users')->onDelete('cascade');
            $table->integer('block')->unsigned();
            $table->foreign('block')->references('id')->on('class_blocks')->onDelete('cascade');
            $table->integer('level')->unsigned();
            $table->foreign('level')->references('id')->on('grade_levels')->onDelete('cascade');
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
        Schema::dropIfExists('block_assigns');
    }
}
