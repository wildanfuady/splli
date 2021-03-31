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

Route::prefix('product')->group(function () {
    // menampilkan data product without paginate
    Route::get('get_all_products', 'ProductController@index');
    // menampilkan data product without paginate 2
    Route::post('get_products', 'ProductController@get_products');
    // menampilkan data product by category;
    Route::post('get_products_category', 'ProductController@get_products_category');
    // menampilkan data stock product
    Route::post('get_quantity', 'ProductController@get_quantity');
    // menampilkan data product with paginate
    Route::get('get_all_paginates', 'ProductController@paginate');
    // menampilkan data product filter with paginate
    Route::get('get_all_filters', 'ProductController@product_filters');
    // menampilkan data product search with paginate
    Route::get('search/{name}', 'ProductController@search');
    // menampilkan data flash sale product
    Route::get('get_flash_sale_products', 'FlashSaleController@index');
    // menampilkan data top seller product
    Route::get('get_top_seller_products', 'ProductController@top_seller');
    // menampilkan data product yang paling banyak disukai
    Route::get('get_most_liked_products', 'ProductController@most_like');
    // menampilkan data product yang sale
    Route::get('get_sale_products', 'ProductController@sale');
});

Route::prefix('brand')->group(function () {
    // menampilkan semua data category
    Route::get('get_all_manufacturers', 'ManufactureController@index');
    // menampilkan semua data product berdasarkan Manufacture
    Route::get('get_all_products_by_brand/{id}', 'ManufactureController@get_all_products_by_brand');
});

Route::prefix('category')->group(function () {
    // menampilkan semua data category
    Route::get('get_all_categories', 'CategoryController@index');
    // menampilkan semua data product berdasarkan Manufacture
    Route::get('get_all_products_by_category/{id}', 'CategoryController@get_all_products_by_category');
});

Route::prefix('banner')->group(function () {
    // menampilkan semua data banner
    Route::get('get_all_banners', 'BannerController@index');
});

Route::prefix('news')->group(function () {
    // menampilkan semua data news
    Route::get('get_all_news', 'NewsController@index');
});

Route::prefix('news')->group(function () {
    // menampilkan semua data news
    Route::get('get_all_news', 'NewsController@index');
});

Route::prefix('general_setting')->group(function () {
    // menampilkan semua data news
    Route::get('get_official_contact', 'GeneralSettingController@index');
});

Route::prefix('cart')->group(function () {
    // route get cart by customers
    Route::post('get_cart_by_customer', 'CartController@get_cart_by_customer');
    // route add to cart
    Route::post('add_to_cart', 'CartController@add_to_cart');
    // route update cart
    Route::post('update', 'CartController@update');
    // route delete cart
    Route::post('delete', 'CartController@delete');
});

Route::prefix('order')->group(function () {
    // route get order by customers
    Route::post('get_by_customers', 'OrderController@get_by_customers');
    // route search order by customers
    Route::post('search_by_customers', 'OrderController@search_by_customers');
});

Route::prefix('wishlist')->group(function () {
    // menampilkan data wishlist by user
    Route::post('get_wishlist_by_user', 'ProductController@get_wishlist_by_user');
    // menampilkan add wishlist by user
    Route::post('add_wishlist', 'ProductController@add_wishlist');
    // menampilkan delete wishlist by user
    Route::post('delete_wishlist', 'ProductController@delete_wishlist');
    // route search order by customers
    // Route::post('search_by_customers', 'WishlistController@search_by_customers');
});

Route::prefix('location')->group(function () {
    // route get countries
    Route::post('get_countries', 'LocationController@countries');
    // route get zones
    Route::post('get_zones', 'LocationController@zones');
    // route get cities
    Route::post('get_cities', 'LocationController@cities');
    // route get districts
    Route::post('get_districts', 'LocationController@districts');
    // route get zipcode
    Route::post('get_zipcode', 'LocationController@zipcode');
});

Route::prefix('user')->group(function () {
    // proses login
    Route::post('proses_login', 'UserController@proses_login');
    // proses register
    Route::post('proses_register', 'UserController@proses_register');
    // menampilkan get profile by user
    Route::post('get_profile', 'UserController@get_profile');
    //// route untuk ubah profile
    Route::post('ubah_profile', 'UserController@ubah_profile');
    //// route untuk ubah password
    Route::post('update_password', 'UserController@update_password');
    //// route untuk lupa password
    Route::post('forgot_password', 'UserController@forgot_password');
    //// route untuk upgrade level
    Route::post('upgrade_level', 'UserController@upgrade_level');
    //// route untuk upgrade confirmation
    Route::post('upgrade_confirmation', 'UserController@upgrade_confirmation');
    //// route untuk get rangking
    Route::post('get_rangking', 'UserController@get_rangking');
});

Route::prefix('bank')->group(function () {
    // menampilkan get all bank
    Route::post('get_all_banks', 'ConfirmationController@confirmation');
});

Route::prefix('shipping')->group(function () {
    // menampilkan get all bank
    Route::post('get_all_shipping', 'ShippingController@shippingmethod');
});

Route::prefix('deposit')->group(function () {
    // all deposite
    Route::post('top_up', 'DepositController@top_up');
});

Route::prefix('alamat')->group(function () {
    // menampilkan get alamat by user
    Route::post('get_all_address', 'AddressController@get_all_address');
    // menampilkan get alamat default by user
    Route::post('get_default_address', 'AddressController@get_default_address');
    // tambah alamat pengiriman by user
    Route::post('add_shipping_address', 'AddressController@add_shipping_address');
    // update alamat pengiriman by user
    Route::post('update_shipping_address', 'AddressController@update_shipping_address');
    // delete alamat pengiriman by user
    Route::post('delete_shipping_address', 'AddressController@delete_shipping_address');
    // update default alamat pengiriman by user
    Route::post('update_default_address', 'AddressController@update_default_address');
});

Route::group(['middleware' => 'auth:api'], function(){
    
   
}); 


Route::resource('barangs', 'BarangAPIController');

Route::resource('uang_keluars', 'UangKeluarAPIController');

Route::resource('stok_barangs', 'StokBarangAPIController');

Route::resource('logs', 'LogAPIController');

Route::resource('uang_diluars', 'UangDiluarAPIController');

Route::resource('pembayarans', 'PembayaranAPIController');

Route::resource('hasil_usahas', 'HasilUsahaAPIController');