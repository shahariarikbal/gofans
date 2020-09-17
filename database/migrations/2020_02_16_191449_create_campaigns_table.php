<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('category_id');
            $table->unsignedInteger('service_id');
            $table->string('name')->nullable();
            $table->string('link');
            $table->text('keywords')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->decimal('bid_amount')->unsigned();
            $table->decimal('quantity')->unsigned();
            $table->unsignedInteger('day_limit');
            $table->enum('mobile_platform', ['Android', 'IOS', 'Both'])->default('Both');
            $table->enum('app_type', ['Paid', 'Free'])->nullable();
            $table->decimal('app_type_price')->nullable();
            $table->enum('play_type', ['TrackAlbum', 'TrackAlbumPlaylist'])->nullable();
            $table->enum('mode', ['standard','tracking', 'timing', 'verify'])->nullable();
            $table->string('mode_value')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0 => pending');
            $table->enum('country_mode', ['All', 'Partial'])->default('Partial');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}
