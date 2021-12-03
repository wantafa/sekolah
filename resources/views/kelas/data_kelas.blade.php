@extends ('layouts.master')
@section('title', 'Data Kelasku')
@section('content')
<div class="content">
</div>

<div class="section-header">
    <h1>Data Kelasku</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item">Data Kelasku</div>
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
          <h4>Data Kelasku</h4>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped" id="table-1">
              <thead>                                 
                <tr class="table-info">
                  <th>#</th>
                  <th>Nama Siswa</th>
                  <th>Nama Kelas</th>
                </tr>
              </thead>
              <tbody>             
                @foreach ($kelas as $item)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $item->name}}</td>
                  <td>{{ $item->kelas->nama_kelas}}</td>
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

@endsection
@push ('page-scripts')
@include('kelas.js.kelas-js')
@endpush