<?php
$category = DB::table('category')
    ->where('status', 1)
    ->orderBy('serial_num', 'ASC')
    ->get();
?>

<?php
$info = DB::table('about_company')->first();
$social_link = DB::table('social_links')->get();
$mediaCat = DB::table('media_categories')
    ->orderBy('serial', 'ASC')
    ->get();
?>

<?php

if (Session::has('metaDescription')) {
    $metaDescription = Session::get('metaDescription');
} else {
    $metaDescription = 'Desi Media Point Online Latest Bangla News/Article - Sports, Crime, Entertainment, Business, Politics, Education, Opinion, Lifestyle, Photo, Video, Travel, National & World';
}

if (Session::has('title_msg')) {
    $title = Session::get('title_msg') . ' |  ' . $info->company_name;
    $ogTitle = Session::get('title_msg');
} else {
    $title = $info->company_name;
    $ogTitle = $info->company_name;
}

if (Session::has('tags')) {
    $tags = Session::get('tags') . ',' . $info->company_name;
} else {
    $tags =
        'Desi media point, bangla news, current News, News, Infotainment, videos, photos, news for india, pakistan, usa, uk, iraq, breaking news, bangla newspaper, bangladesh news, online newspaper, bangladeshi newspaper, bangladesh newspapers, all bangla news, bd news, news paper, daily News, bangla paper, election, news website, politics, world news, business news, bollywood news, cricket news, sports, lifestyle, gadgets, tech news, video news,video song, music, film, drama, talk show, reciepe, sports news, celebrity photo, picture, automible news, travel news, healthcare news, welness news, travel news, fashion news, education news, অনলাইন নিউজ পেপার, আজকের নিউজ পেপার, আমার দেশ নিউজ পেপার, সকল পত্রিকা, অনলাইন, বাংলাদেশ, আজকের সংবাদ/খবর , আন্তর্জাতিক, অর্থনীতি, খেলা, বিনোদন, ফিচার, বিজ্ঞান ও প্রযুক্তি, চলচ্চিত্র, ঢালিউড, বলিউড, হলিউড, বাংলা গান, মঞ্চ, টেলিভিশন, কম্পিউটার, মোবাইল ফোন, অটোমোবাইল, মহাকাশ, গেমস, মাল্টিমিডিয়া, রাজনীতি, সরকার, অপরাধ, আইন ও বিচার, পরিবেশ, দুর্ঘটনা, সংসদ, রাজধানী, শেয়ার বাজার, বাণিজ্য, পোশাক শিল্প, ক্রিকেট, ফুটবল, লাইভ স্কোর';
}

$ads1 = DB::table('ads_management')
    ->where('status', 1)
    ->where('position_id', 7)
    ->where('serial_num', 1)
    ->first();
$ads2 = DB::table('ads_management')
    ->where('status', 1)
    ->where('position_id', 7)
    ->where('serial_num', 2)
    ->first();
$latest_news = DB::table('news')
    ->where('status', 1)
    ->orderby('id', 'DESC')
    ->paginate(50);

$menus = DB::table('menu')
    ->where('status', 1)
    ->get();

?>
{{-- Date convert English to Bangla, Bengali and Hijri --}}
@php
    use Rajurayhan\Bndatetime\BnDateTimeConverter;
    use Illuminate\Support\Facades\Http;

    $onlyDay = date('D');
    $englishDate = date('j F Y');
    $onlyTime = date('g:i a');

    $search_array = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0', 'Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', ':', ',', 'am', 'pm'];

    $replace_to_bangla = ['১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', 'শনিবার', 'রবিবার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার', 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগষ্ট', 'সেপ্টেম্বার', 'অক্টোবার', 'নভেম্বার', 'ডিসেম্বার', ':', ',', 'পূর্বাহ্ন', 'অপরাহ্ন'];
    $hijriArray = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0', 'Muḥarram', 'Ṣafar', 'Rabīʿ al-awwal', 'Rabīʿ al-thānī', 'Jumādá al-ūlá', 'Jumādá al-ākhirah', 'Rajab', 'Shaʿbān', 'Ramaḍān', 'Shawwāl', 'Dhū al-Qaʿdah', 'Dhū al-Ḥijjah', ','];
    $banglaArray = ['১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', 'মুহররম', 'সফর', 'রবিউল আউয়াল', 'রবিউস সানি', 'জমাদিউল আউয়াল', 'জমাদিউস সানি', 'রজব', 'শা’বান', 'রমজান', 'শাওয়াল', 'জ্বিলকদ', 'জ্বিলহজ্জ', ','];

    // convert all English char to Bangla char
    $banglaOnlyDay = str_replace($search_array, $replace_to_bangla, $onlyDay);
    $banglaDate = str_replace($search_array, $replace_to_bangla, $englishDate);
    $banglaTime = str_replace($search_array, $replace_to_bangla, $onlyTime);

    /*================================================================================
        rajurayhan package for covert English date convert to 4 different date times
    =================================================================================*/

    $dateConverter  =  new  BnDateTimeConverter();
    $convertedBanlgaDate1 = $dateConverter->getConvertedDateTime( date('D j F Y'),  'EnBn', 'D j F Y'); // Friday 23rd Bhadra 1425 12:19:50 pm
    $convertedBanlgaDate2 = $dateConverter->getConvertedDateTime( date('D j F Y'),  'BnBn', 'jS F Y'); // শুক্রবার ২৩শে ভাদ্র ১৪২৫ দুপুর ১২:১৯:৫০
    $convertedBanlgaDate3 = $dateConverter->getConvertedDateTime( date('D j F Y'),  'BnEn', 'D j F Y'); // শুক্রবার ৭ই সেপ্টেম্বর ২০১৮ দুপুর ১২:১৯:৫০
    $convertedBanlgaDate4 = $dateConverter->getConvertedDateTime( date('D j F Y'),  'EnEn', 'D j F Y'); // Friday 7th September 2018 12:19:50 PM

    /*==============================================
        Gregorian Date to Hijri Date Conversition
    ===============================================*/
    $var = date('d-m-Y');
    $date = date('d-m-Y', time() - 60 * 60 * 24);
    $response = Http::get("http://api.aladhan.com/v1/gToH/$date");
    // $currentDate = Arr::flatten($response->json('data')['hijri']);
    $allData = $response->json('data');
    $hijriDay = $allData['hijri']['day'];
    $hijriMonthEN = $allData['hijri']['month']['en'];
    $hijriYear = $allData['hijri']['year'];

    // convert all English Hijiri date charecter to Bangla charecter
    // $hijriOnlyDay = str_replace($search_array, $replace_to_bangla, $onlyDay);
    $hijriDay = str_replace($hijriArray, $banglaArray, $hijriDay);
    $hijriMonthEN = str_replace($hijriArray, $banglaArray, $hijriMonthEN);
    $hijriYear = str_replace($hijriArray, $banglaArray, $hijriYear);

@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <!-- Basic Page Needs
 ================================================== -->

    <title>
        @if (isset($singleTitle))
            {{ $singleTitle }}@else{{ $title }} | Latest Bangla News, Infotainment, Entertenment, Science,
            Lifestyle, bangla news, current News, News, Infotainment, videos, photos, news for india, pakistan, usa, uk,
            iraq, breaking news, bangla newspaper, bangladesh news, online newspaper, bangladeshi newspaper, bangladesh
            newspapers, all bangla news, bd news, news paper, daily News, bangla paper, election, news website,
            politics, world news, business news, bollywood news, cricket news, sports, lifestyle, gadgets, tech news,
            video news,video song, music, film, drama, talk show, reciepe, sports news, celebrity photo, picture,
            automible news, travel news, healthcare news, welness news, travel news, fashion news, education news,
            অনলাইন নিউজ পেপার, আজকের নিউজ পেপার, আমার দেশ নিউজ পেপার, সকল পত্রিকা, অনলাইন, বাংলাদেশ, আজকের সংবাদ/খবর ,
            আন্তর্জাতিক, অর্থনীতি, খেলা, বিনোদন, ফিচার, বিজ্ঞান ও প্রযুক্তি, চলচ্চিত্র, ঢালিউড, বলিউড, হলিউড, বাংলা গান,
            মঞ্চ, টেলিভিশন, কম্পিউটার, মোবাইল ফোন, অটোমোবাইল, মহাকাশ, গেমস, মাল্টিমিডিয়া, রাজনীতি, সরকার, অপরাধ, আইন ও
            বিচার, পরিবেশ, দুর্ঘটনা, সংসদ, রাজধানী, শেয়ার বাজার, বাণিজ্য, পোশাক শিল্প, ক্রিকেট, ফুটবল, লাইভ স্কোর
        @endif
    </title>

    <!-- Mobile Specific Metas
 ================================================== -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="{{ $metaDescription }}">
    <meta name="keywords" content="{{ $tags }}">
    <meta name="Developed By" content="Smart Software Ltd." />
    <meta name="Googlebot" content="all" />
    <meta http-equiv="imagetoolbar" content="no" />
    <meta name="Author" content="DesiMediaPoint.com" />
    <meta name="Copyright" content="DesiMediaPoint.com" />
    <meta name="owner" content="DesiMediaPoint.com" />
    <meta name="Rating" content="General" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta name="distribution" content="Global" />
    <meta property="og:url" content="{{ Request::fullUrl() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:description" content="{{ $metaDescription }}" />

    @if (isset($ogImage))
        @if (strpos($ogImage, 'assets'))
            <meta property="og:image" content="{{ asset($ogImage) }}" />
        @else
            @php $image=URL::to("img/news/$ogImage"); @endphp
            <meta property="og:image" content="{{ $image }}" />
        @endif
    @else
        @if (strpos($info->logo, 'assets'))
            <meta property="og:image" content="{{ asset($info->logo) }}" />
        @else
            <meta property="og:image" content="{{ asset('assets/uploads/logo/' . $info->logo) }}" />
        @endif
    @endif

    <link rel="canonical" href="www.desimediapoint.com" />

    <!--Favicon-->
    <link rel="icon" href="{{ asset($company_info->favicon) }}" style="margin-top:-10px !important" type="image/x-icon">
    <!--Favicon-End-->

    <!-- CSS
 ================================================== -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <!-- Template styles-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <!-- Responsive styles-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome.min.css') }}">
    <!-- Animation -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.css') }}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/jssocials/jssocials.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/jssocials/jssocials-theme-flat.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/jquery.minical.css') }}">
    <!-- Colorbox -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/colorbox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/custom.css') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110586749-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-110586749-2');
    </script>
    <style>
        @font-face {
            font-family: NotoSansBengali;
            src: url("{{ asset('/fonts/Noto_Sans_Bengali/NotoSansBengali-VariableFont_wdth,wght.ttf') }}");
        }
    </style>
</head>

<body>
    <!--/ Trending end -->
    @if (Request::path() != 'media')
        <div id="top-bar" class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        {{-- <div class="ts-date"> --}}
                        <div class="bangla-date-format">
                            {{-- <i class="fa fa-calendar-check-o"></i> --}}
                            <span>আজ</span>
                            <span> {!! $banglaOnlyDay ." ".$banglaDate ." "."খ্রিঃ" !!} </span>
                            <span style="color: #F48333">●</span>
                            <span> {!! $convertedBanlgaDate2 ."বঙ্গাব্দ" !!} </span>
                            <span style="color: #F48333">●</span>
                            <span>{!! $hijriDay !!} {!! $hijriMonthEN !!}, {!! $hijriYear ." "."হিজরি"!!}</span>
                            <span>
                                <lottie-player src="{{ asset('/frontend/lord-icon/wall-clock-loop-loading.json') }}"
                                    background="transparent" speed="1" style=";width: 20px; height: 20px;" loop
                                    autoplay></lottie-player>
                            </span>
                            <span> {!!$banglaTime!!} </span>

                        </div>
                    </div>
                    <!--/ Top bar left end -->

                    <div class="col-md-5 col-sm-5 col-xs-12 top-social text-right">
                        <ul class="unstyled">
                            <li>
                                @foreach ($social_link as $s_link)
                                    <a title="{{ $s_link->name }}" href='{{ URL::to("$s_link->link") }}'
                                        target="_blank">
                                        <span class="social-icon" style="font-size: 20px"><i
                                                class="fa {{ $s_link->icon_class }}"></i></span>
                                    </a>
                                @endforeach
                            </li>
                        </ul><!-- Ul end -->
                    </div>
                </div>
                <!--/ Content row end -->
            </div>
            <!--/ Container end -->
        </div>
        <!--/ Topbar end -->
    @endif
    <!-- Header start -->
    <header id="header" class="header">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-3" style="padding-right: 0 !important;margin: 15px 0">
                    <div class="logo" style="width: 272px;">
                        {{-- TEST 2 --}}
                        @if (strpos($info->logo, 'assets'))
                            <a href="{{ URL::to('/') }}" id="show">
                                <img style="width:510px; height:100%;" src="{{ asset($info->logo) }}"
                                    alt="{{ $info->company_name }}">
                            </a>
                        @else
                            <a href="{{ URL::to('/') }}">
                                <img style="width:100%; height:80px;" src="{{ asset('img/' . $info->logo) }}"
                                    alt="image">
                            </a>
                        @endif
                    </div>
                </div><!-- logo col end -->

                <div style="display: flex; justify-content: end;margin-top:-10px">
                    <div class="col-sm-8 col-md-8 col-lg-9 ad-responsive-container">
                        @if (Request::path() == 'media')
                            <div class="pull-right">
                                <a href="https://www.tradebangla.com.bd" target="_blank"> <img
                                        src="http://www.desimediapoint.com/adManager/trade.gif"> </a>
                            </div>
                        @else
                            <div class="pull-right custom-image">
                                @if (isset($ads1->ads_image) and $ads1->script_image_status == 0)
                                    <a href="{{ asset($ads1->image_url) }}" target="_blank">
                                        <img src="{{ asset($ads1->ads_image) }}" class="responsive-image"
                                            alt="Image Not Found">
                                    </a>
                                @elseif (isset($ads1->script) and $ads1->script_image_status == 1)
                                    {!! $ads1->script !!}
                                @else
                                    <h4 style="font-family: Stylish; color:rgb(182, 182, 182)">Place Your Ads(Size
                                        390 X 150)</h4>
                                    <lottie-player src="{{ asset('/frontend/lord-icon/banner-ads-red.json') }}"
                                        background="transparent" speed="1"
                                        style="width: 100px; height: 100px;margin-top:-15px" loop autoplay></lottie-player>
                                @endif

                            </div>
                        @endif
                    </div>
                    <div class="col-sm-8 col-md-8 col-lg-9 ad-responsive-container">
                        @if (Request::path() == 'media')
                            <div class="pull-right">
                                <a href="https://www.tradebangla.com.bd" target="_blank"> <img
                                        src="http://www.desimediapoint.com/adManager/trade.gif"> </a>
                            </div>
                        @else
                            <div class="pull-right custom-image">
                                @if (isset($ads2->ads_image) and $ads2->script_image_status == 0)
                                    <a href="{{ asset($ads2->image_url) }}" target="_blank">
                                        <img src="{{ asset($ads2->ads_image) }}" class="responsive-image"
                                            alt="Image Not Found">
                                    </a>
                                @elseif (isset($ads2->script) and $ads2->script_image_status == 1)
                                    {!! $ads2->script !!}
                                @else
                                    <h4 style="font-family: Stylish; color:rgb(182, 182, 182);">Place Your Ads(Size
                                        390 X 150)</h4>
                                    <lottie-player src="{{ asset('/frontend/lord-icon/banner-ads-red.json') }}"
                                        background="transparent" speed="1"
                                        style="width: 100px; height: 100px;margin-top:-15px" loop autoplay></lottie-player>
                                @endif

                            </div>
                        @endif
                    </div>
                </div><!-- header right end -->



            </div><!-- Row end -->
        </div><!-- Logo and banner area end -->
    </header>
    <!--/ Header end -->

    <div class="main-nav fixed_menu clearfix">
        <div class="container">
            {{-- Latest news marquee slide show --}}
            <table border="0" width="100%" id="table1" cellspacing="0" cellpadding="0">
                <tbody class="hover-color">
                    <tr>
                        <td
                            style="width:80px; color:red; font-size: 26px; text-align:center;">
                            <strong>শিরোনাম</strong>
                        </td>
                        <td>
                            <marquee behavior="scroll" direction="left" onmouseout="this.start()"
                                onmouseover="this.stop()" scrolldelay="1" scrollamount="6">
                                @foreach ($latest_news as $news)
                                    <span class="ticker" >
                                        <a class="color-change"
                                            href="{{ URL::to("article/$news->id/$news->link") }}"><img style="width:32px; height:32px;margin-top:-7px" src="{{ asset($info->favicon) }}" alt="no favicon">
                                            {!! $news->title !!}</a>
                                        &nbsp;&nbsp;&nbsp;
                                    </span>
                                @endforeach
                            </marquee>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="row">
                <nav class="site-navigation navigation">
                    <div class="site-nav-inner pull-left">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="collapse navbar-collapse navbar-responsive-collapse">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="{{ URL::to('/') }}"><i class="fa fa-home"></i></a>
                                </li>

                                @foreach ($category as $v_category)
                                    <li class="dropdown">
                                        <a href='{{ URL::to("$v_category->link") }}'
                                            class="dropdown-toggle">{{ $v_category->name }}
                                            <?php $sub_category = DB::table('sub_category')
                                                ->where('status', 1)
                                                ->where('fk_category_id', $v_category->id)
                                                ->get(); ?>
                                            @if (count($sub_category) > 0)
                                                <i class="fa fa-angle-down"></i>
                                            @endif

                                        </a>
                                        @if (count($sub_category) > 0)
                                            <ul class="dropdown-menu" role="menu">
                                                @foreach ($sub_category->sortBy('serial_num') as $s_cat)
                                                    <li>
                                                        <a
                                                            href='{{ URL::to("$v_category->link/$s_cat->link") }}'>{{ $s_cat->name }}</a>

                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif

                                    </li>
                                @endforeach
                                <!-- Features menu end -->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle">বিবিধ
                                        {{-- <i class="fa fa-angle-down"></i> --}}
                                        </a>
                                    <ul class="dropdown-menu" role="menu">
                                        @foreach ($mediaCat as $mCat)
                                            <li><a
                                                    href='{{ URL::to("media-list/$mCat->id") }}'>{{ $mCat->category_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>

                                </li>

                            </ul>
                            <!--/ Nav ul end -->
                        </div>
                        <!--/ Collapse end -->

                    </div><!-- Site Navbar inner end -->
                </nav>
                <!--/ Navigation end -->

            </div>
            <!--/ Row end -->


        </div>
        <!--/ Container end -->
    </div><!-- Menu wrapper end -->
</body>
