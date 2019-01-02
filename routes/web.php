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
    return view('guest_view/home');
});


Route::group(["as" => "guest"],function(){
	//Route::get('/', function () {
	    return view('guest_view/home');
	});

	Route::get("/register","GuestController@register");
	Route::post("/register","GuestController@do_register");

	Route::get("/login","GuestController@login");
	Route::post("/login","GuestController@do_login");
	Route::get("/logout","GuestController@logout");


Route::group(["middleware"=>"admin","prefix" => "admin"],function(){
	Route::get("/","AdminController@list_buku");
	Route::get("/buku/tambah","AdminController@tambah_buku");
	Route::post("/buku/tambah","AdminController@do_tambah_buku");
	Route::get("/buku/hapus/{id}","AdminController@hapus_buku")->where('id','[0-9]+');
	Route::get("/buku/ubah/{id}","AdminController@ubah_buku")->where('id','[0-9]+');
	Route::post("buku/ubah/{id}","AdminController@do_ubah_buku")->where('id','[0-9]+');
	/*
		/admin
		/admin/buku/tambah
		/admin/buku/ubah
		/admin/buku/hapus	
	*/
});


