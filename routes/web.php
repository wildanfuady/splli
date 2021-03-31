<?php

use Illuminate\Support\Facades\Route;
use App\Mail\RegistrationEmail;
use Illuminate\Support\Facades\Mail;
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
Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->middleware('verified')->name('home');
Route::get('/home', 'HomeController@index')->middleware('verified');
Route::get('verification/{token}/{role}', 'UserController@verification');
Route::get('forget_password/{token}', 'UserController@forget_password');
Route::post('forget_password', 'UserController@forget_password_store');

Route::group(['middleware' => ['verified']], function () {
    
});


Route::resource('categories', 'CategoryController');

Route::resource('barangs', 'BarangController');

Route::resource('uangKeluars', 'UangKeluarController');

Route::resource('stokBarangs', 'StokBarangController');

Route::resource('logs', 'LogController');

Route::resource('uangDiluars', 'UangDiluarController');

Route::resource('pembayarans', 'PembayaranController');

Route::resource('hasilUsahas', 'HasilUsahaController');