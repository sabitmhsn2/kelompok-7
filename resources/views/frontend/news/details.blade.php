@section('php')
    <?php
    $potensi = \App\Potensi::orderBy('id', 'DESC')->paginate('6');
    $post = \App\Brita::orderBy('id', 'DESC')->paginate('3');
    $structur = \App\Structurdesa::all();
    $slider = \App\Slider::all();
    $quetes = \App\Quetes::all();
    $webs = \App\Webs::get();
    foreach ($webs as $web);
    
    ?>
@endsection

@include('frontend.partials/main')

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ $brita->judul }}</title>
    <meta name="email" content="hello@ramacan.dev" />
    <meta name="description" content="{{ $brita->keterangan }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="agency, application, business, clean, creative, cryptocurrency, it solutions, modern, multipurpose, nft marketplace, portfolio, saas, software, tailwind css" />
    <meta name="author" content="{{ config('app.developer.name') }}" />
    <meta name="website" content="{{ Request::url() }}" />

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="{{ $brita->judul }}">
    <meta itemprop="description" content="{{ $brita->keterangan }}">
    <meta itemprop="image" content="{{ asset('foto/'.$brita->foto) }}">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $brita->judul }}">
    <meta property="og:description" content="{{ $brita->keterangan }}">
    <meta property="og:image" content="{{ asset('foto/'.$brita->foto) }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $brita->judul }}">
    <meta name="twitter:description" content="{{ $brita->keterangan }}">
    <meta name="twitter:image" content="{{ asset('foto/'.$brita->foto) }}">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('foto/'.$web->logo) }}">
    <link rel="icon" type="image/png" href="{{ asset('foto/'.$web->logo) }}">

    <!-- Css -->
    <link href="{{ asset('tail/assets/libs/swiper/css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ asset('tail/assets/libs/tiny-slider/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('tail/assets/libs/tobii/css/tobii.min.css') }}" rel="stylesheet">
    @include('frontend.partials.head-css')
</head>

@include('frontend.partials.body')

@include('frontend.partials.navbar.nav-center-white-bg')

{{-- Content --}}

<!-- Start Section-->
<section class="relative md:py-24 py-16">
    <div class="container">
        <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
            <div class="lg:col-span-8 md:col-span-6">
                <div class="p-6 rounded-md shadow dark:shadow-gray-800">

                    <img src="{{ asset('foto/' . $brita->foto) }}" class="rounded-md" alt="{{ $brita->judul }}">
                    <h3 class="mb-3 text-3xl leading-normal font-medium text-dark">{{ $brita->judul }}</h3>

                    <div class="mt-6">{!! $brita->keterangan !!}</div>
                </div>
            </div>

            <div class="lg:col-span-4 md:col-span-6">
                <div class="sticky top-20">
                    <h5
                        class="text-lg font-semibold bg-gray-50 dark:bg-slate-800 shadow dark:shadow-gray-800 rounded-md p-2 text-center mt-8">
                        Recent post</h5>
                    @foreach ($post as $po)
                        <div class="flex items-center mt-8">
                            <img src="{{ asset('foto/' . $po->foto) }}" style="height: 60px; width:70px;" alt="">

                            <div class="ml-3">
                                <a href="{{ url('news/' . $po->slug) }}"
                                    class="font-semibold hover:text-indigo-600">{{ $po->judul }}</a>
                                <p class="text-sm text-slate-400">{{ date('d M Y', strtotime($po->created_at)) }}</p>
                            </div>
                        </div>
                    @endforeach

                    <h5
                        class="text-lg font-semibold bg-gray-50 dark:bg-slate-800 shadow dark:shadow-gray-800 rounded-md p-2 text-center mt-8">
                        Social sites</h5>
                    <?php
                    $website = \App\Webs::get();
                    foreach ($website as $web);
                    ?>
                    <ul class="list-none text-center mt-8">
                        <li class="inline"><a href="{{ $web->fb }}"
                                class="btn btn-icon btn-sm border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-indigo-600 hover:text-white hover:bg-indigo-600"><i
                                    data-feather="facebook" class="h-4 w-4"></i></a></li>
                        <li class="inline"><a href="{{ $web->ig }}"
                                class="btn btn-icon btn-sm border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-indigo-600 hover:text-white hover:bg-indigo-600"><i
                                    data-feather="instagram" class="h-4 w-4"></i></a></li>
                        <li class="inline"><a href="{{ $web->twitter }}"
                                class="btn btn-icon btn-sm border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-indigo-600 hover:text-white hover:bg-indigo-600"><i
                                    data-feather="twitter" class="h-4 w-4"></i></a></li>
                    </ul>
                    <!--end icon-->
                </div>
            </div>
        </div>
        <!--end grid-->
    </div>
    <!--end container-->
</section>
<!--end section-->
<!-- End -->

{{-- End Content --}}

@include('frontend.partials.footer.footer')

<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top"
    class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 right-5 h-9 w-9 text-center bg-indigo-600 text-white leading-9"><i
        class="uil uil-arrow-up"></i></a>
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
