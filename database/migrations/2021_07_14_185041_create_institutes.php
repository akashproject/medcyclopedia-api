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
            $table->text('title');
            $table->text('description');
            $table->string('shortname',50);
            $table->integer('likecount');
            $table->string('contact_no',50);
            $table->string('email');
            $table->string('admin_email',50);
            $table->integer('year_of_inception');
            $table->string('website',50);
            $table->string('hospital', 50);
            $table->string('placement', 50);
            $table->string('food_availablity', 50);
            $table->string('wifi', 50);
            $table->string('library', 50);
            $table->string('scholarships', 50);
            $table->text('address');
            $table->text('how_to_reach');
            $table->string('ownership_type', 50);
            $table->integer('state_id');
            $table->string('city', 50);
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
