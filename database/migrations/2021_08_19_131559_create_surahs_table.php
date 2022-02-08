<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surahs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->unique('number')->comment('Order of surah in quran');
            $table->string('name')->unique('name')->comment('name of surah by arabic');
            $table->string('name_en')->unique('name_en')->comment('The literal name of the surah in English');
            $table->string('translation_name_en')->nullable()->comment('English translation of the name of the surah');
            $table->integer('count_of_ayahs')->comment('count of ayahs in this surah');
            $table->tinyInteger('surah_type')->default(1)->comment('0 is mean medinan, 1 is mean meccan');
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
        Schema::dropIfExists('surahs');
    }
}
