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
            $table->string('user_id')->unique(); // ID Number of Teacher/Admin
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->string('birthday');
            $table->string('password'); // Bcrypt Password
            $table->string('privilege'); // Admin or Co-Admin/Teacher -- 1 for admin, 2 for co-admin
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
