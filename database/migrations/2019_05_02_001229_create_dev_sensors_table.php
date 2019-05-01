<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDevSensorsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dev_sensors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('me');
            $table->string('model');
            $table->string('name');
            $table->integer('state');
            $table->integer('type');
            $table->string('threshold');
            $table->integer('alarm_sound');
            $table->integer('region_id');
            $table->string('agt');
            $table->integer('agt_state');
            $table->integer('is_join');
            $table->string('join_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dev_sensors');
    }
}
