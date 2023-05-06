<?php
    $category=DB::table('category')->where('status',1)->orderBy('serial_num','ASC')->get();
?>

<?php
    $info=DB::table('about_company')->first();
    $social_link=DB::table('social_links')->get();
    $mediaCat=DB::table('media_categories')->orderBy('serial','ASC')->get();
?>

 <?php

    if(Session::has('metaDescription')){
        $metaDescription=Session::get('metaDescription');
    }else{
        $metaDescription='Desi Media Point Online Latest Bangla News/Article - Sports, Crime, Entertainment, Business, Politics, Education, Opinion, Lifestyle, Photo, Video, Travel, National & World';

    }

    if(Session::has('title_msg')){
        $title=Session::get('title_msg')." |  ".$info->company_name;
        $ogTitle=Session::get('title_msg');
    }else{
        $title=$info->company_name;
        $ogTitle=$info->company_name;
    }

    if(Session::has('tags')){
        $tags=Session::get('tags').",".$info->company_name;
    }else{
        $tags='Desi media point, bangla news, current News, News, Infotainment, videos, photos, news for india, pakistan, usa, uk, iraq, breaking news, bangla newspaper, bangladesh news, online newspaper, bangladeshi newspaper, bangladesh newspapers, all bangla news, bd news, news paper, daily News, bangla paper, election, news website, politics, world news, business news, bollywood news, cricket news, sports, lifestyle, gadgets, tech news, video news,video song, music, film, drama, talk show, reciepe, sports news, celebrity photo, picture, automible news, travel news, healthcare news, welness news, travel news, fashion news, education news, অনলাইন নিউজ পেপার, আজকের নিউজ পেপার, আমার দেশ নিউজ পেপার, সকল পত্রিকা, অনলাইন, বাংলাদেশ, আজকের সংবাদ/খবর , আন্তর্জাতিক, অর্থনীতি, খেলা, বিনোদন, ফিচার, বিজ্ঞান ও প্রযুক্তি, চলচ্চিত্র, ঢালিউড, বলিউড, হলিউড, বাংলা গান, মঞ্চ, টেলিভিশন, কম্পিউটার, মোবাইল ফোন, অটোমোবাইল, মহাকাশ, গেমস, মাল্টিমিডিয়া, রাজনীতি, সরকার, অপরাধ, আইন ও বিচার, পরিবেশ, দুর্ঘটনা, সংসদ, রাজধানী, শেয়ার বাজার, বাণিজ্য, পোশাক শিল্প, ক্রিকেট, ফুটবল, লাইভ স্কোর';

    }

     $ads1=DB::table('ads_management')->where('status',1)->where('position_id',1)->where('serial_num',1)->first();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" href="{{ asset($company_info->favicon) }}" type="image/x-icon">

	<!-- Basic Page Needs
	================================================== -->

	<title>@if(isset($singleTitle)){{$singleTitle}}@else{{$title}} | Latest Bangla News, Infotainment, Entertenment, Science, Lifestyle, bangla news, current News, News, Infotainment, videos, photos, news for india, pakistan, usa, uk, iraq, breaking news, bangla newspaper, bangladesh news, online newspaper, bangladeshi newspaper, bangladesh newspapers, all bangla news, bd news, news paper, daily News, bangla paper, election, news website, politics, world news, business news, bollywood news, cricket news, sports, lifestyle, gadgets, tech news, video news,video song, music, film, drama, talk show, reciepe, sports news, celebrity photo, picture, automible news, travel news, healthcare news, welness news, travel news, fashion news, education news, অনলাইন নিউজ পেপার, আজকের নিউজ পেপার, আমার দেশ নিউজ পেপার, সকল পত্রিকা, অনলাইন, বাংলাদেশ, আজকের সংবাদ/খবর , আন্তর্জাতিক, অর্থনীতি, খেলা, বিনোদন, ফিচার, বিজ্ঞান ও প্রযুক্তি, চলচ্চিত্র, ঢালিউড, বলিউড, হলিউড, বাংলা গান, মঞ্চ, টেলিভিশন, কম্পিউটার, মোবাইল ফোন, অটোমোবাইল, মহাকাশ, গেমস, মাল্টিমিডিয়া, রাজনীতি, সরকার, অপরাধ, আইন ও বিচার, পরিবেশ, দুর্ঘটনা, সংসদ, রাজধানী, শেয়ার বাজার, বাণিজ্য, পোশাক শিল্প, ক্রিকেট, ফুটবল, লাইভ স্কোর@endif</title>

	<!-- Mobile Specific Metas
	================================================== -->

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="description" content="{{$metaDescription}}">
	<meta name="keywords" content="{{$tags}}">
	<meta name="Developed By" content="Smart Software Ltd."/>
	<meta name="Googlebot" content="all" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="Author" content="DesiMediaPoint.com" />
	<meta name="Copyright" content="DesiMediaPoint.com" />
	<meta name="owner" content="DesiMediaPoint.com" />
	<meta name="Rating" content="General" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta name="distribution" content="Global" />
	<meta property="og:url" content="{{Request::fullUrl()}}" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="{{ $title }}" />
	<meta property="og:description" content="{{ $metaDescription }}" />

    @if ( isset($ogImage) )
        @if (strpos($ogImage,'assets'))
            <meta property="og:image" content="{{ asset($ogImage) }}" />
        @else
            @php $image=URL::to("img/news/$ogImage"); @endphp
            <meta property="og:image" content="{{$image}}" />
        @endif
    @else
        @if (strpos($info->logo,'assets'))
            <meta property="og:image" content="{{ asset($info->logo)}}" />
        @else
            <meta property="og:image" content="{{ asset('assets/uploads/logo/'.$info->logo)}}" />
        @endif
    @endif

	{{-- @if(isset($ogImage))
        @php $image=URL::to("public/assets/frontend/images/news/$ogImage"); @endphp
	    <meta property="og:image" content="{{$ogImage}}" />
	@else
	    <meta property="og:image" content="{{ asset('assets/uploads/logo/'.$info->logo)}}" />
	@endif --}}



	<link rel="canonical" href="www.desimediapoint.com"/>

	<!--Favicon-->
    <link rel="apple-touch-icon" sizes="57x57"   href="{{ asset('favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60"   href="{{ asset('favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72"   href="{{ asset('favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" 	 href="{{ asset('favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">

	<!--Favicon-End-->

	<!-- CSS
	================================================== -->

	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
	<!-- Template styles-->
	<link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
	<!-- Responsive styles-->
	<link rel="stylesheet" href="{{asset('assets/frontend/css/responsive.css')}}">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="{{asset('assets/frontend/css/font-awesome.min.css')}}">
	<!-- Animation -->
	<link rel="stylesheet" href="{{asset('assets/frontend/css/animate.css')}}">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/frontend/css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/frontend/jssocials/jssocials.css')}}" />
  	<link rel="stylesheet" href="{{asset('assets/frontend/jssocials/jssocials-theme-flat.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/frontend/css/jquery.minical.css')}}">
	<!-- Colorbox -->
	<link rel="stylesheet" href="{{asset('assets/frontend/css/colorbox.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/custom.css')}}">

<!-- Global site tag (gtag.js) - Google Analytics -->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110586749-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-110586749-2');
</script>



</head>

<body>

	<div class="body-inner">

	<!--/ Trending end -->
@if(Request::path()!='media')
	<div id="top-bar" class="top-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="ts-date">
						{{-- <i class="fa fa-calendar-check-o"></i> --}}
                        <span>Today
                        <?php
						    echo date('D jS M Y, g:i a');
						?>
                        </span>
					</div>
					<ul class="unstyled top-nav">
						<li><a href="#">About</a></li>
						<li><a href="#">Write for Us</a></li>
						<li><a href="#">Advertise</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="{{url('/media-list')}}">All Media</a></li>
					</ul>
				</div><!--/ Top bar left end -->
                <div class="col-md-3">
                    <div class="search">

                    <form action="{{ url('/search') }}" method="get">
                        <input type="search" name="search" class="form-control" placeholder="Search and hit enter...">
                    </form>

				</div>
                </div>
				<div class="col-md-3 col-sm-3 col-xs-12 top-social text-right">
					<ul class="unstyled">
						<li>
							@foreach($social_link as $s_link)
							<a title="{{$s_link->name}}" href='{{URL::to("$s_link->link")}}'>
								<span class="social-icon"><i class="fa {{$s_link->icon_class}}"></i></span>
							</a>
							@endforeach
						</li>
					</ul><!-- Ul end -->
				</div><!--/ Top social col end -->
			</div><!--/ Content row end -->
		</div><!--/ Container end -->
	</div><!--/ Topbar end -->
@endif
	<!-- Header start -->
	<header id="header" class="header">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-md-4 col-lg-3" style="padding-right: 0 !important">
					<div class="logo" style="max-width: 270px;min-width: 180px">
                        {{-- TEST 2 --}}
                        @if ( strpos($info->logo,'assets') )
                            <a href="{{URL::to('/')}}">
                                <img style="width:100%; height:100%;" src="{{asset($info->logo)}}" alt="{{$info->company_name}}">
                            </a>
                        @else
                            <a href="{{URL::to('/')}}">
                                <img style="width:100%; height:100%;" src="{{asset('img/'.$info->logo)}}" alt="image">
                            </a>
                        @endif

					</div>
				</div><!-- logo col end -->

                @if(Request::path()=='media')
                    <div class="col-sm-8 col-md-8 col-lg-9 header-right">
                        <div class="ad-banner pull-right ">
                            <a href="https://www.tradebangla.com.bd" target="_blank"> <img src="http://www.desimediapoint.com/adManager/trade.gif"> </a>
                        </div>
                    </div><!-- header right end -->
                @else
                    <div class="col-sm-8 col-md-8 col-lg-9 header-right">
                        <div class="pull-right">
                        <?php if($ads1) {
                            echo $ads1->script;
                        }else{ ?>
                            <a href="#"><img src="{{asset('img/ads-image/730x90-placeholder.png')}}" class="img-responsive" alt=""></a>
                        <?php }
                        ?>

                        </div>
                    </div><!-- header right end -->
                @endif



			</div><!-- Row end -->
		</div><!-- Logo and banner area end -->
	</header><!--/ Header end -->

	<div class="main-nav fixed_menu clearfix">
		<div class="container">
			<div class="row">
				<nav class="site-navigation navigation">
					<div class="site-nav-inner pull-left">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						  <span class="sr-only">Toggle navigation</span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						</button>

						<div class="collapse navbar-collapse navbar-responsive-collapse">
							<ul class="nav navbar-nav">
								<!-- <li class="active">
									<a href="{{URL::to('/')}}" class="dropdown-toggle" data-toggle="dropdown">Home</a>
								</li> -->

								<li>
									<a href="{{URL::to('/')}}"><i class="fa fa-home"></i></a>
								</li>

								<!-- @foreach($category as $v_category)
								<li>
									<a href='{{URL::to("$v_category->link")}}'>{{$v_category->name}}</a>


								</li>
								@endforeach -->

								@foreach($category as $v_category)
								<li class="dropdown">
									<a href='{{URL::to("$v_category->link")}}' class="dropdown-toggle">{{$v_category->name}}
									<?php $sub_category=DB::table('sub_category')->where('status',1)->where('fk_category_id',$v_category->id)->get(); ?>
									@if(count($sub_category)>0)
									<i class="fa fa-angle-down"></i>
									@endif

									</a>
									 @if(count($sub_category)>0)
									<ul class="dropdown-menu" role="menu">
										@foreach($sub_category->sortBy('serial_num') as $s_cat)
										<li>
											<a href='{{URL::to("$v_category->link/$s_cat->link")}}'>{{$s_cat->name}}</a>

										</li>
										@endforeach
									</ul>
									@endif

								</li>
								@endforeach<!-- Features menu end -->
								<li class="dropdown">
									<a href="{{url('/media-list')}}" class="dropdown-toggle">Media Point <i class="fa fa-angle-down"></i></a>
									<ul class="dropdown-menu" role="menu">
									@foreach($mediaCat as $mCat)
										<li><a href='{{URL::to("media-list/$mCat->id")}}'>{{$mCat->category_name}}</a></li>
									@endforeach
									</ul>

								</li>

							</ul><!--/ Nav ul end -->
						</div><!--/ Collapse end -->

					</div><!-- Site Navbar inner end -->
				</nav><!--/ Navigation end -->

			</div><!--/ Row end -->
		</div><!--/ Container end -->

	</div><!-- Menu wrapper end -->
