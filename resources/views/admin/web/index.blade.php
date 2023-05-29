@extends('layouts.master')

@section('content')

<br>
    
<div class="row">
    
<div class="col-lg-12">
    
    <div class="card-box">
        <h3>Web Setting</h3>
        <br>
        <div class="alert alert-primary" id="pesan-sukses" role="alert"></div>
        @if ($message = Session::get('sukses'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="table-responsive mt-2">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>No Telpon</th>
                        <th>Alamat</th>
                        <th>Logo</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dat as $da)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $da->nama}}</td>
                        <td>{{ $da->tlp}}</td>
                        <td>{{ $da->alamat}}</td>
                        
                        <td><img src="{{ asset('foto/'.$da->logo) }}" height="40" width="auto"></td>
                        <td>
                            <a href="javascript:void(0)" data-toggle="tooltip"  data-id="{{ $da->id}}" data-original-title="Edit" class="btn edit  editData"><i class="icon-pencil"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div> 
</div>
</div>
        
<!-- modal -->
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
               
            </div>

            <div class="modal-body">
                @foreach ($dat as $item)
                <form id="productForm" name="productForm" action="{{ route('webseting.store') }}" enctype="multipart/form-data" method="POST">
                   <div id="pesan-error" class="alert alert-danger"></div>
                @csrf
                   <input type="hidden" name="data_id" id="data_id" value="1">
                      <div class="form-group">
                          <label for="foto" class="col-sm control-label">Nama Desa</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control required" id="nama" name="nama" required="">
                        </div>
                    </div>   
                    <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label">Deskripsi</label>
                        <div class="col-sm-12">
                            <textarea type="text" class="form-control required" id="deskripsi" name="deskripsi" required=""></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label">Fecebook</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="fb" name="fb" equired="">
                        </div>
                    </div>   
                    <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label">Instagram</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="ig" name="ig" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label">Twitter</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="twitter" name="twitter" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="email" name="email" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="col-sm control-label">No Telpon</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="tlp" name="tlp" required="">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label">Copyright</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control required" id="cp" name="cp" required="">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="keterangan" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-12">
                            <textarea id="alamat" name="alamat" required=""  class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label">Logo</label>
                        <div class="col-sm-12">
                        <div id="photos"></div>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label"></label>
                        <div class="col-sm-12">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto"
                                  aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" id="foto" name="foto" for="inputGroupFile01">{{ $item->logo }}</label>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label">Favicon</label>
                        <div class="col-sm-12">
                        <div id="favicon"></div>
                    </div>
                    <div class="form-group">
                        <label for="foto" class="col-sm-2 control-label"></label>
                        <div class="col-sm-12">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="favicon" name="favicon"
                                  aria-describedby="inputGroupFileAddon02">
                                <label class="custom-file-label" id="favicon" name="favicon" for="inputGroupFile02">{{ $item->favicon }}</label>
                            </div>
                        </div>
                    </div> --}}
                    <br>
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary upload-image" id="saveBtn" value="create">Save changes
                     </button>
                    </div>

                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
<img src="" alt="" > 
@endsection

@section('script')
<script>
    var konten = document.getElementById("");
      CKEDITOR.replace(,{
      language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
 </script>
<script type="text/javascript">
 $(document).ready(function() {

    $('#example').DataTable();
    });
    
    $('#pesan-error,#pesan-sukses').hide()
  $(function () {

     

      $.ajaxSetup({

          headers: {

              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

          }

    });

    

 
     


    

    $('body').on('click', '.editData', function () {

      var data_id = $(this).data('id');

      $.get("{{ route('webseting.index') }}" +'/' + data_id +'/edit', function (data) {

          $('#modelHeading').html("Ubah data");

          $('#saveBtn').val("edit-webseting");

          $('#ajaxModel').modal('show');

          $('#keterangan').val(data.keterangan);
          $('#cp').val(data.cp);
          $('#fb').val(data.fb);
          $('#ig').val(data.ig);
          $('#twitter').val(data.twitter);
          $('#alamat').val(data.alamat);
          $('#email').val(data.email);
          $('#tlp').val(data.tlp);
          $('#deskripsi').val(data.deskripsi);
          
          $('#data_id').val(data.id);
          $('#photos').html("<img src={{ URL::to('/') }}/foto/"+data.logo+"  width='100'>")
          $('#nama').val(data.nama);

          $('#data_id').val(data.id);
          $('#favicon').html("<img src={{ URL::to('/') }}/foto/"+data.favicon+"  width='100'>")
          $('#fav').val(data.fav);


      })

   });

    

        if ($("#productForm").length > 0) {
            $("#productForm").validate({

                submitHandler: function(form) {
                    $(this).parents("form").ajaxForm(options);

                }
            })
        }

        var options = { 

        complete: function(response) 

        {

            if($.isEmptyObject(response.responseJSON.error)){
                $('#ajaxModel').modal('hide');
                $('#pesan-sukses').html(data.pesan).fadeIn().delay(10000).fadeOut()
                $('#productForm').trigger("reset");
                
                table.draw();
            }

        }

    };




    $('body').on('click', '.deleteData', function () {

     

        var data_id = $(this).data("id");

        confirm("Are You sure want to delete !");

      

        $.ajax({

            type: "DELETE",

            url: "{{ route('webseting.store') }}"+'/'+data_id,

            success: function (data) {
                $('#pesan-sukses').html(data.pesan).fadeIn().delay(10000).fadeOut()
                table.draw();

            },

            error: function (data) {

                console.log('Error:', data);

            }

        });

    });

     

  });

</script>

@endsection