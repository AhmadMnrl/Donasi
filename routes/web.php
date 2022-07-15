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


// Yayasan
Route::prefix('api')->group(function () {
    Route::get('/test','TestController@show');
    Route::post('/test/create','TestController@createYayasan');
    Route::put('/test/update/{id}','TestController@updateYayasan');
    Route::delete('/test/delete/{id}','TestController@deleteYayasan');

    Route::get('/donatur','DonaturController@indexApi');

    Route::get('/yayasan','YayasanController@listYayasan');
    Route::get('/yayasan/detail/{id}','YayasanController@detailYayasan');

    Route::post('/donasi/submit','DonasiController@createApi');
    Route::get('/donasi','DonasiController@indexApi');

    Route::get('/barang_donatur','BarangDonaturController@listBarang');

    Route::get('/berita','BeritaController@indexApi');

    Route::get('/gallery','GalleryController@indexApi');

    Route::post('/loginApi','AuthController@postApi');

    Route::post('logoutApi','AuthController@logoutApi');

    Route::get('/detail/{id}','AuthController@detail');

    Route::post('/submit','AuthController@submitDonatur');
    Route::put('/donatur/update/{id}','AuthController@updateDonatur');
    Route::delete('/donatur/delete/{id}','AuthController@deleteDonatur');
});

Route::group(['middleware' => 'auth','revalidate'],function(){
    Route::get('/','DashboardController@index');

    Route::get('/change-password', 'ChangePasswordController@index');
    Route::post('/change-password/store', 'ChangePasswordController@store');
    Route::get('/donasi','DonasiController@index')->name('donasi');
    Route::post('/donasi/store','DonasiController@store');
    Route::get('/donasi/edit/{id}','DonasiController@edit');
    Route::put('/donasi/update/{id}','DonasiController@update');
    Route::get('/donasi/destroy/{id}','DonasiController@destroy');


    // Berita
    Route::get('/berita','BeritaController@index')->name('berita');
    Route::post('/berita/store','BeritaController@store');
    Route::get('/berita/destroy/{id}','BeritaController@destroy');

    Route::get('/gallery','GalleryController@index')->name('gallery');
    Route::post('/gallery/store','GalleryController@store');
    Route::get('/gallery/destroy/{id}','GalleryController@destroy');
    Route::get('/gallery/edit/{id}','GalleryController@edit');
    Route::post('/gallery/update/{id}','GalleryController@update');

    Route::get('/report','ReportController@indexReport')->name('report');
    Route::get('/report/export-excel-donasi', 'ReportController@export_excel')->name('export');

    Route::get('/generate','GenerateController@index');
    Route::get('/get-qr/{id}','GenerateController@getQR');
});

Route::group(['middleware' => ['auth','role:administrator','revalidate']],function(){
    Route::get('/test','TestController@indexYayasan');
    Route::get('/donatur','TestController@indexDonatur')->name('donatur');

    Route::get('/yayasan','YayasanController@index')->name('yayasan');
    Route::post('/yayasan/store','YayasanController@store');
    Route::get('/yayasan/edit/{id}','YayasanController@edit');
    Route::put('/yayasan/update/{id}','YayasanController@update');
    Route::get('/yayasan/destroy/{id}','YayasanController@destroy');

    Route::get('/profileYayasan/{id}','YayasanController@profileYayasan')->name('profileYayasan');

    Route::get('/barang','BarangDonaturController@index')->name('barang_donatur');
    Route::post('/barang_donatur/store','BarangDonaturController@store');
    Route::get('/barang_donatur/edit/{id}','BarangDonaturController@edit');
    Route::put('/barang_donatur/update/{id}','BarangDonaturController@update');
    Route::get('/barang_donatur/destroy/{id}','BarangDonaturController@destroy');

    Route::post('/donatur/store','DonaturController@store');
    Route::get('/donatur/edit/{id}','DonaturController@edit');
    Route::put('/donatur/update/{id}','DonaturController@update');
    Route::get('/donatur/destroy/{id}','DonaturController@destroy');


    Route::get('/user','UserController@userIndex');
    Route::post('/user/store','UserController@storeUser');
    Route::get('/user/edit/{id}','UserController@editUser');
    Route::put('/user/update/{id}','UserController@updateUser');
    Route::get('/user/destroy/{id}','UserController@DeleteUser');

    // Route::get('/profile/{id}','ProfileController@getProfile')->name('profile');
    // Route::put('/update/{id}','ProfileController@updateProfile');


});

Route::get('/login','AuthController@getLogin')->name('login');
Route::post('/postlogin','AuthController@postLogin');
Route::get('/logout','AuthController@logout');




