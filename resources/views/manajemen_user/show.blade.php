<div class="row">
    <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item">
            <h6 class="mb-0 mt-1">Hak Cuti</h6>
            <p class="mb-0">{{ $karyawan->hak_cuti }} Hari</p>
          </li>
          <li class="list-group-item">
            <h6 class="mb-0 mt-1">NIP</h6>
            <p class="mb-0">{{ $karyawan->nip }}</p>
          </li>
          <li class="list-group-item">
            <h6 class="mb-0 mt-1">Nama</h6>
            <p class="mb-0">{{ $karyawan->nama }}</p>
          </li>
          <li class="list-group-item">
            <h6 class="mb-0 mt-1">Dept</h6>
            <p class="mb-0">{{ $karyawan->dept }}</p>
          </li>
          
        </ul>
    </div>
        <div class="row">
          <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item">
            <h6 class="mb-0 mt-1">Grade</h6>
            <p class="mb-0">{{ $karyawan->grade }}</p>
          </li>
          <li class="list-group-item">
            <h6 class="mb-0 mt-1">Job</h6>
            <p class="mb-0">{{ $karyawan->job }}</p>
          </li>
          <li class="list-group-item">
            <h6 class="mb-0 mt-1">Nomor Telepon</h6>
            <p class="mb-0">{{ $karyawan->no_telp }}</p>
          </li>
      </ul>
      </div>