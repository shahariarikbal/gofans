<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDeviceUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_device_uses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->unsignedTinyInteger('android')->default(0)->comment('0 => Inactive,  1 => Active');
            $table->unsignedTinyInteger('ios')->default(0)->comment('0 => Inactive,  1 => Active');
            $table->unsignedTinyInteger('desktop')->default(0)->comment('0 => Inactive,  1 => Active');
            $table->unsignedTinyInteger('all')->default(0)->comment('0 => Inactive,  1 => Active');
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
        Schema::dropIfExists('user_device_uses');
    }
}
