<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('countries')->delete();

        \DB::table('countries')->insert(array (
            0 =>
            array (
                'id' => 1,
                'title' => 'Egypt',
                'created_at' => '2021-07-08 09:23:39',
                'updated_at' => '2021-07-08 09:23:39',
            ),
            1 =>
            array (
                'id' => 2,
                'title' => 'KSA',
                'created_at' => '2021-07-08 09:24:55',
                'updated_at' => '2021-07-08 09:24:55',
            ),
        ));


    }
}
