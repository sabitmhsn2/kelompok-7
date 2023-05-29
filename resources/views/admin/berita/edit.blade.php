@extends('layouts.master')

@section('content')

<br>
    
<div class="row">
<div class="col-lg-12">
    <div class="card-box">
      <h3>Aspirasi</h3>
      <br>
      <a href="{{ url('/berita') }}" type="button" class="btn btn-outline-dark waves-effect waves-light width-md" id="createNewData">Back</a>
      <hr>
        <div class="form-group-responsive mt-2">
            <h4>Edit</h4>
            <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data"> 
                @csrf
                @method('PUT')
                {{-- <input type="hidden" name="id" id="id" value="{{ $berita->id }}"> --}}
                <input type="hidden" name="views" id="views">
                <input type="hidden" name="penulis" id="penulis" value="{{ $berita->penulis }}">
                <div class="form-group row">
                  <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control required" id="judul" name="judul" value="{{ old('judul', $berita->judul) }}" required="">
                    @error('judul')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                  <div class="col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-default">{{ url('') }}/</span>
                      <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="{{ old('slug', $berita->slug) }}">
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="foto" class="col-sm-2 col-form-label">Gambar</label>
                  <div class="col-sm-3">
                    <img src="{{ asset('foto/'.$berita->foto) }}" width="240" id="preview" class="img-thumbnail">
                    <input type="file" name="foto" id="foto" class="file" >
                    <div class="input-group my-3">
                      <input type="text" class="form-control @error('foto') is-invalid @enderror" placeholder="" value="{{ old('foto', $berita->foto) }}" id="foto" name="foto" required="">
                      <div class="input-group-append">
                        <button type="button" class="browse btn btn-primary">Browse...</button>
                      </div>
                      @error('foto')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="keterangan" class="col-sm-2 col-form-label">Content</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="keterangan" name="keterangan" rows="8">{{ old('keterangan', $berita->keterangan) }}</textarea>
                      @error('keterangan')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                      @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                <button type="reset" class="btn btn-md btn-warning">RESET</button>
            </form>
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