<section class="featured-post-area custom-featured-post-area no-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12 main-section-title">
                <h4>প্রধান সংবাদ</h3>
            </div>
        </div>
    </div>
</section>
<section class="featured-post-area custom-featured-post-area no-padding">
    <div class="container">

        <div class="row">
            <div class="col-md-8">
                <div class="col-md-8 col-xs-12 col-sm-8">
                    <div id="featured-sliders" class="custom-featured-sliders">

                        <?php
                        if (isset($slider_news->photo)) {
                            $slider_img = $slider_news->photo;
                        } else {
                            $slider_img = 'images.png';
                        }
                        ?>

                        @if (strpos($slider_img, 'assets'))

                            <div class="item bg-danger"
                                style="background-image:url({{ asset($slider_img) }});background-repeat: no-repeat;background-size: 100% 100%; margin-left:-14.5px">
                                <div class="featured-post">
                                    <div class="post-content custom_post_content new-title-hover">
                                        <h2 class="post-title title-extra-large">
                                            <a href='{{ URL::to("article/$slider_news->id/$slider_news->link") }}'
                                                style="font-size: 21px;margin-top: 10px;color: #fff;font-weight: bold">
                                                {{-- {{ str_limit($slider_news->title,50) }} --}}
                                                {{-- my custom code --}}
                                                {{ Str::limit($slider_news->title, 50) }}
                                            </a>
                                            @if (isset($slider_news->video_link))
                                                <a href="{{ URL::to(asset($slider_news->video_link)) }}"
                                                    target="_blank">
                                                    <i class="fa fa-youtube-play"
                                                        style="color:red; background-color:#fff; float:right;">
                                                        <span style="color:black;font-size:18px">YouTube</span>
                                                    </i>
                                                </a>
                                            @endif

                                        </h2>

                                    </div>
                                </div>
                                <!--/ Featured post end -->

                            </div>
                        @else
                            <div class="item"
                                style="background-image:url({{ asset('img/news/' . $slider_img) }});background-repeat: no-repeat;background-size: 100% 100%;">
                                <div class="featured-post">
                                    <div class="post-content custom_post_content new-title-hover">
                                        <h2 class="post-title title-extra-large ">
                                            <a href='{{ URL::to("article/$slider_news->id/$slider_news->link") }}'
                                                style="font-size: 21px;margin-top: 10px;color: #fff;font-weight: bold">
                                                {{-- {{ str_limit($slider_news->title,50) }} --}}
                                                {{-- my custom code --}}
                                                {{ Str::limit($slider_news->title, 50) }} 
                                            </a>
                                        </h2>

                                    </div>
                                </div>
                                <!--/ Featured post end -->

                            </div>


                        @endif


                        <!-- Item 2 end -->
                    </div><!-- Featured owl carousel end-->
                </div>


                <div class="col-md-4 col-xs-12 col-sm-4 no-padding">
                    @foreach ($featurd_news as $key => $featurd)
                        <?php if ($key > 3) {
                            break;
                        }

                        ?>
                        @if ($key <= 3)
                            <div class="col-md-12 no-padding" style="height: 70px">
                                <div class="col-md-4 no-padding">

                                    @if (strpos($featurd->photo, 'assets'))
                                        <img class="img-responsive" src="{{ asset($featurd->photo) }}"
                                            alt="{{ $featurd->title }}" style="height: 67px" />
                                    @else
                                        <img class="img-responsive" src="{{ asset('img/news/' . $featurd->photo) }}"
                                            alt="{{ $featurd->title }}" style="height: 67px" />
                                    @endif

                                </div>
                                <div class="col-md-8 no-padding-right">
                                    <h5 class="no-margin"
                                        style="max-width: 300px; max-height: 75px; overflow: hidden;">
                                        <a href='{{ URL::to("article/$featurd->id/$featurd->link") }}'
                                            style="font-size: 13px;">{{ $featurd->title }}</a>
                                    </h5>
                                </div>

                            </div>
                            <div class="col-md-12 no-padding">
                                <hr class="min">
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">

                <div class="header_tab">
                    <ul class="nav nav-tabs">
                        <li><a data-toggle="tab" href="#home">Popular News</a></li>
                        <li class="active"><a data-toggle="tab" href="#menu1">Latest News</a></li>

                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade">
                            <div class="list-post-block header_post_block scrioll_header">
                                <ul class="list-post">
                                    @foreach ($popular_news as $popular)
                                        <li class="clearfix">
                                            <div class="post-block-style post-float clearfix">
                                                <!-- Post thumb end -->

                                                <div class="post-content" style="max-width: 300px; max-height: 45px; overflow: hidden;">
                                                    <h2 class="post-title title-small" >
                                                        <a
                                                            href='{{ URL::to("article/$popular->id/$popular->link") }}'>{{ $popular->title }}</a>
                                                    </h2>

                                                </div><!-- Post content end -->
                                            </div><!-- Post block style end -->
                                        </li><!-- Li 1 end -->
                                    @endforeach
                                    <!-- Li 4 end -->

                                </ul><!-- List post end -->
                            </div><!-- List post block end -->

                        </div>

                        <div id="menu1" class="tab-pane fade  in active">
                            <div class="list-post-block scrioll_header header_post_block">
                                <ul class="list-post">
                                    @foreach ($latest_news as $l_news)
                                        <li class="clearfix">
                                            <div class="post-block-style post-float clearfix">


                                                <div class="post-content" style="max-width: 300px; max-height: 50px; overflow: hidden;">
                                                    <h2 class="post-title title-small">
                                                        <a
                                                            href='{{ URL::to("article/$l_news->id/$l_news->link") }}'>{{ Str::limit($l_news->title, 50) }}</a>
                                                    </h2>

                                                </div><!-- Post content end -->
                                            </div><!-- Post block style end -->
                                        </li><!-- Li 1 end -->
                                    @endforeach
                                </ul><!-- List post end -->
                            </div>
                        </div>


                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
