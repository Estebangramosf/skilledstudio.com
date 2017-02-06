<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultimediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('multimedia');
        Schema::create('multimedia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('youtube_link', 1000);
            $table->string('title',255);
            $table->string('body',5000);
            $table->integer('user_id');
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
        Schema::dropIfExists('multimedia');
    }
}
