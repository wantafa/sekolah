@extends ('layouts.master')
@section('title', 'Your App Name')
@section('content')
<div class="content">
</div>

<div class="section-header">
    <h1>Siswa</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item">Siswa</div>
    </div>
  </div>

    <section class="content" style="padding-top: 5px">
      <div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
          {{-- <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>Tambah Data</button> --}}
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
          <h4>Siswa</h4>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped" id="table-1">
              <thead>                                 
                <tr class="table-info">
                  <th>#</th>
                  <th>Nama Siswa</th>
                  <th>Alamat</th>
                  <th>Jenis Kelamin</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>             
                @foreach ($siswa as $item)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $item->nama_siswa}}</td>
                  <td>{{ $item->alamat}}</td>
                  <td>{{ $item->jenis_kelamin}}</td>
                  <td>
                  
                  <a href="#" data-id="{{$item->id}}" class="btn btn-icon btn-success btn-sm btn-show"><i class="far fa-eye"></i></a>
                  <a href="#" data-id="{{$item->id}}" class="btn btn-icon btn-primary btn-sm btn-edit"><i class="far fa-edit"></i></a>
                  <a href="#" data-id="{{$item->id}}" class="btn btn-icon btn-danger btn-sm swal-6 "><i class="fas fa-trash"></i></a>
                  <form action="{{ route('siswa.delete', $item->id) }}" id="delete{{ $item->id }}" method="POST">
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

{{--  --}}
  {{-- MODAL LIHAT DATA --}}
  <div class="modal fade" tabindex="-1" role="dialog" id="modal-lihat">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Lihat Siswa</h5>
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
                  <h5 class="modal-title">Edit Siswa</h5>
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
@include('siswa.js.siswa-js')
@endpush