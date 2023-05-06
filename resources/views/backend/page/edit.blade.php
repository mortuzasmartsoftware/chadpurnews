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
                    <a href="#">Page</a>
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
                    <b>Adding Page</b>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Common form elements and layouts
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-lg-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="{{ route('pages-problem.update',$target_ads->id) }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="left col-lg-5" style="margin-left: 20px">
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Page name </label>
                                    <div >
                                        <input value="{{ $target_ads->name }}" name="name" type="text" id="form-field-1" placeholder="Page name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Page title </label>
                                    <div >
                                        <input value="{{ $target_ads->title }}" name="title" type="text" id="form-field-1" placeholder="Page title" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Page link </label>
                                    <div >
                                        <input value="{{ $target_ads->link }}" name="link" type="text" id="form-field-1" placeholder="Page link " class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Description </label>
                                    <div >
                                        <textarea name="description" class="form-control" placeholder=" description">{{ $target_ads->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-2">Choose New File </label>
                                    <div>
                                        <input type="file" name="file" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1">Status </label>
                                    <div >
                                        <input value="{{ $target_ads->status }}" name="status" type="number" id="form-field-1" placeholder="Ex: 1 or 0" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="right col-lg-5" style="margin-left: 10%;">
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-2"> Previous File </label>
                                    <div>
                                        {{-- <img src="{{ asset($target_ads->file) }}" alt="not found"> --}}

                                        {{-- <iframe
                                            src="{{ asset($target_ads->file) }}"
                                            frameBorder="0"
                                            scrolling="auto"
                                            height="100%"
                                            width="100%"
                                        ></iframe> --}}
                                        {{-- <object data="{{ asset($target_ads->file) }}" type=""></object> --}}
                                        @if ( strpos($target_ads->photo,'assets') )
                                            <embed src="{{ asset($target_ads->file) }}" width="475px" height="600px" />
                                        @else
                                            <embed src="{{ asset('assets/backend/page/'.$target_ads->file) }}" width="475px" height="600px" />
                                        @endif

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
