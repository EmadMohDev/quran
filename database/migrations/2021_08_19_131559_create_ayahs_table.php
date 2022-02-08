<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAyahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayahs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('number')->comment('order of ayah in quran');
            $table->text('text')->comment('text of ayah');
            $table->string('image')->nullable()->comment('image of ayah');
            $table->unsignedSmallInteger('order_in_surah')->comment('order of ayah in surah');
            $table->unsignedTinyInteger('juz')->comment('The juz number that ayah in it');
            $table->unsignedSmallInteger('page')->comment('The page number that ayah in it');
            $table->unsignedSmallInteger('hizb_quarter')->comment('The quarter number that ayah in it');
            $table->unsignedSmallInteger('ruku');
            $table->unsignedTinyInteger('manzil');
            $table->tinyInteger('is_sajda')->nullable()->default(0)->comment('0 is mean not has sajda, 1 is mean has sajda');
            $table->unsignedInteger('surah_id')->index('relationship one to many between surah with ayahs')->comment('Link this ayah with its surah');
            $table->unsignedInteger('edition_id')->index('relationship one to many between edition with ayahs');
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
        Schema::dropIfExists('ayahs');
    }
}
