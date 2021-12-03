 <div class="row">
     <div class="col-md-6">
         <div class="form-group">
          <input type="hidden" value="{{ $siswa->id }}" id="id_data"/>
             <label>Nama Siswa</label>
             <input id="nama_siswa" name="nama_siswa" placeholder="Masukkan Nama Siswa" type="text" class="form-control"
                 value="{{$siswa->nama_siswa}}" required>
         </div>
     </div>
     <div class="col-md-6">
         <div class="form-group">
             <label>Alamat</label>
             <input id="alamat" name="alamat" placeholder="Masukkan Alamat" type="text"
                 class="form-control" value="{{$siswa->alamat}}" required>
         </div>
     </div>
     <div class="col-md-6">
         <div class="form-group">
             <label>Jenis Kelamin</label>
             <select name="jenis_kelamin" class="form-control">
                <option value="{{ $siswa->jenis_kelamin }}">{{ $siswa->jenis_kelamin }}</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
         </div>
     </div>