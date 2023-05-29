@extends('layouts.master')

@section('content')

<br>
    
<div class="row">
<div class="col-lg-12">
    <div class="card-box">
      <h3>Aspirasi</h3>
      <br>
      <a href="{{ url('/aspirations') }}" type="button" class="btn btn-outline-dark waves-effect waves-light width-md" id="createNewData">Back</a>
      <hr>
        <div class="form-group-responsive mt-2">
          @if ($aspirasi)
            <h4>Detail</h4>
            <p>Dikirim pada: {{ $aspirasi->created_at }} WIB</p>
            <br>
            <form id="productForm" name="productForm" action="/aspirations/{{ $aspirasi->id }}" enctype="multipart/form-data" method="GET">
                {{ csrf_field() }}
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $aspirasi->name }}" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="subject" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" name="email" value="{{ $aspirasi->email }}" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="subject" class="col-sm-2 col-form-label">Phone</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $aspirasi->phone }}" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="subject" class="col-sm-2 col-form-label">Subjek</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="subject" name="subject" value="{{ $aspirasi->subject }}" readonly>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="deskripsi" name="deskripsi" rows="8" readonly>{{ $aspirasi->description }}</textarea>
                    </div>
                </div>
            </form>
            @endif
        </div>

    </div> 
</div>
</div>
@endsection