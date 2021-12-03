@extends ('layouts.master')
@section('title', 'Kelas')
@section('content')
<div class="content">
</div>

<div class="section-header">
    <h1>Kelas</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item">Kelas</div>
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
          <h4>Kelas</h4>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped" id="table-1">
              <thead>                                 
                <tr class="table-info">
                  <th>#</th>
                  <th>Nama Kelas</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>             
                @foreach ($kelas as $item)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $item->nama_kelas}}</td>
                  <td>
                  
                  <a href="#" data-id="{{$item->id}}" class="btn btn-icon btn-success btn-sm btn-show"><i class="far fa-eye"></i></a>
                  <a href="#" data-id="{{$item->id}}" class="btn btn-icon btn-primary btn-sm btn-edit"><i class="far fa-edit"></i></a>
                  <a href="#" data-id="{{$item->id}}" class="btn btn-icon btn-danger btn-sm swal-6 "><i class="fas fa-trash"></i></a>
                  <form action="{{ route('kelas.delete', $item->id) }}" id="delete{{ $item->id }}" method="POST">
                    @csrf        
                    @method('delete')
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
  </div>
    </section>
  @section('modal')

  {{-- MODAL TAMBAH DATA --}}
  <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('kelas.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label @error('nama_kelas') class="text-danger" @enderror>Nama Kelas @error('nama_kelas') | {{ $message }} @enderror</label>
                    <input id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas" type="text" class="form-control" value="{{old('nama_kelas')}}">
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
                  <h5 class="modal-title">Lihat Kelas</h5>
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
                  <h5 class="modal-title">Edit Kelas</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('store') }}" method="POST" id="form-edit" enctype="multipart/form-data">
              @method('PATCH')
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
@include('kelas.js.kelas-js')
@endpush