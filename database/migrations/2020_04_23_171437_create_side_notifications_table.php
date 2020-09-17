<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSideNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('side_notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->string('type')->nullable();
            $table->text('message')->nullable();
            $table->unsignedTinyInteger('status')->default(0)->comment('0 => unseen, 1 => seen');
            $table->unsignedTinyInteger('is_delete')->default(0)->comment('0 => active, 1 => delete');
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
        Schema::dropIfExists('side_notifications');
    }
}
