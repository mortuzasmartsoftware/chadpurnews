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
                <li>
                    <a href="{{ route('ads-management.index') }}">Ads Management</a>
                </li>
                <li class="active">View Ads</li>
            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off">
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>

        <div class="page-content">
            <div class="page-header widget-header" style="border: 1px #f0ecec solid; padding: 10px; box-shadow: 2px 4px 8px #438EB9;">
                <h4 class="widget-title">
                    <i class="menu-icon fa fa-list-alt"></i> Advertisements
                </h4>
                <span class="widget-toolbar">
                    <!--------------- CREATE---------------->
                    <a href="{{ route('ads-management.create') }}" class="">
                        <i class="fa fa-plus"></i> Add <span class="hide-in-sm">New</span>
                    </a>
                </span>
            </div><!-- /.page-header -->
            <div class="widget-body">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table" style="border: 1px #cdd9e8 solid;">
                                    <table id="dynamic-table" class="table table-striped table-bordered table-hover new-table">
                                        <thead class="thead-dark">
                                        <tr  style="background-color: rgb(110, 110, 110); color:white">
                                            <th class="text-center" width="5%">Sl</th>
                                            {{-- <th class="text-center" width="20%">Ads Script</th> --}}
                                            <th class="text-center" width="35%">Ads Image</th>
                                            <th class="text-center" width="15%">Position/Page Name</th>
                                            <th class="text-center" width="15%">Serial(Position/Page Wise)</th>
                                            <th class="text-center" width="15%">Image/Script Status</th>
                                            <th class="text-center" width="10%">Ads Status</th>
                                            <th class="text-center" width="10%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($all_adds as $all_adds)
                                                <tr>
                                                    <th class="text-center">{{ $loop->index+1 }}</th>
                                                    {{-- <td>{{ $all_adds->script }}</td> --}}
                                                    <td class="text-center">
                                                        @if ( strpos($all_adds->ads_image,'assets') )
                                                            <img src="{{ asset($all_adds->ads_image) }}" alt="Not Found" width="300px" height="100%">
                                                        @else
                                                            <img src="{{asset('img/ads-image/'.$all_adds->ads_image)}}" alt="Not Found" width="300px" height="100%">
                                                        @endif
                                                    </td>
                                                    <td class="text-center">{{ $all_adds->ads_position->position_name }}</td>
                                                    <td class="text-center">{{ $all_adds->ads_serial->serial_name }}</td>
                                                    <td class="text-center">
                                                        @if ($all_adds->script_image_status == 1)
                                                            <a href="{{ route('scriptORimage_status',$all_adds->id) }}"><i class="fa fa-toggle-on" style="font-size: 18px"><br>Active Script</i></a>
                                                        @else
                                                            <a href="{{ route('scriptORimage_status',$all_adds->id) }}"><i class="fa fa-toggle-off" style="font-size: 18px; color:orange;"><br>Active Image</i></a>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($all_adds->status == 1)
                                                            <a href="{{ route('adsManagement_status',$all_adds->id) }}"><i class="fa fa-toggle-on" style="font-size: 24px"></i></a>
                                                        @else
                                                            <a href="{{ route('adsManagement_status',$all_adds->id) }}"><i class="fa fa-toggle-off" style="font-size: 24px"></i></a>
                                                        @endif
                                                    </td>
                                                    <td style="display: flex; justify-content:space-around;">
                                                        <a href="{{ route('ads-management.edit',$all_adds->id) }}" style="margin-bottom: 5px"><i class="fa fa-pencil-square-o" aria-hidden="true" style="margin-top: 0px; margin-right: 5px; font-size:22px;"></i></a>
                                                        <form action="{{ route('ads-management.destroy',$all_adds->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" style="background: none; border:none;"><i class="fa fa-trash-o" aria-hidden="true"  style=" font-size:22px;margin-top: -2px;
                                                                color: red; cursor:pointer"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="50">
                                                        <div class="alert alert-danger text-center">
                                                            No Ads to Show
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div><!-- /.page-content -->
    </div>
</div>
@endsection
