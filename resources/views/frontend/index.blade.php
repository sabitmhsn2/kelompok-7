@section('php')
<?php
    $potensi = \App\Potensi::orderBy('id','DESC')->paginate('6');
    $post = \App\Brita::orderBy('id','DESC')->paginate('3');
    $structur = \App\Structurdesa::all();
    $slider = \App\Slider::all();
    $quetes = \App\Quetes::all();
    $webs = \App\Webs::get();
    foreach ($webs as $web);

?>
@endsection

@include('frontend.partials/main')
    <head>
        @include('frontend.partials.title-meta')

        <!-- Css -->
        <link href="{{ asset('tail/assets/libs/swiper/css/swiper.min.css') }}" rel="stylesheet">
        <link href="{{ asset('tail/assets/libs/tiny-slider/tiny-slider.css') }}" rel="stylesheet">
        <link href="{{ asset('tail/assets/libs/tobii/css/tobii.min.css') }}" rel="stylesheet">
        @include('frontend.partials.head-css')
    </head>
    
    @include('frontend.partials.body')
        
        @include('frontend.partials.navbar.nav-center-white-bg')

        {{-- Content --}}
        @yield('content')
        {{-- End Content --}}

        @include('frontend.partials.footer.footer')

        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 right-5 h-9 w-9 text-center bg-indigo-600 text-white leading-9"><i class="uil uil-arrow-up"></i></a>
        <!-- Back to top -->

        @include('frontend.partials.switcher')

        <!-- JAVASCRIPTS -->
        <script src="{{ asset('tail/assets/libs/tiny-slider/min/tiny-slider.js') }}"></script>
        <script src="{{ asset('tail/assets/libs/tobii/js/tobii.min.js') }}"></script>
        <script src="{{ asset('tail/assets/libs/swiper/js/swiper.min.js') }}"></script>
        <script src="{{ asset('tail/assets/libs/feather-icons/feather.min.js') }}"></script>
        @include('frontend.partials.script-file')
        <!-- JAVASCRIPTS -->
    </body>
</html>