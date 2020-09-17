<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_pricings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('service_id');
            $table->enum('service_mode', ['standard', 'tracking', 'timing', 'verify'])->nullable();
            $table->enum('platform', ['android', 'ios'])->nullable();
            $table->enum('pay_mode', ['free', 'paid'])->nullable();
            $table->unsignedTinyInteger('required_days')->nullable();
            $table->unsignedInteger('times')->nullable();
            $table->decimal('min_price')->nullable();
            $table->decimal('max_price')->nullable();
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
        Schema::dropIfExists('service_pricings');
    }
}
