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
Route::get('/','GuestController@index')->name('home');
Route::get('/about','GuestController@about')->name('about');
Route::get('/footer','GuestController@footer')->name('footer');
Route::get('/detail/{produk}','GuestController@detail')->name('detail');
Route::get('/kategori/{kategori}','GuestController@kategori')->name('kategori');
Route::get('/search','GuestController@search')->name('search');
Route::get('/pesan/{produk}','GuestController@pesan')->name('pesan');
Route::post('/pesan/{produk}','GuestController@pesanStore');
Route::get('/notif','GuestController@notif')->name('notif');


Route::group(['prefix' => 'admin','middleware'=>['auth']], function(){
	Route::get('/','DashboardController@index')->name('dashboard');

	Route::resource('kategori','KategoriController');

	Route::resource('produk','ProdukController');

	Route::resource('pesanan','PesananController');

	Route::get('user/profil','UserController@profil')->name('user.profil');
	Route::post('user/profil','UserController@updateProfil');
	Route::get('user/profil','UserController@profil')->name('user.profil');
	Route::post('user/profil','UserController@profilUpdate')->name('user.profil.update');

	Route::resource('user','UserController');

});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
