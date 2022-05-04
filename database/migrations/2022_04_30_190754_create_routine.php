<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routines', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('batch_no');
            $table->foreignId('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreignId('teacher_id')->unsigned()->nullable();
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->string('priod_time')->nullable();
            $table->string('priod');
            $table->string('day');
            $table->string('subject')->nullable();
            $table->string('batch');
            $table->string('semister');
            $table->integer('coordinator');
            $table->integer('year');
            $table->string('shift');
            $table->string('session');
            $table->string('theory_or_lab')->nullable();
            $table->integer('cradit')->nullable();
            $table->string('room_no');
            $table->string('lab_no')->nullable();
            $table->boolean('admin_aprove')->default(false);
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
        Schema::dropIfExists('routine');
    }
}
