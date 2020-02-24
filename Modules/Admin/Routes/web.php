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

Route::group(['prefix' => 'admincp', 'middleware' => 'CheckLoginAdmin'], function () {
	Route::get('/', 'AdminController@index')->name('admin.home');
});

Route::prefix('auth')->group(function () {
	Route::get('/login', 'AdminAuthController@getLogin')->name('admin.login');
	Route::post('/login', 'AdminAuthController@postLogin');
	Route::get('dang-xuat', 'AdminAuthController@getLogout')->name('get.logout.admin');
});