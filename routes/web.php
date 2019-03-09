<?php

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
    return view('welcome');
});

Auth::routes();
Route::prefix('/dashboard')->group(function () {
    Route::get('', 'DashboardController@index')->name('dashboard.index');
});

Route::prefix('/dompet')->group(function () {
	Route::get('', 'DompetController@index')->name('dompet.index');
	Route::get('create', 'DompetController@create')->name('dompet.create');
    Route::post('store', 'DompetController@store')->name('dompet.store');
    Route::get('active/{dompet}', 'DompetController@active')->name('dompet.active');
    Route::get('nonactive/{dompet}', 'DompetController@nonactive')->name('dompet.nonactive');
	Route::get('{dompet}', 'DompetController@show')->name('dompet.show');
	Route::get('edit/{dompet}', 'DompetController@edit')->name('dompet.edit');
	Route::post('update/{dompet}', 'DompetController@update')->name('dompet.update');
	Route::delete('{dompet}', 'DompetController@destroy')->name('dompet.destroy');
});

Route::prefix('/kategori')->group(function () {
	Route::get('', 'KategoriController@index')->name('kategori.index');
	Route::get('create', 'KategoriController@create')->name('kategori.create');
    Route::post('store', 'KategoriController@store')->name('kategori.store');
    Route::get('active/{kategori}', 'KategoriController@active')->name('kategori.active');
    Route::get('nonactive/{kategori}', 'KategoriController@nonactive')->name('kategori.nonactive');
	Route::get('{kategori}', 'KategoriController@show')->name('kategori.show');
	Route::get('edit/{kategori}', 'KategoriController@edit')->name('kategori.edit');
	Route::post('update/{kategori}', 'KategoriController@update')->name('kategori.update');
	Route::delete('{kategori}', 'KategoriController@destroy')->name('kategori.destroy');
});

Route::prefix('/transaksi')->group(function () {
    Route::get('', 'TransaksiController@index')->name('transaksi.index');
    Route::get('transaksiin', 'TransaksiController@transaksiin')->name('transaksiin.index');
    Route::get('transaksiout', 'TransaksiController@transaksiout')->name('transaksiout.index');

	Route::get('laporan', 'TransaksiController@laporan')->name('transaksi.laporan');
	
	Route::get('createTransaksiOut', 'TransaksiController@createTransaksiOut')->name('transaksiout.create');    
	Route::get('createTransaksiIn', 'TransaksiController@createTransaksiIn')->name('transaksiin.create');    
	
	Route::post('laporan/result', 'TransaksiController@laporanresult')->name('transaksi.laporanresult');
	Route::post('storeTransaksiIn', 'TransaksiController@storeTransaksiIn')->name('transaksiin.store');
	Route::get('{transaksi}', 'TransaksiController@showTransaksiIn')->name('transaksiin.show');	

	Route::post('storeTransaksiOut', 'TransaksiController@storeTransaksiOut')->name('transaksiout.store');
	Route::get('{transaksi}', 'TransaksiController@showTransaksiOut')->name('transaksiout.show');
});
