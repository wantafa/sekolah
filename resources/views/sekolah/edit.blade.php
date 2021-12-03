 <div class="row">
     <div class="col-md-6">
         <div class="form-group">
          <input type="hidden" value="{{ $sekolah->id }}" id="id_data"/>
             <label>Nama Sekolah</label>
             <input id="nama_sekolah" name="nama_sekolah" placeholder="Masukkan Sekolah" type="text" class="form-control"
                 value="{{$sekolah->nama_sekolah}}" required>
         </div>
     </div>
     <div class="col-md-6">
         <div class="form-group">
             <label>Alamat</label>
             <input id="alamat" name="alamat" placeholder="Masukkan Alamat" type="text"
                 class="form-control" value="{{$sekolah->alamat}}" required>
         </div>
     </div>
     <div class="col-md-6">
         <div class="form-group">
             <label>Nomor Telepon</label>
             <input id="no_telp" name="no_telp" placeholder="Masukkan Nomor Telepon" type="number"
                 class="form-control" value="{{$sekolah->no_telp}}" required>
         </div>
     </div>