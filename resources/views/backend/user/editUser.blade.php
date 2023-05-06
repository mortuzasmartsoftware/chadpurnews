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
                    <li class="active">Edit User</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input"
                               autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                    </form>
                </div><!-- /.nav-search -->
            </div>
            {{-- main content start from here --}}
            <div class="page-content">
                <div class="row">

                    <div class="col-sm-12">
                        <div class="widget-box">
                            <div class="widget-header">
                                <h4 class="widget-title">
                                    <div class="d-flex" style="display: flex;justify-content: space-between">
                                        <span>
                                            <i class="fa fa-user"></i> User
                                        </span>
                                        <a href="{{ route('user') }}" class="float-right">
                                            <i class="fa fa-list"></i>User List
                                        </a>
                                    </div>
                                </h4>
                                <span class="widget-toolbar">
                                </span>
                            </span>
                            </div>


                            <form class="form-horizontal">
                                @csrf

                                <div class="widget-body">

                                    <div class="row pt-2 pr-2">

                                        <!-- Left side -->
                                        <div class="col-sm-12">

                                            <div class="row">
                                                <div class="col-sm-12 px-3">

                                                    <!-- Name -->
                                                    <div class="col-sm-12 col-md-6 ">
                                                        <div class="input-group width-100 mb-1">
                                                        <span class="input-group-addon width-30" style="text-align: left">
                                                            Name <span class="label-required">*</span>
                                                        </span>
                                                            <input type="text" class="form-control " name="name"
                                                                   id="name" value="{{$user->name}}">
                                                        </div>
                                                    </div>


                                                    <!-- Email -->
                                                    <div class="col-sm-12 col-md-6 ">
                                                        <div class="input-group width-100 mb-1">
                                                        <span class="input-group-addon width-30" style="text-align: left">
                                                            Email <span class="label-required">*</span>
                                                        </span>
                                                            <input type="email" class="form-control " name="email"
                                                                   id="email" value="{{$user->email}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 ">
                                                        <div class="input-group width-100 mb-1">
                                                        <span class="input-group-addon width-30" style="text-align: left">
                                                            Password <span class="label-required">*</span>
                                                        </span>
                                                            <input type="password" class="form-control " name="password"
                                                                   id="password" value="{{$user->password}}">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-xs-12">

                                            <!-- Add Page -->
                                            <h5 class="widget-title">
                                                <div class="row" style="margin-top: 10px;padding:5px">

                                                    <div class="col-md-12 text-right pr-2">
                                                        <button type="button" class="btn btn-primary btn-sm btn-block"
                                                                style="max-width: 150px" onclick="UpdateUser()">
                                                            <i class="fa fa-save"></i> Update
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="space-10"></div>
                                            </h5>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
            {{-- main content end  --}}
        </div>
    </div>
    <script>
        function UpdateUser(){
            let userId = "{{$user->id}}";
            let name = document.getElementById("name").value;
            let email = document.getElementById("email").value;
            let password = document.getElementById("password").value;

            if(name === ""){
                alert("Write your name")
            }
            else if(email === ""){
                alert("Write your email")
            }
            else if(password === ""){
                alert("Write password");
            }
            else {
                let post_url = "/updateUser";
                let allData = new FormData();
                allData.append("UserId", userId);
                allData.append("Name", name);
                allData.append("Email", email);
                allData.append("Password", password);

                let configuration = {headers:{"content-type" : "multipart/form-data"},
                    onUploadProgress: function (progressEvent) {
                        let uploadProgressPercent = Math.round((progressEvent.loaded*100)/progressEvent.total)
                        document.getElementById("uploadPercent").innerHTML = uploadProgressPercent+'%';
                    }
                };

                axios.post(post_url, allData, configuration).then(
                    function (response) {
                        if(response.data == 1){
                            alert("Name already exist");
                        }
                        else if(response.data == 2){
                            alert("Email already exist");
                        }
                        else{
                            location.reload();
                        }

                    }
                ).catch(
                    function (error) {
                        alert("Error...try again");
                        location.reload();
                    }
                )
            }
        }
    </script>
@endsection
