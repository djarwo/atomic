<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// /* Untuk pertama kali halaman diload */
// Route::get('/contoh', function () {
//     return view('template');
// });
// /*Untuk masuk pada halaman dashboard*/
// Route::get('dashboard', function () {
//     return view('pages.dashboard');
// });
Route::group(['middleware' => ['web']], function () {

Route::auth();
Route::get('/', 'HomeController@index');
Route::resource('/websetting', 'WebInfoController');
Route::resource('/user', 'UserController');
Route::resource('/background', 'BackgroundController');
Route::resource('client', 'ClientController');
Route::resource('sosialmedia', 'SosialMediaController');
Route::resource('kategorigallery', 'KategoriGalleryController');
Route::get('gallery', 'GalleryController@index');
Route::get('gallery/create', 'GalleryController@create');
Route::post('gallery', 'GalleryController@store');
Route::get('gallery/{kode_gallery}','GalleryController@show');
Route::put('gallery/{kode_gallery}','GalleryController@update');
Route::delete('gallery/{kode_gallery}','GalleryController@destroy');
Route::get('kontengallery/{kode_gallery}','KontenGalleryController@show');
Route::get('kontengallery/{kode_gallery}/create','KontenGalleryController@create');
Route::post('kontengallery','KontenGalleryController@store');
Route::get('kontengallery/{kode_konten_gallery}/edit','KontenGalleryController@edit');
Route::patch('kontengallery/{kode_konten_gallery}/{kode_gallery}','KontenGalleryController@update');
Route::delete('kontengallery/{kode_konten_gallery}/{kode_gallery}','KontenGalleryController@destroy');
Route::resource('company','CompanyController');
Route::get('kontak','KontakController@index');
Route::get('kontak/create','KontakController@create');
Route::post('kontak','KontakController@store');
Route::get('kontak/{kode_background}','KontakController@show');
Route::put('kontak/{kode_background}','KontakController@update');
Route::get('profile/{id}','ProfileController@show');
Route::put('profile/{id}','ProfileController@update');
Route::patch('profile/{id}/{kode}','ProfileController@updatepassword');
Route::resource('color','ColorController');

});
