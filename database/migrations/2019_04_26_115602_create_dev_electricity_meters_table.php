<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDevElectricityMetersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dev_electricity_meters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->string('elecollector_uuid');
            $table->string('mac');
            $table->string('sn');
            $table->integer('elemeter_type');
            $table->string('version');
            $table->integer('onoff_line');
            $table->integer('onoff_time');
            $table->integer('bind_time');
            $table->string('name');
            $table->string('model');
            $table->string('model_name');
            $table->string('brand');
            $table->integer('operation');
            $table->integer('operation_stage');
            $table->integer('charger_stage');
            $table->integer('overdraft_stage');
            $table->integer('capacity_stage');
            $table->integer('trans_status');
            $table->integer('trans_status_time');
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
        Schema::drop('dev_electricity_meters');
    }
}
