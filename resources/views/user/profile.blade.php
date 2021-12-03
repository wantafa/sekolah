@extends ('layouts.master')
@section('title', 'Profil')
@section('content')
<div class="section-body">
</div>

<div class="section-header">
  <h1>Profile</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item">Profile</div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    @includeIf('partials.alert', ['errors' => $errors->all(), 'alert' => request()->session()->has('alert')])
    <div class="row mt-sm-4">
      <div class="col-12 col-lg-7 order-2 order-lg-1">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <form action="{{ route('updateProfile') }}" method="post">
                @csrf
                <div class="card-header">
                  <h4>Edit Profile Info</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="name">Nama</label>
                      <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                      @error('name')
                      <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group col-12">
                      <label for="name">Username</label>
                      <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ $user->username }}">
                      @error('username')
                      <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    <div class="form-group mb-0 col-12">
                      <label for="email">Email</label>
                      <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
                      @error('email')
                      <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Ubah Password</h4>
              </div>
              <form action="{{ route('ubahPassword') }}" method="POST">
                @csrf @method('patch')
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="password">Password Baru</label>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                      @error('password')
                      <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-5 order-1 order-lg-2">
        <div class="card profile-widget mt-0">
          <div class="card-header">
            <h4>Edit Profile Image</h4>
          </div>
          <form action="{{ route('ubahFoto') }}" method="POST" enctype="multipart/form-data" id="changeProfileImageForm">
            <div class="card-body d-flex justify-content-center">
              <div class="row">
                <div class="col-12 d-flex justify-content-center">
                  <img alt="image" src="{{ asset($user->image) }}" class="rounded-circle ml-0 shadow" style="width: 150px; height: 150px; background-size: cover">
                </div>
                <div class="col-12 py-0">
                  <hr class="my-4">
                </div>
                <div class="col-12 d-flex justify-content-center">
                  <label class="rounded-circle d-flex justify-content-center align-items-center" style="width: 200px; height: 200px; border: 2px dashed #6777ef; cursor: pointer" id="profileImage" for="image">
                    @csrf
                    <div id="dropArea">
                      <div class="m-0 pt-3 text-break">
                        <h6 class="mb-0">Pilih Foto Profil Kamu</h6>
                        <p class="mb-0 text-center">500 &times; 500</p>
                      </div>
                    </div>
                    <input type="file" name="image" class="d-none" id="image">
                  </label>
                </div>
              </div>
            </div>
            <div class="card-footer text-center">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      <div>
    </div>
  </div>
</div>

    @endsection


@push ('page-scripts')
@include('.user.js.foto')
@endpush