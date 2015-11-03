<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->integer('c_id');
            $table->integer('i_id');
            $table->integer('r_id');
            $table->integer('u_id');
            $table->integer('s_id');
            $table->index(['c_id', 'i_id', 'r_id', 'u_id', 's_id'])->uniqe();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('schedules');
    }
}
