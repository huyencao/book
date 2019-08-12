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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['namespace' => 'Admin'], function() {
	Route::group(['prefix' => 'backend','middleware' => 'auth'], function() {
		Route::resource('user', 'UserController', [ 'except' => [
		    'show'
		]]);
//		Route::group(['prefix' => 'setting'], function() {
////		    Route::get('/',['as'=>'setting.get', 'uses'=>'SettingController@getSetting']);
////		    Route::post('/',['as'=>'setting.post', 'uses'=>'SettingController@postSetting']);
////		});

		Route::get('/', 'DashboardController@index');
		Route::resource('setting', 'SettingController');
		Route::resource('menu', 'MenuController');
        Route::resource('cate-news', 'CateNewsController');
        Route::resource('news', 'NewsController');
        Route::resource('cate-product', 'CateProductController');
        Route::resource('product', 'ProductController');
        Route::resource('banner', 'BannerController');
        Route::resource('contact-admin', 'ContactController');
        Route::resource('order', 'OrderController');
        Route::resource('class-room', 'ClassRoomController');
        Route::resource('subject', 'SubjectController');
    });
});

Route::group(['namespace' => 'Frontend'], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('gioi-thieu', 'AboutController@index')->name('about');
    Route::resource('lien-he', 'ContactController');
    Route::get('tin-tuc', 'NewsController@index')->name('news');
    Route::get('tin-tuc-chi-tiet/{slug}.html', 'NewsController@detail')->name('news.detail');
    Route::get('san-pham', 'ProductController@index')->name('home.product');
    Route::get('san-pham-chi-tiet/{slug}.html', 'ProductController@detail')->name('product.detail');
    Route::get('search', 'ProductController@search')->name('product.search');
    Route::post('comment', 'CommentController@store')->name('comment.store');
//    Route::post('order-cart', 'CartController@cart')->name('order-cart');
    Route::post('cart', 'CartController@cart')->name('cart');
    Route::get('cart', 'CartController@index')->name('cart');
    Route::get('update', 'CartController@update')->name('update');
    Route::get('delete/{rowId}', 'CartController@delete')->name('delete');
    Route::get('checkout', 'CheckoutController@index')->name('checkout');
    Route::get('district', 'CheckoutController@district')->name('district');
    Route::post('checkout/store', 'CheckoutController@store')->name('checkout.store');

});

Route::get('login',['as'=>'login', 'uses'=>'Auth\LoginController@getLogin']);
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');
