<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMessageSendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_message_sends', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('message_id');
            $table->unsignedTinyInteger('status')
                ->default(0)->comment('0 => Message Not view, 1 => Message view');
            $table->unsignedTinyInteger('is_delete')
                ->default(0)->comment('0 => Active Message, 1 => Delete Message');
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
        Schema::dropIfExists('user_message_sends');
    }
}
