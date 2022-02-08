<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropContentIdForeignKeyToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {

            if (Schema::hasColumn('posts', 'content_id')) {
                $table->dropForeign(['content_id']);
                $table->dropColumn('content_id');
            }

            if (! Schema::hasColumn('posts', 'ayah_id')) {
                $table->unsignedInteger('ayah_id')->index('relationship one to many between posts with ayah');
                $table->foreign('ayah_id', 'relationship one to many between ayah with posts')->references('id')->on('ayahs')->onUpdate('CASCADE')->onDelete('CASCADE');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
