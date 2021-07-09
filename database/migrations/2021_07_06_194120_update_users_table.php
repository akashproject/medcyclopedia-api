<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
			$table->bigInteger('mobile')->after('password')->nullable();
			$table->string('reffarel')->after('mobile')->nullable();
			$table->string('gender')->after('mobile')->nullable();
			$table->string('cast')->after('mobile')->nullable();
			$table->string('score')->after('mobile')->nullable();
			$table->string('physical_status')->after('mobile')->nullable();		
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
