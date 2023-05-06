<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\AdsSerial;

class AdsSerialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ads_serials = array(
            array('id' => '1','serial_name' => 'Header 1','status' => '1','created_at' => '2023-02-13 18:33:40','updated_at' => '2023-02-13 18:33:40'),
            array('id' => '2','serial_name' => 'Header 2','status' => '1','created_at' => '2023-02-13 18:33:40','updated_at' => '2023-02-13 18:33:40'),
            array('id' => '3','serial_name' => 'Page Content 1','status' => '1','created_at' => '2023-02-13 18:33:40','updated_at' => '2023-02-13 18:33:40'),
            array('id' => '4','serial_name' => 'Page Content 2','status' => '1','created_at' => '2023-02-13 18:33:40','updated_at' => '2023-02-13 18:33:40'),
            array('id' => '5','serial_name' => 'Page Content 3','status' => '1','created_at' => '2023-02-13 18:33:40','updated_at' => '2023-02-13 18:33:40'),
            array('id' => '6','serial_name' => 'Page Section 1','status' => '1','created_at' => '2023-02-13 18:33:40','updated_at' => '2023-02-13 18:33:40'),
            array('id' => '7','serial_name' => 'Bottom of the Facebook Page','status' => '1','created_at' => '2023-02-13 18:33:40','updated_at' => '2023-02-13 18:33:40'),
            array('id' => '8','serial_name' => 'Bottom of the Right Sidebar','status' => '1','created_at' => '2023-02-13 18:33:40','updated_at' => '2023-02-13 18:33:40'),
            array('id' => '9','serial_name' => 'Page Section 2','status' => '1','created_at' => '2023-02-13 18:33:40','updated_at' => '2023-02-13 18:33:40'),
            array('id' => '10','serial_name' => 'Footer Top','status' => '1','created_at' => '2023-02-13 18:33:40','updated_at' => '2023-02-13 18:33:40'),
            array('id' => '11','serial_name' => 'Page Section 3','status' => '1','created_at' => '2023-02-13 18:33:40','updated_at' => '2023-02-14 15:58:13'),
            array('id' => '12','serial_name' => 'Top of the Right Sidebar','status' => '1','created_at' => '2023-02-14 15:59:41','updated_at' => NULL)
        );


        foreach ($ads_serials as $item) {
            AdsSerial::firstOrCreate(
                [ 'id'                => $item['id'] ],
                [
                    'serial_name'     => $item['serial_name'],
                    'status'          => $item['status'],
                ]
            );
        }
    }
}
