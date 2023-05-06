@include('frontend.partials.header')

@yield('content')


@include('frontend.partials.footer')

@yield('script')
<script src="{{ asset('frontend/js/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('frontend/js/lottie-player.js') }}"></script>

</body>


</html>


