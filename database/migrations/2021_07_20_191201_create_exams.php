<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->longText('application_procedure');
            $table->integer('course_id');
            $table->longText('subject_marking');
            $table->string('time',50);
            $table->string('duration',50);
            $table->string('fees',50);
            $table->string('cutofflastyear',50);
            $table->string('important_date_current_year',50);
            $table->string('link',50);
            $table->string('important_date_last_year',50);
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
        Schema::dropIfExists('exams');
    }
}
