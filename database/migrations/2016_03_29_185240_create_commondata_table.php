<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateCommondataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('com_id')->unsigned();
            $table->string('flier_url',1024)->nullable();
            $table->string('url',1024)->nullable();
            $table->string('comment_id')->nullable();
            $table->string('google_form',1024)->nullable();
            $table->foreign('com_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commons');
    }
}
