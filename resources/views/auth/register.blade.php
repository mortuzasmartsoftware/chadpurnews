<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
<body>
    <section>
        <div style="padding: 30px 0;text-align: center;">
            <lottie-player src="{{ asset('/frontend/lord-icon/404-page.json') }}"
                background="transparent" speed="1" class="lotti-icon-center" style="width: 320px; height: 320px;" loop
                autoplay></lottie-player>
            <h1 style="font-family: Stylish; color:red;font-size:40px;">Page not found</h1>
            <a href="{{ route('login') }}">Back to Login</a>

        </div>
    </section>

    <style>
        @font-face {
            font-family: Stylish;
            src: url("{{ asset('/fonts/Stylish/Stylish-Regular.ttf') }}");
        }
        .lotti-icon-center{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
    </style>
    <script src="{{ asset('frontend/js/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('frontend/js/lottie-player.js') }}"></script>
</body>
</html>


