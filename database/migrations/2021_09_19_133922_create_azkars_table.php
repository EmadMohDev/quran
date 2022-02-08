<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAzkarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('azkars', function (Blueprint $table) {
            $table->id();
            $table->text('zekr');
            $table->text('description')->nullable();
            $table->integer('count')->nullable();
            $table->text('reference')->nullable();
            $table->unsignedInteger('category_id')->index('relationship one to many between category with azkars');
            $table->foreign('category_id', 'relationship one to many between category with azkars')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('azkars');
    }
}
