<?php

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
            $table->string('f_name');
            $table->string('l_name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('department');
            $table->string('phone');
            $table->string('address');
            $table->string('blood_group');
            $table->string('birthday');
            $table->integer('semester_id');
            $table->enum('role', ['student', 'faculty', 'admin'])->default('student');
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
