@extends('frontend.index')

@section('content')
<!-- Start Section-->
<section class="relative md:py-24 py-16">
    <div class="container">
        <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
            <div class="lg:col-span-8 md:col-span-6">
                <div class="p-6 rounded-md shadow dark:shadow-gray-800">
                    <?php
                        $website = \App\Webs::get();
                        foreach ($website as $data);
                    ?>
                    <h3 class="mb-3 text-3xl leading-normal font-medium text-dark">Tentang Desa</h3>

                    <div class="mt-6">{!! $data->sejarah !!}</div>
                </div>
            </div>

            <div class="lg:col-span-4 md:col-span-6">
                <div class="sticky top-20">
                    <h5 class="text-lg font-semibold bg-gray-50 dark:bg-slate-800 shadow dark:shadow-gray-800 rounded-md p-2 text-center mt-8">Social sites</h5>
                    <?php
                        $website = \App\Webs::get();
                        foreach ($website as $web);
                    ?>
                    <ul class="list-none text-center mt-8">
                        <li class="inline"><a href="{{ $web->fb }}" class="btn btn-icon btn-sm border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-indigo-600 hover:text-white hover:bg-indigo-600"><i data-feather="facebook" class="h-4 w-4"></i></a></li>
                        <li class="inline"><a href="{{ $web->ig }}" class="btn btn-icon btn-sm border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-indigo-600 hover:text-white hover:bg-indigo-600"><i data-feather="instagram" class="h-4 w-4"></i></a></li>
                        <li class="inline"><a href="{{ $web->twitter }}" class="btn btn-icon btn-sm border border-gray-100 dark:border-gray-800 rounded-md text-slate-400 hover:border-indigo-600 hover:text-white hover:bg-indigo-600"><i data-feather="twitter" class="h-4 w-4"></i></a></li>
                    </ul><!--end icon-->
                </div>
            </div>
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->
    
@endsection