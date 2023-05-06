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
                    <a href=" route('category.index') ">Category</a>
                </li>
                <li class="active">Edit</li>
            </ul><!-- /.breadcrumb -->
        </div>

        <div class="page-content">

            <div class="page-header widget-header">
                <h4 class="widget-title">
                    <i class="menu-icon fa fa-edit"></i> Edit Category
                </h4>
                <span class="widget-toolbar">
                    <!--------------- CREATE---------------->
                    <a href="{{ route('category.index') }}" class="">
                        <i class="fa fa-list"></i> View <span class="hide-in-sm">Categories</span>
                    </a>
                </span>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-lg-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="{{ route('category.update',$target_ads->id) }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="left col-lg-11" style="margin-left: 20px">
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Category Name </label>
                                    <div >
                                        <input value="{{ $target_ads->name }}" name="name" type="text" id="form-field-1" placeholder="Category Name" class="form-control">
                                        @if($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Category link </label>
                                    <div >
                                        <input value="{{ $target_ads->link }}" name="link" type="text" id="form-field-1" placeholder="Category link" class="form-control">
                                        @if($errors->has('link'))
                                            <span class="text-danger">{{ $errors->first('link') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Category Serial Num </label>
                                    <div >
                                        <input value="{{ $target_ads->serial_num }}" name="serial_num" type="number" id="form-field-1" placeholder="Category Serial Num" class="form-control">
                                        @if($errors->has('serial_num'))
                                            <span class="text-danger">{{ $errors->first('serial_num') }}</span>
                                        @endif
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Status </label>
                                    <div >
                                        <input value="{{ $target_ads->status }}" name="status" type="number" id="form-field-1" placeholder="Ex: 1 or 0" class="form-control">
                                        @if($errors->has('status'))
                                            <span class="text-danger">The status field must be 0 or 1</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Category is_home <span class="text-warning">(If this category is a home category then insert 1 else 0)</span></label>
                                    <div >
                                        <input value="{{ $target_ads->is_home }}" name="is_home" type="number" id="form-field-1" placeholder="is_home" class="form-control">
                                        @if($errors->has('is_home'))
                                            <span class="text-danger">{{ $errors->first('is_home') }}</span>
                                        @endif
                                    </div>
                                </div> --}}

                                <div class="form-group">
                                    <div class="input-group width-100">
                                        {{-- <label class=" control-label no-padding-right" for="form-field-1">Status </label> --}}
                                        <span class="input-group-addon width-20" style="text-align: left">
                                            Status
                                        </span>
                                        <div class="toggle-btn {{ $target_ads->status == 1 ? 'active' : " " }}">
                                            <input type="checkbox" name="status" {{ $target_ads->status == 1 ? 'checked' : " " }} class="cb-value" />
                                            <span class="round-btn"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group width-100">
                                        {{-- <label class=" control-label no-padding-right" for="form-field-1"> Is Home </label> --}}
                                        <span class="input-group-addon width-20" style="text-align: left">
                                            Is Home
                                        </span>
                                        <div class="toggle-btn {{ $target_ads->is_home == 1 ? 'active' : " " }}">
                                            <input type="checkbox" name="is_home" {{ $target_ads->is_home == 1 ? 'checked' : " " }} class="cb-value" />
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
