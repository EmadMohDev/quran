<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProviderIdRbtcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('rbt_codes', function(Blueprint $table)
        // {
        //     $table->integer('provider_id')->unsigned()->nullable();
        //     $table->foreign('provider_id')->references('id')->on('providers')->onUpdate('CASCADE')->onDelete('CASCADE');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('rbt_codes')) {
            Schema::table('rbt_codes', function(Blueprint $table)
            {
                Schema::dropIfExists('provider_id');
            });
        }
    }
}
