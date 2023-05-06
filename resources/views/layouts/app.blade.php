<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>{!! $company_info->company_name !!}</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('css')
    {{-- custom css import --}}
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/assets/css/ace.min.css" class="ace-main-stylesheet"
        id="main-ace-style" />

    <!--[if lte IE 9]>
   <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
  <![endif]-->
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/assets/css/custom.css" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/assets/css/chosen.css" class="ace-main-stylesheet" />
    {{-- <link rel="stylesheet" href="sweetalert2.min.css"> --}}
    <!--[if lte IE 9]>
  <link rel="stylesheet" href="{{ asset('assets/dashboard') }}/assets/css/ace-ie.min.css" />
  <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="{{ asset('assets/dashboard') }}/assets/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
  <script src="{{ asset('assets/dashboard') }}/assets/js/html5shiv.min.js"></script>
  <script src="{{ asset('assets/dashboard') }}/assets/js/respond.min.js"></script>
  <![endif]-->
    <style>
        @font-face {
            font-family: Stylish;
            src: url("{{ asset('/fonts/Stylish/Stylish-Regular.ttf') }}");
        }
    </style>
    <style>
        @font-face{
            font-family: NotoSansBengali;
            src: url("{{ asset('fonts/Noto_Sans_Bengali/NotoSansBengali-VariableFont_wdth,wght.ttf') }}")
        }
    </style>
</head>

<body class="no-skin">
    <div id="navbar" class="navbar navbar-default ace-save-state">
        <div class="navbar-container ace-save-state" id="navbar-container">
            <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler"
                data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>
            </button>

            <div class="navbar-header pull-left">
                <a href="{{ url('/home') }}" class="navbar-brand">
                    <small>
                        <i class="fa fa-book"></i>
                        {!! $company_info->company_name !!}<span style="color:rgb(255, 181, 62)"> Admin Pannel</span>
                    </small>
                </a>
            </div>

            <div class="navbar-buttons navbar-header pull-right" role="navigation">
                <ul class="nav ace-nav">

                    <li class="light-blue dropdown-modal">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <span class="user-info">
                                <small>Welcome,</small>
                                <strong>{{ optional(Auth()->user())->name }}</strong>
                            </span>

                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>

                        <ul
                            class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

                            <li>
                                <a href="#">
                                    <i class="ace-icon fa fa-cog"></i>
                                    Settings
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('user_index') }}">
                                    <i class="ace-icon fa fa-user"></i>
                                    Profile
                                </a>
                            </li>

                            <li class="divider"></li>

                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="ace-icon fa fa-power-off"></i> <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- /.navbar-container -->
    </div>

    <div class="main-container ace-save-state" id="main-container">
        <script type="text/javascript">
            try {
                ace.settings.loadState('main-container')
            } catch (e) {}
        </script>

        <div id="sidebar" class="sidebar responsive ace-save-state">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('sidebar')
                } catch (e) {}
            </script>

            <ul class="nav nav-list">

                {{--
                     |--------------------------------------------------------------------------
                     | Dashboard list start
                     |--------------------------------------------------------------------------
                    --}}
                <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    <a href="{{ url('/home') }}">
                        <i class="menu-icon fa fa-tachometer"></i>
                        <span class="menu-text"> Dashboard </span>
                    </a>

                    <b class="arrow"></b>
                </li>

                {{--
                     |--------------------------------------------------------------------------
                     | Setting list start
                     |--------------------------------------------------------------------------
                    --}}
                <li class="{{ request()->routeIs('user', 'createUserForm', 'company_index', 'editUserFrom') ? 'open active' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-cog"></i>
                        <span class="menu-text"> Settings </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="{{ request()->routeIs('user', 'createUserForm', 'editUserFrom') ? 'active' : '' }}">
                            <a href="#" class="dropdown-toggle">
                                <i class="fa fa-user"></i>
                                <span class="menu-text"> User Info</span>
                                <b class="arrow fa fa-angle-down"></b>
                            </a>

                            {{-- <b class="arrow"></b> --}}
                            <ul class="submenu">
                                <li class="{{ request()->routeIs('createUserForm') ? 'active' : '' }}">
                                    <a href="{{ route('createUserForm') }}">
                                        <i class="fa fa-plus"></i>
                                        <span class="menu-text">
                                            User Add
                                        </span>
                                        <b class="arrow"></b>
                                    </a>
                                </li>

                                <li class="{{ request()->routeIs('user') ? 'active' : '' }}">
                                    <a href="{{ route('user') }}">
                                        <i class="fa fa-list"></i>
                                        <span class="menu-text">
                                            User list
                                        </span>
                                        <b class="arrow"></b>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ request()->routeIs('company_index') ? 'active' : '' }}">
                            <a href="{{ route('company_index') }}">
                                <i class=" fa fa-building"></i>
                                <span class="menu-text"> Company Info</span>
                            </a>

                            <b class="arrow"></b>
                        </li>

                    </ul>
                </li>

                {{--
                     |--------------------------------------------------------------------------
                     | Category list start
                     |--------------------------------------------------------------------------
                    --}}

                <li class="{{ request()->routeIs('category*', 'class-sub-category*') ? 'open active' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-list-alt"></i>
                        <span class="menu-text">
                            Category
                        </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu">
                        {{-- category --}}
                        <li class="{{ request()->routeIs('category.create') ? 'active' : '' }}">
                            <a href="{{ route('category.create') }}">
                                <i class=" fa fa-plus purple"></i>
                                Add Category
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="{{ request()->routeIs('category.index') ? 'active' : '' }}">
                            <a href="{{ route('category.index') }}">
                                <i class=" fa fa-eye red"></i>
                                View Category
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="{{ request()->routeIs('class-sub-category*') ? 'open active' : '' }}">
                            <a href="#" class="dropdown-toggle">
                                <i class="fa fa-leaf green"></i>

                                Sub Category
                                <b class="arrow fa fa-angle-down"></b>
                            </a>
                            <b class="arrow"></b>
                            {{-- sub category --}}
                            <ul class="submenu">
                                <li class="{{ request()->routeIs('class-sub-category.create') ? 'active' : '' }}">
                                    <a href="{{ route('class-sub-category.create') }}">
                                        <i class=" fa fa-plus purple"></i>
                                        Add Sub Category
                                    </a>

                                    <b class="arrow"></b>
                                </li>

                                <li class="{{ request()->routeIs('class-sub-category.index') ? 'active' : '' }}">
                                    <a href="{{ route('class-sub-category.index') }}">
                                        <i class=" fa fa-eye red"></i>
                                        View Sub Category
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                {{--
                     |--------------------------------------------------------------------------
                     | Position & Serial list start
                     |--------------------------------------------------------------------------
                    --}}
                <li class="{{ request()->routeIs('ad-position*', 'ad-serial*') ? 'open active' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-map-pin"></i>
                        <span class="menu-text"> Ads Page & Serial </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="{{ request()->routeIs('ad-position*') ? 'open active' : '' }}">
                            <a href="#" class="dropdown-toggle">
                                <i class="fa fa-leaf green"></i>

                                Ads Page
                                <b class="arrow fa fa-angle-down"></b>
                            </a>

                            <b class="arrow"></b>
                            {{-- ads position --}}
                            <ul class="submenu">
                                <li class="{{ request()->routeIs('ad-position.create') ? 'active' : '' }}">
                                    <a href="{{ route('ad-position.create') }}">
                                        <i class=" fa fa-plus purple"></i>
                                        Add Ads Page
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                                <li class="{{ request()->routeIs('ad-position.index') ? 'active' : '' }}">
                                    <a href="{{ route('ad-position.index') }}">
                                        <i class=" fa fa-eye pink"></i>
                                        View Ads Page
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ request()->routeIs('ad-serial*') ? 'open active' : '' }}">
                            <a href="#" class="dropdown-toggle">
                                <i class="fa fa-leaf green"></i>

                                Ads Serial
                                <b class="arrow fa fa-angle-down"></b>
                            </a>

                            <b class="arrow"></b>
                            {{-- sub category --}}
                            <ul class="submenu">
                                <li class="{{ request()->routeIs('ad-serial.create') ? 'active' : '' }}">
                                    <a href="{{ route('ad-serial.create') }}">
                                        <i class=" fa fa-plus purple"></i>
                                        Add Ads Serial
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                                <li class="{{ request()->routeIs('ad-serial.index') ? 'active' : '' }}">
                                    <a href="{{ route('ad-serial.index') }}">
                                        <i class=" fa fa-eye pink"></i>
                                        View Ads Serial
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                {{--
                     |--------------------------------------------------------------------------
                     | Advertisement list start
                     |--------------------------------------------------------------------------
                    --}}
                <li class="{{ request()->routeIs('ads-management*', 'ads-placement*') ? 'open active' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-bullhorn"></i>
                        <span class="menu-text"> Advertisement </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="{{ request()->routeIs('ads-management*') ? 'open active' : '' }}">
                            <a href="#" class="dropdown-toggle">
                                <i class="fa fa-leaf green"></i>

                                Ads Management
                                <b class="arrow fa fa-angle-down"></b>
                            </a>

                            <b class="arrow"></b>
                            {{-- sub category --}}
                            <ul class="submenu">
                                <li class="{{ request()->routeIs('ads-management.create') ? 'active' : '' }}">
                                    <a href="{{ route('ads-management.create') }}">
                                        <i class=" fa fa-plus purple"></i>
                                        Add Ads
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                                <li class="{{ request()->routeIs('ads-management.index') ? 'active' : '' }}">
                                    <a href="{{ route('ads-management.index') }}">
                                        <i class=" fa fa-eye pink"></i>
                                        View Ads
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ request()->routeIs('ads-placement*') ? 'open active' : '' }}">
                            <a href="#" class="dropdown-toggle">
                                <i class="fa fa-leaf green"></i>

                                Ads Placement
                                <b class="arrow fa fa-angle-down"></b>
                            </a>

                            <b class="arrow"></b>
                            {{-- sub category --}}
                            <ul class="submenu">
                                <li class="{{ request()->routeIs('ads-placement.create') ? 'active' : '' }}">
                                    <a href="{{ route('ads-placement.create') }}">
                                        <i class=" fa fa-plus purple"></i>
                                        Add Ads Placement
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                                <li class="{{ request()->routeIs('ads-placement.index') ? 'active' : '' }}">
                                    <a href="{{ route('ads-placement.index') }}">
                                        <i class=" fa fa-eye pink"></i>
                                        View Ads Placement
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>


                {{--
                     |--------------------------------------------------------------------------
                     | News list start
                     |--------------------------------------------------------------------------
                    --}}
                <li class="{{ request()->routeIs('manage-news*') ? 'open active' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-newspaper-o"></i>
                        <span class="menu-text"> News </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="{{ request()->routeIs('manage-news.create') ? 'active' : '' }}">
                            <a href="{{ route('manage-news.create') }}">
                                <i class=" fa fa-plus purple"></i>
                                Add News
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="{{ request()->routeIs('manage-news.index') ? 'active' : '' }}">
                            <a href="{{ route('manage-news.index') }}">
                                <i class=" fa fa-eye pink"></i>
                                View News
                            </a>

                            <b class="arrow"></b>
                        </li>

                    </ul>
                </li>


                {{--
                     |--------------------------------------------------------------------------
                     | Page list start
                     |--------------------------------------------------------------------------
                    --}}
                <li class="{{ request()->routeIs('pages-problem*', 'pages-photo*') ? 'open active' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-file"></i>
                        <span class="menu-text"> Page </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        {{-- paste --}}
                        <li class="{{ request()->routeIs('pages-problem.create') ? 'active' : '' }}">
                            <a href="{{ route('pages-problem.create') }}">
                                <i class=" fa fa-plus purple"></i>
                                Add Page
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="{{ request()->routeIs('pages-problem.index') ? 'active' : '' }}">
                            <a href="{{ route('pages-problem.index') }}">
                                <i class=" fa fa-eye pink"></i>
                                View Page
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="{{ request()->routeIs('pages-photo*') ? 'open active' : '' }}">
                            <a href="#" class="dropdown-toggle">
                                <i class="fa fa-leaf green"></i>

                                Page Photo
                                <b class="arrow fa fa-angle-down"></b>
                            </a>

                            <b class="arrow"></b>
                            {{-- sub category --}}
                            <ul class="submenu">
                                <li class="{{ request()->routeIs('pages-photo.create') ? 'active' : '' }}">
                                    <a href="{{ route('pages-photo.create') }}">
                                        <i class=" fa fa-plus purplet"></i>
                                        Add Page Photo
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                                <li class="{{ request()->routeIs('pages-photo.index') ? 'active' : '' }}">
                                    <a href="{{ route('pages-photo.index') }}">
                                        <i class=" fa fa-eye pink"></i>
                                        View Page Photo
                                    </a>

                                    <b class="arrow"></b>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                {{--
                     |--------------------------------------------------------------------------
                     | Social Links list start
                     |--------------------------------------------------------------------------
                    --}}
                <li class="{{ request()->routeIs('social-links*') ? 'open active' : '' }}">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-share-square"></i>
                        <span class="menu-text"> Social Links </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="{{ request()->routeIs('social-links.create') ? 'active' : '' }}">
                            <a href="{{ route('social-links.create') }}">
                                <i class=" fa fa-plus purple"></i>
                                Add Social Links
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="{{ request()->routeIs('social-links.index') ? 'active' : '' }}">
                            <a href="{{ route('social-links.index') }}">
                                <i class=" fa fa-eye pink"></i>
                                View Social Links
                            </a>

                            <b class="arrow"></b>
                        </li>

                    </ul>
                </li>

            </ul><!-- /.nav-list -->

            <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
                    data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
            </div>

        </div>


        {{--
            |--------------------------------------------------------------------------
            | Main Content area start
            |--------------------------------------------------------------------------
           --}}
        @yield('main_content')


        {{--
            |--------------------------------------------------------------------------
            | Footer area start
            |--------------------------------------------------------------------------
           --}}
        <div class="footer">
            <div class="footer-inner">
                <div class="footer-content">
                    <div class="row">
                        <div class="col-lg-6 left">
                            <span class="bigger-120 ">
                                Copyright © {{ Carbon\Carbon::now()->format('Y') }} <span
                                    class="blue bolder">{!! $company_info->company_name !!}</span>
                            </span>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4 right">
                            <span class="bigger-120 ">
                                Developed By: <span class="blue bolder">Smart Software Ltd</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="{{ asset('assets/dashboard') }}/assets/js/jquery-2.1.4.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/assets/js/bootstrap.min.js"></script>
    <!-- <![endif]-->
    <script src="{{ asset('js/axios.min.js') }}"></script>



    <!--[if IE]>
        <![endif]-->
    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write(
            "<script src='{{ asset('dashboard') }}/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>

    <!-- page specific plugin scripts -->

    <!--[if lte IE 8]>
  <script src="{{ asset('assets/dashboard') }}/assets/js/excanvas.min.js"></script>
  <![endif]-->

    {{-- chosen scripts --}}
    <script src="{{ asset('assets/dashboard') }}/assets/js/chosen-box.js"></script>
    <script src="{{ asset('assets/dashboard') }}/assets/js/chosen.jquery.min.js"></script>

    <!-- jQuery Scripts file -->
    <script src="{{ asset('assets/dashboard') }}/assets/js/jquery-ui.custom.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/assets/js/jquery.easypiechart.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/assets/js/jquery.sparkline.index.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/assets/js/jquery.flot.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/assets/js/jquery.flot.pie.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/assets/js/jquery.flot.resize.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/assets/js/jquery.flot.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/assets/js/sweetalert2@11.js"></script>
    <!-- ace scripts -->
    <script src="{{ asset('assets/dashboard') }}/assets/js/ace-elements.min.js"></script>
    <script src="{{ asset('assets/dashboard') }}/assets/js/ace.min.js"></script>
    <!-- inline scripts related to this page -->
    <script type="text/javascript">
        jQuery(function($) {
            $('.easy-pie-chart.percentage').each(function() {
                var $box = $(this).closest('.infobox');
                var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css(
                    'color') : 'rgba(255,255,255,0.95)');
                var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' :
                '#E2E2E2';
                var size = parseInt($(this).data('size')) || 50;
                $(this).easyPieChart({
                    barColor: barColor,
                    trackColor: trackColor,
                    scaleColor: false,
                    lineCap: 'butt',
                    lineWidth: parseInt(size / 10),
                    animate: ace.vars['old_ie'] ? false : 1000,
                    size: size
                });
            })

            $('.sparkline').each(function() {
                var $box = $(this).closest('.infobox');
                var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
                $(this).sparkline('html', {
                    tagValuesAttribute: 'data-values',
                    type: 'bar',
                    barColor: barColor,
                    chartRangeMin: $(this).data('min') || 0
                });
            });


            //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
            //but sometimes it brings up errors with normal resize event handlers
            $.resize.throttleWindow = false;

            var placeholder = $('#piechart-placeholder').css({
                'width': '90%',
                'min-height': '150px'
            });
            var data = [{
                    label: "social networks",
                    data: 38.7,
                    color: "#68BC31"
                },
                {
                    label: "search engines",
                    data: 24.5,
                    color: "#2091CF"
                },
                {
                    label: "ad campaigns",
                    data: 8.2,
                    color: "#AF4E96"
                },
                {
                    label: "direct traffic",
                    data: 18.6,
                    color: "#DA5430"
                },
                {
                    label: "other",
                    data: 10,
                    color: "#FEE074"
                }
            ]

            function drawPieChart(placeholder, data, position) {
                $.plot(placeholder, data, {
                    series: {
                        pie: {
                            show: true,
                            tilt: 0.8,
                            highlight: {
                                opacity: 0.25
                            },
                            stroke: {
                                color: '#fff',
                                width: 2
                            },
                            startAngle: 2
                        }
                    },
                    legend: {
                        show: true,
                        position: position || "ne",
                        labelBoxBorderColor: null,
                        margin: [-30, 15]
                    },
                    grid: {
                        hoverable: true,
                        clickable: true
                    }
                })
            }
            drawPieChart(placeholder, data);

            /**
            we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
            so that's not needed actually.
            */
            placeholder.data('chart', data);
            placeholder.data('draw', drawPieChart);


            //pie chart tooltip example
            var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo(
                'body');
            var previousPoint = null;

            placeholder.on('plothover', function(event, pos, item) {
                if (item) {
                    if (previousPoint != item.seriesIndex) {
                        previousPoint = item.seriesIndex;
                        var tip = item.series['label'] + " : " + item.series['percent'] + '%';
                        $tooltip.show().children(0).text(tip);
                    }
                    $tooltip.css({
                        top: pos.pageY + 10,
                        left: pos.pageX + 10
                    });
                } else {
                    $tooltip.hide();
                    previousPoint = null;
                }

            });

            /////////////////////////////////////
            $(document).one('ajaxloadstart.page', function(e) {
                $tooltip.remove();
            });




            var d1 = [];
            for (var i = 0; i < Math.PI * 2; i += 0.5) {
                d1.push([i, Math.sin(i)]);
            }

            var d2 = [];
            for (var i = 0; i < Math.PI * 2; i += 0.5) {
                d2.push([i, Math.cos(i)]);
            }

            var d3 = [];
            for (var i = 0; i < Math.PI * 2; i += 0.2) {
                d3.push([i, Math.tan(i)]);
            }


            var sales_charts = $('#sales-charts').css({
                'width': '100%',
                'height': '220px'
            });
            $.plot("#sales-charts", [{
                    label: "Domains",
                    data: d1
                },
                {
                    label: "Hosting",
                    data: d2
                },
                {
                    label: "Services",
                    data: d3
                }
            ], {
                hoverable: true,
                shadowSize: 0,
                series: {
                    lines: {
                        show: true
                    },
                    points: {
                        show: true
                    }
                },
                xaxis: {
                    tickLength: 0
                },
                yaxis: {
                    ticks: 10,
                    min: -2,
                    max: 2,
                    tickDecimals: 3
                },
                grid: {
                    backgroundColor: {
                        colors: ["#fff", "#fff"]
                    },
                    borderWidth: 1,
                    borderColor: '#555'
                }
            });


            $('#recent-box [data-rel="tooltip"]').tooltip({
                placement: tooltip_placement
            });

            function tooltip_placement(context, source) {
                var $source = $(source);
                var $parent = $source.closest('.tab-content')
                var off1 = $parent.offset();
                var w1 = $parent.width();

                var off2 = $source.offset();
                //var w2 = $source.width();

                if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
                return 'left';
            }


            $('.dialogs,.comments').ace_scroll({
                size: 300
            });


            //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
            //so disable dragging when clicking on label
            var agent = navigator.userAgent.toLowerCase();
            if (ace.vars['touch'] && ace.vars['android']) {
                $('#tasks').on('touchstart', function(e) {
                    var li = $(e.target).closest('#tasks li');
                    if (li.length == 0) return;
                    var label = li.find('label.inline').get(0);
                    if (label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation();
                });
            }

            $('#tasks').sortable({
                opacity: 0.8,
                revert: true,
                forceHelperSize: true,
                placeholder: 'draggable-placeholder',
                forcePlaceholderSize: true,
                tolerance: 'pointer',
                stop: function(event, ui) {
                    //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
                    $(ui.item).css('z-index', 'auto');
                }
            });
            $('#tasks').disableSelection();
            $('#tasks input:checkbox').removeAttr('checked').on('click', function() {
                if (this.checked) $(this).closest('li').addClass('selected');
                else $(this).closest('li').removeClass('selected');
            });


            //show the dropdowns on top or bottom depending on window height and menu position
            $('#task-tab .dropdown-hover').on('mouseenter', function(e) {
                var offset = $(this).offset();

                var $w = $(window)
                if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
                    $(this).addClass('dropup');
                else $(this).removeClass('dropup');
            });

        })
        @yield('ajax_dropdown')
    </script>


    {{-- Sweet Alert Scripts --}}
    @if (session()->has('success'))
        <script>
            Swal.fire({
                title: 'success!',
                text: "{{ session()->get('success') }}",
                icon: 'success'
            })
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            Swal.fire({
                title: 'error!',
                text: "{{ session()->get('error') }}",
                icon: 'error'
            })
        </script>
    @endif
    @if (session()->has('warning'))
        <script>
            Swal.fire({
                title: 'warning!',
                text: "{{ session()->get('warning') }}",
                icon: 'warning'
            })
        </script>
    @endif
    @if (session()->has('delete'))
        <script>
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        </script>
    @endif

    <script>
        let fileInput = document.getElementById("file-upload-input");
        let fileSelect = document.getElementsByClassName("file-upload-select")[0];
        fileSelect.onclick = function() {
            fileInput.click();
        }
        fileInput.onchange = function() {
            let filename = fileInput.files[0].name;
            let selectName = document.getElementsByClassName("file-select-name")[0];
            selectName.innerText = filename;
        }
    </script>
    {{-- Custom Scripts --}}

    {{-- Toogle switch Js --}}
    <script>
        $('.cb-value').click(function() {
            var mainParent = $(this).parent('.toggle-btn');

            if ($(mainParent).find('input.cb-value').is(':checked')) {
                $(mainParent).addClass('active');
            } else {
                $(mainParent).removeClass('active');
            }
        });
    </script>

    {{-- Slug Creation Js --}}
    <script>
        var slug = function(str) {
            var $slug = '';
            var trimmed = $.trim(str);
            $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');

            return $slug.toLowerCase();
        }

        $('.slug-input').keyup(function() {
            var takedata = $('.slug-input').val();
            $('.slug-output').val(slug(takedata));
        });
    </script>

    @yield('footer_scripts')
    @yield('scripts')

</body>

</html>
