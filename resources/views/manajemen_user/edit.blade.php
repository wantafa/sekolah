 <div class="row">
     <div class="col-md-6">
         <div class="form-group">
             <input type="hidden" value="{{ $user->id }}" id="id_data" />
             <label>Nama User</label> <b><span class="text-danger" id="nameError"></span></b>
             <input id="name" name="name" placeholder="Masukkan Nama User" type="text" class="form-control"
                 value="{{$user->name}}">
         </div>
     </div>
     <div class="col-md-6">
         <div class="form-group">
             <label>Username</label> <b><span class="text-danger" id="usernameError"></span></b>
             <input id="username" name="username" placeholder="Masukkan Username" type="text" class="form-control"
                 value="{{$user->username}}">
         </div>
     </div>
     <div class="col-md-6">
         <div class="form-group">
             <label>Role Akses</label> 
             <select id="dinamik" name="role" class="form-control border-primary">
                <option value="{{$user->role}}">{{$user->role}}</option>
                <option value="admin">Admin</option>
            </select>
            <br>
         </div>
     </div>
     <div class="col-md-6">
         <div class="form-group">
             <label>Pilih Kelas</label> 
             <select name="kelas_id" class="form-control border-primary">
                 @foreach ($kelas as $item)
                 <option value="{{$item->id}}">{{$item->nama_kelas}}</option>
                 @endforeach
            </select>
            <br>
         </div>
     </div>
     <div class="col-md-6">
        <div class="form-group">
     <label>Tambah Role Akses</label>
        <div class="input-group mb-5">
      <input class="form-control" type="text" id="add_valu" name="role" placeholder="Masukkan Role Akses">
      <br>
      <div class="input-group-append">
        <button class="btn btn-warning btn-sm" type="button" id="btn_add_val">Tambah Role</button>
    </div>
    </div>
        </div>
    </div>
     <div class="col-md-6">
         <div class="form-group">
             <label>Email</label> <b><span class="text-danger" id="emailError"></span></b>
             <input id="email" name="email" placeholder="Masukkan Email" type="email" class="form-control"
                 value="{{$user->email}}">
         </div>
     </div>
     <div class="col-md-6">
         <div class="form-group">
             <label>Password</label> <b><span class="text-danger" id="passwordError"></span></b>
             <input id="password" name="password" placeholder="Masukkan Password" type="password" class="form-control"
                 value="">
         </div>
     </div>
