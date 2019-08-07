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
    });
});

Route::namespace('Frontend')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('about', 'AboutController@index')->name('about');
    Route::get('contact', 'ContactController@index')->name('contact');
    Route::get('news', 'NewsController@index')->name('news');
    Route::get('news-detail/{slug}', 'NewsController@detail')->name('news.detail');
    Route::get('product', 'ProductController@index')->name('product');
    Route::get('product-detail/{slug}', 'ProductController@detail')->name('product.detail');
});

Route::get('login',['as'=>'login', 'uses'=>'Auth\LoginController@getLogin']);
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');
