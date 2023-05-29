@extends('frontend.index')

@section('content')
<!-- Start Section-->
<section class="relative md:py-24 py-16">

    <div class="container">
        <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
            <div class="lg:col-span-7 md:col-span-6">
                <img src="tail/assets/images/contact.svg" alt="">
            </div>

            <div class="lg:col-span-5 md:col-span-6 mt-8 md:mt-0">
                <div class="lg:ml-5">
                    <div class="bg-white dark:bg-slate-900 rounded-md shadow dark:shadow-gray-800 p-6">
                        <h3 class="mb-6 text-2xl leading-normal font-medium">Aspirasi</h3>
                        @if ($message = Session::get('sukses'))
                        <strong class="text-green-600">{{ $message }}</strong>
                        @endif
                        <form method="POST" action="{{ route('aspirations.store') }}" enctype="multipart/form-data" name="myForm" id="myForm" onsubmit="return validateForm()">
                            @csrf
                            <p class="mb-0" id="error-msg"></p>
                            <div id="simple-msg"></div>
                            <div class="grid grid-cols-1">
                                <div class="lg:col-span-6 mb-5">
                                    <div class="text-left">
                                        <label for="name" class="font-semibold">Nama:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="user" class="w-4 h-4 absolute top-3 left-4"></i>
                                            <input name="name" id="name" type="text" class="form-input pl-11" placeholder="Name :" value="{{ old('name') }}">
                                        </div>
                                        @error('name')
                                            <p class="mb-0 text-red-600">{{ $errors->first('name') }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1">
                                <div class="mb-5">
                                    <div class="text-left">
                                        <label for="subject" class="font-semibold">Email:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="book" class="w-4 h-4 absolute top-3 left-4"></i>
                                            <input name="email" id="email" class="form-input pl-11" placeholder="Email :" value="{{ old('email') }}">
                                        </div>
                                        <p class="mb-0 text-red-600">{{ $errors->first('email') }}</p>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-left">
                                        <label for="subject" class="font-semibold">Phone:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="book" class="w-4 h-4 absolute top-3 left-4"></i>
                                            <input name="phone" id="phone" class="form-input pl-11" placeholder="Phone :" value="{{ old('phone') }}">
                                        </div>
                                        <p class="mb-0 text-red-600">{{ $errors->first('phone') }}</p>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <div class="text-left">
                                        <label for="subject" class="font-semibold">Subjek:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="book" class="w-4 h-4 absolute top-3 left-4"></i>
                                            <input name="subject" id="subject" class="form-input pl-11" placeholder="Subject :" value="{{ old('subject') }}">
                                        </div>
                                        <p class="mb-0 text-red-600">{{ $errors->first('subject') }}</p>
                                    </div>
                                </div>

                                <div class="mb-5">
                                    <div class="text-left">
                                        <label for="comments" class="font-semibold">Deskripsi:</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="message-circle" class="w-4 h-4 absolute top-3 left-4"></i>
                                            <textarea name="description" id="description" class="form-input pl-11 h-28" placeholder="Message :">{{ old('description') }}</textarea>
                                        </div>
                                        <p class="mb-0 text-red-600">{{ $errors->first('description') }}</p>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" id="submit" name="send" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md justify-center flex items-center">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end container-->
</section><!--end section-->
<!-- End Section-->
@endsection