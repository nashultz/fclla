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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('country_code', 10)->nullable();
            $table->string('address')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip', 25)->nullable();
            $table->string('country', 2)->nullable();
            $table->string('business_name');
            $table->string('phone', 25)->nullable();
            $table->string('business_phone')->default('');
            $table->string('cell_phone')->default('');
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
