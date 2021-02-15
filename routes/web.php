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


Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
Route::post('/postlogin', 'App\Http\Controllers\AuthController@postlogin');
Route::get('/dashboard','App\Http\Controllers\DashboardController@index');
Route::get('/regis', 'App\Http\Controllers\InsertRegister@insert');
// Route::get('/dashboard3', function () {
//     return view('dashboard.coba');
// });

	// Route oleh Administrator
	Route::group(['middleware' => ['auth','checkRole:IsKepalaSekolah, IsAdmin']], function(){	
	// 	Route Peserta Didik
		Route::get('/pesertadidik', 'App\Http\Controllers\PesertadidikController@index');
		Route::post('/pesertadidik/store', 'App\Http\Controllers\PesertadidikController@store');
		Route::get('/pesertadidik/edit/{id}','App\Http\Controllers\PesertadidikController@edit');
		Route::patch('/pesertadidik/update/{id}','App\Http\Controllers\PesertadidikController@update');
		Route::get('/pesertadidik/show/{id}','App\Http\Controllers\PesertadidikController@show');
		Route::get('/pesertadidik/showkepsek/{id}','App\Http\Controllers\PesertadidikController@detail');
		Route::get('/ctk_pesertadidik','App\Http\Controllers\PesertadidikController@filter');
		Route::get('/pesertadidik/export','App\Http\Controllers\PesertadidikController@export');
		Route::get('/pesertadidik/pdf/{id}','App\Http\Controllers\PesertadidikController@pdf');
		Route::get('/cetaksiswa/{tahun_ajaran}','App\Http\Controllers\PesertadidikController@cetakfilter');
	
	// // 	Route Orangtua
		Route::get('/orangtua', 'App\Http\Controllers\OrangtuaController@index');
		Route::post('/orangtua/store', 'App\Http\Controllers\OrangtuaController@store');
		Route::get('/orangtua/edit/{id}','App\Http\Controllers\OrangtuaController@edit');
		Route::patch('/orangtua/update/{id}','App\Http\Controllers\OrangtuaController@update');
		Route::get('/orangtua/show/{id}','App\Http\Controllers\OrangtuaController@show');
		Route::get('/orangtua/showkepsek/{id}','App\Http\Controllers\OrangtuaController@detail');
		Route::get('/ctk_orangtua','App\Http\Controllers\OrangtuaController@filter');
		Route::get('/orangtua/export','App\Http\Controllers\OrangtuaController@export');
		Route::get('/orangtua/pdf/{id}','App\Http\Controllers\OrangtuaController@pdf');
		Route::get('penghasilan/{ids}','App\Http\Controllers\OrangtuaController@cetakfilter');
	
	// 	Route Mutasimasuk
		Route::get('/mutasimasuk', 'App\Http\Controllers\MutasimasukController@index');
		Route::post('/mutasimasuk/store', 'App\Http\Controllers\MutasimasukController@store');
		Route::get('/mutasimasuk/edit/{id}','App\Http\Controllers\MutasimasukController@edit');
		Route::patch('/mutasimasuk/update/{id}','App\Http\Controllers\MutasimasukController@update');
		Route::get('/mutasimasuk/show/{id}','App\Http\Controllers\MutasimasukController@show');
		Route::get('/mutasimasuk/showkepsek/{id}','App\Http\Controllers\MutasimasukController@detail');
		Route::get('/ctk_mutasimasuk','App\Http\Controllers\MutasiMasukController@filter');
		Route::get('/mutasimasuk/export','App\Http\Controllers\MutasimasukController@export');
		Route::get('/mutasimasuk/pdf/{id}','App\Http\Controllers\MutasimasukController@pdf');
		Route::get('/cetakmutasimsk/{tahun_ajaran}','App\Http\Controllers\MutasimasukController@cetakfilter');

	// 	Route Mutasikeluar
		Route::get('/mutasikeluar', 'App\Http\Controllers\MutasikeluarController@index');
		Route::post('/mutasikeluar/store', 'App\Http\Controllers\MutasikeluarController@store');
		Route::get('/mutasikeluar/edit/{id}','App\Http\Controllers\MutasikeluarController@edit');
		Route::patch('/mutasikeluar/update/{id}','App\Http\Controllers\MutasikeluarController@update');
		Route::get('/mutasikeluar/show/{id}','App\Http\Controllers\MutasikeluarController@show');
		Route::get('/mutasikeluar/showkepsek/{id}','App\Http\Controllers\MutasikeluarController@detail');
		Route::get('/ctk_mutasikeluar','App\Http\Controllers\MutasiKeluarController@filter');
		Route::get('/mutasikeluar/export','App\Http\Controllers\MutasikeluarController@export');
		Route::get('/mutasikeluar/pdf/{id}','App\Http\Controllers\MutasikeluarController@pdf');
		Route::get('/cetakmutasiklr/{tahun_ajaran}','App\Http\Controllers\MutasikeluarController@cetakfilter');

	// 	Route Alumni
		Route::get('/alumni', 'App\Http\Controllers\AlumniController@index');
		Route::post('/alumni/store', 'App\Http\Controllers\AlumniController@store');
		Route::get('/alumni/edit/{id}','App\Http\Controllers\AlumniController@edit');
		Route::patch('/alumni/update/{id}','App\Http\Controllers\AlumniController@update');
		Route::get('/alumni/show/{id}','App\Http\Controllers\AlumniController@show');
		Route::get('/alumni/showkepsek/{id}','App\Http\Controllers\AlumniController@detail');
		Route::get('/ctk_alumni','App\Http\Controllers\AlumniController@filter');
		Route::get('/alumni/export','App\Http\Controllers\AlumniController@export');
		Route::get('/alumni/pdf/{id}','App\Http\Controllers\AlumniController@pdf');
		Route::get('/cetakalumni/{tahun_ajaran}','App\Http\Controllers\AlumniController@cetakfilter');

	});


// Route::group(['middleware' => 'IsKepalaSekolah'], function(){
// 	// 	Route Peserta Didik
// 		Route::get('/pesertadidik', 'App\Http\Controllers\PesertadidikController@index');
// 		Route::post('/pesertadidik/store', 'App\Http\Controllers\PesertadidikController@store');
// 		Route::get('/pesertadidik/edit/{id}','App\Http\Controllers\PesertadidikController@edit');
// 		Route::patch('/pesertadidik/update/{id}','App\Http\Controllers\PesertadidikController@update');
// 		Route::get('/pesertadidik/show/{id}','App\Http\Controllers\PesertadidikController@show');

// 	// 	Route Orangtua
// 		Route::get('/orangtua', 'App\Http\Controllers\OrangtuaController@index');
// 		Route::post('/orangtua/store', 'App\Http\Controllers\OrangtuaController@store');
// 		Route::get('/orangtua/edit/{id}','App\Http\Controllers\OrangtuaController@edit');
// 		Route::patch('/orangtua/update/{id}','App\Http\Controllers\OrangtuaController@update');
// 		Route::get('/orangtua/show/{id}','App\Http\Controllers\OrangtuaController@show');
	
// 	// 	Route Mutasimasuk
// 		Route::get('/mutasimasuk', 'App\Http\Controllers\MutasimasukController@index');
// 		Route::post('/mutasimasuk/store', 'App\Http\Controllers\MutasimasukController@store');
// 		Route::get('/mutasimasuk/edit/{id}','App\Http\Controllers\MutasimasukController@edit');
// 		Route::patch('/mutasimasuk/update/{id}','App\Http\Controllers\MutasimasukController@update');
// 		Route::get('/mutasimasuk/show/{id}','App\Http\Controllers\MutasimasukController@show');

// 	// 	Route Mutasikeluar
// 		Route::get('/mutasikeluar', 'App\Http\Controllers\MutasikeluarController@index');
// 		Route::post('/mutasikeluar/store', 'App\Http\Controllers\MutasikeluarController@store');
// 		Route::get('/mutasikeluar/edit/{id}','App\Http\Controllers\MutasikeluarController@edit');
// 		Route::patch('/mutasikeluar/update/{id}','App\Http\Controllers\MutasikeluarController@update');
// 		Route::get('/mutasikeluar/show/{id}','App\Http\Controllers\MutasikeluarController@show');

// 	// 	Route Alumni
// 		Route::get('/alumni', 'App\Http\Controllers\AlumniController@index');
// 		Route::post('/alumni/store', 'App\Http\Controllers\AlumniController@store');
// 		Route::get('/alumni/edit/{id}','App\Http\Controllers\AlumniController@edit');
// 		Route::patch('/alumni/update/{id}','App\Http\Controllers\AlumniController@update');
// 		Route::get('/alumni/show/{id}','App\Http\Controllers\AlumniController@show');
// 	});

// Auth::routes(); 

// Route::get('/admin', 'App\Http\Controllers\AdminController@index') -> middleware('auth');
// Route::get('/dashboard_admin','App\Http\Controllers\DashboardController@index');


// //route peserta didik crud user admin
// Route::resource('pesertadidik', 'App\Http\Controllers\PesertadidikController');
// Route::get('index', 'App\Http\Controllers\PesertadidikController@index');	
// Route::get('listpesertadidik', 'App\Http\Controllers\PesertadidikController@list');	
// Route::get('/editpesertadidik/edit/{id}', 'App\Http\Controllers\PesertadidikController@edit');	
// Route::patch('/pesertadidikedit/{id}', 'App\Http\Controllers\PesertadidikController@editpesertadidik');
// Route::get('/detailpesertadidik/detail/{id}','App\Http\Controllers\PesertadidikController@detailpesertadidik');	

// //route orang tua  crud user admin
// Route::resource('orangtua', 'App\Http\Controllers\OrangtuaController');
// Route::get('listortu', 'App\Http\Controllers\OrangtuaController@list');	
// Route::get('editortu/edit/{id}', 'App\Http\Controllers\OrangtuaController@edit');	
// Route::patch('ortuedit/{id}', 'App\Http\Controllers\OrangtuaController@editortu');
// Route::get('/detailorangtua/detail/{id}','App\Http\Controllers\OrangtuaController@detailorangtua');	

// //route mutasi masuk crud user admin
// Route::resource('mutasimasuk', 'App\Http\Controllers\MutasimasukController');
// Route::get('listmtsmasuk', 'App\Http\Controllers\MutasimasukController@list');	
// Route::get('editmtsmasuk/edit/{id}', 'App\Http\Controllers\MutasimasukController@edit');	
// Route::patch('mutasimasukedit/{id}', 'App\Http\Controllers\MutasimasukController@editmutasimasuk');
// Route::get('/detailmutasimasuk/detail/{id}','App\Http\Controllers\MutasimasukController@detailmutasimasuk');	
// //route mutasi keluar crud user admin
// Route::resource('mutasikeluar', 'App\Http\Controllers\MutasikeluarController');
// Route::get('listmtskeluar', 'App\Http\Controllers\MutasikeluarController@list');	
// Route::get('editmtskeluar/edit/{id}', 'App\Http\Controllers\MutasikeluarController@edit');	
// Route::patch('mutasikeluaredit/{id}', 'App\Http\Controllers\MutasikeluarController@editmutasikeluar');
// Route::get('/detailmutasikeluar/detail/{id}','App\Http\Controllers\MutasikeluarController@detailmutasikeluar');	

// //route alumni crud user admin
// Route::resource('alumni', 'App\Http\Controllers\AlumniController');
// Route::get('listalumni', 'App\Http\Controllers\AlumniController@list');	
// Route::get('editalumni/edit/{id}', 'App\Http\Controllers\AlumniController@edit');	
// Route::patch('alumniedit/{id}', 'App\Http\Controllers\AlumniController@editalumni');
// Route::get('/detailalumni/detail/{id}','App\Http\Controllers\AlumniController@detailalumni');	

// Route::get('master', function () {
//     return view('layout/master');
// });

// Route::get('dashboard', function () {
//     return view('layout/dashboard_admin');
// });

// Route::get('dashboard2', function () {
//     return view('layout/dashboard_kepsek');
// });

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
