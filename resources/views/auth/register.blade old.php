@extends('auth.master')

@section('auth_content')
<div id="signup-box" class="signup-box widget-box no-border visible">
    <div class="widget-body">
        <div class="widget-main">
            <h4 class="header green lighter bigger text-center">
                {{-- <i class="ace-icon fa fa-users blue"></i> --}}
                Enter Your Details to Begin
            </h4>

            <div class="space-6"></div>
            {{-- <h5> Enter your details to begin: </h5> --}}
            @if ($errors->any())
                <div class="alert alert-danger error_div">
                    @foreach ($errors->all() as $error)
                        <ul>
                            <li class="text-danger">{{ $error }}</li>
                        </ul>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <fieldset>
                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="email" class="form-control" placeholder="Email" name="email">
                            <i class="ace-icon fa fa-envelope"></i>
                        </span>
                    </label>

                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="text" class="form-control" placeholder="Username" name="name">
                            <i class="ace-icon fa fa-user"></i>
                        </span>
                    </label>

                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <i class="ace-icon fa fa-lock"></i>
                        </span>
                    </label>

                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="password" class="form-control" placeholder="Repeat password" name="password_confirmation">
                            <i class="ace-icon fa fa-retweet"></i>
                        </span>
                    </label>

                    <label class="block">
                        <input type="checkbox" class="ace">
                        <span class="lbl">
                            I accept the
                            <a href="#">User Agreement</a>
                        </span>
                    </label>

                    <div class="space-24"></div>

                    <div class="clearfix">
                        <button type="reset" class="width-30 pull-left btn btn-sm">
                            <i class="ace-icon fa fa-refresh"></i>
                            <span class="bigger-110">Reset</span>
                        </button>

                        <button type="submit" class="width-65 pull-right btn btn-sm btn-success">
                            <span class="bigger-110">Register</span>

                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>

        <div class="toolbar center">
            <a href="{{ route('login') }}" class="back-to-login-link" id="backTologin">
            {{-- <a href="{{ route('login') }}" data-target="#login-box" class="back-to-login-link"> --}}
                <i class="ace-icon fa fa-arrow-left"></i>
                Back to login
            </a>
        </div>
    </div><!-- /.widget-body -->
</div>
<script type="text/javascript">

    jQuery(function($) {
     $('#backTologin').on('click', function(e) {
        $('body').attr('id', 'login_position');

        e.preventDefault();
     });

    });
</script>
@endsection
