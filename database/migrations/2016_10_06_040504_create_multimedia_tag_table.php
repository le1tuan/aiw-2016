<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultimediaTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multimedia_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('multimedia_id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->foreign('multimedia_id')->references('id')->on('multimedia');
            $table->foreign('tag_id')->references('id')->on('tag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('multimedia_tag');
    }
}
