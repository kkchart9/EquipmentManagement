<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->date('schedule_date');
            $table->string('schedule_name', 128);
            $table->string('belongings', 128);
            $table->string('schedule_color');
            $table->timestamps();
            $table->time('starting_time');
            $table->time('end_time');
            $table->string('location');
            $table->text('optional_item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule');
    }
}
