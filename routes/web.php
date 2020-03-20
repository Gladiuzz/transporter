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

Route::get('clear', function() {
    \Artisan::call('config:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('config:cache');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');

    echo "success!";

});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function () {
        return view('admin.dashboard.index');
    });

    // dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index');
    });

    // jabatan
    Route::resource('jabatan', 'Admin\JabatanController')->except(['show']);
    Route::get('jabatan/ajax/datatable', 'Admin\JabatanController@datatable')->name('jabatan.ajax.datatable');

     // pengiriman
     Route::resource('pengiriman', 'Admin\PengirimanController')->except(['edit', 'update']);
     Route::get('pengiriman/ajax/datatable', 'Admin\PengirimanController@datatable')->name('pengiriman.ajax.datatable');

    // kas kecil
    Route::resource('kas-kecil', 'Admin\KasKecilController')->except(['show']);
    Route::get('kas-kecil/ajax/datatable', 'Admin\KasKecilController@datatable')->name('kas-kecil.ajax.datatable');

    // pegawai
    Route::resource('pegawai', 'Admin\PegawaiController');
    Route::get('pegawai/ajax/datatable', 'Admin\PegawaiController@datatable')->name('pegawai.ajax.datatable');
    Route::get('kota/data/{id}', 'Admin\PegawaiController@dataKota')->name('pegawai.data_kota');

    Route::get('pengiriman/invoice/code', 'Admin\PengirimanController@nomorInvoice');

    // User
    Route::resource('user', 'Admin\UserController');
    Route::get('user/ajax/datatable', 'Admin\UserController@datatable')->name('user.ajax.datatable');
    Route::get('kota/data/{id}', 'Admin\UserController@dataKota')->name('user.data_kota');

    Route::get('pengiriman/invoice/code', 'Admin\UserController@nomorInvoice');
});

Auth::routes();
