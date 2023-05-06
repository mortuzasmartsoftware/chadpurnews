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
                    <a href=" route('subsub-menu.index') ">Sub-Sub-Menu</a>
                </li>
                <li class="active">Edit</li>
            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">

            <div class="page-header widget-header">
                <h4 class="widget-title">
                    <i class="menu-icon fa fa-edit"></i> Edit Sub-Sub-Menu
                </h4>
                <span class="widget-toolbar">
                    <!--------------- CREATE---------------->
                    <a href="{{ route('subsub-menu.index') }}" class="">
                        <i class="fa fa-list"></i> View <span class="hide-in-sm">Sub-Sub-Menus</span>
                    </a>
                </span>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-lg-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="{{ route('subsub-menu.update',$target_ads->id) }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="left col-lg-5" style="margin-left: 20px">
                                <div class="form-group">
                                    <div >
                                        <label class=" control-label no-padding-right" for="fk_category_id"> Select a Paren Sub-Menu <span class="text-danger">*</span></label>
                                        <select name="fk_sub_menu_id" class="form-control">
                                            <option value="">--Select a Sub Menu--</option>
                                            @foreach ($infos as $info)
                                                <option value="{{ $info->id }}" {{ ( $info->id )== $target_ads->relationtoSubMenu->id ? 'selected' : "" }}>{{ $info->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Sub Sub Menu Name </label>
                                    <div >
                                        <input value="{{ $target_ads->name }}" name="name" type="text" id="form-field-1" placeholder="Sub Sub Menu Name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Sub Sub Menu link </label>
                                    <div >
                                        <input value="{{ $target_ads->url }}" name="url" type="text" id="form-field-1" placeholder="Sub Sub Menu link " class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Sub Sub Menu serial num </label>
                                    <div >
                                        <input value="{{ $target_ads->serial_num }}" name="serial_num" type="number" id="form-field-1" placeholder="serial_num" class="form-control">
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
