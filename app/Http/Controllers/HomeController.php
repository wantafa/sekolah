<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
Use Alert;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        toast('Login Berhasil', 'success')->position('center')->width('300px')->timerProgressBar()->background('#DAEAEC');
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $note = Note::count();
        return view('index', compact('note'));
    }
}
