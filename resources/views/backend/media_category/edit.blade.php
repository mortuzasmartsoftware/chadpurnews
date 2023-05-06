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
                    <a href="#">Media Category</a>
                </li>
                <li class="active">Edit</li>
            </ul><!-- /.breadcrumb -->
        </div>

        <div class="page-content">

            <div class="page-header widget-header">
                <h4 class="widget-title">
                    <i class="menu-icon fa fa-edit"></i> Edit Media Category
                </h4>
                <span class="widget-toolbar">
                    <!--------------- CREATE---------------->
                    <a href="{{ route('media-category.index') }}" class="">
                        <i class="fa fa-list"></i> View <span class="hide-in-sm">Media Categories</span>
                    </a>
                </span>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('media-category.update',$target_ads->id) }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="left col-lg-5" style="margin-left: 20px">
                                {{-- <div class="form-group">
                                    <label class=" control-label no-padding-right" for="fk_category_id"> Select a Category <span class="text-danger">*</span></label>
                                    <select name="category_name" class="form-control">
                                        <option value="" >-Select One-</option>
                                        @foreach ($category_infos as $category)
                                        <option value="{{ $category->id }}" {{ ( $category->id )== $target_ads->relationtocategory->id ? 'selected' : "" }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Media Category Name </label>
                                    <div >
                                        <input value="{{ $target_ads->category_name }}" name="category_name" type="text" id="form-field-1" placeholder="Category Name" class="form-control">
                                        @if($errors->has('category_name'))
                                            <span class="text-danger">{{ $errors->first('category_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Media Category Serial Num </label>
                                    <div >
                                        <input value="{{ $target_ads->serial }}" name="serial" type="number" id="form-field-1" placeholder="Category Serial Num" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group width-100">
                                        <span class="input-group-addon width-20" style="text-align: left">
                                            Status
                                        </span>
                                        <div class="toggle-btn {{ $target_ads->status == 1 ? 'active' : " " }}">
                                            <input type="checkbox" name="status" {{ $target_ads->status == 1 ? 'checked' : " " }} class="cb-value" />
                                            <span class="round-btn"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group text-left" style="margin-top: 40px;">
                            <button type="submit" class="btn btn-primary" style="margin-left: 15px;">Submit</button>
                        </div>
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div>
@endsection
