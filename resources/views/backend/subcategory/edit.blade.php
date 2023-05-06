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
                    <a href="#">Edit Sub Category</a>
                </li>
                <li class="active">Edit</li>
            </ul><!-- /.breadcrumb -->
        </div>

        <div class="page-content">

            <div class="page-header widget-header">
                <h4 class="widget-title">
                    <i class="menu-icon fa fa-edit"></i> Edit Sub-Category
                </h4>
                <span class="widget-toolbar">
                    <!--------------- CREATE---------------->
                    <a href="{{ route('class-sub-category.index') }}" class="">
                        <i class="fa fa-list"></i> View <span class="hide-in-sm">Sub-Categories</span>
                    </a>
                </span>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-lg-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="{{ route('class-sub-category.update',$target_ads->id) }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="left col-lg-5" style="margin-left: 20px">
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="fk_category_id"> Select a Main Category <span class="text-danger">*</span></label>
                                    <select name="fk_category_id" class="form-control">
                                        <option value="" >-Select Category-</option>
                                        @foreach ($category_infos as $category)
                                            <option value="{{ $category->id }}" {{ ( $category->id )== $target_ads->relationtocategory->id ? 'selected' : "" }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('fk_category_id'))
                                        <span class="text-danger">{{ $errors->first('fk_category_id') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Sub Category Name <span class="text-danger">*</span></label>
                                    <div >
                                        <input value="{{ $target_ads->name }}" name="name" type="text" id="form-field-1" placeholder="Category Name" class="form-control">
                                        @if($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Sub Category link <span class="text-danger">*</span></label>
                                    <div >
                                        <input value="{{ $target_ads->link }}" name="link" type="text" id="form-field-1" placeholder="Category link" class="form-control">
                                        @if($errors->has('link'))
                                            <span class="text-danger">{{ $errors->first('link') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Sub Category Serial Num <span class="text-danger">*</span></label>
                                    <div >
                                        <input value="{{ $target_ads->serial_num }}" name="serial_num" type="number" id="form-field-1" placeholder="Category Serial Num" class="form-control">
                                        @if($errors->has('serial_num'))
                                            <span class="text-danger">{{ $errors->first('serial_num') }}</span>
                                        @endif
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
