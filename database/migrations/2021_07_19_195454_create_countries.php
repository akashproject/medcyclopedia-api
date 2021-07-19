<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('code',50);
            $table->string('currency',50);
            $table->text('medicaleducation');
            $table->text('about');
            $table->text('place_of_attraction');
            $table->text('food_hobbits');
            $table->text('culture');
            $table->text('weather');
            $table->text('how_to_reach');
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
        Schema::dropIfExists('countries');
    }
}
