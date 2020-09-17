<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentUserWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_withdraws', function (Blueprint $table) {
            $table->dropColumn('remarks');
            $table->enum('payment_method', ['PayTM', 'Bkash', 'Skrill', 'PayPal', 'Perfect Money', 'Webmoney'])
                ->nullable()->after('withdraw_amount');
            $table->string('payment_id', 200)->nullable()->after('payment_method');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_withdraws', function (Blueprint $table) {

        });
    }
}
