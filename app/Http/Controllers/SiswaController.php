<?php

namespace App\Http\Controllers;

use App\User;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'siswa') {
            Alert::error('Maaf..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/dashboard');
        }

        $siswa = Siswa::all();
        $no = 1;
        return view('siswa.index', compact('siswa', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.daftar');
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
            'nama_siswa' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = $request->all();

        $siswa = Siswa::create($data);

        User::where('id',$data)->create([
            'siswa_id' => $siswa->id,
            'name' => $request->nama_siswa,
            'username' => $request->username,
            'email' => $request->email,
            'password' =>Hash::make ($request->password),
        ]);

        alert()->success('Berhasil.','Silahkan Login');
        return redirect('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.edit', compact('siswa'));
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
            'nama_siswa' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required'
        ]);
       
        Siswa::where('id',$id)->update([
            'nama_siswa' => $request->nama_siswa,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin
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
        $item = Siswa::findOrFail($id);
        $item->delete();
        return redirect()->route('siswa.index');
    }
}
