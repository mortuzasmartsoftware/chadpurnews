<?php

namespace Database\Seeders;

use App\Traits\FileSaver;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutCompanyTableSeeder extends Seeder
{
    use FileSaver;

    public function run()
    {
        DB::table('about_company')->insertOrIgnore([
            'company_name'=>  'Daily Chandpur Sangbad',
            'logo'=>  'default.png',
            'favicon'=>  'default.png',
            'address'=>  'Panthapath, Dhaka 1205',
            'mobile_no'=>  '0123456789',
            'fb_link'=>  'https://www.facebook.com/your_fb_page_name/',
            'email'=>  'your_email_address@gmail.com',
            'short_description'=>  'Desi Media Point Online Latest Bangla News/Article - Sports, Crime, Entertainment, Business, Politics, Education, Opinion, Lifestyle, Photo, Video, Travel, National &amp;amp; World. দেশী বিদেশী খবর সহ বিনেদন জগতের সকল খবর নিয়ে আমরা আছি আপনাদের পাশে, দেশী মিডিয় পয়েন্ট ।',
            'description'=>  'Desi Media Point Online Latest Bangla News/Article - Sports, Crime, Entertainment, Business, Politics, Education, Opinion, Lifestyle, Photo, Video, Travel, National &amp;amp; World. দেশী বিদেশী খবর সহ বিনেদন জগতের সকল খবর নিয়ে আমরা আছি আপনাদের পাশে, দেশী মিডিয় পয়েন্ট ।',
            'map_embed'=>  'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.8924774711345!2d90.38376611498134!3d23.75121338458893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8a53044a39f%3A0x5709a3891587bd5c!2sDesi%20Media%20Point!5e0!3m2!1sen!2sbd!4v1642327281897!5m2!1sen!2sbd',
            'created_at'=>  Carbon::now(),
        ]);

    }
}
