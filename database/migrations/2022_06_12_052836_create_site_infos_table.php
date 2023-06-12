<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_infos', function (Blueprint $table) {
            $table->id();
            $table->string("site_id")->nullable();
            $table->string("site_title");
            $table->string("site_meta_title")->nullable();
            $table->string("site_meta_description")->nullable();
            $table->string("siteaddress")->nullable();
            $table->string("email")->nullable();
            $table->string("phonenumber")->nullable();
            $table->string("siteurl")->nullable();
            $table->string("sitelogoimg")->nullable();
            $table->string("sitefaviconimg")->nullable();
            $table->string("officetiming")->nullable();
            $table->string("copyright_text")->nullable();
            $table->string("currency")->nullable();
            $table->string("facebook_link")->nullable();
            $table->string("instagram_link")->nullable();
            $table->string("twitter_link")->nullable();
            $table->string("youtube_link")->nullable();
            $table->text("about", 50000)->nullable();
            $table->text("privacy", 50000)->nullable();
            $table->text("address", 50000)->nullable();
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
        Schema::dropIfExists('site_infos');
    }
}
