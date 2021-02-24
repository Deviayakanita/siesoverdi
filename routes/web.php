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
		Route::get('/ctk_alumni','App\Http\Controllers\AlumniController@filter');
		Route::get('/alumni/export','App\Http\Controllers\AlumniController@export');
		Route::get('/alumni/pdf/{id}','App\Http\Controllers\AlumniController@pdf');
		Route::get('/cetakalumni/{tahun_ajaran}','App\Http\Controllers\AlumniController@cetakfilter');


	});

	// Route oleh Administrator
	Route::group(['middleware' => ['auth','checkRole:IsAdmin']], function(){	
	// 	Route Peserta Didik
		Route::post('/pesertadidik/store', 'App\Http\Controllers\PesertadidikController@store');
		Route::get('/pesertadidik/edit/{id}','App\Http\Controllers\PesertadidikController@edit');
		Route::patch('/pesertadidik/update/{id}','App\Http\Controllers\PesertadidikController@update');
		Route::get('/pesertadidik/show/{id}','App\Http\Controllers\PesertadidikController@show');
	
	// 	Route Orangtua
		Route::post('/orangtua/store', 'App\Http\Controllers\OrangtuaController@store');
		Route::get('/orangtua/edit/{id}','App\Http\Controllers\OrangtuaController@edit');
		Route::patch('/orangtua/update/{id}','App\Http\Controllers\OrangtuaController@update');
		Route::get('/orangtua/show/{id}','App\Http\Controllers\OrangtuaController@show');
	
	// 	Route Mutasimasuk
		Route::post('/mutasimasuk/store', 'App\Http\Controllers\MutasimasukController@store');
		Route::get('/mutasimasuk/edit/{id}','App\Http\Controllers\MutasimasukController@edit');
		Route::patch('/mutasimasuk/update/{id}','App\Http\Controllers\MutasimasukController@update');
		Route::get('/mutasimasuk/show/{id}','App\Http\Controllers\MutasimasukController@show');

	// 	Route Mutasikeluar
		Route::post('/mutasikeluar/store', 'App\Http\Controllers\MutasikeluarController@store');
		Route::get('/mutasikeluar/edit/{id}','App\Http\Controllers\MutasikeluarController@edit');
		Route::patch('/mutasikeluar/update/{id}','App\Http\Controllers\MutasikeluarController@update');
		Route::get('/mutasikeluar/show/{id}','App\Http\Controllers\MutasikeluarController@show');

	// 	Route Alumni
		Route::post('/alumni/store', 'App\Http\Controllers\AlumniController@store');
		Route::get('/alumni/edit/{id}','App\Http\Controllers\AlumniController@edit');
		Route::patch('/alumni/update/{id}','App\Http\Controllers\AlumniController@update');
		Route::get('/alumni/show/{id}','App\Http\Controllers\AlumniController@show');

	// Route Tahun Ajaran
		Route::get('/tahunajaran', 'App\Http\Controllers\TahunController@index');
		Route::post('/tahunajaran/store', 'App\Http\Controllers\TahunController@store');
		Route::get('/tahunajaran/edit/{id}','App\Http\Controllers\TahunController@edit');

	});

	// Route oleh KepalaSekolah
		Route::group(['middleware' => ['auth','checkRole:IsKepalaSekolah']], function(){

	// Route pesertadidik
		Route::get('/pesertadidik/showkepsek/{id}','App\Http\Controllers\PesertadidikController@detail');
		Route::get('/statistikpesertadidik', 'App\Http\Controllers\PesertadidikController@statistik');

	// Route orangtua
		Route::get('/orangtua/showkepsek/{id}','App\Http\Controllers\OrangtuaController@detail');

	// Route mutasimasuk
		Route::get('/mutasimasuk/showkepsek/{id}','App\Http\Controllers\MutasimasukController@detail');
		Route::get('/statistikmtsmasuk', 'App\Http\Controllers\MutasimasukController@statistik');

	// Route mutasikeluar
		Route::get('/mutasikeluar/showkepsek/{id}','App\Http\Controllers\MutasikeluarController@detail');
		Route::get('/statistikmtskeluar', 'App\Http\Controllers\MutasikeluarController@statistik');

	// Route alumni
		Route::get('/alumni/showkepsek/{id}','App\Http\Controllers\AlumniController@detail');
		Route::get('/statistikalumni', 'App\Http\Controllers\AlumniController@statistik');

	});




Route::get('admin', function () {
    return view('/adminLTE');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
