<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('settings')->delete();

        \DB::table('settings')->insert(array (
            0 =>
            array (
                'id' => 1,
                'key' => 'uploadAllow',
                'value' => 'video',
                'created_at' => '2018-02-04 12:04:09',
                'updated_at' => '2019-02-11 15:09:42',
                'type_id' => 6,
                'order' => 0,
            ),
            1 =>
            array (
                'id' => 2,
                'key' => 'enable_testing',
                'value' => '1',
                'created_at' => '2019-02-11 15:14:30',
                'updated_at' => '2019-02-11 15:15:45',
                'type_id' => 7,
                'order' => 0,
            ),
            2 =>
            array (
                'id' => 3,
                'key' => 'content_type_flag',
                'value' => '1',
                'created_at' => '2019-03-07 10:50:04',
                'updated_at' => '2019-03-14 08:54:06',
                'type_id' => 7,
                'order' => 0,
            ),
            3 =>
            array (
                'id' => 4,
                'key' => 'view_coming_post',
                'value' => '1',
                'created_at' => '2021-09-05 03:05:04',
                'updated_at' => '2021-09-05 03:05:06',
                'type_id' => 7,
                'order' => 0,
            ),
        ));


    }
}
