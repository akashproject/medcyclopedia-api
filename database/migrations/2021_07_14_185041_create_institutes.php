<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutes', function (Blueprint $table) {
            $table->id();
            $table->longText('title');
            $table->longText('description');
            $table->string('shortname');
            $table->integer('likecount');
            $table->longText('contact_no');
            $table->longText('email');
            $table->string('admin_email');
            $table->integer('year_of_inception');
            $table->string('website');
            $table->char('hospital', 100);
            $table->char('placement', 100);
            $table->char('food_availablity', 100);
            $table->char('wifi', 100);
            $table->char('library', 100);
            $table->char('scholarships', 100);
            $table->longText('address');
            $table->longText('how_to_reach');
            $table->string('ownership_type');
            $table->integer('state_id');
            $table->integer('city');
            $table->integer('course_id');
            $table->integer('album_id');
            $table->integer('brouchure');
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
        Schema::dropIfExists('institutes');
    }
}
