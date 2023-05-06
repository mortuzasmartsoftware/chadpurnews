@extends('frontend.app')

@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ URL::to('/') }}">হোম</a></li>
                        <li>{{ $news_details->cat_name }}</li>
                    </ol>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Page title end -->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

                    <div class="single-post">

                        <div class="post-title-area">

                            <h2 class="post-title">
                                {{ $news_details->title }}
                            </h2>
                            <div class="post-meta">
                                <span><i class="fa fa-pencil"></i>{{ $company_info->company_name }}</span>
                                <span class="post-date"><i class="fa fa-clock-o"></i>{{date('jS M Y, g:i a', strtotime($news_details->created_at))}}</span>
                                <span><i class="fa fa-eye"></i> {{ $news_details->hit_counter }}</span>
                            </div>
                        </div><!-- Post title end -->

                        <div class="post-content-area">
                            <div class="post-media post-featured-image">
                                {{-- <div class="banner_section custom-image">
                                    @foreach ($ads_manages as $ads_manage)
                                        @if ($ads_manage->serial_num == 6)
                                            @if ($ads_manage->script_image_status == 0)
                                                <a href="{{ asset($ads_manage->image_url) }}" target="_blank">
                                                    <img style="width: 100%;" src="{{ asset($ads_manage->ads_image) }}"
                                                        alt="{{ $ads_manage->ads_serial->serial_name }} image not found" />
                                                </a>
                                            @elseif ($ads_manage->script_image_status == 1)
                                                {!! $ads_manage->script !!}
                                            @else
                                                <h3 style="font-family: Stylish;">Place Your Ads(Size 750 X 100)</h3>
                                                <lottie-player src="{{ asset('/frontend/lord-icon/banner-ads-red.json') }}"
                                                    background="transparent" speed="1" style="width: 100%; height: 120px;" loop
                                                    autoplay></lottie-player>
                                            @endif
                                        @endif
                                    @endforeach
                                </div> --}}

                                <?php if($news_details->photo){ ?>
                                @if (strpos($news_details->photo, 'assets'))
                                    <a href="{{ asset($news_details->photo) }}" class="gallery-popup">
                                        <img style="min-width: 100%;min-height: 400px;max-height: 400px"
                                            class="img-responsive" src="{{ asset($news_details->photo) }}"
                                            alt="{{ $news_details->title }}" />
                                    </a>
                                @else
                                    <a href="{{ asset('img/news/' . $news_details->photo) }}" class="gallery-popup">
                                        <img style="min-width: 100%;min-height: 400px;max-height: 400px"
                                            class="img-responsive" src="{{ asset('img/news/' . $news_details->photo) }}"
                                            alt="{{ $news_details->title }}" />
                                    </a>
                                @endif

                                <?php } else{ ?>


                                <img style="min-width: 100%;min-height: 400px;max-height: 400px" class="img-responsive"
                                    src="{{ asset('img/news/images.png') }}" alt="image">
                                <?php } ?>

                                <div class="banner_section custom-image">

                                    @foreach ($ads_manages as $ads_manage)
                                        @if ($ads_manage->serial_num == 9)
                                            @if ($ads_manage->script_image_status == 0)
                                                <a href="{{ asset($ads_manage->image_url) }}" target="_blank">
                                                    <img style="width: 100%;" src="{{ asset($ads_manage->ads_image) }}"
                                                        alt="{{ $ads_manage->ads_serial->serial_name }} image not found" />
                                                </a>
                                            @elseif ($ads_manage->script_image_status == 1)
                                                {!! $ads_manage->script !!}
                                            @else
                                                <h3 style="font-family: Stylish;">Place Your Ads(Size 750 X 100)</h3>
                                                <lottie-player src="{{ asset('/frontend/lord-icon/banner-ads-red.json') }}"
                                                    background="transparent" speed="1" style="width: 120px; height: 120px;" loop
                                                    autoplay></lottie-player>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>

                            </div>
                            <div style="margin: -105px 0 20px 0 !important">
                                <h2 class="text-center">{{ $news_details->quote }}</h2>
                                @if (isset($news_details->whose_quote))
                                    <h3 class="text-center">--{{ $news_details->whose_quote }}</h3>
                                @endif
                            </div>
                            <div class="entry-content text-justify" >
                                {{ $news_details->description }}
                            </div><!-- Entery content end -->

                            <div class="banner_section custom-image">
                           
                                @foreach ($ads_manages as $ads_manage)
                                    @if ($ads_manage->serial_num == 11)
                                        @if ($ads_manage->script_image_status == 0)
                                            <a href="{{ asset($ads_manage->image_url) }}" target="_blank">
                                                <img style="width: 100%;" src="{{ asset($ads_manage->ads_image) }}"
                                                    alt="{{ $ads_manage->ads_serial->serial_name }} image not found" />
                                            </a>
                                        @elseif ($ads_manage->script_image_status == 1)
                                            {!! $ads_manage->script !!}
                                        @else
                                            <h3 style="font-family: Stylish;">Place Your Ads(Size 750 X 100)</h3>
                                            <lottie-player src="{{ asset('/frontend/lord-icon/banner-ads-red.json') }}"
                                                background="transparent" speed="1" style="width: 120px; height: 120px;" loop
                                                autoplay></lottie-player>
                                        @endif
                                    @endif
                                @endforeach
                            </div>

                            <div id="share"></div>

                            <div class="contact-form blog_comment">
                                <div class="fb-comments" data-href="" data-numposts="5"></div>

                            </div>





                        </div><!-- post-content end -->
                    </div><!-- Single post end -->


                    <div class="related-posts block">
                        <h3 class="block-title"><span>জনপ্রিয় নিউজ</span></h3>

                        <div id="latest-news-slide" class="owl-carousel owl-theme latest-news-slide">

                            @foreach ($popular_news as $r_news)
                                <div class="item">
                                    <div class="post-block-style clearfix">
                                        <div class="post-thumb">

                                            <?php if($r_news->photo){ ?>
                                            @if (strpos($r_news->photo, 'assets'))
                                                <img style="max-height: 130px;min-height: 130px" class="img-responsive"
                                                    src="{{ asset($r_news->photo) }}" alt="{{ $r_news->title }}" />
                                            @else
                                                <img style="max-height: 130px;min-height: 130px" class="img-responsive"
                                                    src="{{ asset('img/news/' . $r_news->photo) }}"
                                                    alt="{{ $r_news->title }}" />
                                            @endif

                                            <?php } else{ ?>


                                            <img style="max-height: 130px;min-height: 130px" class="img-responsive"
                                                src="{{ asset('img/news/images.png') }}" alt="image">
                                            <?php } ?>

                                        </div>

                                        <div class="post-content">
                                            <h2 class="post-title title-medium">
                                                <a
                                                    href='{{ URL::to("article/$r_news->id/$r_news->link") }}'>{{ $r_news->title }}</a>
                                            </h2>
                                            <!-- <div class="post-meta">

               <span class="post-date">Feb 19, 2017</span>
               </div> -->
                                        </div><!-- Post content end -->
                                    </div><!-- Post Block style end -->
                                </div><!-- Item 1 end -->
                            @endforeach





                            <!-- Item 4 end -->
                        </div><!-- Carousel end -->

                    </div><!-- Related posts end -->




                </div><!-- Content Col end -->

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="sidebar sidebar-right">
                        <div class="widget">
                            <div class="banner_section custom-image2">
                                @foreach ($ads_manages as $ads_manage)
                                    @if ($ads_manage->serial_num == 12)
                                        @if ($ads_manage->script_image_status == 0)
                                            <a href="{{ asset($ads_manage->image_url) }}" target="_blank">
                                                <img style="width: 100%;" src="{{ asset($ads_manage->ads_image) }}"
                                                    alt="{{ $ads_manage->ads_serial->serial_name }} image not found" />
                                            </a>
                                        @elseif ($ads_manage->script_image_status == 1)
                                            {!! $ads_manage->script !!}
                                        @else
                                            <h3 style="font-family: Stylish;">Place Your Ads(Size 30 X 260)</h3>
                                            <lottie-player src="{{ asset('/frontend/lord-icon/banner-ads-red.json') }}"
                                                background="transparent" speed="1" style="width: 120px; height: 120px;" loop
                                                autoplay></lottie-player>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div><!-- Widget Social end -->
                        <div class="gap-60"></div>

                        <div class="widget color-default">
                            <h3 class="block-title"><span>{{ $news_details->cat_name }} এর সর্বশেষ</span></h3>
                            @foreach ($related_news as $key => $p_news)
                                @if ($key == 0)
                                    <div class="post-overaly-style clearfix">
                                        <div class="post-thumb">
                                            <a href="#">
                                                <?php if($p_news->photo){ ?>
                                                @if (strpos($p_news->photo, 'assets'))
                                                    <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                        class="img-responsive" src="{{ asset($p_news->photo) }}"
                                                        alt="{{ $p_news->title }}" />
                                                @else
                                                    <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                        class="img-responsive"
                                                        src="{{ asset('img/news/' . $p_news->photo) }}"
                                                        alt="{{ $p_news->title }}" />
                                                @endif

                                                <?php } else{ ?>


                                                <img style="max-height: 220px;min-height: 220px;min-width: 100%"
                                                    class="img-responsive" src="{{ asset('img/news/images.png') }}"
                                                    alt="image">
                                                <?php } ?>

                                            </a>
                                        </div>

                                        <div class="post-content">
                                            <h2 class="post-title">
                                               
                                                <a href='{{ URL::to("article/$p_news->id/$p_news->link") }}'>{{ $p_news->title }}</a>
                                            </h2>
                                            <div class="post-meta">
                                                <span class="post-date"><?php
                                                date(' jS M Y', strtotime($p_news->created_at));
                                                ?></span>
                                            </div>
                                        </div><!-- Post content end -->
                                    </div><!-- Post Overaly Article end -->
                                @endif


                                <div class="list-post-block">
                                    <ul class="list-post">
                                        @if ($key >= 1)
                                            <li class="clearfix">
                                                <div class="post-block-style post-float clearfix">
                                                    <div class="post-thumb">
                                                        <a href="#">
                                                            <?php if($p_news->photo){ ?>

                                                            @if (strpos($p_news->photo, 'assets'))
                                                                <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                    class="img-responsive"
                                                                    src="{{ asset($p_news->photo) }}"
                                                                    alt="{{ $p_news->title }}" />
                                                            @else
                                                                <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                    class="img-responsive"
                                                                    src="{{ asset('img/news/' . $p_news->photo) }}"
                                                                    alt="{{ $p_news->title }}" />
                                                            @endif

                                                            <?php } else{ ?>


                                                            <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                                class="img-responsive"
                                                                src="{{ asset('img/news/images.png') }}" alt="image">
                                                            <?php } ?>
                                                        </a>
                                                    </div><!-- Post thumb end -->

                                                    <div class="post-content">
                                                        <h2 class="post-title title-small">
                                                            <a
                                                                href='{{ URL::to("article/$p_news->id/$p_news->link") }}'>{{ Str::limit($p_news->title, 50) }}</a>
                                                        </h2>
                                                        <div class="post-meta">
                                                            <span class="post-date">
                                                                <?php
                                                                    echo date(' jS M Y',strtotime($p_news->created_at));
                                                                ?>
                                                            </span>
                                                        </div>
                                                    </div><!-- Post content end -->
                                                </div><!-- Post block style end -->
                                            </li><!-- Li 1 end -->
                                        @endif

                                    </ul><!-- List post end -->
                                </div><!-- List post block end -->
                            @endforeach

                        </div><!-- Popular news widget end -->

                        <div class="widget">
                            <div class="banner_section custom-image">

                                @foreach ($ads_manages as $ads_manage)
                                    @if ($ads_manage->serial_num == 8)
                                        @if ($ads_manage->script_image_status == 0)
                                            <a href="{{ asset($ads_manage->image_url) }}" target="_blank">
                                                <img style="width: 100%;" src="{{ asset($ads_manage->ads_image) }}"
                                                    alt="{{ $ads_manage->ads_serial->serial_name }} image not found" />
                                            </a>
                                        @elseif ($ads_manage->script_image_status == 1)
                                            {!! $ads_manage->script !!}
                                        @else
                                            <h3 style="font-family: Stylish;">Place Your Ads(Size 390 X 260)</h3>
                                            <lottie-player src="{{ asset('/frontend/lord-icon/banner-ads-red.json') }}"
                                                background="transparent" speed="1" style="width: 120px; height: 120px;" loop
                                                autoplay></lottie-player>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <?php $info = DB::table('about_company')->First(); ?>
                        <div class="widget m-bottom-0">
                            <h3 class="block-title"><span>নিউজ আপডেট পেতে লাইক দিন </span></h3>
                            <div class="fb-page" data-href="{{ $info->fb_link }}" data-tabs="timeline, messages"
                                data-height="250" data-small-header="false" data-adapt-container-width="false"
                                data-hide-cover="false" data-show-facepile="true">
                                <blockquote cite="{{ $info->fb_link }}" class="fb-xfbml-parse-ignore"><a
                                        href="{{ $info->fb_link }}">Facebook</a></blockquote>
                            </div><!-- Newsletter end -->
                        </div><!-- Newsletter widget end -->

                    </div><!-- Sidebar right end -->
                </div>

            </div><!-- Row end -->
        </div><!-- Container end -->
    </section>
@endsection
@section('script')
    <script>
        $("#share").jsSocials({
            url: "{{ URL::to('') }}",
            shareIn: "popup",
            text: '{{ $news_details->title }} | {{ URL::to("article/$news_details->id/$news_details->link") }}',
            showLabel: false,
            showCount: false,
            shares: ["facebook", "twitter", "googleplus", "linkedin", "email"]
        });
    </script>
@endsection
