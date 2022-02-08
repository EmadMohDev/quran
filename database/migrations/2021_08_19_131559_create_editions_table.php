<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identifier');
            $table->string('name')->comment('Arabic name');
            $table->string('name_en')->comment('English name');
            $table->string('direction', 5)->comment('only ( LTF , RTF )');
            $table->unsignedInteger('edition_lang_id')->index('relationship one to many between lang with editions');
            $table->unsignedInteger('format_id')->index('relationship one to many between format with editions');
            $table->unsignedInteger('provider_id')->index('relationship one to many between provider with editions');
            $table->integer('edition_type_id')->index('relationship one to many between type with editions');
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
        Schema::dropIfExists('editions');
    }
}
