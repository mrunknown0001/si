<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuarterSelectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quarter_selects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();  // first, second, third, forth quarter
            $table->integer('status')->default(0)->unsigned(); // 0 unselected, 1 selected
            $table->integer('finish')->default(0)->unsigned(); // 0 unfinsh, 1 finished
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
        Schema::dropIfExists('quarter_selects');
    }
}
