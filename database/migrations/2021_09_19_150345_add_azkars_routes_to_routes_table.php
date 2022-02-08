<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Route;

class AddAzkarsRoutesToRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $routes = [
            ['method' => 'delete', 'route' => 'azkars/{id}', 'controller_name' => 'Quran\AzkarController', 'function_name' => 'destroy'],
            ['method' => 'put', 'route' => 'azkars/{id}', 'controller_name' => 'Quran\AzkarController', 'function_name' => 'update'],
            ['method' => 'get', 'route' => 'azkars/{id}/edit', 'controller_name' => 'Quran\AzkarController', 'function_name' => 'edit'],
            ['method' => 'post', 'route' => 'azkars', 'controller_name' => 'Quran\AzkarController', 'function_name' => 'store'],
            ['method' => 'get', 'route' => 'azkars/create', 'controller_name' => 'Quran\AzkarController', 'function_name' => 'create'],
            ['method' => 'get', 'route' => 'azkars', 'controller_name' => 'Quran\AzkarController', 'function_name' => 'index'],
            ['method' => 'delete', 'route' => 'azkars/multi/delete', 'controller_name' => 'Quran\AzkarController', 'function_name' => 'multiDelete'],
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
        Schema::table('routes', function (Blueprint $table) {
            //
        });
    }
}
