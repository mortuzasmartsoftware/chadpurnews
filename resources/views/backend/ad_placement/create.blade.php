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
                        <a href="{{ route('ads-placement.index') }}">Ads Placement</a>
                    </li>
                    <li class="active">Add Ads Placement</li>
                </ul><!-- /.breadcrumb -->
            </div>

            <div class="page-content">

                <div class="page-header widget-header">
                    <h4 class="widget-title">
                        <i class="menu-icon fa fa-plus"></i> Add Ads Placement
                    </h4>
                    <span class="widget-toolbar">
                        <!--------------- CREATE---------------->
                        <a href="{{ route('ads-placement.index') }}" class="">
                            <i class="fa fa-list-alt"></i> View <span class="hide-in-sm">Ads Placement</span>
                        </a>
                    </span>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-lg-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <form action="{{ route('ads-placement.store') }}" class="form-horizontal" role="form"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="left col-lg-11" style="margin-left: 20px">
                                    <div class="form-group">
                                        <div>
                                            <label class=" control-label no-padding-right" for="position_id"> Select Ads Page Name <span class="text-danger">*</span></label>
                                            <select name="ads_position_id" type="number" class="form-control">
                                                <option value="">-Select a Position-</option>
                                                @foreach ($ads_position as $position)
                                                    <option value="{{ $position->id }}">{{ $position->position_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <label class=" control-label no-padding-right" for="serial_num"> Select Ads
                                                Serial <span class="text-danger">*</span></label>
                                            <select name="ads_serial_id" type="number" class="form-control" id="sl-no"
                                                onchange="loadSerialWiseImageSizes(this)">
                                                <option value="">-Select a Serial-</option>
                                                @foreach ($ads_serial as $serial)
                                                    <option value="{{ $serial->id }}">{{ $serial->serial_name }}</option>
                                                @endforeach
                                            </select>
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
    <script>
        function loadSerialWiseImageSizes() {

            let invoice = $('#invoice-id')
            // invoice.empty()
            // invoice.append('Maximum image size: ')
            let sl = document.getElementById('sl-no').value;
            sl = sl - 1;

            $.get("/get-serial-num", function(data) {
                $(data).each(function(index, item) {
                    switch (item.ads_serial[sl]) {
                        case 1:
                        case 2:
                            invoice.empty()
                            invoice.append('<span> *Input image size must be 390 X 150 </span>')
                            break;
                        case 3:
                        case 4:
                        case 5:
                            invoice.empty()
                            invoice.append('<span> *Input image size must be 360 X 260 </span>')
                            break;
                        case 6:
                        case 9:
                        case 10:
                            invoice.empty()
                            invoice.append('<span> *Input image size must be 750 X 100 </span>')
                            break;
                        case 7:
                        case 8:
                            invoice.empty()
                            invoice.append('<span> *Input image size must be 360 X 280 </span>')
                            break;
                        default:
                            invoice.empty()
                            invoice.append(
                                "<span>*Input image size must be 'Acording to the Position of this Ads'</span>"
                                )
                            break;
                    }
                })
            })
        }
    </script>
@endsection
