<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\AdsPosition;

class AdsPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $all_ads = array(
            array('id' => '1', 'position_name' => 'Home Page',              'status' => 1),
            array('id' => '2', 'position_name' => 'Category News Page',     'status' => 1),
            array('id' => '3', 'position_name' => 'Sub-category News Page', 'status' => 1),
            array('id' => '4', 'position_name' => 'News Details Page',      'status' => 1),
            array('id' => '5', 'position_name' => 'Archive Page',           'status' => 1),
            array('id' => '6', 'position_name' => 'Search Page',            'status' => 1),
            array('id' => '7', 'position_name' => 'Header',                  'status' => 1),
        );

        foreach ($all_ads as $item) {
            AdsPosition::firstOrCreate(
                [ 'id'                => $item['id'] ],
                [
                    'position_name'   => $item['position_name'],
                    'status'          => $item['status'],
                ]
            );
        }
    }
}
