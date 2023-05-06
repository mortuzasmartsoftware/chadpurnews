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
                        <a href="{{ route('manage-news.index') }}">News</a>
                    </li>
                    <li class="active">All News</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
                        <span class="input-icon">
                            <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input"
                                autocomplete="off">
                            <i class="ace-icon fa fa-search nav-search-icon"></i>
                        </span>
                    </form>
                </div><!-- /.nav-search -->
            </div>

            <div class="page-content">

                <div class="page-header widget-header"
                    style="border: 1px #f0ecec solid; padding: 10px; box-shadow: 2px 4px 8px #438EB9;">
                    <h4 class="widget-title">
                        <i class="menu-icon fa fa-list-alt"></i> News
                    </h4>
                    <span class="widget-toolbar">
                        <!--------------- CREATE---------------->
                        <a href="{{ route('manage-news.create') }}" class="">
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
                                        <table id="dynamic-table"
                                            class="table table-striped table-bordered table-hover new-table">
                                            <thead class="thead-dark">
                                                <tr style="background-color: rgb(110, 110, 110); color:white">
                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <th>Short Description</th>
                                                    <th>News Link</th>
                                                    <th>Category</th>
                                                    <th>Tags</th>
                                                    <th>Photo</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($all_adds as $all_add)
                                                    {{-- @dd($all_add) --}}
                                                    <tr>
                                                        <th>{{ $loop->index + 1 }}</th>
                                                        <td>{{ $all_add->title }}</td>
                                                        <td>{{ $all_add->short_description }}</td>
                                                        <td>{{ $all_add->link }}</td>
                                                        <td>{{ optional($all_add->category)->name }}</td>
                                                        <td>{{ $all_add->tags }}</td>
                                                        <td>
                                                            @if (strpos($all_add->photo, 'assets'))
                                                                <img src="{{ asset($all_add->photo) }}" alt="not found"
                                                                    width="80px">
                                                            @else
                                                                <img src="{{ asset('img/news/' . $all_add->photo) }}"
                                                                    alt="not found" width="80px">
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="div" style="margin-top:-2px">
                                                                @if ($all_add->status == 1)
                                                                    <a href="{{ route('news_status', $all_add->id) }}"><i
                                                                            class="fa fa-toggle-on"
                                                                            style="font-size: 24px"></i></a>
                                                                @else
                                                                    <a href="{{ route('news_status', $all_add->id) }}"><i
                                                                            class="fa fa-toggle-off"
                                                                            style="font-size: 24px"></i></a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td style="display: flex">
                                                            <a href="{{ route('manage-news.edit', $all_add->id) }}"
                                                                style="margin-bottom: 5px"><i class="fa fa-pencil-square-o"
                                                                    aria-hidden="true"
                                                                    style="margin-top: 0px; margin-right: 5px; font-size:22px;"></i></a>
                                                            <form action="{{ route('manage-news.destroy', $all_add->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    style="background: none; border:none;"><i
                                                                        class="fa fa-trash-o" aria-hidden="true"
                                                                        style=" font-size:22px;margin-top: -2px;
                                                                color: red; cursor:pointer"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="50">
                                                            <div class="alert alert-danger text-center">
                                                                No News to Show
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        {{ $all_adds->links('pagination::bootstrap-4') }}
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
