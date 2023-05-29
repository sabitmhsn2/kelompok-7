@section('php')
<?php
    $potensi = \App\Potensi::orderBy('id','DESC')->paginate('6');
    $post = \App\Brita::orderBy('id','DESC')->paginate('3');
    $structur = \App\Structurdesa::all();
    $slider = \App\Slider::all();
    $quetes = \App\Quetes::all();
    $title = 'Home';
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
        
        @include('frontend.partials.navbar.nav-center-light')

        <!-- Start Hero -->
        <section id="controls-carousel" class="relative" data-carousel="static">
            <div class="overflow-hidden relative h-screen inset-0">
                @foreach($slider as $sl)
                <div class="flex items-center justify-center transition-all duration-700 ease-in-out" data-carousel-item="active">
                    <div class="image-wrap absolute flex items-center bg-center min-w-full w-auto min-h-full h-auto overflow-hidden m-auto z-1 bg-no-repeat" style=" background-image: url(<?= asset('foto/'.$sl->foto) ;?>);"></div>
                    <div class="absolute inset-0 md:bg-gradient-to-r md:from-black md:via-black/80 md:bg-black/20 bg-black/70 z-2"></div>
                    <div class="container z-3">
                        <div class="grid grid-cols-1 mt-10">
                            <div class="md:text-left text-center">
                                <h1 class="font-bold text-white lg:leading-normal leading-normal text-4xl lg:text-5xl mb-6">{{ $sl->heding }}</h1>
                                <p class="text-white/70 text-lg max-w-xl">{{ $sl->keterangan}}</p>
                                
                                {{-- <div class="mt-8">
                                    <a href="" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md">Contact us</a>
                                </div> --}}
                            </div>
                        </div><!--end grid-->
                    </div><!--end container-->
                </div>
                @endforeach
            </div>

            <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev="">
                <span class="inline-flex justify-center items-center w-8 h-8 rounded-full border border-white hover:border-indigo-600 hover:bg-indigo-600 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span class="hidden">Previous</span>
                </span>
            </button>
            <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next="">
                <span class="inline-flex justify-center items-center w-8 h-8 rounded-full border border-white hover:border-indigo-600 hover:bg-indigo-600 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="hidden">Next</span>
                </span>
            </button>
        </section><!--end section-->
        <!-- End Hero -->

        <!-- Start -->
        <section class="relative md:py-24 py-16">
            <div class="container">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
                    <div class="md:col-span-5">
                        <div class="relative">
                            <img src="{{ asset('foto/'.$web->logo) }}" class="rounded-md" alt="">
                        </div>
                    </div><!--end col-->

                    <div class="md:col-span-7">
                        <div class="lg:ml-4">
                            <h4 class="mb-6 md:text-3xl text-2xl lg:leading-normal leading-normal font-medium">{{ $web->nama }}</h4>
                            <p class="text-slate-400 max-w-xl">{{ $web->deskripsi }}</p>
                            <a href="{{ url('tentang-desa') }}" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mt-3">Tentang Desa <i class="mdi mdi-chevron-right align-middle"></i></a>
                        </div>
                    </div><!--end col-->
                </div><!--end grid-->
            </div><!--end container-->

        </section><!--end section-->
        <!-- End -->

        <!-- Start Section-->
        <section class="relative md:py-24 py-16">

            <div class="container">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center">
                    <div class="md:col-span-6">
                        <h6 class="text-indigo-600 text-sm font-bold uppercase mb-2">Latest</h6>
                        <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Kabar Desa</h3>
                    </div>
                </div><!--end grid-->

                <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 mt-8 gap-[30px]">
                    @foreach($post as $br)
                    <div class="blog relative rounded-md shadow dark:shadow-gray-800 overflow-hidden">
                        <img src="{{ asset('foto/'.$br->foto) }}" style="height: 280px; width:auto;" alt="{{ $br->judul }}">

                        <div class="content p-6">
                            <a href="{{ url('/news/'.$br->slug) }}" class="title h5 text-lg font-medium hover:text-indigo-600 duration-500 ease-in-out">{{ $br->judul }}</a>
                            <p class="text-slate-400 mt-3"><?php
                                $num_char = 100;
                                echo substr($br->keterangan, 0, $num_char) . '..';
                                  ?></p>
                            
                            <div class="mt-4">
                                <a href="{{ url('/news/'.$br->slug) }}" class="btn btn-link font-normal hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Read More <i class="uil uil-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->

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