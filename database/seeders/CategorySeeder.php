<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = array(
            array('id' => '13','name' => 'বাংলাদেশ','link' => 'bangladesh','serial_num' => '1','status' => '1','is_home' => '1','created_at' => '2017-10-07 09:33:53','updated_at' => '2023-02-05 12:07:12'),
            array('id' => '14','name' => 'বিশ্ব','link' => 'world','serial_num' => '2','status' => '1','is_home' => '1','created_at' => '2017-10-07 09:34:15','updated_at' => '2017-11-12 07:51:21'),
            array('id' => '15','name' => 'অর্থনীতি','link' => 'economy','serial_num' => '3','status' => '1','is_home' => '1','created_at' => '2017-10-07 09:37:19','updated_at' => '2017-11-12 23:10:33'),
            array('id' => '16','name' => 'খেলাধুলা','link' => 'sports','serial_num' => '4','status' => '1','is_home' => '1','created_at' => '2017-10-10 10:51:59','updated_at' => '2017-11-12 23:15:41'),
            array('id' => '17','name' => 'বিনোদন','link' => 'entertainment','serial_num' => '5','status' => '1','is_home' => '1','created_at' => '2017-10-10 10:54:02','updated_at' => '2017-11-13 07:02:28'),
            array('id' => '18','name' => 'বিজ্ঞান ও প্রযুক্তি','link' => 'tech','serial_num' => '6','status' => '1','is_home' => '1','created_at' => '2017-10-12 04:27:49','updated_at' => '2017-11-13 07:02:53'),
            array('id' => '19','name' => 'শিল্প ও সাহিত্য','link' => 'arts-literature','serial_num' => '7','status' => '1','is_home' => '1','created_at' => '2017-10-24 09:30:25','updated_at' => '2017-11-13 07:03:33'),
            array('id' => '20','name' => 'শিক্ষা','link' => 'education','serial_num' => '8','status' => '1','is_home' => '1','created_at' => '2017-10-24 09:31:13','updated_at' => '2017-11-13 07:03:57'),
            array('id' => '21','name' => 'প্রিয় প্রবাসী','link' => 'priyo-probashi','serial_num' => '9','status' => '1','is_home' => '0','created_at' => '2017-11-13 06:10:46','updated_at' => '2017-11-13 07:04:15'),
            array('id' => '22','name' => 'জীবনধারা','link' => 'lifestyle','serial_num' => '10','status' => '1','is_home' => '0','created_at' => '2017-11-13 06:21:56','updated_at' => '2017-11-13 07:04:35'),
            array('id' => '23','name' => 'স্বাস্থ্য তথ্য','link' => 'health','serial_num' => '11','status' => '1','is_home' => '0','created_at' => '2017-11-13 06:27:19','updated_at' => '2017-11-13 07:05:02'),
            array('id' => '25','name' => 'ভ্রমণ','link' => 'travel','serial_num' => '12','status' => '1','is_home' => '0','created_at' => '2017-11-13 06:37:23','updated_at' => '2017-11-13 07:05:21'),
            array('id' => '31','name' => 'আইন-কানুন','link' => 'law','serial_num' => '13','status' => '1','is_home' => '0','created_at' => '2017-11-13 07:06:10','updated_at' => '2017-11-13 07:06:10'),
            array('id' => '32','name' => 'ধর্ম ও জীবন','link' => 'religion-and-life','serial_num' => '14','status' => '1','is_home' => '0','created_at' => '2017-11-13 07:11:48','updated_at' => '2017-11-13 07:11:48'),
            array('id' => '33','name' => 'চাকরি','link' => 'job-circular','serial_num' => '15','status' => '1','is_home' => '0','created_at' => '2017-11-13 07:17:18','updated_at' => '2017-11-13 07:17:18'),
            array('id' => '34','name' => 'শিশু-কিশোর','link' => 'kids','serial_num' => '16','status' => '1','is_home' => '0','created_at' => '2017-11-13 07:22:46','updated_at' => '2017-11-13 07:22:46'),
            array('id' => '35','name' => 'হাস্যরস','link' => 'satire','serial_num' => '17','status' => '1','is_home' => '0','created_at' => '2017-11-13 07:25:51','updated_at' => '2017-11-13 07:25:51'),
            array('id' => '36','name' => 'টিউটোরিয়াল','link' => 'tutorial','serial_num' => '18','status' => '1','is_home' => '0','created_at' => '2017-11-13 07:30:26','updated_at' => '2017-11-13 07:30:26'),
            array('id' => '37','name' => 'লাইফ হ্যাক','link' => 'life-hack','serial_num' => '19','status' => '1','is_home' => '0','created_at' => '2017-11-13 07:31:36','updated_at' => '2017-11-13 07:31:36'),
            array('id' => '39','name' => 'আলোচিত সংবাদ','link' => 'featured','serial_num' => '20','status' => '1','is_home' => '0','created_at' => '2017-12-25 01:43:26','updated_at' => '2017-12-25 01:43:26'),
            array('id' => '40','name' => 'প্রোফাইল','link' => 'profile','serial_num' => '21','status' => '1','is_home' => '1','created_at' => '2018-03-05 01:20:25','updated_at' => '2018-03-22 20:52:45'),
            array('id' => '42','name' => 'English ','link' => 'english','serial_num' => '22','status' => '1','is_home' => '1','created_at' => '2020-02-02 07:31:07','updated_at' => '2020-02-02 07:31:07')
        );

        foreach ($category as $item) {
            Category::firstOrCreate(
                [ 'id'            => $item['id'] ],
                [
                    'name'        => $item['name'],
                    'link'        => $item['link'],
                    'serial_num'  => $item['serial_num'],
                    'status'      => $item['status'],
                    'is_home'     => $item['is_home'],
                    'created_at'  => $item['created_at'],
                    'updated_at'  => $item['updated_at'],

                ]
            );
        }

    }
}
