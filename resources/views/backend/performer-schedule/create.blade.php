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
                    <a href="#">News</a>
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
                    <b>Adding News</b>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Common form elements and layouts
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-lg-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="{{ route('schedule.store') }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="left col-lg-11" style="margin-left: 20px">
                                <div class="form-group">
                                    <label for="category_id">Events</label>
                                    <select name="fk_event_id" class="form-control" id="cat_dropdown">
                                        <option value="">-Select One-</option>
                                        @foreach ($events_infos as $events_info)
                                            <option value="{{ $events_info->id }}">{{ $events_info->events_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                     <label class=" control-label no-padding-right" for="form-field-1"> Time Schedule </label>
                                    {{--<div class="input-group bootstrap-timepicker">
                                        <input id="timepicker1" type="text" class="form-control" name="time_schedule">
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o bigger-110"></i>
                                        </span>
                                    </div> --}}
                                    <div class="input-group bootstrap-timepicker">
                                        <input id="timepicker1" type="text" class="form-control" name="time_schedule" placeholder="Ex: 10:00 - 12:00">
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">  name </label>
                                    <div >
                                        <input name="name" type="text" id="form-field-1" placeholder=" name " class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">  designation </label>
                                    <div >
                                        <input name="designation" type="text" id="form-field-1" placeholder=" designation " class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">  details </label>
                                    <div >
                                        <textarea name="details" placeholder=" details " class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-2">Choose News Image </label>
                                    <div >
                                        <div class="control-label no-padding-right" style="padding-left: 0px !important;">
                                            <label class="ace-file-input ace-file-multiple"><input  name="photo" type="file" id="id-input-file-3"><span class="ace-file-container" data-title="Drop files here or click to choose"><span class="ace-file-name" data-title="No File ..."><i class=" ace-icon ace-icon fa fa-cloud-upload"></i></span></span><a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">day_number </label>
                                    <div >
                                        <input name="day_number" type="number" id="form-field-1" placeholder="day_number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">serialno </label>
                                    <div >
                                        <input name="serialno" type="number" id="form-field-1" placeholder="serialno" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">Status </label>
                                    <div >
                                        <input name="status" type="number" id="form-field-1" placeholder="Ex: 1 or 0" class="form-control">
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
