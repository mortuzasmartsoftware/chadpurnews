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
                    <a href="{{ route('subsub-menu.index') }}">SubSubMenu</a>
                </li>
                <li class="active">Add</li>
            </ul><!-- /.breadcrumb -->

        </div>

        <div class="page-content">

            <div class="page-header widget-header">
                <h4 class="widget-title">
                    <i class="menu-icon fa fa-plus"></i> Add Sub-Sub-Menu
                </h4>
                <span class="widget-toolbar">
                    <!--------------- CREATE---------------->
                    <a href="{{ route('subsub-menu.index') }}" class="">
                        <i class="fa fa-list-alt"></i> View <span class="hide-in-sm">Sub-Sub-Menus</span>
                    </a>
                </span>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-lg-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="{{ route('subsub-menu.store') }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="left col-lg-11" style="margin-left: 20px">
                                <div class="form-group">
                                    <div >
                                        <label class=" control-label no-padding-right" for="fk_category_id"> Select a Parent Sub-Menu <span class="text-danger">*</span></label>
                                        <select name="fk_sub_menu_id" class="form-control">
                                            <option value="">--Select a Sub Menu--</option>
                                            @foreach ($infos as $info)
                                                <option value="{{ $info->id }}">{{ $info->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('fk_sub_menu_id'))
                                            <span class="text-danger">Please insert parent submenu</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Sub Sub Menu Name <span class="text-danger">*</span></label>
                                    <div >
                                        <input name="name" type="text" id="form-field-1" placeholder="Sub Sub Menu Name" class="form-control slug-input">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Sub Sub Menu link <span class="text-danger">*</span></label>
                                    <div >
                                        <input name="url" type="text" id="form-field-1" placeholder="Sub Sub Menu link " class="form-control slug-output">
                                        @if ($errors->has('url'))
                                            <span class="text-danger">{{ $errors->first('url') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Sub Sub Menu serial num <span class="text-danger">*</span></label>
                                    <div >
                                        <input name="serial_num" type="number" id="form-field-1" placeholder="sub sub serial_num" class="form-control">
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
