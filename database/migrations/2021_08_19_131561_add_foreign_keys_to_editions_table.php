<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('editions', function (Blueprint $table) {
            $table->foreign('format_id', 'relationship one to many between format with editions')->references('id')->on('formats')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('edition_lang_id', 'relationship one to many between lang with editions')->references('id')->on('edition_langs')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('provider_id', 'relationship one to many between provider with editions')->references('id')->on('providers')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('edition_type_id', 'relationship one to many between type with editions')->references('id')->on('edition_types')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('editions', function (Blueprint $table) {
            $table->dropForeign('relationship one to many between format with editions');
            $table->dropForeign('relationship one to many between lang with editions');
            $table->dropForeign('relationship one to many between provider with editions');
            $table->dropForeign('relationship one to many between type with editions');
        });
    }
}
