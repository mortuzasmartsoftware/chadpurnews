@extends('auth.master')
<style>
    @font-face {
        font-family: Stylish;
        src: url("{{ asset('/fonts/Stylish/Stylish-Regular.ttf') }}");
    }
    .lotti-icon-center{
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-top:-35px;
        width: 50%;
    }

</style>
@section('auth_content')
<div id="login-box" class="login-box visible widget-box no-border" style="border-radius:10px;">
    <h1 style="font-family:Stylish !important;color: white;margin-top:10px;text-align:center">{{ $company_info->company_name }}</h1>
    <div class="widget-body">
        <div class="widget-main">
            <h3 class="header blue lighter bigger text-center">
                {{-- <i class="ace-icon fa fa-lock green"></i> --}}
                <lottie-player src="{{ asset('/frontend/lord-icon/lock-animation.json') }}"
                background="transparent" speed="1" class="lotti-icon-center" style="width: 70px; height: 70px;" loop
                autoplay></lottie-player>
                Sign in
            </h3>
            <div class="space-6"></div>

            @if ($errors->any())
                <div class="alert alert-danger error_div">
                    @foreach ($errors->all() as $error)
                        <ul>
                            <li class="text-danger">{{ $error }}</li>
                        </ul>
                    @endforeach
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <fieldset>
                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input style="border-radius:10px !important; box-shadow: 2px 3px 8px 3px #6c7075 !important" type="email" class="form-control" placeholder="Email" name="email">
                            <i class="ace-icon fa fa-user"></i>
                        </span>
                    </label>
                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input style="border-radius:10px !important;border-radius:10px; box-shadow: 2px 4px 8px 3px #6c7075 !important" type="password" class="form-control" placeholder="Password" name="password">
                            <i class="ace-icon fa fa-lock"></i>
                        </span>
                    </label>

                    <div class="space"></div>

                    <div class="clearfix">
                        <label class="inline">
                            <input type="checkbox" class="ace">
                            <small class="lbl"> <strong>Remember Me</strong></small>
                        </label>

                        <button style="border-radius:10px; box-shadow: 2px 2px 8px 3px #77aad1 !important" type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                            <i class="ace-icon fa fa-key"></i>
                            <span class="bigger-110">Login</span>
                        </button>
                    </div>

                    <div class="space-4"></div>
                </fieldset>
            </form>
        </div><!-- /.widget-main -->
    </div><!-- /.widget-body -->
</div>
<div id="forgot-box" class="forgot-box widget-box no-border">
    <div class="widget-body">
        <div class="widget-main">
            <h4 class="header red lighter bigger">
                <i class="ace-icon fa fa-key"></i>
                Retrieve Password
            </h4>

            <div class="space-6"></div>
            <p>
                Enter your email and to receive instructions
            </p>

            <form>
                <fieldset>
                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="email" class="form-control" placeholder="Email" />
                            <i class="ace-icon fa fa-envelope"></i>
                        </span>
                    </label>

                    <div class="clearfix">
                        <button type="button" class="width-35 pull-right btn btn-sm btn-danger">
                            <i class="ace-icon fa fa-lightbulb-o"></i>
                            <span class="bigger-110">Send Me!</span>
                        </button>
                    </div>
                </fieldset>
            </form>
        </div><!-- /.widget-main -->

        <div class="toolbar center">
            <a href="#" data-target="#login-box" class="back-to-login-link">
                Back to login
                <i class="ace-icon fa fa-arrow-right"></i>
            </a>
        </div>
    </div><!-- /.widget-body -->
</div><!-- /.forgot-box -->
<script src="{{ asset('frontend/js/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('frontend/js/lottie-player.js') }}"></script>
@endsection
