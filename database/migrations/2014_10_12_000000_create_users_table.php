<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name', 100)->nullable();
            $table->string('email', 254);
            $table->string('password', 128);
            $table->timestamps();
            $table->string('grade', 50);
            $table->string('gender', 10);
            $table->integer('age');
            $table->integer('track_record');
            $table->string('contact', 13);
            $table->string('icon')->nullable();
            $table->string('business');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
