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
                    <a href="{{ route('media-category.index') }}">Media Category</a>
                </li>
                <li class="active">Add</li>
            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">

            <div class="page-header widget-header">
                <h4 class="widget-title">
                    <i class="menu-icon fa fa-plus"></i> Add Media Category
                </h4>
                <span class="widget-toolbar">
                    <!--------------- CREATE---------------->
                    <a href="{{ route('media-category.index') }}" class="">
                        <i class="fa fa-list-alt"></i> View <span class="hide-in-sm">MediaCategories</span>
                    </a>
                </span>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-lg-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="{{ route('media-category.store') }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="left col-lg-11" style="margin-left: 20px">
                                {{-- <div class="form-group">
                                    <div >
                                        <label class=" control-label no-padding-right" for="fk_category_id"> Select a Category <span class="text-danger">*</span></label>
                                        <select name="category_name" class="form-control">
                                            <option value="">--Select a Category--</option>
                                            @foreach ($category_infos as $category_info)
                                                <option value="{{ $category_info->id }}">{{ $category_info->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('category_name'))
                                            <span class="text-danger">Please select a Category</span>
                                        @endif
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Media Category Name
                                        <span class="text-danger">*</span></label>
                                    <div>
                                        <input name="category_name" type="text" id="form-field-1"
                                            placeholder="Media Category Name" class="form-control slug-input">
                                        @if ($errors->has('category_name'))
                                            <span class="text-danger">{{ $errors->first('category_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Media Category serial num <span class="text-danger">*</span></label>
                                    <div >
                                        <input name="serial" type="number" id="form-field-1" placeholder="serial num" class="form-control">
                                        @if($errors->has('serial'))
                                            <span class="text-danger">{{ $errors->first('serial') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group width-100">
                                        <span class="input-group-addon width-20" style="text-align: left">
                                            Status
                                        </span>
                                        <div class="toggle-btn active">
                                            <input type="checkbox" name="status" checked class="cb-value" />
                                            <span class="round-btn"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right" style="margin-top: 40px; margin-right:6%">
                            <button type="submit" class="btn btn-primary" style="margin-left: 15px;">Submit</button>
                        </div>
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div>
@endsection
