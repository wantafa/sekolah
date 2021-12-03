<?php

namespace App\Http\Controllers;

use App\User;
use App\Kelas;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'karyawan' || Auth::user()->role == 'leader' || Auth::user()->role == 'section_head') {
            Alert::error('Maaf..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/dashboard');
        }
        $user = User::all();
        $no = 1;
        return view('manajemen_user.index', compact('user', 'no'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|',
            'email' => 'required|',
            'username' => 'required|min:5|',
            'password' => 'required|min:6|alpha_num',
            'role' => 'required',
        ],
      [
          'name.required' => 'Harus diisi',
          'name.min' => 'Minimal 5 digit',
          'name.alpha' => 'Nama Hanya Boleh Menggunakan Huruf',
          'username.required' => 'Harus diisi',
          'username.min' => 'Minimal 5 digit',
          'email.required' => 'Harus diisi',
          'email.min' => 'Minimal 6 digit',
          'password.required' => 'Harus diisi',
          'password.min' => 'Minimal 6 digit',
          'role.required' => 'Harus dipilih',
       ]);

        // $data = $request->all();
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' =>Hash::make($request->password),
            'role' => $request->role,
        ]);
        
        alert()->success('Berhasil','Data User ditambahkan!');
        return redirect('manajemen_user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $kelas = Kelas::all();
        if(Auth::user()->role == 'karyawan' || Auth::user()->role == 'leader' || Auth::user()->role == 'section_head') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/dashboard');
        }
       return view('manajemen_user.edit', compact('user','kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:5|regex:/^[a-zA-Z ]*$/',
            'email' => 'required|min:5',
            'username' => 'required|min:5|',
            'password' => 'min:6|alpha_num',
            'role' => 'required',
        ],
      [
          'name.required' => '| Harus diisi',
          'name.min' => '| Minimal 5 digit',
          'name.regex' => '| Nama Hanya Boleh Menggunakan Huruf',
          'username.required' => '| Harus diisi',
          'username.min' => '| Minimal 5 digit',
          'email.required' => '| Harus diisi',
          'email.min' => '| Minimal 5 digit',
          'password.min' => '| Minimal 6 digit',
          'role.required' => '| Harus dipilih',
       ]);

       User::where('id',$id)->update([
        'kelas_id' => $request->kelas_id,
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'password' =>Hash::make($request->password),
        'role' => $request->role,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::find($id);
        $item->delete();
        return redirect()->route('manajemen_user.index');
    }
}