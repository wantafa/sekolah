 <div class="row">
     <div class="col-md-6">
         <div class="form-group">
          <input type="hidden" value="{{ $kelas->id }}" id="id_data"/>
             <label>Nama Kelas</label>
             <input id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas" type="text" class="form-control"
                 value="{{$kelas->nama_kelas}}" required>
         </div>
     </div>