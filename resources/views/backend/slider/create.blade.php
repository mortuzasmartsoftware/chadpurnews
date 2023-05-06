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
                    <form action="{{ route('sliders.store') }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="left col-lg-11" style="margin-left: 20px">
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> SLider Caption 1 </label>
                                    <div >
                                        <input name="caption1" type="text" id="form-field-1" placeholder="Page name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> SLider Caption 2 </label>
                                    <div >
                                        <input name="caption2" type="text" id="form-field-1" placeholder="Page title" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Seial no. </label>
                                    <div >
                                        <input name="serialno" type="number" id="form-field-1" placeholder="Seial no. " class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-2">Choose File </label>
                                    <div>
                                        <input type="file" name="photo" class="form-control">
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

