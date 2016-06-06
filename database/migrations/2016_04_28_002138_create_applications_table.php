<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bname');
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->integer('zipcode');
            $table->string('bphone')->default('');
            $table->string('hphone')->default('');
            $table->string('cphone')->default('');
            $table->string('email')->unique();
            $table->integer('units')->default(0);
            $table->tinyInteger('membership')->default(0);
            $table->tinyInteger('roster')->default(0);
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
        Schema::drop('applications');
    }
}
