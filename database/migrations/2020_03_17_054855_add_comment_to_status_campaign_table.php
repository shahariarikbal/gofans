<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCommentToStatusCampaignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `campaigns` CHANGE `status` `status` TINYINT(4) NOT NULL DEFAULT '0' COMMENT '0 => pending, 1=>approved by admin, 2=>start, 3=>pause, 4=>terminate'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
        DB::statement("ALTER TABLE `campaigns` CHANGE `status` `status` TINYINT(4) NOT NULL DEFAULT '0' COMMENT '0 => pending'");
       
    }
}
