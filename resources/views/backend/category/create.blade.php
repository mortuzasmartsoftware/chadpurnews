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
                        <a href="{{ route('category.index') }}">Category</a>
                    </li>
                    <li class="active">Add Category</li>
                </ul><!-- /.breadcrumb -->
            </div>

            <div class="page-content">

                <div class="page-header widget-header">
                    <h4 class="widget-title">
                        <i class="menu-icon fa fa-plus"></i> Add New Category
                    </h4>
                    <span class="widget-toolbar">
                        <!--------------- CREATE---------------->
                        <a href="{{ route('category.index') }}" class="">
                            <i class="fa fa-list-alt"></i> View <span class="hide-in-sm">Categories</span>
                        </a>
                    </span>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-lg-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <form action="{{ route('category.store') }}" class="form-horizontal" role="form" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="left col-lg-11" style="margin-left: 20px">
                                    <div class="form-group">
                                        <label class=" control-label no-padding-right" for="form-field-1"> Category Name
                                            <span class="text-danger">*</span></label>
                                        <div>
                                            <input name="name" type="text" id="form-field-1"
                                                placeholder="Category Name" class="form-control slug-input">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label no-padding-right" for="form-field-1"> Category link
                                            <span class="text-danger">*</span></label>
                                        <div>
                                            <input name="link" type="text" id="form-field-1"
                                                placeholder="Category link " class="form-control slug-output">
                                            @if ($errors->has('link'))
                                                <span class="text-danger">{{ $errors->first('link') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label no-padding-right" for="form-field-1"> Category serial
                                            num <span class="text-danger">*</span></label>
                                        <div>
                                            <input name="serial_num" type="number" id="form-field-1"
                                                placeholder="serial_num" class="form-control">
                                            @if ($errors->has('serial_num'))
                                                <span class="text-danger">{{ $errors->first('serial_num') }}</span>
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

                                    <div class="form-group">
                                        <div class="input-group width-100">
                                            <span class="input-group-addon width-20" style="text-align: left">
                                                Is Home
                                            </span>
                                            <div class="toggle-btn active">
                                                <input type="checkbox" name="is_home" checked class="cb-value" />
                                                <span class="round-btn"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right" style="margin-top: 40px; margin-right:6%">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div>
@endsection

