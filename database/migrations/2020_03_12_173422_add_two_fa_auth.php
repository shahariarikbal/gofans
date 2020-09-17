<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTwoFaAuth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedTinyInteger('two_fa_auth')->default(0)
                ->comment('0 => Inactive, 1 => active')
                ->after('status');
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->unsignedTinyInteger('two_fa_auth')->default(0)
                ->comment('0 => Inactive, 1 => active')
                ->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
