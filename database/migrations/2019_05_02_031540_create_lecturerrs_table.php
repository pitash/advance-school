<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturerrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturerrs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('class_name');
            $table->string('student_name');
            $table->string('section_name');
            $table->string('fast_term');
            $table->string('second_term');
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
        Schema::dropIfExists('lecturerrs');
    }
}
