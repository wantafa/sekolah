<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return redirect(route('login'));
});

// Daftar
Route::get('/daftar', 'SiswaController@create')->name('daftar');
Route::post('/daftar', 'SiswaController@store')->name('daftar.store');

Route::group(['middleware' => 'auth'], function() {

    // SEKOLAH
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/sekolah', 'SekolahController@index')->name('sekolah.create');
    Route::post('/sekolah', 'SekolahController@store')->name('store');
    Route::get('/sekolah/{notes}/edit', 'SekolahController@edit')->name('edit');
    Route::patch('/sekolah/update/{notes}', 'SekolahController@update')->name('update');
    Route::get('/sekolah/show/{notes}', 'SekolahController@show')->name('show');
    Route::delete('/sekolah/{notes}', 'SekolahController@destroy')->name('sekolah.delete');
    
    // SISWA 
    Route::get('/siswa', 'SiswaController@index')->name('siswa.index');
    Route::post('/siswa', 'SiswaController@store')->name('siswa.store');
    Route::get('/siswa/{siswa}/edit', 'SiswaController@edit')->name('edit');
    Route::patch('/siswa/update/{siswa}', 'SiswaController@update')->name('update');
    Route::get('/siswa/show/{siswa}', 'SiswaController@show')->name('show');
    Route::delete('/siswa/{siswa}', 'SiswaController@destroy')->name('siswa.delete');
    
    // KELAS 
    Route::get('/kelas', 'KelasController@index')->name('kelas.index');
    Route::get('/data/kelas', 'KelasController@kelas')->name('kelas.data');
    Route::post('/kelas', 'KelasController@store')->name('kelas.store');
    Route::get('/kelas/{kelas}/edit', 'KelasController@edit')->name('edit');
    Route::patch('/kelas/update/{kelas}', 'KelasController@update')->name('update');
    Route::get('/kelas/show/{kelas}', 'KelasController@show')->name('show');
    Route::delete('/kelas/{kelas}', 'KelasController@destroy')->name('kelas.delete');
    

  // Profile
    Route::get('profile', 'Admin\UserController@profile')->name('profile');
    Route::post('profile', 'Admin\UserController@update')->name('updateProfile');
    Route::post('profile/image', 'Admin\UserController@ubahfoto')->name('ubahFoto');
    Route::patch('profile/password', 'Admin\UserController@ubahPassword')->name('ubahPassword');

  // Manajemen User
  Route::get('/manajemen_user', 'UserController@index')->name('manajemen_user.index');
  Route::post('/manajemen_user', 'UserController@store')->name('manajemen_user.store');
  Route::get('/manajemen_user/{manajemen_user}/edit', 'UserController@edit')->name('edit');
  Route::patch('/manajemen_user/update/{manajemen_user}', 'UserController@update')->name('update');
  Route::get('/manajemen_user/show/{manajemen_user}', 'UserController@show')->name('show');
  Route::delete('/manajemen_user/{manajemen_user}', 'UserController@destroy')->name('manajemen_user.delete');
});



