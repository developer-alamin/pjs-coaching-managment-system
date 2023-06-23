<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StudentTableMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_tb',function(Blueprint $table)
        {
            $table->id();
            $table->string('student_name');
            $table->string('student_fname');
            $table->string('student_mname');
            $table->string('student_email');
            $table->string('student_email_verified_at')->nullable();
            $table->string('student_studentId');
            $table->string('student_phone');
            $table->string('student_post');
            $table->string('student_category');
            $table->string('student_class');
            $table->string('student_taka');
            $table->string('student_village');
            $table->string('student_pass');
            $table->string('student_img');
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
        //
    }
}
