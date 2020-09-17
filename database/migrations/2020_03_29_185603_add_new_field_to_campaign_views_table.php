<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldToCampaignViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaign_views', function (Blueprint $table) {
            $table->unsignedInteger('point')->default(0)->after('amount');
            $table->string('mobile_brand')->nullable()->after('point');
            $table->string('mobile_model')->nullable()->after('mobile_brand');
            $table->string('device_id')->nullable()->after('mobile_model');
            $table->string('os')->nullable()->after('device_id');
            $table->string('os_version')->nullable()->after('os');
            $table->string('browser_info')->nullable()->after('os_version');
            $table->string('ip')->nullable()->after('browser_info');
            $table->unsignedTinyInteger('verification_status')->default(0)->comment('0 => pending, 1 => verified, 2 => rejected')->after('ip');
            $table->date('verified_date')->nullable()->after('verification_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaign_views', function (Blueprint $table) {
            //
        });
    }
}
