<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user = auth()->user();
    return view('user.profile', compact('user'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ubahPassword(Request $request)
    {
        $user = auth()->user();
        User::where('id', $user->id)
        ->update([
            'password' => Hash::make($request->password),
        ]);
        alert()->success('Berhasil.','Password telah diubah!');
        return redirect('dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ubahfoto(Request $request)
    {
        $image = $request->file('image');

        $user = auth()->user();
        $extension  = $image->extension();

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif'
    ]);

    if($user->image != '/uploads/images/profile/default.png') {
        File::delete(public_path().$user->image);

        $lokasi = '/uploads/images/profile/'.$user->name ."_". time() . '.' . $extension; 
        $request->file('image')->move("uploads/images/profile", $lokasi);
        $foto = $lokasi;
    } else {
        $foto = NULL;
    }
            User::where('id', $user->id)
                ->update([
                'image' => $foto,
            ]);
            alert()->success('Berhasil.','Foto telah diubah!');
            return redirect('/dashboard');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = auth()->user()->id;
        if ( User::where('id', $id)->update($request->only('name', 'email', 'username')) ) {
            alert()->success('Berhasil.','Profil telah diubah!');
            return redirect('dashboard');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
