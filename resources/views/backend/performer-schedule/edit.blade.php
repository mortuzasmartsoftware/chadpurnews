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
                    <a href="#">Blog</a>
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
                    <b>Adding Blog</b>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Common form elements and layouts
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-lg-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="{{ route('schedule.update',$target_ads->id) }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="left col-lg-5" style="margin-left: 20px">
                                <div class="form-group">
                                    <select name="fk_event_id" class="form-control">
                                        <option value="" >-Select Event-</option>
                                        @foreach ($event_infos as $event)
                                            <option value="{{ $event->id }}" {{ ( $event->id )== $target_ads->relationtoEvent->id ? 'selected' : "" }}>{{ $event->events_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">  time schedule </label>
                                    <div >
                                        <input value="{{ $target_ads->time_schedule }}" type="time" name="time_schedule" placeholder=" Time Schedule " class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">  name </label>
                                    <div >
                                        <input value="{{ $target_ads->name }}" name="name" type="text" id="form-field-1" placeholder=" name " class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">  designation </label>
                                    <div >
                                        <input value="{{ $target_ads->designation }}" name="designation" type="text" id="form-field-1" placeholder=" designation " class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">  details </label>
                                    <div >
                                        <textarea name="details" placeholder=" details " class="form-control">{{ $target_ads->day_number }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-2">Previous News Image </label>
                                    <div >
                                        <div class=" no-padding-right" style="padding-left: 0px !important;">
                                            @if ( strpos($target_ads->photo,'assets') )
                                                <img src="{{ asset($target_ads->photo) }}" alt="not found" width="100px">
                                            @else
                                                <img src="{{asset('assets/backend/schedule/'.$target_ads->photo)}}" alt="not found" width="100px">
                                            @endif
                                        </div>
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
                                        <input value="{{ $target_ads->day_number }}" name="day_number" type="number" id="form-field-1" placeholder="day_number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">serialno </label>
                                    <div >
                                        <input value="{{ $target_ads->serialno }}" name="serialno" type="number" id="form-field-1" placeholder="serialno" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">Status </label>
                                    <div >
                                        <input value="{{ $target_ads->status }}" name="status" type="number" id="form-field-1" placeholder="Ex: 1 or 0" class="form-control">
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
