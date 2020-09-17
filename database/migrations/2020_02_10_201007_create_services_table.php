<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('category_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('link_heading')->nullable();
            $table->string('link_label')->nullable();
            $table->enum('service_type', ['app', 'trackAlbum', 'trackAlbumPlaylist'])->nullable();
            $table->unsignedTinyInteger('keyword_option')->default(0)->comment('0 => No, 1 => Yes');
            $table->enum('mode', ['standard', 'tracking', 'timing', 'verify'])->default('standard');
            $table->unsignedTinyInteger('status')->default(1)->comment('2 => Inactive, 1 => Active');
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
        Schema::dropIfExists('services');
    }
}
