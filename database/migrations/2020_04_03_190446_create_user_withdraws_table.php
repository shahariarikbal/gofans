<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_withdraws', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('withdraw_point')->default(0);
            $table->decimal('withdraw_amount', 8, 2)->default(0);
            $table->text('remarks')->nullable();
            $table->string('requested_at')->nullable();
            $table->string('approved_at')->nullable();
            $table->unsignedTinyInteger('status')->default(0)->comment('0 => Pending, 1 => Complete, 2 => Reject');
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
        Schema::dropIfExists('user_withdraws');
    }
}
