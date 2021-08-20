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
Route::get('/logout',function() {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');
Route::get('/hrd/pengumuman', 'Admin\PengumumanController@index')->name('admin.pengumuman');
Route::post('/cuti/addCuti', 'CutiController@addCuti')->name('cuti.add');
Route::get('/cuti/history','CutiController@history')->name('history.cuti');
Route::post('/authenticate', 'LoginController@authenticate')->name('authenticate');
Route::get('/forgot-password', function () {
    return view('auth.forgot');
});
