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
                        <a href=" route('ads-management.index') ">Ads Management</a>
                    </li>
                    <li class="active">Edit</li>
                </ul><!-- /.breadcrumb -->
            </div>

            <div class="page-content">

                <div class="page-header widget-header">
                    <h4 class="widget-title">
                        <i class="menu-icon fa fa-edit"></i> Edit Ads
                    </h4>
                    <span class="widget-toolbar">
                        <!--------------- CREATE---------------->
                        <a href="{{ route('ads-management.index') }}" class="">
                            <i class="fa fa-list"></i> View <span class="hide-in-sm">Ads</span>
                        </a>
                    </span>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-lg-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <form action="{{ route('ads-management.update', $target_ads->id) }}" class="form-horizontal"
                            role="form" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="left col-lg-11" style="margin-left: 20px">
                                    <div class="form-group">
                                        <div>
                                            <label class=" control-label no-padding-right" for="position_id"> Select Ads
                                                Position/Page Name <span class="text-danger">*</span></label>
                                            <select name="position_id" type="number" class="form-control" id="page-name" onchange="loadPositionSerialId(this)">
                                                <option value="">-Select a Position/Page Name-</option>
                                                @foreach ($ads_position as $position)
                                                    <option value="{{ $position->id }}"
                                                        {{ $position->id == $target_ads->position_id ? 'selected' : '' }}>
                                                        {{ $position->position_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <label class=" control-label no-padding-right" for="serial_num"> Select Ads
                                                Serial <span class="text-danger">*</span></label>
                                            <select name="serial_num" type="number" class="form-control filter-serial" id="sl-no" onchange="loadSerialWiseImageSizes(this)">
                                                {{-- <option value="">-Select a Serial-</option> --}}
                                                @foreach ($ads_serial as $serial)
                                              
                                                    <option value="{{ $serial->ads_serial_id }}" {{ $serial->ads_serial_id == $target_ads->serial_num ? 'selected' : '' }}>
                                                    {{ $serial->ads_serial->serial_name }}</option>
                                                @endforeach


                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" no-padding-right" for="form-field-1"> Ads Script</label>
                                        <div>
                                            <textarea name="script" placeholder="Ads Script" class="form-control" id="inputImagePath">{{ $target_ads->script }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label no-padding-right" for="form-field-2">Previous Image
                                        </label>
                                        <div>
                                            <div class=" no-padding-right" style="padding-left: 0px !important;">
                                                @if (strpos($target_ads->ads_image, 'assets'))
                                                    <img src="{{ asset($target_ads->ads_image) }}" alt="Not found"
                                                        width="300px" height="180px">
                                                @else
                                                    <img src="{{ asset('img/news/' . $target_ads->ads_image) }}"
                                                        alt="Not found" width="300px" height="180px">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="file-upload form-group">
                                        <label class=" control-label no-padding-right" for="form-field-2">Choose New Image
                                        <span id="image-size" class="text-danger"></span></label>
                                        <div class="file-upload-select">
                                            <div class="file-select-button">Choose File</div>
                                            <div class="file-select-name">No file chosen...</div>
                                            <input type="file" name="ads_image" id="file-upload-input">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label no-padding-right" for="form-field-1"> Ads Image
                                            link</label>
                                        <div>
                                            <input value="{{ $target_ads->image_url }}" name="image_url" type="text"
                                                id="form-field-1" placeholder="Image link "
                                                class="form-control slug-output">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group width-100">
                                            <span class="input-group-addon width-20" style="text-align: left">
                                                Status
                                            </span>
                                            <div class="toggle-btn {{ $target_ads->status == 1 ? 'active' : ' ' }}">
                                                <input type="checkbox" name="status"
                                                    {{ $target_ads->status == 1 ? 'checked' : ' ' }} class="cb-value" />
                                                <span class="round-btn"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group width-100">
                                            <span class="input-group-addon width-20" style="text-align: left">
                                                Is active file Image or Script
                                            </span>
                                            <div
                                                class="toggle-btn {{ $target_ads->script_image_status == 1 ? 'active' : ' ' }}">
                                                <input type="checkbox" name="script_image_status"
                                                    {{ $target_ads->script_image_status == 1 ? 'checked' : ' ' }}
                                                    class="cb-value" />
                                                <span class="round-btn"></span>
                                            </div>
                                        </div>
                                        <span class="text-danger">
                                            @if ($target_ads->script_image_status == 0)
                                                {{ 'Now Image is Activated' }}
                                            @else
                                                {{ 'Now Script is Activated' }}
                                            @endif
                                        </span>
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

@section('scripts')
    @include('backend.ad_management._inc.script')
@endsection
