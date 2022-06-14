<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOnDeleteCascadeInSubjectTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subject_teacher', function (Blueprint $table) {

            $table->dropForeign('subject_teacher_subject_id_foreign');
            $table->foreign('subject_id')
            ->references('id')->on('subjects')
            ->onDelete('cascade');

            $table->dropForeign('subject_teacher_teacher_id_foreign');
            $table->foreign('teacher_id')
            ->references('id')->on('teachers')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subject_teacher', function (Blueprint $table) {
            //
        });
    }
}
