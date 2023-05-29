@extends('layouts.master')

@section('content')

<br>
    
<div class="row">
<div class="col-lg-12">
    <div class="card-box">
      <h3>Aspirasi</h3>
      <br>
      <a href="{{ url('/brita') }}" type="button" class="btn btn-outline-dark waves-effect waves-light width-md" id="createNewData">Back</a>
      <hr>
        <div class="form-group-responsive mt-2">
            <h4>Detail</h4>
            @if ($data)
            <form action="{{ route('brita.update', $data->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                <input type="hidden" name="penulis" id="penulis" value="{{ $data->penulis }}" required="">
                <div class="form-group row">
                  <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control required" id="judul" name="judul" value="{{ $data->judul }}" required="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                  <div class="col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-default">{{ url('') }}/</span>
                      <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{ $data->slug }}">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="foto" class="col-sm-2 col-form-label">Gambar</label>
                  <div class="col-sm-3">
                    <img src="{{ asset('foto/'.$data->foto) }}" id="preview" class="img-thumbnail">
                    <input type="file" name="foto" id="foto" class="file" >
                    <div class="input-group my-3">
                      <input type="text" class="form-control" placeholder="{{ $data->foto }}" value="{{ $data->foto }}" id="foto" name="foto">
                      <div class="input-group-append">
                        <button type="button" class="browse btn btn-primary">Browse...</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="keterangan" class="col-sm-2 col-form-label">Content</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="keterangan" name="keterangan" rows="8">{{ $data->keterangan }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                  <label for="created_at" class="col-sm-2 col-form-label">Publish Date</label>
                  <div class="col-sm-2">
                    <input type="datetime" class="form-control" id="created_at" name="created_at" value="{{ $data->created_at->format('d M Y') }}" readonly>
                  </div>
                </div>
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary upload-image" id="saveBtn" value="create">Update</button>
                </div>
            </form>
            @endif
        </div>
    </div> 
</div>
</div>
@endsection
@section('script')
<script>
  var konten = document.getElementById("keterangan");
    CKEDITOR.replace(keterangan,{
    language:'en-gb'
  });
  CKEDITOR.config.allowedContent = true;
</script>
<script>
  $(document).on("click", ".browse", function() {
  var file = $(this).parents().find(".file");
  file.trigger("click");
  });
  $('input[type="file"]').change(function(e) {
    var fileName = e.target.files[0].name;
    $("#file").val(fileName);

    var reader = new FileReader();
    reader.onload = function(e) {
      // get loaded data and render thumbnail.
      document.getElementById("preview").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
  });
</script>
@endsection