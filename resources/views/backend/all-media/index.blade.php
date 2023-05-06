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
                    <a href="{{ route('all-media.index') }}">All Media</a>
                </li>
                <li class="active">View Media</li>
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

            <div class="page-header widget-header">
                <h4 class="widget-title">
                    <i class="menu-icon fa fa-list-alt"></i> Medias
                </h4>
                <span class="widget-toolbar">
                    <!--------------- CREATE---------------->
                    <a href="{{ route('all-media.create') }}" class="">
                        <i class="fa fa-plus"></i> Add <span class="hide-in-sm">Media</span>
                    </a>
                </span>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Sl#</th>
                                        <th>Media Name</th>
                                        <th class="text-center">Serial No</th>
                                        <th>Category Name</th>
                                        <th>Media Link</th>
                                        <th class="text-center">Photo</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($all_adds as $all_add)
                                        <tr>
                                            <th>{{ $loop->index+1 }}</th>
                                            <td>{{ $all_add->media_name }}</td>
                                            <td class="text-center">{{ $all_add->serial_number }}</td>
                                            <td>{{ $all_add->media_category->category_name }}</td>
                                            <td>{{ $all_add->media_link }}</td>
                                            <td class="text-center">
                                                @if ( strpos($all_add->photo,'assets') )
                                                    <img src="{{ asset($all_add->photo) }}" alt="not found" width="100px">
                                                @else
                                                    <img src="{{asset('img/allMedia/'.$all_add->photo)}}" alt="not found" width="100px">
                                                @endif
                                            </td>
                                            <td>
                                                <div class="div" style="margin-top:-2px">
                                                    @if ($all_add->status == 1)
                                                        <a href="{{ route('allMedia_status',$all_add->id) }}"><i class="fa fa-toggle-on" style="font-size: 24px"></i></a>
                                                    @else
                                                        <a href="{{ route('allMedia_status',$all_add->id) }}"><i class="fa fa-toggle-off" style="font-size: 24px"></i></a>
                                                    @endif
                                                </div>
                                            </td>
                                            <td style="display: flex">
                                                <a href="{{ route('all-media.edit',$all_add->id) }}" style="margin-bottom: 5px"><i class="fa fa-pencil-square-o" aria-hidden="true" style="margin-top: 0px; margin-right: 5px; font-size:22px;"></i></a>
                                                <form action="{{ route('all-media.destroy',$all_add->id) }}" method="POST">
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
                                                    No data to Show
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                              </table>
                              {{-- {{$all_adds->links('pagination::bootstrap-4')}} --}}
                        </div>
                    </div>

                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div>
@endsection
