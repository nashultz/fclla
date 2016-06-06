<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('admin')->default(0);
            $table->string('bname');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->integer('zipcode');
            $table->string('bphone')->default('');
            $table->string('hphone')->default('');
            $table->string('cphone')->default('');
            $table->integer('units')->default(0);
            $table->tinyInteger('membership')->default(0);
            $table->tinyInteger('roster')->default(0);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
