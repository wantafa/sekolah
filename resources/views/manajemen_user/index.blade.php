@extends ('layouts.master')
@section('title', 'Data User')
@section('content')
<div class="content">
</div>

<div class="section-header">
    <h1>Data User</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item">Data User</div>
    </div>
  </div>

    <section class="content" style="padding-top: 5px">
      <div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
          <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>Tambah Data User</button>
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
          <h4>Data User</h4>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped" id="table-1">
              <thead>                                 
                <tr class="table-primary">
                  <th>#</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Role Akses</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>             
                @foreach ($user as $item)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $item->name ?? null}}</td>
                  <td>{{ $item->username ?? null}}</td>
                  <td>{{ $item->role ?? null}}</td>
                  <td>{{ $item->email ?? null}}</td>
                  <td>
                  
                  <a href="#" data-id="{{$item->id}}" class="btn btn-icon btn-primary btn-sm btn-edit"><i class="far fa-edit"></i></a>
                  <a href="#" data-id="{{$item->id}}" class="btn btn-icon btn-danger btn-sm swal-6 "><i class="fas fa-trash"></i></a>
                  <form action="{{ route('manajemen_user.delete', $item->id) }}" id="delete{{ $item->id }}" method="post" style="display: inline-block;">
                     @method('delete')
                     @csrf        
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
                  <h5 class="modal-title">Tambah Data User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('manajemen_user.store') }}" method="POST">
                @csrf
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('name') class="text-danger" @enderror>Nama User @error('name') | {{ $message }} @enderror</label>
                      <input id="name" name="name" placeholder="Masukkan Nama" type="text" class="form-control" value="{{old('name')}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('username') class="text-danger" @enderror>Username @error('username') | {{ $message }} @enderror</label>
                      <input id="username" name="username" placeholder="Masukkan Username" type="text" class="form-control" value="{{old('username')}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('role') class="text-danger" @enderror>Role Akses @error('role') | {{ $message }} @enderror</label>
                      <select id="dynamic" name="role" class="form-control border-primary">
                        <option value="{{old('kategori')}}">-- Pilih Role --</option>
                        <option value="admin">Admin</option>
                    </select>
                    <br>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                 <label>Tambah Role Akses</label>
                    <div class="input-group mb-3">
                  <input class="form-control" type="text" id="add_val" name="role" placeholder="Masukkan Role Akses">
                  <br>
                  <div class="input-group-append">
                    <button class="btn btn-warning btn-sm" type="button" id="bt_add_val">Tambah Role</button>
                </div>
                </div>
                    </div>
                </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('email') class="text-danger" @enderror>Email @error('email') | {{ $message }} @enderror</label>
                      <input id="email" name="email" placeholder="Masukkan Email" type="email" class="form-control" value="{{old('email')}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label @error('password') class="text-danger" @enderror>Password @error('password') | {{ $message }} @enderror</label>
                      <input id="password" name="password" placeholder="Masukkan Password" type="password" class="form-control" value="{{old('password')}}">
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
                  <h5 class="modal-title">Lihat Data User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('manajemen_user.store') }}" method="POST" id="form-show">
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
                  <h5 class="modal-title">Edit Data User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="{{ route('manajemen_user.store') }}" method="POST" id="form-edit">
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
@include('manajemen_user.js.user-js')
@endpush