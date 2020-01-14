<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('role_id');
            // $table->string('teacher_name');
            $table->string('teacher_image')->default("teachers_image/IMG_20181003_004125_083.jpg");
            $table->string('teacher_phone_no');
            // $table->string('teacher_email_address');
            $table->integer('teacher_gender');
            $table->integer('teacher_designation');
            $table->date('joining_date');
            $table->string('techer_nid');
            $table->longText('parmanent_address');
            $table->longText('present_address');
            $table->integer('added_by');
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
