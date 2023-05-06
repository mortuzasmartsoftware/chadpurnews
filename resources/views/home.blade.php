@extends('layouts.app')

@section('main_content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">Dashboard</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
                        <span class="input-icon">
                            <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input"
                                autocomplete="off" />
                            <i class="ace-icon fa fa-search nav-search-icon"></i>
                        </span>
                    </form>
                </div><!-- /.nav-search -->
            </div>

            <div class="page-content">
                <!-- /.ace-settings-container -->

                {{-- <div class="page-header">
                    <h1>
                        Dashboard
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            overview &amp; stats
                        </small>
                    </h1>
                </div> --}}

                {{-- <div class="row">
                    <div class="col-xs-12">

                        <div class="alert alert-block alert-info text-center text-white welcome">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="ace-icon fa fa-times"></i>
                            </button>
                            <i class="ace-icon fa fa-check check_i_tag"></i>
                            <span>Welcome To</span>
                            <strong class="green">
                                Dashboard
                            </strong>
                        </div>

                    </div>
                </div> --}}
            </div>
        </div>

        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row" style="display:flex; justify-content: space-around;">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info" style="border: 1px #f0ecec solid; padding: 10px; box-shadow: 2px 4px 8px rgb(248, 238, 149);">
                        <div class="inner">
                            <h3>{{ $total_users ?? 0 }}</h3>

                            <h4>Users</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success" style="border: 1px #f0ecec solid; padding: 10px; box-shadow: 2px 4px 8px rgb(248, 238, 149);">
                        <div class="inner">
                            <h3>{{ $total_news ?? 0 }}</h3>

                            <h4>News</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-newspaper-o"></i>
                        </div>
                        <a href="{{ route('manage-news.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger" style="border: 1px #f0ecec solid; padding: 10px; box-shadow: 2px 4px 8px rgb(248, 238, 149);">
                        <div class="inner">
                            <h3>{{ $total_ads ?? 0 }}</h3>

                            <h4>Advertisements</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bullhorn"></i>
                        </div>
                        <a href="{{ route('ads-management.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <div class="card card-primary card-outline" style="font-family: NotoSansBengali;">
                <h2>Top Ten Latest News:</h2>
                <div class="card-body" style="border: 1px #f0ecec solid; padding: 10px; box-shadow: 2px 4px 8px rgb(253, 241, 136);">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="box-shadow: 2px 4px 8px rgb(253, 241, 136);">
                                <th width="30%">Title</th>
                                <th class="text-center" width="25%">Photo</th>
                                <th width="30%">Short Description</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if ($latest_news)
                            @foreach ($latest_news as $key => $news)
                                <tr>
                                    <td>{{ $news->title ?? ''}}</td>
                                    <td class="text-center">
                                        @if ( strpos($news->photo,'assets') )
                                            <img src="{{ asset($news->photo) }}" alt="not found" width="80px">
                                        @else
                                            <img src="{{asset('img/news/'.$news->photo)}}" alt="not found" width="80px">
                                        @endif
                                    </td>
                                    <td>{{ $news->short_description ?? ''}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.main-content -->

@endsection
