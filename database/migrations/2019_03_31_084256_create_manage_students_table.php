<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManageStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_name');
            $table->string('student_image')->default("students_image/IMG_20181003_004125_083.jpg");
            $table->date('dob');
            $table->integer('student_gender');
            $table->string('blood_group');
            $table->date('admission_date');
            $table->string('student_phone_no');
            $table->string('class_name');
            $table->string('group');
            $table->string('section');
            $table->string('class_roll');
            $table->string('rfid_no');
            $table->integer('religion');
            $table->longText('student_present_address');
            $table->longText('student_parmanent_address');
            // $table->integer('added_by');
            $table->timestamps();
            // $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manage_students');
    }
}
