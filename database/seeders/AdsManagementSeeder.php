<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\AdsManagement;

class AdsManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $all_ads = array(
            array('id' => '7','script' => '<a href="https://play.google.com/store/apps/details?id=com.smartsoftwarebd.dokani" target="_blank"> <img style="width: 820px; height: 100px;" src="adManager/smartdokani.png"> </a>','ads_image' => './backend/ads-image/1675596218.gif','script_image_status' => '0','image_url' => 'https://www.smartsoftware.com.bd/','position_id' => '1','serial_num' => '1','status' => '1','created_at' => '2017-11-01 07:18:10','updated_at' => '2023-02-06 12:53:33'),
            array('id' => '23','script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                              <!-- DM-NewsDetels5 -->
                              <ins class="adsbygoogle"
                                   style="display:block"
                                   data-ad-client="ca-pub-8770580490084389"
                                   data-ad-slot="1895692682"
                                   data-ad-format="auto"></ins>
                              <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                              </script>','ads_image' => './backend/ads-image/1675596218.gif','script_image_status' => '0','image_url' => 'https://www.smartsoftware.com.bd/','position_id' => '4','serial_num' => '5','status' => '1','created_at' => '2018-03-17 22:51:36','updated_at' => '2023-02-06 15:29:50'),
            array('id' => '9','script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                              <!-- DM-Home-3 -->
                              <ins class="adsbygoogle"
                                   style="display:block"
                                   data-ad-client="ca-pub-8770580490084389"
                                   data-ad-slot="9850908289"
                                   data-ad-format="auto"></ins>
                              <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                              </script>','ads_image' => './backend/ads-image/1675595595.gif','script_image_status' => '0','image_url' => 'https://www.tradebangla.com.bd','position_id' => '1','serial_num' => '6','status' => '1','created_at' => '2017-11-01 07:25:41','updated_at' => '2023-02-06 11:21:30'),
            array('id' => '27','script' => '<amp-auto-ads type="adsense"
                                            data-ad-client="ca-pub-8770580490084389">
                              </amp-auto-ads>','ads_image' => './backend/ads-image/1675595595.gif','script_image_status' => '0','image_url' => 'https://www.tradebangla.com.bd','position_id' => '1','serial_num' => '7','status' => '1','created_at' => '2018-11-04 23:54:22','updated_at' => '2018-11-04 23:54:22'),
            array('id' => '14','script' => '
                              <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                              <!-- DM-	News-Details -2 -->
                              <ins class="adsbygoogle"
                                   style="display:block"
                                   data-ad-client="ca-pub-8770580490084389"
                                   data-ad-slot="3007541601"
                                   data-ad-format="auto"></ins>
                              <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                              </script>','ads_image' => './backend/ads-image/1675662076.png','script_image_status' => '0','image_url' => 'https://play.google.com/store/apps/details?id=com.smartsoftwarebd.dokani','position_id' => '4','serial_num' => '2','status' => '1','created_at' => '2017-11-25 11:33:05','updated_at' => '2018-02-05 05:08:54'),
            array('id' => '20','script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                              <!-- DM-Singal-News-2 -->
                              <ins class="adsbygoogle"
                                   style="display:block"
                                   data-ad-client="ca-pub-8770580490084389"
                                   data-ad-slot="9356389157"
                                   data-ad-format="auto"></ins>
                              <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                              </script>','ads_image' => './backend/ads-image/1675662076.png','script_image_status' => '0','image_url' => 'https://play.google.com/store/apps/details?id=com.smartsoftwarebd.dokani','position_id' => '3','serial_num' => '2','status' => '1','created_at' => '2018-01-16 05:30:46','updated_at' => '2023-02-06 10:22:36'),
            array('id' => '21','script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                              <!-- DM-News-Details-3 -->
                              <ins class="adsbygoogle"
                                   style="display:block"
                                   data-ad-client="ca-pub-8770580490084389"
                                   data-ad-slot="7909143758"
                                   data-ad-format="auto"></ins>
                              <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                              </script>','ads_image' => './backend/ads-image/1675595595.gif','script_image_status' => '0','image_url' => 'https://www.tradebangla.com.bd','position_id' => '4','serial_num' => '3','status' => '1','created_at' => '2018-02-02 08:55:27','updated_at' => '2023-02-06 10:22:38'),
            array('id' => '15','script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                              <!-- DM-Archave-1 -->
                              <ins class="adsbygoogle"
                                   style="display:block"
                                   data-ad-client="ca-pub-8770580490084389"
                                   data-ad-slot="4774675578"
                                   data-ad-format="auto"></ins>
                              <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                              </script>','ads_image' => './backend/ads-image/1675595595.gif','script_image_status' => '0','image_url' => 'https://www.tradebangla.com.bd','position_id' => '5','serial_num' => '1','status' => '1','created_at' => '2018-01-07 00:38:45','updated_at' => '2023-02-06 10:22:41'),
            array('id' => '17','script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                              <!-- DM-CataNewPage -->
                              <ins class="adsbygoogle"
                                   style="display:block"
                                   data-ad-client="ca-pub-8770580490084389"
                                   data-ad-slot="9724530175"
                                   data-ad-format="auto"></ins>
                              <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                              </script>','ads_image' => './backend/ads-image/1675596218.gif','script_image_status' => '0','image_url' => 'https://www.smartsoftware.com.bd/','position_id' => '2','serial_num' => '2','status' => '1','created_at' => '2018-01-07 23:32:32','updated_at' => '2023-02-06 10:22:45'),
            array('id' => '8','script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                              <!-- DM-Home-55 -->
                              <ins class="adsbygoogle"
                                   style="display:block"
                                   data-ad-client="ca-pub-8770580490084389"
                                   data-ad-slot="5089536195"
                                   data-ad-format="auto"></ins>
                              <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                              </script>','ads_image' => './backend/ads-image/1675662076.png','script_image_status' => '0','image_url' => 'https://play.google.com/store/apps/details?id=com.smartsoftwarebd.dokani','position_id' => '1','serial_num' => '5','status' => '1','created_at' => '2017-11-01 07:24:38','updated_at' => '2023-02-05 17:13:15'),
            array('id' => '12','script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                              <!-- DM-Home-04 -->
                              <ins class="adsbygoogle"
                                   style="display:block"
                                   data-ad-client="ca-pub-8770580490084389"
                                   data-ad-slot="5467496408"
                                   data-ad-format="auto"></ins>
                              <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                              </script>','ads_image' => './backend/ads-image/1675595595.gif','script_image_status' => '0','image_url' => 'https://www.tradebangla.com.bd','position_id' => '1','serial_num' => '4','status' => '1','created_at' => '2017-11-25 11:22:25','updated_at' => '2023-02-06 11:14:35'),
            array('id' => '10','script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                              <!-- DM-category-news-1 -->
                              <ins class="adsbygoogle"
                                   style="display:block"
                                   data-ad-client="ca-pub-8770580490084389"
                                   data-ad-slot="4731686811"
                                   data-ad-format="auto"></ins>
                              <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                              </script>','ads_image' => './backend/ads-image/1675662076.png','script_image_status' => '0','image_url' => 'https://play.google.com/store/apps/details?id=com.smartsoftwarebd.dokani','position_id' => '2','serial_num' => '1','status' => '1','created_at' => '2017-11-01 07:26:52','updated_at' => '2018-01-07 00:34:20'),
            array('id' => '11','script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                              <!-- DM-Home-3 -->
                              <ins class="adsbygoogle"
                                   style="display:block"
                                   data-ad-client="ca-pub-8770580490084389"
                                   data-ad-slot="9850908289"
                                   data-ad-format="auto"></ins>
                              <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                              </script>','ads_image' => './backend/ads-image/1675596218.gif','script_image_status' => '0','image_url' => 'https://www.smartsoftware.com.bd/','position_id' => '1','serial_num' => '10','status' => '1','created_at' => '2017-11-25 11:15:55','updated_at' => '2023-02-06 11:01:38'),
            array('id' => '18','script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                              <!-- DM-Search -->
                              <ins class="adsbygoogle"
                                   style="display:block"
                                   data-ad-client="ca-pub-8770580490084389"
                                   data-ad-slot="2530358446"
                                   data-ad-format="auto"></ins>
                              <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                              </script>','ads_image' => './backend/ads-image/1675595595.gif','script_image_status' => '0','image_url' => 'https://www.tradebangla.com.bd','position_id' => '6','serial_num' => '2','status' => '1','created_at' => '2018-01-08 00:17:15','updated_at' => '2023-02-06 11:14:17'),
            array('id' => '22','script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                              <!-- DM-News-Deteles -->
                              <ins class="adsbygoogle"
                                   style="display:block"
                                   data-ad-client="ca-pub-8770580490084389"
                                   data-ad-slot="9699474162"
                                   data-ad-format="auto"></ins>
                              <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                              </script>','ads_image' => './backend/ads-image/1675662076.png','script_image_status' => '0','image_url' => 'https://play.google.com/store/apps/details?id=com.smartsoftwarebd.dokani','position_id' => '4','serial_num' => '4','status' => '1','created_at' => '2018-03-17 22:25:23','updated_at' => '2018-03-17 22:25:23'),
            array('id' => '13','script' => '<a href="https://play.google.com/store/apps/details?id=com.smartsoftwarebd.dokani" target="_blank"> <img style="width: 780px; height: 100px;" src="http://www.desimediapoint.com/adManager/smartdokani.png"> </a>','ads_image' => './backend/ads-image/1675596218.gif','script_image_status' => '0','image_url' => 'https://www.smartsoftware.com.bd/','position_id' => '4','serial_num' => '1','status' => '1','created_at' => '2017-11-25 11:28:01','updated_at' => '2020-10-02 23:31:46'),
            array('id' => '16','script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                              <!-- DM-Search-1 -->
                              <ins class="adsbygoogle"
                                   style="display:block"
                                   data-ad-client="ca-pub-8770580490084389"
                                   data-ad-slot="1227556071"
                                   data-ad-format="auto"></ins>
                              <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                              </script>','ads_image' => './backend/ads-image/1675662076.png','script_image_status' => '0','image_url' => 'https://play.google.com/store/apps/details?id=com.smartsoftwarebd.dokani','position_id' => '6','serial_num' => '1','status' => '1','created_at' => '2018-01-07 00:40:23','updated_at' => '2018-01-07 00:40:23'),
            array('id' => '19','script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                              <!-- DM-SingalNews-1 -->
                              <ins class="adsbygoogle"
                                   style="display:block"
                                   data-ad-client="ca-pub-8770580490084389"
                                   data-ad-slot="9384309318"
                                   data-ad-format="auto"></ins>
                              <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                              </script>','ads_image' => './backend/ads-image/1675596218.gif','script_image_status' => '0','image_url' => 'https://www.smartsoftware.com.bd/','position_id' => '3','serial_num' => '1','status' => '1','created_at' => '2018-01-16 05:29:39','updated_at' => '2023-02-06 10:22:33'),
            array('id' => '24','script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                              <!-- DM-NewCat-2 -->
                              <ins class="adsbygoogle"
                                   style="display:block"
                                   data-ad-client="ca-pub-8770580490084389"
                                   data-ad-slot="3469941883"
                                   data-ad-format="auto"></ins>
                              <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                              </script>','ads_image' => './backend/ads-image/1675595595.gif','script_image_status' => '0','image_url' => 'https://www.tradebangla.com.bd','position_id' => '2','serial_num' => '3','status' => '1','created_at' => '2018-03-17 23:07:18','updated_at' => '2023-02-06 10:22:28'),
            array('id' => '25','script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                              <!-- DM-NewsSubCat -->
                              <ins class="adsbygoogle"
                                   style="display:block"
                                   data-ad-client="ca-pub-8770580490084389"
                                   data-ad-slot="6342204150"
                                   data-ad-format="auto"></ins>
                              <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                              </script>','ads_image' => './backend/ads-image/1675596218.gif','script_image_status' => '0','image_url' => 'https://www.smartsoftware.com.bd/','position_id' => '3','serial_num' => '3','status' => '1','created_at' => '2018-03-17 23:09:14','updated_at' => '2023-02-06 10:28:21'),
            array('id' => '26','script' => '<a href="http://www.smartsoftware.com.bd/website-design-development" target="_parent"><img src="http://desimediapoint.com/adfile/585030318120430.gif"></a>','ads_image' => './backend/ads-image/1675662076.png','script_image_status' => '0','image_url' => 'https://play.google.com/store/apps/details?id=com.smartsoftwarebd.dokani','position_id' => '1','serial_num' => '2','status' => '1','created_at' => '2018-03-19 20:51:31','updated_at' => '2023-02-06 11:00:38'),
            array('id' => '28','script' => '<amp-auto-ads type="adsense"
                                            data-ad-client="ca-pub-8770580490084389">
                              </amp-auto-ads>','ads_image' => './backend/ads-image/1675662076.png','script_image_status' => '0','image_url' => 'https://play.google.com/store/apps/details?id=com.smartsoftwarebd.dokani','position_id' => '1','serial_num' => '8','status' => '1','created_at' => '2018-11-04 23:54:30','updated_at' => '2023-02-06 10:34:12'),
            array('id' => '6','script' => '<a href="https://www.smartsoftware.com.bd/free-pos-software-in-bangladesh" target="_blank"> <img src="https://www.tradebangla.com.bd/public/img/banners/249220920063120.png"> </a>','ads_image' => './backend/ads-image/1675595595.gif','script_image_status' => '0','image_url' => 'https://www.tradebangla.com.bd','position_id' => '1','serial_num' => '3','status' => '1','created_at' => '2017-10-31 23:15:57','updated_at' => '2023-02-06 11:06:51'),
            array('id' => '29','script' => '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                              <!-- DM-NewsSubCat -->
                              <ins class="adsbygoogle"
                                   style="display:block"
                                   data-ad-client="ca-pub-8770580490084389"
                                   data-ad-slot="6342204150"
                                   data-ad-format="auto"></ins>
                              <script>
                              (adsbygoogle = window.adsbygoogle || []).push({});
                              </script>','ads_image' => './backend/ads-image/1675596218.gif','script_image_status' => '0','image_url' => 'https://www.smartsoftware.com.bd/','position_id' => '1','serial_num' => '9','status' => '1','created_at' => '2018-11-04 23:54:36','updated_at' => '2018-11-05 05:20:59'),
            array('id' => '30','script' => '<amp-auto-ads type="adsense"
                                            data-ad-client="ca-pub-8770580490084389">
                              </amp-auto-ads>','ads_image' => './backend/ads-image/1675595595.gif','script_image_status' => '0','image_url' => 'https://www.tradebangla.com.bd','position_id' => '1','serial_num' => '10','status' => '1','created_at' => '2018-11-04 23:54:42','updated_at' => '2023-02-06 11:30:57'),
        );

        foreach ($all_ads as $item) {
            AdsManagement::firstOrCreate(
                [ 'id'                => $item['id'] ],
                [
                    'script'          => $item['script'],
                    'ads_image'       => $item['ads_image'],
                    'script_image_status'       => $item['script_image_status'],
                    'image_url'       => $item['image_url'],
                    'position_id'     => $item['position_id'],
                    'serial_num'      => $item['serial_num'],
                    'status'          => $item['status'],
                    'created_at'          => $item['created_at'],
                    'updated_at'          => $item['updated_at'],
                ]
            );
        }
    }
}
