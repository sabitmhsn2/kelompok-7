@extends('layouts.master')

@section('content')

<br>
    
<div class="row">
<div class="col-lg-12">
    <div class="card-box">
      <h3>Visi & Misi</h3>
      <br>
      <a href="{{ url('/dashboard') }}" type="button" class="btn btn-outline-dark waves-effect waves-light width-md" id="createNewData">Back</a>
      <hr>
        <div class="form-group-responsive mt-2">
            <h4>Detail</h4>
            @foreach ($about as $data)
                
            
            <form action="{{ route('about-us.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Visi & Misi</label>
                    <div class="col-sm-8">
                        <input type="hidden" id="id" name="id" value="{{ $data->id }}">
                        <input type="hidden" id="id" name="id" value="{{ $data->id }}">
                        <textarea class="form-control" id="about" name="about" rows="8">{{ $data->about }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary upload-image" id="saveBtn" value="create">Save changes
                </button>
            </form>
            @endforeach
        </div>
    </div> 
</div>
</div>
@endsection
@section('script')
<script>
    var konten = document.getElementById("about");
      CKEDITOR.replace(about,{
      language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
  </script>
@endsection