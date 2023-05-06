@extends('frontend.app')
@section('content')
<section>
    <div style="padding: 30px 0;text-align: center;">
        <lottie-player src="{{ asset('/frontend/lord-icon/404-page.json') }}"
            background="transparent" speed="1" class="lotti-icon-center" style="width: 320px; height: 320px;" loop
            autoplay></lottie-player>
        <h2 style="font-family: Stylish; color:red;font-size:30px;">There is no News to show Please wait for upcoming news!!</h2>

    </div>
</section>

@endsection
{{-- <style>
    @font-face {
        font-family: Comfortaa;
        src: url("{{asset('/fonts/Comfortaa/static/Comfortaa-Regular.ttf')}}");
    }
</style> --}}

<style>
    @font-face {
        font-family: Stylish;
        src: url("{{ asset('/fonts/Stylish/Stylish-Regular.ttf') }}");
    }
</style>
