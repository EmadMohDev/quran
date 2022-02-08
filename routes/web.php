<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', 'home');
Route::get('home', 'FrontendController@index')->name('home');

Route::get('provider/{provider}/editions', 'FrontendController@editions');
Route::get('provider/{provider}/edition/{edition}/surahs', 'FrontendController@surahs');
Route::get('provider/{provider}/edition/{edition}/surah/{surah}/ayahs', 'FrontendController@ayahs');

Route::get('show/providers', 'FrontendController@providers');

Route::get('quran', 'FrontendController@quran');
Route::get('quran/{identifier}/surahs', 'FrontendController@surahs');
Route::get('quran/{identifier}/surahs/{surah}', 'FrontendController@showQuran');

Route::get('tafsir', 'FrontendController@quran');
Route::get('tafsir/{identifier}/surahs', 'FrontendController@surahs');
Route::get('tafsir/{identifier}/surahs/{surah}', 'FrontendController@showQuran');

Route::get('switch/lang/{lang}', 'FrontendController@changeLang');



Route::get('published', 'FrontendController@published');

Route::get('change/theme', 'FrontendController@changeTheme');

Route::get('radio', 'FrontendController@radio');

Route::get('show/azkars', 'FrontendController@azkars');
Route::get('category/{id}/azkars', 'FrontendController@getAzkars');

Route::get('post/multi-create', 'PostController@multiCreate');
Route::post('post/multi-create', 'PostController@multiStore');


get_static_routes();
get_dynamic_routes();
