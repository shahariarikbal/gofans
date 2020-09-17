<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->unique();
            $table->string('cover_photo')->nullable();
            $table->string('skype_id', 64)->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('wedding_day')->nullable();
            $table->string('career')->nullable();
            $table->string('education')->nullable();
            $table->string('skill')->nullable();
            $table->text('about_me')->nullable();
            $table->string('current_city')->nullable();
            $table->string('home_city')->nullable();

            $table->string('device_id')->nullable();
            $table->string('os')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->text('device')->nullable();

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
        Schema::dropIfExists('user_details');
    }
}
