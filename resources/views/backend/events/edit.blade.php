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
                    <a href="#">AdsManagements</a>
                </li>
                <li class="active">Add</li>
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

            <div class="page-header">
                <h1>
                    <b>Adding Ads Management</b>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Common form elements and layouts
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-lg-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="col-lg-5"  style="margin-left: 20px">
                            @if (session('success'))
                                <div class="alert alert-success text-center">
                                    <span>{{ session('success') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <form action="{{ route('events.update',$target_ads->id) }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="left col-lg-5" style="margin-left: 20px">
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Social site Name </label>
                                    <div >
                                        <input value="{{ $target_ads->name }}" name="name" type="text" id="form-field-1" placeholder=" Name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">  link </label>
                                    <div >
                                        <input value="{{ $target_ads->link }}" name="link" type="text" id="form-field-1" placeholder=" link" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Serial Num </label>
                                    <div >
                                        <input value="{{ $target_ads->serial_num }}" name="serial_num" type="number" id="form-field-1" placeholder=" Serial Num" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Status </label>
                                    <div >
                                        <input value="{{ $target_ads->status }}" name="status" type="number" id="form-field-1" placeholder="Ex: 1 or 0" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> icon_class </label>
                                    <div >
                                        <input value="{{ $target_ads->icon_class }}" name="icon_class" type="text" id="form-field-1" placeholder="icon_class" class="form-control">
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
