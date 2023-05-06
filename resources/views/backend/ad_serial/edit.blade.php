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
                    <a href=" route('ad-serial.index') ">Ads Serial</a>
                </li>
                <li class="active">Edit</li>
            </ul><!-- /.breadcrumb -->
        </div>

        <div class="page-content">

            <div class="page-header widget-header">
                <h4 class="widget-title">
                    <i class="menu-icon fa fa-edit"></i> Edit Ads Serial
                </h4>
                <span class="widget-toolbar">
                    <!--------------- CREATE---------------->
                    <a href="{{ route('ad-serial.index') }}" class="">
                        <i class="fa fa-list"></i> View <span class="hide-in-sm">Ads Serial</span>
                    </a>
                </span>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-lg-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="{{ route('ad-serial.update',$target_ads->id) }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="left col-lg-11" style="margin-left: 20px">
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Ads Serial Name </label>
                                    <div >
                                        <input value="{{ $target_ads->serial_name }}" name="serial_name" type="text" id="form-field-1" placeholder="Ads Serial Name" class="form-control">
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
