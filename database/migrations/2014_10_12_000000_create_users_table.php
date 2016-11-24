<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id', 15)->unique(); // ID Number of Teacher/Admin
            $table->string('firstname', 20);
            $table->string('lastname', 20);
            $table->string('email', 30)->unique()->nullable();
            $table->string('mobile', 15)->nullable();
            $table->date('birthday')->nullable();
            $table->string('password', 128); // Bcrypt Password
            $table->string('privilege', 5); // 1 for admin, 2 for co-admin, 3 for students 
            $table->tinyInteger('status')->default(1); // 0 or 1 - Inactive or Active
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
