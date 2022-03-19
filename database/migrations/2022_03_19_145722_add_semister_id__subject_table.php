<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSemisterIdSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('subjects', function (Blueprint $table) {
        //     $table->string('theory_or_lab')->after('course_code');
        //     $table->string('semister')->after('course_code');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('semister');
            $table->dropColumn('theory_or_lab');
        });
    }
}
