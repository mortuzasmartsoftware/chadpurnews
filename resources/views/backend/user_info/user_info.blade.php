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
                    <b>User Info</b>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Common form elements and layouts
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-lg-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="{{ route('admin_update') }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="form-group" style="margin-left: 10px">
                            <label  for="form-field-2"><h4><b>User Info</b></h4></label>
                        </div> --}}
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    <span>{{ $error }}</span>
                                </div>
                            @endforeach
                        @endif
                        <div class="row">
                            <div class="left col-lg-11" style="margin-left: 20px">
                                <div class="form-group">
                                    <label class=" no-padding-right" for="form-field-1"> User Name </label>
                                    <div >
                                        <input value="{{ $allUserInfo->name }}" name="name" type="text" id="form-field-1" placeholder="Name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> User Email </label>
                                    <div >
                                        <input value="{{ $allUserInfo->email }}" name="email" type="text" id="form-field-1" placeholder="Short Form" class="form-control">
                                    </div>
                                </div>
                                <br><br>
                                <div class="form-group" style="margin-bottom: 0 !important">
                                    <label  for="form-field-2"><h5><b>Change Password</b></h5></label>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Old Password </label>
                                    <div >
                                        <input name="old_password" type="text" id="form-field-1" placeholder="Old Password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> New Password </label>
                                    <div >
                                        <input name="password" type="text" id="form-field-1" placeholder="Password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class=" control-label no-padding-right" for="form-field-1"> Confirm Password </label>
                                    <div >
                                        <input name="password_confirmation" type="text" id="form-field-1" placeholder="Password confirmation" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right" style="margin-top: 40px; margin-right: 6%;">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div>
@endsection
