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
                    <a href="#">Forms</a>
                </li>
                <li class="active">Form Elements</li>
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
                    <b>Company Info</b>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Common form elements and layouts
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="{{ route('company_update') }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="form-group">
                            <label  style="margin-left: 18%;" class="col-sm-3 control-label no-padding-right text-center" for="form-field-2"><h4><b>Company Info</b></h4></label>
                        </div> --}}

                        <div class="row">
                            <div class="col-lg-11" style="margin:0 0 50px 22px">

                                <div class="form-group">
                                    <label class=" no-padding-right" for="form-field-1"> Company Name </label>
                                    <div >
                                        <input value="{{ $allSiteInfo->company_name }}" name="company_name" type="text" id="form-field-1" placeholder="Name" class="form-control">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class=" no-padding-right" for="form-field-1"> Company Email </label>
                                    <div >
                                        <input value="{{ $allSiteInfo->email }}" name="email" type="text" id="form-field-1" placeholder="Email" class="form-control">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Facebook </label>
                                    <div >
                                        <input value="{{ $allSiteInfo->fb_link }}" name="fb_link" type="text" id="form-field-1" placeholder="Link.." class="form-control">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Phone Number </label>
                                    <div >
                                        <input value="{{ $allSiteInfo->mobile_no }}" name="mobile_no" type="text" id="form-field-1" placeholder="Address" class="form-control">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Site Address </label>
                                    <div >
                                        <input value="{{ $allSiteInfo->address }}" name="address" type="text" id="form-field-1" placeholder="Address" class="form-control">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Short Description </label>
                                    <div>
                                        <textarea name="short_description" id="" cols="30" rows="5" placeholder="Short Description" class="form-control">{{ $allSiteInfo->short_description }}</textarea>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">Long Description </label>
                                    <div>
                                        <textarea name="description" id="" cols="30" rows="10" placeholder="Description" class="form-control">{{ $allSiteInfo->description }}</textarea>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-2">Previous Site Logo </label>
                                    <div >

                                        @if ( strpos($allSiteInfo->logo,'assets') )
                                            <img width="100px" src="{{ asset($allSiteInfo->logo) }}" alt="{{$allSiteInfo->company_name}}">
                                        @else
                                            <img width="100px" src="{{asset('img/'.$allSiteInfo->logo)}}" alt="No Photo upload yet">
                                        @endif

                                            <br>
                                        <small class="text-danger">*Logo size 270 x 100 (Max)</small>
                                    </div>
                                </div>


                                <div class="file-upload form-group">
                                    <label class=" control-label no-padding-right" for="form-field-2">Choose New Site Logo </label>
                                    <div class="file-upload-select">
                                        <div class="file-select-button" >Choose File</div>
                                    <div class="file-select-name">No file chosen...</div>
                                    <input type="file" name="logo" id="file-upload-input">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-2">Previous Favicon </label>
                                    <div >

                                        @if ( strpos($allSiteInfo->favicon,'assets') )
                                            <img width="100px" src="{{ asset($allSiteInfo->favicon) }}" alt="{{$allSiteInfo->company_name}}">
                                        @else
                                            <img width="100px" src="{{asset('img/'.$allSiteInfo->favicon)}}" alt="No Favicon upload yet">
                                        @endif

                                            <br>
                                        <small class="text-danger">*Favicon size must be 32 x 32</small>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <input type="file" name="favicon">
                                </div>


                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-2">Google Map (Embeded Code) </label>
                                    <div >
                                        <input value="{{ $allSiteInfo->map_embed }}" name="map_embed" type="text" id="form-field-1" class="form-control" placeholder="Map Embeded Code">
                                    </div>
                                </div>


                                @if ($allSiteInfo->map_embed == 0 OR $allSiteInfo->map_embed == NULL)

                                @else
                                    <div class="form-group">
                                        <label class=" control-label no-padding-right" for="form-field-2">Google Map Preview </label>
                                        <div >
                                            <iframe src="{{ $allSiteInfo->map_embed }}" width="760" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                        </div>
                                    </div>
                                @endif


                            </div>
                        </div>
                        <div class="form-group text-right" style="margin-top: 30px; margin-right:6%">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div>
@endsection
