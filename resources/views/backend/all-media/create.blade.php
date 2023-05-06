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
                <li class="active">Add Media</li>
            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">

            <div class="page-header widget-header">
                <h4 class="widget-title">
                    <i class="menu-icon fa fa-plus"></i> Add Media
                </h4>
                <span class="widget-toolbar">
                    <!--------------- CREATE---------------->
                    <a href="{{ route('all-media.index') }}" class="">
                        <i class="fa fa-list-alt"></i> View <span class="hide-in-sm">Medias</span>
                    </a>
                </span>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-lg-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="{{ route('all-media.store') }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="left col-lg-11" style="margin-left: 20px">
                                <div class="form-group">
                                    <label for="category_id"> Media Category <span class="text-danger">*</span></label>
                                    <select name="fk_category_id" class="form-control" id="cat_dropdown">
                                        <option value="">-Select One-</option>
                                        @foreach ($category_infos as $category_info)
                                            <option value="{{ $category_info->id }}">{{ $category_info->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Media name </label>
                                    <div >
                                        <input name="media_name" type="text" id="form-field-1" placeholder="media_name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">  Media Link </label>
                                    <div >
                                        <input name="media_link" type="text" id="form-field-1" placeholder=" link " class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-2">Choose Media Image </label>
                                    <div >
                                        <div class="control-label no-padding-right" style="padding-left: 0px !important;">
                                            <label class="ace-file-input ace-file-multiple">
                                                <input  name="photo" type="file" id="id-input-file-3">
                                                <span class="ace-file-container" data-title="Drop files here or click to choose"><span class="ace-file-name" data-title="No File ..."><i class=" ace-icon ace-icon fa fa-cloud-upload"></i></span></span>
                                                <a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a>
                                            </label>
                                        </div>
                                        <small class="text-danger">* Photo size 110 x 50 (Max)</small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">Serial Number </label>
                                    <div >
                                        <input name="serial_number" type="number" id="form-field-1" placeholder="serial_number" class="form-control">
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
