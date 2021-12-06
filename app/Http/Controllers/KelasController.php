<?php

namespace App\Http\Controllers;

use App\User;
use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
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

        $kelas = Kelas::all();
        $no = 1;
        return view('kelas.index', compact('kelas', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nama_kelas' => 'required',
        ]);

        $data = $request->all();

        Kelas::create($data);
        
        alert()->success('Berhasil.','Data Kelas ditambahkan!');
        return redirect('kelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Kelas::find($id);
        return view('kelas.show', compact('kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::find($id);
        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required',
        ]);
       
        Kelas::where('id',$id)->update([
            'nama_kelas' => $request->nama_kelas,
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Kelas::findOrFail($id);
        $item->delete();
        return redirect()->route('kelas.index');
    }

    public function kelas()
    {
        if (Auth::user()->role == 'siswa') {
            $kelas = User::where('kelas_id', '=', Auth::user()->kelas_id)->get();
        }
            $kelas = User::all();
            $no = 1;
        return view('kelas.data_kelas', compact('kelas', 'no'));
    }
}
