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

Route::get('/', function () {
    return view('auth/login');
});

Route::post('/postlogin', 'App\Http\Controllers\AuthController@postlogin') -> middleware('CekLevel');

Route::get('/regis', 'App\Http\Controllers\InsertRegister@insert');


Auth::routes(); 

Route::get('/admin', 'App\Http\Controllers\AdminController@index') -> middleware('auth');

//route peserta didik crud user admin
Route::resource('pesertadidik', 'App\Http\Controllers\PesertadidikController');
Route::get('index', 'App\Http\Controllers\PesertadidikController@index');	
Route::get('listpesertadidik', 'App\Http\Controllers\PesertadidikController@list');	
Route::get('/editpesertadidik/edit/{id}', 'App\Http\Controllers\PesertadidikController@edit');	
Route::patch('/pesertadidikedit/{id}', 'App\Http\Controllers\PesertadidikController@editpesertadidik');	
//route orang tua crud user admin
Route::resource('orangtua', 'App\Http\Controllers\OrangtuaController');
Route::get('listortu', 'App\Http\Controllers\OrangtuaController@list');	
Route::get('editortu/edit/{id}', 'App\Http\Controllers\OrangtuaController@edit');	
Route::patch('ortuedit/{id}', 'App\Http\Controllers\OrangtuaController@editortu');
//route mutasi masuk crud user admin
Route::resource('mutasimasuk', 'App\Http\Controllers\MutasimasukController');
Route::get('listmtsmasuk', 'App\Http\Controllers\MutasimasukController@list');	
Route::get('editmtsmasuk/edit/{id}', 'App\Http\Controllers\MutasimasukController@edit');	
Route::patch('mutasimasukedit/{id}', 'App\Http\Controllers\MutasimasukController@editmutasimasuk');
//route mutasi keluar crud user admin
Route::resource('mutasikeluar', 'App\Http\Controllers\MutasikeluarController');
Route::get('listmtskeluar', 'App\Http\Controllers\MutasikeluarController@list');	
Route::get('editmtskeluar/edit/{id}', 'App\Http\Controllers\MutasikeluarController@edit');	
Route::patch('mutasikeluaredit/{id}', 'App\Http\Controllers\MutasikeluarController@editmutasikeluar');

//route alumni crud user admin
Route::resource('alumni', 'App\Http\Controllers\AlumniController');
Route::get('listalumni', 'App\Http\Controllers\AlumniController@list');	
Route::get('editalumni/edit/{id}', 'App\Http\Controllers\AlumniController@edit');	
Route::patch('alumniedit/{id}', 'App\Http\Controllers\AlumniController@editalumni');

Route::get('master', function () {
    return view('layout/master');
});

Route::get('dashboard', function () {
    return view('layout/dashboard_admin');
});

Route::get('admin', function () {
    return view('/adminLTE');
});



//Route user admin
//Route user kepala sekolah


//Route peserta didik oleh admin
//Route orang tua oleh admin
//Route mutasi masuk oleh admin
//Route mutasi keluar oleh admin
//Route alumni oleh admin


//Route peserta didik oleh kepala sekolah
//Route orang tua oleh kepala sekolah
//Route mutasi masuk didik oleh kepala sekolah
//Route mutasi keluar oleh kepala sekolah
//Route alumni oleh kepala sekolah
//Route statistik oleh kepala sekolah


//Route statistik peserta didik 
//Route statistik mutasi  
//Route statistik alumni 

//Route E-Report peserta didik 
//Route E-Report orang tua 
//Route E-Report mutasi masuk
//Route E-Report mutasi keluar
//Route E-Repor alumni




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
