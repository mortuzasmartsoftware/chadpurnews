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
                    <a href="#">Tables</a>
                </li>
                <li class="active">All Sub-Categories</li>
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
                    <i class="menu-icon fa fa-list-alt"></i> Sub-Categories
                </h4>
                <span class="widget-toolbar">
                    <!--------------- CREATE---------------->
                    <a href="{{ route('class-sub-category.create') }}" class="">
                        <i class="fa fa-plus"></i> Add <span class="hide-in-sm">New</span>
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
                                    <th>#</th>
                                    <th>Sub Category Name</th>
                                    <th>Sub Category Link</th>
                                    <th class="text-center">Serial Num</th>
                                    <th>Main Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @forelse ($all_adds as $all_adds)
                                        <tr>
                                            <th>{{ $loop->index+1 }}</th>
                                            <td>{{ $all_adds->name }}</td>
                                            <td>{{ $all_adds->link }}</td>
                                            <td class="text-center">{{ $all_adds->serial_num }}</td>
                                            <td>{{ $all_adds->category->name }}</td>
                                            <td>
                                                @if ($all_adds->status == 1)
                                                    <a href="{{ route('subCat_status',$all_adds->id) }}"><i class="fa fa-toggle-on" style="font-size: 24px"></i></a>
                                                @else
                                                    <a href="{{ route('subCat_status',$all_adds->id) }}"><i class="fa fa-toggle-off" style="font-size: 24px"></i></a>
                                                @endif
                                            </td>
                                            <td style="display: flex">
                                                <a href="{{ route('class-sub-category.edit',$all_adds->id) }}" style="margin-bottom: 5px"><i class="fa fa-pencil-square-o" aria-hidden="true" style="margin-top: 0px; margin-right: 5px; font-size:22px;"></i></a>
                                                <form action="{{ route('class-sub-category.destroy',$all_adds->id) }}" method="POST">
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
                                                    No Category to Show
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                              </table>
                        </div>
                    </div>

                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div>
@endsection
