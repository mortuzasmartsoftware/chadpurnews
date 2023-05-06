<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            AboutCompanyTableSeeder::class,
            AdsManagementSeeder::class,
            AdsPositionSeeder::class,
            AdsPlacementSeeder::class,
            AdsSerialSeeder::class,
            CategorySeeder::class,
        ]);

    }

}
