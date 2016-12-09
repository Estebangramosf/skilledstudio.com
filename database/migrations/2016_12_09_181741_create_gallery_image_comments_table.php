<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryImageCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_image_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',255);
            $table->string('body',2000);
            $table->integer('user_id');
            $table->integer('gallery_id');
            $table->integer('gallery_image_id');
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
        Schema::drop('gallery_image_comments');
    }
}
