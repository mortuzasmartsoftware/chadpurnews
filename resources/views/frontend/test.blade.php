{{-------------------- CATEGORY 3 START --------------------}}
@foreach ($categories as $category)
@if ($category->serial_num == 3)
    <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="block color-red">
            <h3 class="block-title"><span>{{$category->name}}</span></h3>
            @foreach ($category->subcategories->take(1) as $category5news)

                @foreach($category5news->news->take(4) as $key => $c_news5)
                    @if($key == 0)

                    <div class="post-overaly-style clearfix">
                        <div class="post-thumb">
                            <a href="#">
                                <?php if($c_news5->photo){ ?>

                                @if ( strpos($c_news5->photo,'assets') )
                                <img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive"
                                    src="{{asset($c_news5->photo)}}" alt="{{$c_news5->title}}" />
                                @else
                                <img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive"
                                    src="{{asset('img/news/'.$c_news5->photo)}}" alt="{{$c_news5->title}}" />
                                @endif

                                <?php } else{ ?>


                                <img style="max-height: 220px;min-height: 220px;min-width: 100%" class="img-responsive"
                                    src="{{asset('img/news/images.png')}}" alt="image">
                                <?php } ?>

                            </a>
                        </div>

                        <div class="post-content">
                            <h2 class="post-title">
                                <a href='{{URL::to("article/$c_news5->id/$c_news5->link")}}'>{{$c_news5->title}}</a>
                            </h2>

                        </div><!-- Post content end -->
                    </div>
                    @endif
                    <!-- Post Overaly Article end -->

                    <div class="list-post-block">
                        <ul class="list-post">
                            @if($key >= 1)
                            <li class="clearfix">
                                <div class="post-block-style post-float clearfix">
                                    <div class="post-thumb">
                                        <a href="#">
                                            <?php if($c_news5->photo){ ?>

                                            @if ( strpos($c_news5->photo,'assets') )
                                            <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                class="img-responsive" src="{{asset($c_news5->photo)}}"
                                                alt="{{$c_news5->title}}" />
                                            @else
                                            <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                class="img-responsive" src="{{asset('img/news/'.$c_news5->photo)}}"
                                                alt="{{$c_news5->title}}" />
                                            @endif
                                            <?php } else{ ?>


                                            <img style="max-height: 80px;min-height: 80px;min-width: 100%"
                                                class="img-responsive" src="{{asset('img/news/images.png')}}"
                                                alt="image">
                                            <?php } ?>
                                        </a>
                                    </div><!-- Post thumb end -->

                                    <div class="post-content">
                                        <h2 class="post-title title-small">
                                            <a
                                                href='{{URL::to("article/$c_news5->id/$c_news5->link")}}'>{{$c_news5->title}}</a>
                                        </h2>

                                    </div><!-- Post content end -->
                                </div><!-- Post block style end -->
                            </li><!-- Li 1 end -->
                            @endif


                        </ul><!-- List post end -->
                    </div>
                @endforeach

            @endforeach
            <!-- List post block end -->
        </div><!-- Block end -->
    </div><!-- Gadget Col end -->
@endif
@endforeach
{{-------------------- CATEGORY 3 END --------------------}}
