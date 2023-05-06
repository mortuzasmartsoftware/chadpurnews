@extends('frontend.app')

@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ URL::to('/') }}">হোম </a></li>
                        <li>{{ $category->name }}</li>
                        <li>{{ $subcategory->name }}</li>
                    </ol>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Page title end -->
    <section class="block-wrapper sub-category-news-section sid-pagination">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

                    <div class="block category-listing">
                        <h3 class="block-title"><span>{{ $subcategory->name }}</span></h3>
                        <div class="row">
                            @foreach ($allData as $key => $news)
                                @if ($key <= 3)
                                    <div class="col-md-6 col-sm-6">
                                        <div class="post-overaly-style custom-post-overaly-style clearfix">
                                            <div class="category_news post-thumb">
                                                <a href="#">
                                                    <?php if($news->photo){ ?>

                                                    @if (strpos($news->photo, 'assets'))
                                                        <img class="img-responsive" src="{{ asset($news->photo) }}"
                                                            alt="{{ $news->title }}" />
                                                    @else
                                                        <img class="img-responsive"
                                                            src="{{ asset('img/news/' . $news->photo) }}"
                                                            alt="{{ $news->title }}" />
                                                    @endif

                                                    <?php } else{ ?>


                                                    <img class="img-responsive" src="{{ asset('img/news/images.png') }}"
                                                        alt="image">
                                                    <?php } ?>
                                                </a>
                                            </div>

                                            <div class="post-content">

                                                <h2 class="post-title title-small">
                                                    <a
                                                        href='{{ URL::to("article/$news->id/$news->link") }}'>{{ $news->title }}</a>
                                                </h2>
                                                <!-- <div class="post-meta">
          <span class="post-date">Feb 06, 2017</span>
          </div> -->
                                            </div><!-- Post content end -->
                                        </div><!-- Post Overaly Article end -->
                                        <!-- Post Block style end -->
                                    </div>
                                @else
                                    @if ($key == 4)
                                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                                            <div class="custom-ad-banner text-center custom-image">
                                                @foreach ($ads_manages as $ads_manage)
                                                    @if ($ads_manage->serial_num == 3)
                                                        @if ($ads_manage->script_image_status == 0)
                                                            <a href="{{ asset($ads_manage->image_url) }}" target="_blank">
                                                                <img style="width: 100%;"
                                                                    src="{{ asset($ads_manage->ads_image) }}"
                                                                    alt="Fix the adsimage position and serial no" />
                                                            </a>
                                                        @elseif ($ads_manage->script_image_status == 1)
                                                            {!! $ads_manage->script !!}
                                                        @else
                                                            <img style="width: 100%;"
                                                                src="{{ asset('img/ads-image/730x90-placeholder.png') }}"
                                                                alt="" />
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                    <div class="post-block-style list_post_block_style post-list clearfix col-md-12 no-padding">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-5">
                                                <div class="post-thumb category_img_list thumb-float-style">
                                                    <a href='{{ URL::to("article/$news->id/$news->link") }}'>
                                                        <?php if($news->photo){ ?>

                                                        @if (strpos($news->photo, 'assets'))
                                                            <img class="img-responsive" src="{{ asset($news->photo) }}"
                                                                alt="{{ $news->title }}" />
                                                        @else
                                                            <img class="img-responsive"
                                                                src="{{ asset('img/news/' . $news->photo) }}"
                                                                alt="{{ $news->title }}" />
                                                        @endif

                                                        <?php } else{ ?>


                                                        <img class="img-responsive"
                                                            src="{{ asset('img/news/images.png') }}" alt="image">
                                                        <?php } ?>
                                                    </a>

                                                </div>
                                            </div><!-- Img thumb col end -->

                                            <div class="col-md-8 col-sm-7">
                                                <div class="post-content">
                                                    <h2 class="post-title title-large">
                                                        <a
                                                            href='{{ URL::to("article/$news->id/$news->link") }}'>{{ $news->title }}</a>
                                                    </h2>
                                                    <div class="post-meta">

                                                        <span class="post-date">Feb 24, 2017</span>

                                                    </div>
                                                    <p>{{ $news->short_description }}</p>
                                                </div><!-- Post content end -->
                                            </div><!-- Post col end -->
                                        </div><!-- 1st row end -->
                                    </div>
                                @endif
                            @endforeach

                        </div><!-- Row end -->

                    </div><!-- Block Lifestyle end -->

                    <div class="paging">
                        <ul class="pagination">
                            {{ $allData->render() }}
                        </ul>
                    </div><!-- Paging end -->


                </div><!-- Content Col end -->

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="sidebar sidebar-right">
                        <div class="widget custom-image">
                            @foreach ($ads_manages as $ads_manage)
                                @if ($ads_manage->serial_num == 4)
                                    @if ($ads_manage->script_image_status == 0)
                                        <a href="{{ asset($ads_manage->image_url) }}" target="_blank">
                                            <img style="width: 100%;" src="{{ asset($ads_manage->ads_image) }}"
                                                alt="Fix the adsimage position and serial no" />
                                        </a>
                                    @elseif ($ads_manage->script_image_status == 1)
                                        {!! $ads_manage->script !!}
                                    @else
                                        <img style="width: 100%;" src="{{ asset('img/ads-image/730x90-placeholder.png') }}"
                                            alt="" />
                                    @endif
                                @endif
                            @endforeach
                        </div><!-- Widget Social end -->

                        <div class="widget color-default">
                            <h3 class="block-title"><span>জনপ্রিয় নিউজ</span></h3>
                            @foreach ($popular_news as $key => $p_news)
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
                                                <a
                                                    href='{{ URL::to("article/$p_news->id/$p_news->link") }}'>{{ $p_news->title }}</a>
                                            </h2>

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
                                                                href='{{ URL::to("article/$p_news->id/$p_news->link") }}'>{{ $p_news->title }}</a>
                                                        </h2>

                                                    </div><!-- Post content end -->
                                                </div><!-- Post block style end -->
                                            </li><!-- Li 1 end -->
                                        @endif

                                    </ul><!-- List post end -->
                                </div><!-- List post block end -->
                            @endforeach

                        </div><!-- Popular news widget end -->


                        <?php $info = DB::table('about_company')->First(); ?>
                        <div class="widget m-bottom-0">
                            <h3 class="block-title"><span>সোস্যাল নেটওয়ার্ক</span></h3>
                            <div class="fb-page" data-href="{{ $info->fb_link }}" data-tabs="timeline, messages"
                                data-height="250" data-small-header="false" data-adapt-container-width="false"
                                data-hide-cover="false" data-show-facepile="true">
                                <blockquote cite="{{ $info->fb_link }}" class="fb-xfbml-parse-ignore"><a
                                        href="{{ $info->fb_link }}">Facebook</a></blockquote>
                            </div><!-- Newsletter end -->
                        </div><!-- Newsletter widget end -->
                        <div class="gap-40"></div>
                        <div class="widget text-center custom-image2">
                            @foreach ($ads_manages as $ads_manage)
                                @if ($ads_manage->serial_num == 7)
                                    @if ($ads_manage->script_image_status == 0)
                                        <a href="{{ asset($ads_manage->image_url) }}" target="_blank">
                                            <img style="width: 100%;" src="{{ asset($ads_manage->ads_image) }}"
                                                alt="Fix the adsimage position and serial no" />
                                        </a>
                                    @elseif ($ads_manage->script_image_status == 1)
                                        {!! $ads_manage->script !!}
                                    @else
                                        <img style="width: 100%;"
                                            src="{{ asset('img/ads-image/730x90-placeholder.png') }}" alt="" />
                                    @endif
                                @endif
                            @endforeach
                        </div><!-- Sidebar Ad end -->

                    </div><!-- Sidebar right end -->
                </div>

            </div><!-- Row end -->
        </div><!-- Container end -->
    </section><!-- First block end -->
@endsection('content')
