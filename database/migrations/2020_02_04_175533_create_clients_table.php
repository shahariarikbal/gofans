<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email', 191)->unique();
            $table->string('skype_id')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('country')->nullable();
            $table->string('password');
            $table->unsignedTinyInteger('status')->default(2)->comment('2 => Inactive, 1 => Active');
            $table->string('balance')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
