<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('exam');
            $table->date('date');
            $table->time('time');
            $table->string('time_text');
            $table->string('fac_name');
            $table->bigInteger('fac_phone');
            $table->boolean('approve');
            $table->boolean('sent_1');
            $table->boolean('sent_2');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
