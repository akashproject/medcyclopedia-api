<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInstituteCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('institute_course', function ($table) {
            $table->string('course_name',100)->after('id')->nullable();
            $table->string('eligibility')->after('course_name')->nullable();
            $table->string('duration',100)->after('eligibility')->nullable();
            $table->integer('seat')->after('duration')->unsigned();
            $table->string('last_enrolment_date',100)->after('seat')->nullable();
            $table->string('fee',100)->after('last_enrolment_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
