<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_allocations', function (Blueprint $table) {
            $table->integer('c_id');
            $table->integer('u_id');
            $table->integer('s_id');
            $table->string('mids');
            $table->string('finals');
            $table->index(['c_id', 'u_id', 's_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('course_allocations');
    }
}
