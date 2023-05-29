@extends('layouts.master')

@section('content')

<br>
    
<div class="row">
<div class="col-lg-12">
    <div class="card-box">
        <h3>Berita</h3>
        <br>
        <a href="{{ url('berita/create') }}" class="btn btn-outline-dark waves-effect waves-light width-md" id="createNewData">Tambah Data</a>
        <br><br>
        <div class="alert alert-primary" id="pesan-sukses" role="alert"></div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="table-responsive">
            <table class="table mb-0" id="example" >
                <thead>
                    <tr>
                       <th>No.</th>
                        <th>Image</th>
                        <th>Judul</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($berita as $da)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ url('foto/'.$da->foto) }}" width="45px" alt=""></td>
                        <td>{{ $da->judul }}</td>
                        <td>{{ $da->created_at }}</td>
                        <td class="text-center">
                            <form action="{{ route('berita.destroy', $da->id) }}" method="POST">
                                <a href="{{ route('berita.edit', $da->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger show_confirm">HAPUS</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div> 
</div>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script type="text/javascript">

     $('.show_confirm').click(function(event) {

          var form =  $(this).closest("form");

          var name = $(this).data("judul");

          event.preventDefault();

          swal({

              title: `Are you sure you want to delete this record?`,

              text: "If you delete this, it will be gone forever.",

              icon: "warning",

              buttons: true,

              dangerMode: true,

          })

          .then((willDelete) => {

            if (willDelete) {

              form.submit();

            }

          });

      });

</script>
<script>
    $('#pesan-error,#pesan-sukses').hide()
</script>
@endsection