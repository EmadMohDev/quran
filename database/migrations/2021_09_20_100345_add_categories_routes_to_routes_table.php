<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Route;

class AddCategoriesRoutesToRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->boolean('feature')->default(0);
        });

        $routes = [
            ['method' => 'get', 'route' => 'remove/audio/{id}', 'controller_name' => 'Quran\AyahController', 'function_name' => 'removeAudio'],

            ['method' => 'delete', 'route' => 'categories/{id}', 'controller_name' => 'Quran\CategoryController', 'function_name' => 'destroy'],
            ['method' => 'put', 'route' => 'categories/{id}', 'controller_name' => 'Quran\CategoryController', 'function_name' => 'update'],
            ['method' => 'get', 'route' => 'categories/{id}/edit', 'controller_name' => 'Quran\CategoryController', 'function_name' => 'edit'],
            ['method' => 'post', 'route' => 'categories', 'controller_name' => 'Quran\CategoryController', 'function_name' => 'store'],
            ['method' => 'get', 'route' => 'categories/create', 'controller_name' => 'Quran\CategoryController', 'function_name' => 'create'],
            ['method' => 'get', 'route' => 'categories', 'controller_name' => 'Quran\CategoryController', 'function_name' => 'index'],
            ['method' => 'delete', 'route' => 'categories/multi/delete', 'controller_name' => 'Quran\CategoryController', 'function_name' => 'multiDelete'],

            ['method' => 'get', 'route' => 'categories/toggle/field/feature', 'controller_name' => 'Quran\CategoryController', 'function_name' => 'toggleFeature'],
            ['method' => 'get', 'route' => 'categories/feature', 'controller_name' => 'Quran\CategoryController', 'function_name' => 'index'],
        ];

        Route::insert($routes);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('feature');
        });
    }
}
