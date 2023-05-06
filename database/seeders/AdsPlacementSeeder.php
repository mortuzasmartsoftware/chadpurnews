<?php

namespace Database\Seeders;

use App\Models\AdsPlacement;
use Illuminate\Database\Seeder;

class AdsPlacementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ads_placements = array(
            array('id' => '1','ads_position_id' => '1','ads_serial_id' => '3','status' => '1','created_at' => '2023-02-14 12:26:43','updated_at' => '2023-02-14 13:40:58'),
            array('id' => '2','ads_position_id' => '1','ads_serial_id' => '4','status' => '1','created_at' => '2023-02-14 12:28:28','updated_at' => '2023-02-14 13:41:09'),
            array('id' => '3','ads_position_id' => '7','ads_serial_id' => '1','status' => '1','created_at' => '2023-02-14 13:40:32','updated_at' => '2023-02-14 13:40:32'),
            array('id' => '4','ads_position_id' => '7','ads_serial_id' => '2','status' => '1','created_at' => '2023-02-14 13:40:39','updated_at' => '2023-02-14 13:40:39'),
            array('id' => '5','ads_position_id' => '1','ads_serial_id' => '5','status' => '1','created_at' => '2023-02-14 13:41:18','updated_at' => '2023-02-14 13:41:18'),
            array('id' => '6','ads_position_id' => '1','ads_serial_id' => '6','status' => '1','created_at' => '2023-02-14 13:42:25','updated_at' => '2023-02-14 13:42:25'),
            array('id' => '7','ads_position_id' => '1','ads_serial_id' => '7','status' => '1','created_at' => '2023-02-14 13:47:46','updated_at' => '2023-02-14 13:47:46'),
            array('id' => '8','ads_position_id' => '1','ads_serial_id' => '8','status' => '1','created_at' => '2023-02-14 13:47:55','updated_at' => '2023-02-14 13:47:55'),
            array('id' => '9','ads_position_id' => '1','ads_serial_id' => '9','status' => '1','created_at' => '2023-02-14 13:48:02','updated_at' => '2023-02-14 13:48:02'),
            array('id' => '10','ads_position_id' => '1','ads_serial_id' => '10','status' => '1','created_at' => '2023-02-14 13:48:07','updated_at' => '2023-02-14 13:48:07'),
            array('id' => '11','ads_position_id' => '2','ads_serial_id' => '3','status' => '1','created_at' => '2023-02-14 13:55:20','updated_at' => '2023-02-14 13:55:20'),
            array('id' => '12','ads_position_id' => '2','ads_serial_id' => '4','status' => '1','created_at' => '2023-02-14 13:55:38','updated_at' => '2023-02-14 13:55:38'),
            array('id' => '13','ads_position_id' => '2','ads_serial_id' => '7','status' => '1','created_at' => '2023-02-14 13:57:20','updated_at' => '2023-02-14 13:57:20'),
            array('id' => '14','ads_position_id' => '3','ads_serial_id' => '3','status' => '1','created_at' => '2023-02-14 13:59:26','updated_at' => '2023-02-14 13:59:26'),
            array('id' => '15','ads_position_id' => '3','ads_serial_id' => '4','status' => '1','created_at' => '2023-02-14 13:59:34','updated_at' => '2023-02-14 13:59:34'),
            array('id' => '16','ads_position_id' => '3','ads_serial_id' => '7','status' => '1','created_at' => '2023-02-14 13:59:41','updated_at' => '2023-02-14 13:59:41'),
            array('id' => '17','ads_position_id' => '4','ads_serial_id' => '6','status' => '1','created_at' => '2023-02-14 16:00:17','updated_at' => '2023-02-14 16:00:17'),
            array('id' => '18','ads_position_id' => '4','ads_serial_id' => '9','status' => '1','created_at' => '2023-02-14 16:00:24','updated_at' => '2023-02-14 16:00:24'),
            array('id' => '19','ads_position_id' => '4','ads_serial_id' => '11','status' => '1','created_at' => '2023-02-14 16:00:31','updated_at' => '2023-02-14 16:00:31'),
            array('id' => '20','ads_position_id' => '4','ads_serial_id' => '12','status' => '1','created_at' => '2023-02-14 16:00:46','updated_at' => '2023-02-14 16:00:46'),
            array('id' => '21','ads_position_id' => '4','ads_serial_id' => '8','status' => '1','created_at' => '2023-02-14 16:00:56','updated_at' => '2023-02-14 16:00:56')
        );

        foreach ($ads_placements as $item) {
            AdsPlacement::firstOrCreate(
                [ 'id'                  => $item['id'] ],
                [
                    'ads_position_id'   => $item['ads_position_id'],
                    'ads_serial_id'     => $item['ads_serial_id'],
                    'status'            => $item['status'],
                    'created_at'        => $item['created_at'],
                    'updated_at'        => $item['updated_at'],
                ]
            );
        }

    }
}
