@extends('frontend.index')
@section('php')
<?php
    $structur = \App\Structurdesa::paginate('8');
    $post = \App\Brita::orderBy('id','DESC')->paginate('4');
?>
@endsection

@section('content')
<!-- Start Hero -->
<section class="relative table w-full py-32 lg:py-36 bg-[url('../../assets/images/blog/bg.webp')] bg-center bg-no-repeat" style=" background-image: url(<?= asset('tail/assets/images/blog/kopi.jpg') ;?>);">
  <div class="absolute inset-0 bg-black opacity-80"></div>
  <div class="container">
      <div class="grid grid-cols-1 pb-8 text-center mt-10">
          <h3 class="md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Kabar Terbaru</h3>
      </div><!--end grid-->
  </div><!--end container-->
  
  <div class="absolute text-center z-10 bottom-5 right-0 left-0 mx-3">
      <ul class="breadcrumb tracking-[0.5px] breadcrumb-light mb-0 inline-block">
         <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white"><a href="{{  url('') }}">Home</a></li>
          <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-white" aria-current="page">News</li>
      </ul>
  </div>
</section><!--end section-->
<div class="relative">
  <div class="shape absolute right-0 sm:-bottom-px -bottom-[2px] left-0 overflow-hidden z-1 text-white dark:text-slate-900">
      <svg class="w-full h-auto" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
      </svg>
  </div>
</div>
<!-- End Hero -->
<!-- Start Section-->
<section class="relative md:py-24 py-16">
  <div class="container">
      <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-[30px]">
        @foreach($post as $data)
          <div class="blog relative rounded-md shadow dark:shadow-gray-800 overflow-hidden">
              <img src="{{ asset('foto/'.$data->foto) }}" style="height: 280px; width:auto;" alt="{{ $data->judul}}">

              <div class="content p-6">
                  <a href="{{ url('/news/'.$data->slug) }}" class="title h5 text-lg font-medium hover:text-indigo-600 duration-500 ease-in-out">{{ $data->judul}}</a>
                  <p class="text-slate-400 mt-3"><?php
                    $num_char = 100;
                    echo substr($data->keterangan, 0, $num_char) . '..';
                      ?></p>
                  
                  <div class="mt-4">
                      <a href="{{ url('/news/'.$data->slug) }}" class="btn btn-link font-normal hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Read More <i class="uil uil-arrow-right"></i></a>
                  </div>
              </div>
          </div><!--blog end-->
          @endforeach
      </div>
  </div>
</section>
@endsection