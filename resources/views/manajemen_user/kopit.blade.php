@extends ('layouts.master')
@section('title', 'Your App Name')
@section('content')
<div class="content">
</div>

<div class="section-header">
    <h1>Barang</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item">Barang</div>
    </div>
  </div>

    <section class="content" style="padding-top: 5px">
      <div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
          <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>Tambah Data</button>
            @if (session('status'))
                <div class="">
                    {{ session('status') }}
                </div>
            @endif
    </div>
      </div>

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Note</h4>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped" id="table-1">
              <thead>                                 
                <tr class="table-info">
                  <th>#</th>
                  <th>Provinsi</th>
                  <th>Positif</th>
                  <th>Sembuh</th>
                  <th>Meninggal</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>             
                @foreach ($data as $item)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $item['attributes']['Provinsi']}}</td>
                  <td>{{ $item['attributes']['Kasus_Posi']}}</td>
                  <td>{{ $item['attributes']['Kasus_Semb']}}</td>
                  <td>{{ $item['attributes']['Kasus_Meni']}}</td>
                  {{-- <td>
                  <a href="#" data-id="{{$item->id}}" class="btn btn-icon btn-success btn-sm btn-show"><i class="far fa-eye"></i></a>
                  <a href="#" data-id="{{$item->id}}" class="btn btn-icon btn-primary btn-sm btn-edit"><i class="far fa-edit"></i></a>
                  <a href="#" data-id="{{$item->id}}" class="btn btn-icon btn-danger btn-sm swal-6 "><i class="fas fa-trash"></i></a>
                  <form action="{{ route('barang.delete', $item->id) }}" id="delete{{ $item->id }}" method="post" style="display: inline-block;">
                     @method('delete')
                     @csrf        
                    </form>
                    </td> --}}
                  </tr>
                @endforeach                    
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
    </section>
  @section('modal')

  {{-- MODAL TAMBAH DATA --}}
  <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Tambah Note</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('store') }}" method="POST">
                @csrf
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('title') class="text-danger" @enderror>Title @error('title') | {{ $message }} @enderror</label>
                      <input id="title" name="title" placeholder="Masukkan Title" type="text" class="form-control" value="{{old('title')}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('description') class="text-danger" @enderror>Deskripsi @error('description') | {{ $message }} @enderror</label>
                      <input id="description" name="description" placeholder="Masukkan Deskripsi" type="text" class="form-control" value="{{old('description')}}">
                    </div>
                  </div>
            </div>
          </div>
              <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
      </div>
  </div>

  {{-- MODAL LIHAT DATA --}}
  <div class="modal fade" tabindex="-1" role="dialog" id="modal-lihat">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Lihat Note</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('store') }}" method="POST" id="form-show">
                @csrf
              <div class="modal-body">
                
              </div>
              <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                  {{-- <button type="submit" class="btn btn-primary">Simpan</button> --}}
              </div>
            </form>
          </div>
      </div>
  </div>

  {{-- MODAL EDIT DATA --}}
  <div class="modal fade" tabindex="-1" role="dialog" id="modal-edit">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Edit Note</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('store') }}" method="POST" id="form-edit">
              {{-- @method('patch') --}}
                @csrf
              <div class="modal-body">

              </div>
              <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                  <button type="button" class="btn btn-primary btn-update">Simpan</button>
              </div>
            </form>
          </div>
      </div>
  </div>
  @endsection

@endsection
@push ('page-scripts')


<script>
  @if($errors->any())
      $('#exampleModal').modal('show')
  @endif

  $(".swal-6").click(function(e) {
    id = e.target.dataset.id;
  swal({
      title: 'Kamu Yakin Mau Hapus?',
      text: 'Jika di Hapus, Data akan hilang!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      swal('Data Berhasil di  Hapus :)', {
        icon: 'success',
      });
      $(`#delete${id}`).submit();
      } else {
      swal('Your imaginary file is safe!');
      }
    });
});

      $('.btn-edit').on('click', function() {
        let id = $(this).data('id')
        $.ajax({
          url:`/barang/${id}/edit`,
          method:"GET",
          success: function(data) {
            $('#modal-edit').find('.modal-body').html(data)
            $('#modal-edit').modal('show')
          },
          error:function(error){
            console.log(error)
          }
        })
      })

      $('.btn-update').on('click', function() {
        let id = $('#form-edit').find('#id_data').val()
        let formData = $('#form-edit').serialize()
        $.ajax({
          url:`/barang/update/${id}`,
          method:"PATCH",
          data:formData,
          success: function(data) {
            // $('#modal-edit').find('.modal-body').html(data)
            $('#modal-edit').modal('hide')
            window.location.assign('/barang')
          },
          error:function(err){
            console.log(err)
          }
        })
      })

      $('.btn-show').on('click', function() {
        let id = $(this).data('id')
        $.ajax({
          url:`/barang/show/${id}`,
          method:"GET",
          success: function(data) {
            $('#modal-lihat').find('.modal-body').html(data)
            $('#modal-lihat').modal('show')
          },
          error:function(error){
            console.log(error)
          }
        })
      })
</script>
@endpush