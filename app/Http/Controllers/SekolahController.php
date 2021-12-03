<?php

namespace App\Http\Controllers;

use Auth;
use Alert;
use App\Sekolah;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SekolahController extends Controller
{
    public function index() {
        if(Auth::user()->role == 'siswa') {
            Alert::error('Maaf..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/dashboard');
        }

        $sekolah = Sekolah::all();
        $no = 1;
        return view('sekolah.create', compact('sekolah', 'no'));
    }

    public function create() {
        //
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required'
        ]);

        $data = $request->all();

        Sekolah::create($data);
        
        alert()->success('Berhasil.','Data Sekolah ditambahkan!');
        return redirect('sekolah');
    }

    public function show($id)
    {
        $sekolah = Sekolah::find($id);
        if(Auth::user()->role == 'siswa') {
            Alert::error('Maaf..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/dashboard');
        }
        return view('sekolah.show', compact('sekolah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id)
     {
         $sekolah = Sekolah::find($id);
        if(Auth::user()->role == 'siswa') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/dashboard');
        }
       return view('sekolah.edit', compact('sekolah'));
     }
     
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required'
        ]);
       
        Sekolah::where('id',$id)->update([
            'nama_sekolah' => $request->nama_sekolah,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp
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
        $item = Sekolah::findOrFail($id);
        $item->delete();
        return redirect()->route('sekolah.create');
    }
}
