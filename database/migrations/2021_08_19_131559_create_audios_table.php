<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('src')->comment('the path of audio');
            $table->unsignedTinyInteger('quality')->comment('quality of audio');
            $table->tinyInteger('default_audio')->default(0)->comment('1 is mean this audio is the main to ayah, 0 is mean second quality');
            $table->unsignedInteger('ayah_id')->index('relationship one to many between ayah with audios')->comment('Link this audio with its ayah');
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
        Schema::dropIfExists('audios');
    }
}
