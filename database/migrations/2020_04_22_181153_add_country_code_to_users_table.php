<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCountryCodeToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            DB::statement("ALTER TABLE `users` ADD `country_code` VARCHAR(8) NULL AFTER `country`;");
        });

        Schema::table('clients', function (Blueprint $table) {
            DB::statement("ALTER TABLE `clients` ADD `country_code` VARCHAR(8) NULL AFTER `country`;");
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

        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
}
