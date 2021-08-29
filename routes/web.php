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

Route::get('/','WelcomeController@index')->name('welcome');
Route::get('/dashboard','DashboardController@index')->name('dashboard');
Route::get('/login', 'LoginController@index')->name('login');
Route::get('/cuti', 'CutiController@index')->name('cuti');
Route::post('/category', 'CutiController@category')->name('category');
Route::get('/cuti/laporan', 'Staff\CutiController@index')->name('laporan');
Route::get('/cuti/kalender', 'Staff\CutiController@kalender')->name('kalender');
Route::get('/pengaturan', 'UserController@index')->name('user.pengaturan');
Route::get('/change_password', 'UserController@change_password')->name('user.password');
Route::post('/change_password', 'UserController@password')->name('user.password');
Route::post('/pengaturan','UserController@pengaturan')->name('user.change');
Route::get('/profile','UserController@profile')->name('user.profile');
Route::get('/logout',function() {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::get('/hrd/pengumuman', 'Admin\PengumumanController@index')->name('admin.pengumuman');
Route::delete('/hrd/pengumuman/{id}', 'Admin\PengumumanController@destroy')->name('pengumuman.destroy');
Route::post('/hrd/pengumuman/add', 'Admin\PengumumanController@add')->name('pengumuman.add');
Route::get('/hrd/cuti', 'Admin\CutiController@index')->name('admin.cuti');
Route::post('/hrd/cuti/konfirmasi/{id}', 'Admin\CutiController@konfirmasi')->name('admin.cuti.konfirmasi');
Route::post('/hrd/cuti/tolak/{id}', 'Admin\CutiController@tolak')->name('admin.cuti.tolak');
Route::get('/hrd/user', 'Admin\UserController@index')->name('admin.user');
Route::get('/hrd/user/{id}', 'Admin\UserController@edit')->name('admin.user.edit');
Route::post('/hrd/user/{id}', 'Admin\UserController@update')->name('admin.user.update');
Route::delete('/hrd/user/{id}', 'Admin\UserController@delete')->name('admin.user.delete');
Route::post('/hrd/create_user', 'Admin\UserController@add')->name('user.add');

Route::post('/cuti/addCuti', 'CutiController@addCuti')->name('cuti.add');
Route::get('/cuti/history','CutiController@history')->name('history.cuti');
Route::post('/authenticate', 'LoginController@authenticate')->name('authenticate');
Route::get('/forgot-password', function () {
    return view('auth.forgot');
});
