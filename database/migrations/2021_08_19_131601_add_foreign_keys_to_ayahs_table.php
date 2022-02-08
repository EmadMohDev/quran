<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAyahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ayahs', function (Blueprint $table) {
            $table->foreign('edition_id', 'relationship one to many between edition with ayahs')->references('id')->on('editions')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('surah_id', 'relationship one to many between surah with ayahs')->references('id')->on('surahs')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ayahs', function (Blueprint $table) {
            $table->dropForeign('relationship one to many between edition with ayahs');
            $table->dropForeign('relationship one to many between surah with ayahs');
        });
    }
}
