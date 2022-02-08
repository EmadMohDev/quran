<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Route;

class AddProvidersRoutesToRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $routes = [
            ['method' => 'get', 'route' => 'toggle/field/is_active', 'controller_name' => 'ProviderController', 'function_name' => 'toggleActive'],
            ['method' => 'get', 'route' => 'toggle/field/feature', 'controller_name' => 'ProviderController', 'function_name' => 'toggleFeature'],
            ['method' => 'get', 'route' => 'toggle/field/home_provider_section', 'controller_name' => 'ProviderController', 'function_name' => 'toggleHomeProviderSection'],
            ['method' => 'get', 'route' => 'toggle/field/home_edition_section', 'controller_name' => 'ProviderController', 'function_name' => 'toggleHomeEditionSection'],
            ['method' => 'get', 'route' => 'provider/feature', 'controller_name' => 'ProviderController', 'function_name' => 'index'],
            ['method' => 'get', 'route' => 'provider/home-providers-section', 'controller_name' => 'ProviderController', 'function_name' => 'index'],
            ['method' => 'get', 'route' => 'provider/home-editions-section', 'controller_name' => 'ProviderController', 'function_name' => 'index'],

            ['method' => 'delete', 'route' => 'post/multi/delete', 'controller_name' => 'PostController', 'function_name' => 'multiDelete'],
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
