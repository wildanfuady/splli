<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function(){
    
   
}); 

Route::get('pembayaran/find_barang/{id}', 'PembayaranAPIController@find_barang');


Route::resource('barangs', 'BarangAPIController');

Route::resource('uang_keluars', 'UangKeluarAPIController');

Route::resource('stok_barangs', 'StokBarangAPIController');

Route::resource('logs', 'LogAPIController');

Route::resource('uang_diluars', 'UangDiluarAPIController');

Route::resource('pembayarans', 'PembayaranAPIController');

Route::resource('hasil_usahas', 'HasilUsahaAPIController');