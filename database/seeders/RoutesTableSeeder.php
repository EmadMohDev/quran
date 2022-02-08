<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoutesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('routes')->delete();

        \DB::table('routes')->insert(array (
            0 =>
            array (
                'id' => 2,
                'method' => 'get',
                'route' => 'setting/new',
                'controller_name' => 'SettingController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'create',
            ),
            1 =>
            array (
                'id' => 3,
                'method' => 'post',
                'route' => 'setting',
                'controller_name' => 'SettingController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'store',
            ),
            2 =>
            array (
                'id' => 4,
                'method' => 'get',
                'route' => 'dashboard',
                'controller_name' => 'DashboardController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-07-24 13:47:45',
                'function_name' => 'index',
            ),
            3 =>
            array (
                'id' => 5,
                'method' => 'get',
                'route' => '/',
                'controller_name' => 'DashboardController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'index',
            ),
            4 =>
            array (
                'id' => 6,
                'method' => 'get',
                'route' => 'user_profile',
                'controller_name' => 'UserController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'profile',
            ),
            5 =>
            array (
                'id' => 7,
                'method' => 'post',
                'route' => 'user_profile/updatepassword',
                'controller_name' => 'UserController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2017-11-14 12:29:01',
                'function_name' => 'UpdatePassword',
            ),
            6 =>
            array (
                'id' => 8,
                'method' => 'post',
                'route' => 'user_profile/updateprofilepic',
                'controller_name' => 'UserController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2017-11-14 12:29:08',
                'function_name' => 'UpdateProfilePicture',
            ),
            7 =>
            array (
                'id' => 9,
                'method' => 'post',
                'route' => 'user_profile/updateuserdata',
                'controller_name' => 'UserController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2017-11-14 12:29:19',
                'function_name' => 'UpdateNameAndEmail',
            ),
            8 =>
            array (
                'id' => 10,
                'method' => 'get',
                'route' => 'setting/{id}/delete',
                'controller_name' => 'SettingController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:22',
                'function_name' => 'destroy',
            ),
            9 =>
            array (
                'id' => 11,
                'method' => 'get',
                'route' => 'setting/{id}/edit',
                'controller_name' => 'SettingController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'edit',
            ),
            10 =>
            array (
                'id' => 12,
                'method' => 'post',
                'route' => 'setting/{id}',
                'controller_name' => 'SettingController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:56:27',
                'function_name' => 'update',
            ),
            11 =>
            array (
                'id' => 14,
                'method' => 'get',
                'route' => 'static_translation',
                'controller_name' => 'StaticTranslationController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2017-11-14 12:29:57',
                'function_name' => 'index',
            ),
            12 =>
            array (
                'id' => 21,
                'method' => 'get',
                'route' => 'file_manager',
                'controller_name' => 'DashboardController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'file_manager',
            ),
            13 =>
            array (
                'id' => 22,
                'method' => 'get',
                'route' => 'upload_items',
                'controller_name' => 'DashboardController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'multi_upload',
            ),
            14 =>
            array (
                'id' => 23,
                'method' => 'post',
                'route' => 'save_items',
                'controller_name' => 'DashboardController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'save_uploaded',
            ),
            15 =>
            array (
                'id' => 24,
                'method' => 'get',
                'route' => 'upload_resize',
                'controller_name' => 'DashboardController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'upload_resize',
            ),
            16 =>
            array (
                'id' => 25,
                'method' => 'post',
                'route' => 'save_image',
                'controller_name' => 'DashboardController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'save_image',
            ),
            17 =>
            array (
                'id' => 26,
                'method' => 'post',
                'route' => 'static_translation/{id}/update',
                'controller_name' => 'StaticTranslationController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2017-11-12 12:19:46',
                'function_name' => 'update',
            ),
            18 =>
            array (
                'id' => 27,
                'method' => 'get',
                'route' => 'static_translation/{id}/delete',
                'controller_name' => 'StaticTranslationController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'destroy',
            ),
            19 =>
            array (
                'id' => 28,
                'method' => 'get',
                'route' => 'language/{id}/delete',
                'controller_name' => 'LanguageController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'destroy',
            ),
            20 =>
            array (
                'id' => 29,
                'method' => 'post',
                'route' => 'language/{id}/update',
                'controller_name' => 'LanguageController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'update',
            ),
            21 =>
            array (
                'id' => 30,
                'method' => 'get',
                'route' => 'roles',
                'controller_name' => 'RoleController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'index',
            ),
            22 =>
            array (
                'id' => 31,
                'method' => 'get',
                'route' => 'roles/new',
                'controller_name' => 'RoleController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'create',
            ),
            23 =>
            array (
                'id' => 32,
                'method' => 'post',
                'route' => 'roles',
                'controller_name' => 'RoleController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'store',
            ),
            24 =>
            array (
                'id' => 33,
                'method' => 'get',
                'route' => 'roles/{id}/delete',
                'controller_name' => 'RoleController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'destroy',
            ),
            25 =>
            array (
                'id' => 34,
                'method' => 'get',
                'route' => 'roles/{id}/edit',
                'controller_name' => 'RoleController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'edit',
            ),
            26 =>
            array (
                'id' => 35,
                'method' => 'post',
                'route' => 'roles/{id}/update',
                'controller_name' => 'RoleController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'update',
            ),
            27 =>
            array (
                'id' => 36,
                'method' => 'get',
                'route' => 'language',
                'controller_name' => 'LanguageController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'index',
            ),
            28 =>
            array (
                'id' => 37,
                'method' => 'get',
                'route' => 'language/create',
                'controller_name' => 'LanguageController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'create',
            ),
            29 =>
            array (
                'id' => 38,
                'method' => 'post',
                'route' => 'language',
                'controller_name' => 'LanguageController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'store',
            ),
            30 =>
            array (
                'id' => 39,
                'method' => 'get',
                'route' => 'language/{id}/edit',
                'controller_name' => 'LanguageController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'edit',
            ),
            31 =>
            array (
                'id' => 40,
                'method' => 'get',
                'route' => 'all_routes',
                'controller_name' => 'RouteController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2019-10-13 11:51:33',
                'function_name' => 'index',
            ),
            32 =>
            array (
                'id' => 41,
                'method' => 'post',
                'route' => 'routes',
                'controller_name' => 'RouteController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'store',
            ),
            33 =>
            array (
                'id' => 42,
                'method' => 'get',
                'route' => 'routes/{id}/edit',
                'controller_name' => 'RouteController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'edit',
            ),
            34 =>
            array (
                'id' => 43,
                'method' => 'post',
                'route' => 'routes/{id}/update',
                'controller_name' => 'RouteController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-01-28 09:25:29',
                'function_name' => 'update',
            ),
            35 =>
            array (
                'id' => 44,
                'method' => 'get',
                'route' => 'routes/{id}/delete',
                'controller_name' => 'RouteController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'destroy',
            ),
            36 =>
            array (
                'id' => 45,
                'method' => 'get',
                'route' => 'routes/create',
                'controller_name' => 'RouteController',
                'created_at' => '2018-02-05 13:39:21',
                'updated_at' => '2018-02-05 13:39:21',
                'function_name' => 'create',
            ),
            37 =>
            array (
                'id' => 57,
                'method' => 'get',
                'route' => 'routes/index_v2',
                'controller_name' => 'RouteController',
                'created_at' => '2017-11-12 13:45:15',
                'updated_at' => '2017-11-12 14:04:53',
                'function_name' => 'index_v2',
            ),
            38 =>
            array (
                'id' => 58,
                'method' => 'get',
                'route' => 'roles/{id}/view_access',
                'controller_name' => 'RoleController',
                'created_at' => '2017-11-14 10:56:14',
                'updated_at' => '2017-11-15 08:14:14',
                'function_name' => 'view_access',
            ),
            39 =>
            array (
                'id' => 59,
                'method' => 'get',
                'route' => 'types/index',
                'controller_name' => 'TypeController',
                'created_at' => '2018-01-28 08:25:37',
                'updated_at' => '2018-01-28 08:25:37',
                'function_name' => 'index',
            ),
            40 =>
            array (
                'id' => 60,
                'method' => 'get',
                'route' => 'types/create',
                'controller_name' => 'TypeController',
                'created_at' => '2018-01-28 08:25:37',
                'updated_at' => '2018-01-28 08:25:37',
                'function_name' => 'create',
            ),
            41 =>
            array (
                'id' => 61,
                'method' => 'post',
                'route' => 'types',
                'controller_name' => 'TypeController',
                'created_at' => '2018-01-28 08:25:38',
                'updated_at' => '2018-01-28 08:25:38',
                'function_name' => 'store',
            ),
            42 =>
            array (
                'id' => 62,
                'method' => 'get',
                'route' => 'types/{id}/edit',
                'controller_name' => 'TypeController',
                'created_at' => '2018-01-28 08:25:38',
                'updated_at' => '2018-01-28 08:25:38',
                'function_name' => 'edit',
            ),
            43 =>
            array (
                'id' => 63,
                'method' => 'patch',
                'route' => 'types/{id}',
                'controller_name' => 'TypeController',
                'created_at' => '2018-01-28 08:25:38',
                'updated_at' => '2018-01-28 08:25:38',
                'function_name' => 'update',
            ),
            44 =>
            array (
                'id' => 64,
                'method' => 'get',
                'route' => 'types/{id}/delete',
                'controller_name' => 'TypeController',
                'created_at' => '2018-01-28 08:25:38',
                'updated_at' => '2018-01-28 08:25:38',
                'function_name' => 'destroy',
            ),
            45 =>
            array (
                'id' => 65,
                'method' => 'post',
                'route' => 'sortabledatatable',
                'controller_name' => 'SettingController',
                'created_at' => '2018-01-28 09:22:00',
                'updated_at' => '2018-01-28 09:22:00',
                'function_name' => 'updateOrder',
            ),
            46 =>
            array (
                'id' => 66,
                'method' => 'get',
                'route' => 'buildroutes',
                'controller_name' => 'RouteController',
                'created_at' => '2018-01-28 09:23:55',
                'updated_at' => '2018-01-28 09:23:55',
                'function_name' => 'buildroutes',
            ),
            47 =>
            array (
                'id' => 69,
                'method' => 'get',
                'route' => 'delete_all',
                'controller_name' => 'DashboardController',
                'created_at' => '2018-02-04 12:01:23',
                'updated_at' => '2018-02-04 12:01:23',
                'function_name' => 'delete_all_index',
            ),
            48 =>
            array (
                'id' => 70,
                'method' => 'post',
                'route' => 'delete_all',
                'controller_name' => 'DashboardController',
                'created_at' => '2018-02-04 12:01:23',
                'updated_at' => '2018-02-04 12:01:23',
                'function_name' => 'delete_all_store',
            ),
            49 =>
            array (
                'id' => 71,
                'method' => 'get',
                'route' => 'upload_resize_v2',
                'controller_name' => 'DashboardController',
                'created_at' => '2018-02-04 13:02:56',
                'updated_at' => '2018-02-04 13:02:56',
                'function_name' => 'upload_resize_v2',
            ),
            50 =>
            array (
                'id' => 72,
                'method' => 'post',
                'route' => 'sortabledatatable',
                'controller_name' => 'UserController',
                'created_at' => '2018-02-05 13:39:22',
                'updated_at' => '2018-02-05 13:39:22',
                'function_name' => 'updateOrder',
            ),
            51 =>
            array (
                'id' => 79,
                'method' => 'get',
                'route' => 'setting',
                'controller_name' => 'SettingController',
                'created_at' => '2018-02-05 14:10:10',
                'updated_at' => '2018-02-05 14:10:10',
                'function_name' => 'index',
            ),
            52 =>
            array (
                'id' => 80,
                'method' => 'get',
                'route' => 'users',
                'controller_name' => 'UserController',
                'created_at' => '2018-05-31 09:42:21',
                'updated_at' => '2018-05-31 09:42:21',
                'function_name' => 'index',
            ),
            53 =>
            array (
                'id' => 81,
                'method' => 'get',
                'route' => 'users/new',
                'controller_name' => 'UserController',
                'created_at' => '2018-05-31 09:42:21',
                'updated_at' => '2018-05-31 09:42:21',
                'function_name' => 'create',
            ),
            54 =>
            array (
                'id' => 82,
                'method' => 'post',
                'route' => 'users',
                'controller_name' => 'UserController',
                'created_at' => '2018-05-31 09:42:21',
                'updated_at' => '2018-05-31 09:42:21',
                'function_name' => 'store',
            ),
            55 =>
            array (
                'id' => 83,
                'method' => 'get',
                'route' => 'users/{id}/edit',
                'controller_name' => 'UserController',
                'created_at' => '2018-05-31 09:42:21',
                'updated_at' => '2018-05-31 09:42:21',
                'function_name' => 'edit',
            ),
            56 =>
            array (
                'id' => 84,
                'method' => 'post',
                'route' => 'users/{id}/update',
                'controller_name' => 'UserController',
                'created_at' => '2018-05-31 09:42:21',
                'updated_at' => '2018-05-31 09:42:21',
                'function_name' => 'update',
            ),
            57 =>
            array (
                'id' => 106,
                'method' => 'get',
                'route' => 'country',
                'controller_name' => 'CountryController',
                'created_at' => '2019-02-10 08:09:36',
                'updated_at' => '2019-02-10 08:09:36',
                'function_name' => 'index',
            ),
            58 =>
            array (
                'id' => 107,
                'method' => 'get',
                'route' => 'country/create',
                'controller_name' => 'CountryController',
                'created_at' => '2019-02-10 08:09:36',
                'updated_at' => '2019-02-10 08:09:36',
                'function_name' => 'create',
            ),
            59 =>
            array (
                'id' => 108,
                'method' => 'post',
                'route' => 'country',
                'controller_name' => 'CountryController',
                'created_at' => '2019-02-10 08:09:36',
                'updated_at' => '2019-02-10 08:09:36',
                'function_name' => 'store',
            ),
            60 =>
            array (
                'id' => 109,
                'method' => 'get',
                'route' => 'country/{id}',
                'controller_name' => 'CountryController',
                'created_at' => '2019-02-10 08:09:36',
                'updated_at' => '2019-02-10 08:09:36',
                'function_name' => 'show',
            ),
            61 =>
            array (
                'id' => 110,
                'method' => 'get',
                'route' => 'country/{id}/edit',
                'controller_name' => 'CountryController',
                'created_at' => '2019-02-10 08:09:37',
                'updated_at' => '2019-02-10 08:09:37',
                'function_name' => 'edit',
            ),
            62 =>
            array (
                'id' => 111,
                'method' => 'patch',
                'route' => 'country/{id}',
                'controller_name' => 'CountryController',
                'created_at' => '2019-02-10 08:09:37',
                'updated_at' => '2019-02-10 08:10:42',
                'function_name' => 'update',
            ),
            63 =>
            array (
                'id' => 112,
                'method' => 'get',
                'route' => 'country/{id}/delete',
                'controller_name' => 'CountryController',
                'created_at' => '2019-02-10 08:09:37',
                'updated_at' => '2019-02-10 08:09:37',
                'function_name' => 'delete',
            ),
            64 =>
            array (
                'id' => 113,
                'method' => 'get',
                'route' => 'operator',
                'controller_name' => 'OperatorController',
                'created_at' => '2019-02-10 08:10:27',
                'updated_at' => '2019-02-10 08:10:27',
                'function_name' => 'index',
            ),
            65 =>
            array (
                'id' => 114,
                'method' => 'get',
                'route' => 'operator/create',
                'controller_name' => 'OperatorController',
                'created_at' => '2019-02-10 08:10:27',
                'updated_at' => '2019-02-10 08:10:27',
                'function_name' => 'create',
            ),
            66 =>
            array (
                'id' => 115,
                'method' => 'post',
                'route' => 'operator',
                'controller_name' => 'OperatorController',
                'created_at' => '2019-02-10 08:10:27',
                'updated_at' => '2019-02-10 08:10:27',
                'function_name' => 'store',
            ),
            67 =>
            array (
                'id' => 116,
                'method' => 'get',
                'route' => 'operator/{id}',
                'controller_name' => 'OperatorController',
                'created_at' => '2019-02-10 08:10:27',
                'updated_at' => '2019-02-10 08:10:27',
                'function_name' => 'show',
            ),
            68 =>
            array (
                'id' => 117,
                'method' => 'get',
                'route' => 'operator/{id}/edit',
                'controller_name' => 'OperatorController',
                'created_at' => '2019-02-10 08:10:27',
                'updated_at' => '2019-02-10 08:10:27',
                'function_name' => 'edit',
            ),
            69 =>
            array (
                'id' => 118,
                'method' => 'patch',
                'route' => 'operator/{id}',
                'controller_name' => 'OperatorController',
                'created_at' => '2019-02-10 08:10:27',
                'updated_at' => '2019-02-10 08:10:27',
                'function_name' => 'update',
            ),
            70 =>
            array (
                'id' => 119,
                'method' => 'get',
                'route' => 'operator/{id}/delete',
                'controller_name' => 'OperatorController',
                'created_at' => '2019-02-10 08:10:27',
                'updated_at' => '2019-02-10 08:10:27',
                'function_name' => 'destroy',
            ),
            71 =>
            array (
                'id' => 120,
                'method' => 'get',
                'route' => 'category',
                'controller_name' => 'CategoryController',
                'created_at' => '2019-02-14 13:01:13',
                'updated_at' => '2019-02-14 13:01:13',
                'function_name' => 'index',
            ),
            72 =>
            array (
                'id' => 121,
                'method' => 'get',
                'route' => 'category/create',
                'controller_name' => 'CategoryController',
                'created_at' => '2019-02-14 13:01:13',
                'updated_at' => '2019-02-14 13:01:13',
                'function_name' => 'create',
            ),
            73 =>
            array (
                'id' => 122,
                'method' => 'post',
                'route' => 'category',
                'controller_name' => 'CategoryController',
                'created_at' => '2019-02-14 13:01:13',
                'updated_at' => '2019-02-14 13:01:13',
                'function_name' => 'store',
            ),
            74 =>
            array (
                'id' => 123,
                'method' => 'get',
                'route' => 'category/{id}',
                'controller_name' => 'CategoryController',
                'created_at' => '2019-02-14 13:01:13',
                'updated_at' => '2019-02-14 13:01:13',
                'function_name' => 'show',
            ),
            75 =>
            array (
                'id' => 124,
                'method' => 'get',
                'route' => 'category/{id}/edit',
                'controller_name' => 'CategoryController',
                'created_at' => '2019-02-14 13:01:13',
                'updated_at' => '2019-02-14 13:01:13',
                'function_name' => 'edit',
            ),
            76 =>
            array (
                'id' => 125,
                'method' => 'patch',
                'route' => 'category/{id}',
                'controller_name' => 'CategoryController',
                'created_at' => '2019-02-14 13:01:13',
                'updated_at' => '2019-02-14 13:01:13',
                'function_name' => 'update',
            ),
            77 =>
            array (
                'id' => 126,
                'method' => 'get',
                'route' => 'category/{id}/delete',
                'controller_name' => 'CategoryController',
                'created_at' => '2019-02-14 13:01:13',
                'updated_at' => '2019-02-14 13:01:13',
                'function_name' => 'destroy',
            ),
            78 =>
            array (
                'id' => 127,
                'method' => 'get',
                'route' => 'content_type',
                'controller_name' => 'ContentTypeController',
                'created_at' => '2019-02-14 13:02:21',
                'updated_at' => '2019-02-14 13:02:21',
                'function_name' => 'index',
            ),
            79 =>
            array (
                'id' => 128,
                'method' => 'get',
                'route' => 'content_type/create',
                'controller_name' => 'ContentTypeController',
                'created_at' => '2019-02-14 13:02:21',
                'updated_at' => '2019-02-14 13:02:21',
                'function_name' => 'create',
            ),
            80 =>
            array (
                'id' => 129,
                'method' => 'post',
                'route' => 'content_type',
                'controller_name' => 'ContentTypeController',
                'created_at' => '2019-02-14 13:02:21',
                'updated_at' => '2019-02-14 13:02:21',
                'function_name' => 'store',
            ),
            81 =>
            array (
                'id' => 130,
                'method' => 'get',
                'route' => 'content_type/{id}',
                'controller_name' => 'ContentTypeController',
                'created_at' => '2019-02-14 13:02:21',
                'updated_at' => '2019-02-14 13:02:21',
                'function_name' => 'show',
            ),
            82 =>
            array (
                'id' => 131,
                'method' => 'get',
                'route' => 'content_type/{id}/edit',
                'controller_name' => 'ContentTypeController',
                'created_at' => '2019-02-14 13:02:22',
                'updated_at' => '2019-02-14 13:02:22',
                'function_name' => 'edit',
            ),
            83 =>
            array (
                'id' => 132,
                'method' => 'patch',
                'route' => 'content_type/{id}',
                'controller_name' => 'ContentTypeController',
                'created_at' => '2019-02-14 13:02:22',
                'updated_at' => '2019-02-14 13:02:22',
                'function_name' => 'update',
            ),
            84 =>
            array (
                'id' => 133,
                'method' => 'get',
                'route' => 'content_type/{id}/delete',
                'controller_name' => 'ContentTypeController',
                'created_at' => '2019-02-14 13:02:22',
                'updated_at' => '2019-02-14 13:02:22',
                'function_name' => 'destroy',
            ),
            85 =>
            array (
                'id' => 134,
                'method' => 'get',
                'route' => 'content',
                'controller_name' => 'ContentController',
                'created_at' => '2019-02-14 13:03:26',
                'updated_at' => '2019-02-14 13:03:26',
                'function_name' => 'index',
            ),
            86 =>
            array (
                'id' => 135,
                'method' => 'get',
                'route' => 'content/create',
                'controller_name' => 'ContentController',
                'created_at' => '2019-02-14 13:03:26',
                'updated_at' => '2019-02-14 13:03:26',
                'function_name' => 'create',
            ),
            87 =>
            array (
                'id' => 136,
                'method' => 'post',
                'route' => 'content',
                'controller_name' => 'ContentController',
                'created_at' => '2019-02-14 13:03:26',
                'updated_at' => '2019-02-14 13:03:26',
                'function_name' => 'store',
            ),
            88 =>
            array (
                'id' => 137,
                'method' => 'get',
                'route' => 'content/{id}',
                'controller_name' => 'ContentController',
                'created_at' => '2019-02-14 13:03:26',
                'updated_at' => '2019-02-14 13:03:26',
                'function_name' => 'show',
            ),
            89 =>
            array (
                'id' => 138,
                'method' => 'get',
                'route' => 'content/{id}/edit',
                'controller_name' => 'ContentController',
                'created_at' => '2019-02-14 13:03:26',
                'updated_at' => '2019-02-14 13:03:26',
                'function_name' => 'edit',
            ),
            90 =>
            array (
                'id' => 139,
                'method' => 'patch',
                'route' => 'content/{id}',
                'controller_name' => 'ContentController',
                'created_at' => '2019-02-14 13:03:26',
                'updated_at' => '2019-02-14 13:03:26',
                'function_name' => 'update',
            ),
            91 =>
            array (
                'id' => 140,
                'method' => 'get',
                'route' => 'content/{id}/delete',
                'controller_name' => 'ContentController',
                'created_at' => '2019-02-14 13:03:26',
                'updated_at' => '2019-02-14 13:03:26',
                'function_name' => 'destroy',
            ),
            92 =>
            array (
                'id' => 141,
                'method' => 'get',
                'route' => 'post',
                'controller_name' => 'PostController',
                'created_at' => '2019-02-14 13:04:09',
                'updated_at' => '2019-02-14 13:04:09',
                'function_name' => 'index',
            ),
            93 =>
            array (
                'id' => 142,
                'method' => 'get',
                'route' => 'post/create',
                'controller_name' => 'PostController',
                'created_at' => '2019-02-14 13:04:09',
                'updated_at' => '2019-02-14 13:04:09',
                'function_name' => 'create',
            ),
            94 =>
            array (
                'id' => 143,
                'method' => 'post',
                'route' => 'post',
                'controller_name' => 'PostController',
                'created_at' => '2019-02-14 13:04:09',
                'updated_at' => '2019-02-14 13:04:09',
                'function_name' => 'store',
            ),
            95 =>
            array (
                'id' => 144,
                'method' => 'get',
                'route' => 'post/{id}',
                'controller_name' => 'PostController',
                'created_at' => '2019-02-14 13:04:09',
                'updated_at' => '2019-02-14 13:04:09',
                'function_name' => 'show',
            ),
            96 =>
            array (
                'id' => 145,
                'method' => 'get',
                'route' => 'post/{id}/edit',
                'controller_name' => 'PostController',
                'created_at' => '2019-02-14 13:04:09',
                'updated_at' => '2019-02-14 13:04:09',
                'function_name' => 'edit',
            ),
            97 =>
            array (
                'id' => 146,
                'method' => 'patch',
                'route' => 'post/{id}',
                'controller_name' => 'PostController',
                'created_at' => '2019-02-14 13:04:09',
                'updated_at' => '2019-02-14 13:04:09',
                'function_name' => 'update',
            ),
            98 =>
            array (
                'id' => 147,
                'method' => 'get',
                'route' => 'post/{id}/delete',
                'controller_name' => 'PostController',
                'created_at' => '2019-02-14 13:04:09',
                'updated_at' => '2019-02-14 13:04:09',
                'function_name' => 'destroy',
            ),
            99 =>
            array (
                'id' => 148,
                'method' => 'get',
                'route' => 'sub_category',
                'controller_name' => 'SubCategoryController',
                'created_at' => '2019-03-06 09:00:28',
                'updated_at' => '2019-03-06 09:00:28',
                'function_name' => 'index',
            ),
            100 =>
            array (
                'id' => 149,
                'method' => 'get',
                'route' => 'sub_category/create',
                'controller_name' => 'SubCategoryController',
                'created_at' => '2019-03-06 09:00:28',
                'updated_at' => '2019-03-06 09:00:28',
                'function_name' => 'create',
            ),
            101 =>
            array (
                'id' => 150,
                'method' => 'post',
                'route' => 'sub_category',
                'controller_name' => 'SubCategoryController',
                'created_at' => '2019-03-06 09:00:28',
                'updated_at' => '2019-03-06 09:00:28',
                'function_name' => 'store',
            ),
            102 =>
            array (
                'id' => 151,
                'method' => 'get',
                'route' => 'sub_category/{id}',
                'controller_name' => 'SubCategoryController',
                'created_at' => '2019-03-06 09:00:28',
                'updated_at' => '2019-03-06 09:00:28',
                'function_name' => 'show',
            ),
            103 =>
            array (
                'id' => 152,
                'method' => 'get',
                'route' => 'sub_category/{id}/edit',
                'controller_name' => 'SubCategoryController',
                'created_at' => '2019-03-06 09:00:28',
                'updated_at' => '2019-03-06 09:00:28',
                'function_name' => 'edit',
            ),
            104 =>
            array (
                'id' => 153,
                'method' => 'patch',
                'route' => 'sub_category/{id}',
                'controller_name' => 'SubCategoryController',
                'created_at' => '2019-03-06 09:00:28',
                'updated_at' => '2019-03-06 09:00:28',
                'function_name' => 'update',
            ),
            105 =>
            array (
                'id' => 154,
                'method' => 'get',
                'route' => 'sub_category/{id}/delete',
                'controller_name' => 'SubCategoryController',
                'created_at' => '2019-03-06 09:00:28',
                'updated_at' => '2019-03-06 09:00:28',
                'function_name' => 'destroy',
            ),
            106 =>
            array (
                'id' => 155,
                'method' => 'get',
                'route' => 'rbt',
                'controller_name' => 'RbtController',
                'created_at' => '2019-03-14 08:51:14',
                'updated_at' => '2019-03-14 08:51:14',
                'function_name' => 'index',
            ),
            107 =>
            array (
                'id' => 156,
                'method' => 'get',
                'route' => 'rbt/create',
                'controller_name' => 'RbtController',
                'created_at' => '2019-03-14 08:51:14',
                'updated_at' => '2019-03-14 08:51:14',
                'function_name' => 'create',
            ),
            108 =>
            array (
                'id' => 157,
                'method' => 'post',
                'route' => 'rbt',
                'controller_name' => 'RbtController',
                'created_at' => '2019-03-14 08:51:15',
                'updated_at' => '2019-03-14 08:51:15',
                'function_name' => 'store',
            ),
            109 =>
            array (
                'id' => 158,
                'method' => 'get',
                'route' => 'rbt/{id}',
                'controller_name' => 'RbtController',
                'created_at' => '2019-03-14 08:51:15',
                'updated_at' => '2019-03-14 08:51:15',
                'function_name' => 'show',
            ),
            110 =>
            array (
                'id' => 159,
                'method' => 'get',
                'route' => 'rbt/{id}/edit',
                'controller_name' => 'RbtController',
                'created_at' => '2019-03-14 08:51:15',
                'updated_at' => '2019-03-14 08:51:15',
                'function_name' => 'edit',
            ),
            111 =>
            array (
                'id' => 160,
                'method' => 'patch',
                'route' => 'rbt/{id}',
                'controller_name' => 'RbtController',
                'created_at' => '2019-03-14 08:51:15',
                'updated_at' => '2019-03-14 08:51:15',
                'function_name' => 'update',
            ),
            112 =>
            array (
                'id' => 161,
                'method' => 'get',
                'route' => 'rbt/{id}/delete',
                'controller_name' => 'RbtController',
                'created_at' => '2019-03-14 08:51:15',
                'updated_at' => '2019-03-14 08:51:15',
                'function_name' => 'destroy',
            ),
            113 =>
            array (
                'id' => 162,
                'method' => 'get',
                'route' => 'users/{id}/delete',
                'controller_name' => 'UserController',
                'created_at' => '2019-10-13 11:51:03',
                'updated_at' => '2019-10-13 11:51:03',
                'function_name' => 'destroy',
            ),
            114 =>
            array (
                'id' => 163,
                'method' => 'get',
                'route' => 'migrate_tables',
                'controller_name' => 'DashboardController',
                'created_at' => '2019-10-13 12:09:15',
                'updated_at' => '2019-10-13 13:02:42',
                'function_name' => 'migrate_tables',
            ),
            115 =>
            array (
                'id' => 164,
                'method' => 'get',
                'route' => 'provider',
                'controller_name' => 'ProviderController',
                'created_at' => '2019-02-14 13:01:13',
                'updated_at' => '2019-02-14 13:01:13',
                'function_name' => 'index',
            ),
            116 =>
            array (
                'id' => 165,
                'method' => 'get',
                'route' => 'provider/create',
                'controller_name' => 'ProviderController',
                'created_at' => '2019-02-14 13:01:13',
                'updated_at' => '2019-02-14 13:01:13',
                'function_name' => 'create',
            ),
            117 =>
            array (
                'id' => 166,
                'method' => 'post',
                'route' => 'provider',
                'controller_name' => 'ProviderController',
                'created_at' => '2019-02-14 13:01:13',
                'updated_at' => '2019-02-14 13:01:13',
                'function_name' => 'store',
            ),
            118 =>
            array (
                'id' => 167,
                'method' => 'get',
                'route' => 'provider/{id}',
                'controller_name' => 'ProviderController',
                'created_at' => '2019-02-14 13:01:13',
                'updated_at' => '2019-02-14 13:01:13',
                'function_name' => 'show',
            ),
            119 =>
            array (
                'id' => 168,
                'method' => 'get',
                'route' => 'provider/{id}/edit',
                'controller_name' => 'ProviderController',
                'created_at' => '2019-02-14 13:01:13',
                'updated_at' => '2019-02-14 13:01:13',
                'function_name' => 'edit',
            ),
            120 =>
            array (
                'id' => 169,
                'method' => 'patch',
                'route' => 'provider/{id}',
                'controller_name' => 'ProviderController',
                'created_at' => '2019-02-14 13:01:13',
                'updated_at' => '2019-02-14 13:01:13',
                'function_name' => 'update',
            ),
            121 =>
            array (
                'id' => 170,
                'method' => 'get',
                'route' => 'provider/{id}/delete',
                'controller_name' => 'ProviderController',
                'created_at' => '2019-02-14 13:01:13',
                'updated_at' => '2019-02-14 13:01:13',
                'function_name' => 'destroy',
            ),
            122 =>
            array (
                'id' => 172,
                'method' => 'get',
                'route' => 'all_routes/{id}/edit',
                'controller_name' => 'RouteController',
                'created_at' => '2019-02-14 13:01:13',
                'updated_at' => '2019-02-14 13:01:13',
                'function_name' => 'edit',
            ),
            123 =>
            array (
                'id' => 173,
                'method' => 'get',
                'route' => 'all_routes/{id}/delete',
                'controller_name' => 'RouteController',
                'created_at' => '2019-02-14 13:01:13',
                'updated_at' => '2019-02-14 13:01:13',
                'function_name' => 'destroy',
            ),
            124 =>
            array (
                'id' => 174,
                'method' => 'post',
                'route' => 'all_routes/{id}/update',
                'controller_name' => 'RouteController',
                'created_at' => '2019-02-14 13:01:13',
                'updated_at' => '2019-02-14 13:01:13',
                'function_name' => 'update',
            ),
            125 =>
            array (
                'id' => 175,
                'method' => 'get',
                'route' => 'content/allData',
                'controller_name' => 'ContentController',
                'created_at' => '2019-02-14 13:01:13',
                'updated_at' => '2019-02-14 13:01:13',
                'function_name' => 'allData',
            ),
            126 =>
            array (
                'id' => 176,
                'method' => 'get',
                'route' => 'category/allData',
                'controller_name' => 'CategoryController',
                'created_at' => '2019-02-14 13:01:13',
                'updated_at' => '2019-02-14 13:01:13',
                'function_name' => 'allData',
            ),
            127 =>
            array (
                'id' => 177,
                'method' => 'get',
                'route' => 'post/allData',
                'controller_name' => 'PostController',
                'created_at' => '2019-02-14 13:01:13',
                'updated_at' => '2019-02-14 13:01:13',
                'function_name' => 'allData',
            ),
            128 =>
            array (
                'id' => 178,
                'method' => 'get',
                'route' => 'rbt/allData',
                'controller_name' => 'RbtController',
                'created_at' => '2019-02-14 13:01:13',
                'updated_at' => '2019-02-14 13:01:13',
                'function_name' => 'allData',
            ),
            129 =>
            array (
                'id' => 201,
                'method' => 'delete',
                'route' => 'edition-types/multi/delete',
                'controller_name' => 'Quran\\EditionTypeController',
                'created_at' => '2021-08-25 10:22:27',
                'updated_at' => '2021-08-25 10:22:27',
                'function_name' => 'multiDelete',
            ),
            130 =>
            array (
                'id' => 202,
                'method' => 'get',
                'route' => 'edition-types',
                'controller_name' => 'Quran\\EditionTypeController',
                'created_at' => '2021-08-25 10:22:27',
                'updated_at' => '2021-08-25 10:22:27',
                'function_name' => 'index',
            ),
            131 =>
            array (
                'id' => 203,
                'method' => 'get',
                'route' => 'edition-types/create',
                'controller_name' => 'Quran\\EditionTypeController',
                'created_at' => '2021-08-25 10:22:27',
                'updated_at' => '2021-08-25 10:22:27',
                'function_name' => 'create',
            ),
            132 =>
            array (
                'id' => 204,
                'method' => 'post',
                'route' => 'edition-types',
                'controller_name' => 'Quran\\EditionTypeController',
                'created_at' => '2021-08-25 10:22:27',
                'updated_at' => '2021-08-25 10:22:27',
                'function_name' => 'store',
            ),
            133 =>
            array (
                'id' => 205,
                'method' => 'get',
                'route' => 'edition-types/{id}/edit',
                'controller_name' => 'Quran\\EditionTypeController',
                'created_at' => '2021-08-25 10:22:27',
                'updated_at' => '2021-08-25 10:22:27',
                'function_name' => 'edit',
            ),
            134 =>
            array (
                'id' => 206,
                'method' => 'put',
                'route' => 'edition-types/{id}',
                'controller_name' => 'Quran\\EditionTypeController',
                'created_at' => '2021-08-25 10:22:27',
                'updated_at' => '2021-08-25 10:22:27',
                'function_name' => 'update',
            ),
            135 =>
            array (
                'id' => 207,
                'method' => 'delete',
                'route' => 'edition-types/{id}',
                'controller_name' => 'Quran\\EditionTypeController',
                'created_at' => '2021-08-25 10:22:27',
                'updated_at' => '2021-08-25 10:22:27',
                'function_name' => 'destroy',
            ),
            136 =>
            array (
                'id' => 208,
                'method' => 'delete',
                'route' => 'edition-languages/multi/delete',
                'controller_name' => 'Quran\\EditionLanguageController',
                'created_at' => '2021-08-25 10:43:43',
                'updated_at' => '2021-08-25 10:43:43',
                'function_name' => 'multiDelete',
            ),
            137 =>
            array (
                'id' => 209,
                'method' => 'get',
                'route' => 'edition-languages',
                'controller_name' => 'Quran\\EditionLanguageController',
                'created_at' => '2021-08-25 10:43:43',
                'updated_at' => '2021-08-25 10:43:43',
                'function_name' => 'index',
            ),
            138 =>
            array (
                'id' => 210,
                'method' => 'get',
                'route' => 'edition-languages/create',
                'controller_name' => 'Quran\\EditionLanguageController',
                'created_at' => '2021-08-25 10:43:43',
                'updated_at' => '2021-08-25 10:43:43',
                'function_name' => 'create',
            ),
            139 =>
            array (
                'id' => 211,
                'method' => 'post',
                'route' => 'edition-languages',
                'controller_name' => 'Quran\\EditionLanguageController',
                'created_at' => '2021-08-25 10:43:43',
                'updated_at' => '2021-08-25 10:43:43',
                'function_name' => 'store',
            ),
            140 =>
            array (
                'id' => 212,
                'method' => 'get',
                'route' => 'edition-languages/{id}/edit',
                'controller_name' => 'Quran\\EditionLanguageController',
                'created_at' => '2021-08-25 10:43:43',
                'updated_at' => '2021-08-25 10:43:43',
                'function_name' => 'edit',
            ),
            141 =>
            array (
                'id' => 213,
                'method' => 'put',
                'route' => 'edition-languages/{id}',
                'controller_name' => 'Quran\\EditionLanguageController',
                'created_at' => '2021-08-25 10:43:43',
                'updated_at' => '2021-08-25 10:43:43',
                'function_name' => 'update',
            ),
            142 =>
            array (
                'id' => 214,
                'method' => 'delete',
                'route' => 'edition-languages/{id}',
                'controller_name' => 'Quran\\EditionLanguageController',
                'created_at' => '2021-08-25 10:43:43',
                'updated_at' => '2021-08-25 10:43:43',
                'function_name' => 'destroy',
            ),
            143 =>
            array (
                'id' => 216,
                'method' => 'delete',
                'route' => 'formats/multi/delete',
                'controller_name' => 'Quran\\FormatController',
                'created_at' => '2021-08-25 10:59:28',
                'updated_at' => '2021-08-25 10:59:28',
                'function_name' => 'multiDelete',
            ),
            144 =>
            array (
                'id' => 217,
                'method' => 'get',
                'route' => 'formats',
                'controller_name' => 'Quran\\FormatController',
                'created_at' => '2021-08-25 10:59:28',
                'updated_at' => '2021-08-25 10:59:28',
                'function_name' => 'index',
            ),
            145 =>
            array (
                'id' => 218,
                'method' => 'get',
                'route' => 'formats/create',
                'controller_name' => 'Quran\\FormatController',
                'created_at' => '2021-08-25 10:59:29',
                'updated_at' => '2021-08-25 10:59:29',
                'function_name' => 'create',
            ),
            146 =>
            array (
                'id' => 219,
                'method' => 'post',
                'route' => 'formats',
                'controller_name' => 'Quran\\FormatController',
                'created_at' => '2021-08-25 10:59:29',
                'updated_at' => '2021-08-25 10:59:29',
                'function_name' => 'store',
            ),
            147 =>
            array (
                'id' => 220,
                'method' => 'get',
                'route' => 'formats/{id}/edit',
                'controller_name' => 'Quran\\FormatController',
                'created_at' => '2021-08-25 10:59:29',
                'updated_at' => '2021-08-25 10:59:29',
                'function_name' => 'edit',
            ),
            148 =>
            array (
                'id' => 221,
                'method' => 'put',
                'route' => 'formats/{id}',
                'controller_name' => 'Quran\\FormatController',
                'created_at' => '2021-08-25 10:59:29',
                'updated_at' => '2021-08-25 10:59:29',
                'function_name' => 'update',
            ),
            149 =>
            array (
                'id' => 222,
                'method' => 'delete',
                'route' => 'formats/{id}',
                'controller_name' => 'Quran\\FormatController',
                'created_at' => '2021-08-25 10:59:29',
                'updated_at' => '2021-08-25 10:59:29',
                'function_name' => 'destroy',
            ),
            150 =>
            array (
                'id' => 223,
                'method' => 'delete',
                'route' => 'editions/multi/delete',
                'controller_name' => 'Quran\\EditionController',
                'created_at' => '2021-08-25 11:07:59',
                'updated_at' => '2021-08-25 11:07:59',
                'function_name' => 'multiDelete',
            ),
            151 =>
            array (
                'id' => 224,
                'method' => 'get',
                'route' => 'editions',
                'controller_name' => 'Quran\\EditionController',
                'created_at' => '2021-08-25 11:07:59',
                'updated_at' => '2021-08-25 11:07:59',
                'function_name' => 'index',
            ),
            152 =>
            array (
                'id' => 225,
                'method' => 'get',
                'route' => 'editions/create',
                'controller_name' => 'Quran\\EditionController',
                'created_at' => '2021-08-25 11:07:59',
                'updated_at' => '2021-08-25 11:07:59',
                'function_name' => 'create',
            ),
            153 =>
            array (
                'id' => 226,
                'method' => 'post',
                'route' => 'editions',
                'controller_name' => 'Quran\\EditionController',
                'created_at' => '2021-08-25 11:07:59',
                'updated_at' => '2021-08-25 11:07:59',
                'function_name' => 'store',
            ),
            154 =>
            array (
                'id' => 227,
                'method' => 'get',
                'route' => 'editions/{id}/edit',
                'controller_name' => 'Quran\\EditionController',
                'created_at' => '2021-08-25 11:07:59',
                'updated_at' => '2021-08-25 11:07:59',
                'function_name' => 'edit',
            ),
            155 =>
            array (
                'id' => 228,
                'method' => 'put',
                'route' => 'editions/{id}',
                'controller_name' => 'Quran\\EditionController',
                'created_at' => '2021-08-25 11:07:59',
                'updated_at' => '2021-08-25 11:07:59',
                'function_name' => 'update',
            ),
            156 =>
            array (
                'id' => 229,
                'method' => 'delete',
                'route' => 'editions/{id}',
                'controller_name' => 'Quran\\EditionController',
                'created_at' => '2021-08-25 11:07:59',
                'updated_at' => '2021-08-25 11:07:59',
                'function_name' => 'destroy',
            ),
            157 =>
            array (
                'id' => 230,
                'method' => 'delete',
                'route' => 'surahs/multi/delete',
                'controller_name' => 'Quran\\SurahController',
                'created_at' => '2021-08-25 11:13:51',
                'updated_at' => '2021-08-25 11:13:51',
                'function_name' => 'multiDelete',
            ),
            158 =>
            array (
                'id' => 231,
                'method' => 'get',
                'route' => 'surahs',
                'controller_name' => 'Quran\\SurahController',
                'created_at' => '2021-08-25 11:13:51',
                'updated_at' => '2021-08-25 11:13:51',
                'function_name' => 'index',
            ),
            159 =>
            array (
                'id' => 232,
                'method' => 'get',
                'route' => 'surahs/create',
                'controller_name' => 'Quran\\SurahController',
                'created_at' => '2021-08-25 11:13:51',
                'updated_at' => '2021-08-25 11:13:51',
                'function_name' => 'create',
            ),
            160 =>
            array (
                'id' => 233,
                'method' => 'post',
                'route' => 'surahs',
                'controller_name' => 'Quran\\SurahController',
                'created_at' => '2021-08-25 11:13:52',
                'updated_at' => '2021-08-25 11:13:52',
                'function_name' => 'store',
            ),
            161 =>
            array (
                'id' => 234,
                'method' => 'get',
                'route' => 'surahs/{id}/edit',
                'controller_name' => 'Quran\\SurahController',
                'created_at' => '2021-08-25 11:13:52',
                'updated_at' => '2021-08-25 11:13:52',
                'function_name' => 'edit',
            ),
            162 =>
            array (
                'id' => 235,
                'method' => 'put',
                'route' => 'surahs/{id}',
                'controller_name' => 'Quran\\SurahController',
                'created_at' => '2021-08-25 11:13:52',
                'updated_at' => '2021-08-25 11:13:52',
                'function_name' => 'update',
            ),
            163 =>
            array (
                'id' => 236,
                'method' => 'delete',
                'route' => 'surahs/{id}',
                'controller_name' => 'Quran\\SurahController',
                'created_at' => '2021-08-25 11:13:52',
                'updated_at' => '2021-08-25 11:13:52',
                'function_name' => 'destroy',
            ),
            164 =>
            array (
                'id' => 237,
                'method' => 'delete',
                'route' => 'ayahs/multi/delete',
                'controller_name' => 'Quran\\AyahController',
                'created_at' => '2021-08-25 11:17:40',
                'updated_at' => '2021-08-25 11:17:40',
                'function_name' => 'multiDelete',
            ),
            165 =>
            array (
                'id' => 238,
                'method' => 'get',
                'route' => 'ayahs',
                'controller_name' => 'Quran\\AyahController',
                'created_at' => '2021-08-25 11:17:40',
                'updated_at' => '2021-08-25 11:17:40',
                'function_name' => 'index',
            ),
            166 =>
            array (
                'id' => 239,
                'method' => 'get',
                'route' => 'ayahs/create',
                'controller_name' => 'Quran\\AyahController',
                'created_at' => '2021-08-25 11:17:40',
                'updated_at' => '2021-08-25 11:17:40',
                'function_name' => 'create',
            ),
            167 =>
            array (
                'id' => 240,
                'method' => 'post',
                'route' => 'ayahs',
                'controller_name' => 'Quran\\AyahController',
                'created_at' => '2021-08-25 11:17:41',
                'updated_at' => '2021-08-25 11:17:41',
                'function_name' => 'store',
            ),
            168 =>
            array (
                'id' => 241,
                'method' => 'get',
                'route' => 'ayahs/{id}/edit',
                'controller_name' => 'Quran\\AyahController',
                'created_at' => '2021-08-25 11:17:41',
                'updated_at' => '2021-08-25 11:17:41',
                'function_name' => 'edit',
            ),
            169 =>
            array (
                'id' => 242,
                'method' => 'put',
                'route' => 'ayahs/{id}',
                'controller_name' => 'Quran\\AyahController',
                'created_at' => '2021-08-25 11:17:41',
                'updated_at' => '2021-08-25 11:17:41',
                'function_name' => 'update',
            ),
            170 =>
            array (
                'id' => 243,
                'method' => 'delete',
                'route' => 'ayahs/{id}',
                'controller_name' => 'Quran\\AyahController',
                'created_at' => '2021-08-25 11:17:41',
                'updated_at' => '2021-08-25 11:17:41',
                'function_name' => 'destroy',
            ),
            171 =>
            array (
                'id' => 244,
                'method' => 'delete',
                'route' => 'provider/multi/delete',
                'controller_name' => 'ProviderController',
                'created_at' => '2021-08-25 11:27:04',
                'updated_at' => '2021-08-25 11:27:04',
                'function_name' => 'multiDelete',
            ),
            172 =>
            array (
                'id' => 245,
                'method' => 'delete',
                'route' => 'audios/multi/delete',
                'controller_name' => 'Quran\\AudioController',
                'created_at' => '2021-08-25 11:34:19',
                'updated_at' => '2021-08-25 11:34:19',
                'function_name' => 'multiDelete',
            ),
            173 =>
            array (
                'id' => 246,
                'method' => 'get',
                'route' => 'audios',
                'controller_name' => 'Quran\\AudioController',
                'created_at' => '2021-08-25 11:34:19',
                'updated_at' => '2021-08-25 11:34:19',
                'function_name' => 'index',
            ),
            174 =>
            array (
                'id' => 247,
                'method' => 'get',
                'route' => 'audios/create',
                'controller_name' => 'Quran\\AudioController',
                'created_at' => '2021-08-25 11:34:20',
                'updated_at' => '2021-08-25 11:34:20',
                'function_name' => 'create',
            ),
            175 =>
            array (
                'id' => 248,
                'method' => 'post',
                'route' => 'audios',
                'controller_name' => 'Quran\\AudioController',
                'created_at' => '2021-08-25 11:34:20',
                'updated_at' => '2021-08-25 11:34:20',
                'function_name' => 'store',
            ),
            176 =>
            array (
                'id' => 249,
                'method' => 'get',
                'route' => 'audios/{id}/edit',
                'controller_name' => 'Quran\\AudioController',
                'created_at' => '2021-08-25 11:34:20',
                'updated_at' => '2021-08-25 11:34:20',
                'function_name' => 'edit',
            ),
            177 =>
            array (
                'id' => 250,
                'method' => 'put',
                'route' => 'audios/{id}',
                'controller_name' => 'Quran\\AudioController',
                'created_at' => '2021-08-25 11:34:20',
                'updated_at' => '2021-08-25 11:34:20',
                'function_name' => 'update',
            ),
            178 =>
            array (
                'id' => 251,
                'method' => 'delete',
                'route' => 'audios/{id}',
                'controller_name' => 'Quran\\AudioController',
                'created_at' => '2021-08-25 11:34:20',
                'updated_at' => '2021-08-25 11:34:20',
                'function_name' => 'destroy',
            ),
            179 =>
            array (
                'id' => 252,
                'method' => 'get',
                'route' => 'insert-langs',
                'controller_name' => 'getApiDataController',
                'created_at' => '2021-08-26 11:01:48',
                'updated_at' => '2021-08-26 11:01:48',
                'function_name' => 'langs',
            ),
            180 =>
            array (
                'id' => 253,
                'method' => 'get',
                'route' => 'insert-formats',
                'controller_name' => 'getApiDataController',
                'created_at' => '2021-08-26 11:01:48',
                'updated_at' => '2021-08-26 11:01:48',
                'function_name' => 'formats',
            ),
            181 =>
            array (
                'id' => 254,
                'method' => 'get',
                'route' => 'insert-types',
                'controller_name' => 'getApiDataController',
                'created_at' => '2021-08-26 11:01:49',
                'updated_at' => '2021-08-26 11:01:49',
                'function_name' => 'types',
            ),
            182 =>
            array (
                'id' => 255,
                'method' => 'get',
                'route' => 'insert-surahs',
                'controller_name' => 'getApiDataController',
                'created_at' => '2021-08-26 11:01:49',
                'updated_at' => '2021-08-26 11:01:49',
                'function_name' => 'surahs',
            ),
            183 =>
            array (
                'id' => 256,
                'method' => 'get',
                'route' => 'insert-providers-editions',
                'controller_name' => 'getApiDataController',
                'created_at' => '2021-08-26 11:01:49',
                'updated_at' => '2021-08-26 11:01:49',
                'function_name' => 'providersEditions',
            ),
            184 =>
            array (
                'id' => 257,
                'method' => 'get',
                'route' => 'insert-ayahs',
                'controller_name' => 'getApiDataController',
                'created_at' => '2021-08-26 11:01:49',
                'updated_at' => '2021-08-26 11:01:49',
                'function_name' => 'ayahs',
            ),
            185 =>
            array (
                'id' => 258,
                'method' => 'get',
                'route' => 'all-editions',
                'controller_name' => 'getApiDataController',
                'created_at' => '2021-08-26 11:01:49',
                'updated_at' => '2021-08-26 11:01:49',
                'function_name' => 'editionsForm',
            ),
            186 =>
            array (
                'id' => 259,
                'method' => 'post',
                'route' => 'editions-ayahs',
                'controller_name' => 'getApiDataController',
                'created_at' => '2021-08-26 11:01:49',
                'updated_at' => '2021-08-26 11:01:49',
                'function_name' => 'ayahs',
            ),
        ));


    }
}
