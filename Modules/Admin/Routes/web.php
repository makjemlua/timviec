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

Route::prefix('auth')->group(function () {
	Route::get('/login', 'AdminAuthController@getLogin')->name('admin.login');
	Route::post('/login', 'AdminAuthController@postLogin');
	Route::get('dang-xuat', 'AdminAuthController@getLogout')->name('get.logout.admin');
});

Route::group(['prefix' => 'admincp', 'middleware' => 'CheckLoginAdmin'], function () {
	Route::get('/', 'AdminController@index')->name('admin.home');

	//Nhà tuyển dụng
	Route::group(['prefix' => 'employers', 'middleware' => 'CheckRoleMod'], function () {
		Route::get('/index', 'AdminEmployerController@index')->name('admin.get.index.employer');

		Route::get('/account', 'AdminEmployerController@account')->name('admin.get.account.employer');
		Route::get('/account/vip/{active}/{id}', 'AdminEmployerController@actionVip')->name('action.employer.account');

		Route::get('/recruitment', 'AdminEmployerController@recruitment')->name('admin.get.profile.employer');
		Route::get('/recruitment/detail/{id}', 'AdminEmployerController@detailProfile')->name('admin.get.detail.profile.employer');
		Route::get('/{action}/{id}', 'AdminEmployerController@action')->name('action.employer.profile');

		Route::get('/hoa-don', 'AdminEmployerController@hoaDon')->name('employer.hoadon');

		Route::get('/hoa-don/trang-thai/{id}', 'AdminEmployerController@actionTransaction')->name('admin.get.active.transaction');

		Route::get('/account/timevip/{id}', 'AdminEmployerController@viewvip')->name('admin.account.changevip');
		Route::post('/account/timevip/{id}', 'AdminEmployerController@changevip');

	});

	//User
	Route::group(['prefix' => 'users', 'middleware' => 'CheckRoleMod'], function () {
		Route::get('/index', 'AdminUserController@index')->name('admin.get.index.user');

		Route::get('/account', 'AdminUserController@account')->name('admin.get.account.user');
		Route::get('/account/{active}/{id}', 'AdminUserController@actionAccount')->name('action.user.account');
		Route::get('/account/{id}', 'AdminUserController@accountDetail')->name('admin.get.detail.account.user');

		Route::get('/profile', 'AdminUserController@profile')->name('admin.get.profile.user');
		Route::get('/profile/{active}/{id}', 'AdminUserController@actionProfile')->name('action.user.profile');
		Route::get('/profile/{id}', 'AdminUserController@detailProfile')->name('admin.get.detail.profile.user');

	});

	//Bai viet
	Route::group(['prefix' => 'article'], function () {
		Route::get('/', 'AdminArticleController@index')->name('admin.get.list.article');
	});
	Route::group(['prefix' => 'article', 'middleware' => 'CheckRoleMod'], function () {
		Route::get('/create', 'AdminArticleController@create')->name('admin.get.create.article');
		Route::post('/create', 'AdminArticleController@store');
		Route::get('/update/{id}', 'AdminArticleController@edit')->name('admin.get.edit.article');
		Route::post('/update/{id}', 'AdminArticleController@update');
		Route::get('/{action}/{id}', 'AdminArticleController@action')->name('admin.get.action.article');
	});

	//Jobs
	Route::group(['prefix' => 'jobs'], function () {
		Route::get('/', 'AdminJobController@index')->name('admin.get.list.job');
	});
	Route::group(['prefix' => 'jobs', 'middleware' => 'CheckRoleMod'], function () {
		Route::get('/create', 'AdminJobController@create')->name('admin.get.create.job');
		Route::post('/create', 'AdminJobController@store');
		Route::get('/update/{id}', 'AdminJobController@edit')->name('admin.get.edit.job');
		Route::post('/update/{id}', 'AdminJobController@update');
		Route::get('/{action}/{id}', 'AdminJobController@action')->name('admin.get.action.job');
	});

	//Role
	Route::group(['prefix' => 'role', 'middleware' => 'CheckRoleAdmin'], function () {
		Route::get('/', 'AdminRoleController@index')->name('admin.get.list.role');
		Route::get('/create', 'AdminRoleController@create')->name('admin.get.create.role');
		Route::post('/create', 'AdminRoleController@store');
		Route::get('/update/{id}', 'AdminRoleController@edit')->name('admin.get.edit.role');
		Route::post('/update/{id}', 'AdminRoleController@update');
		Route::get('/changepass', 'AdminRoleController@editpass')->name('admin.get.edit.pass');
		Route::post('/changepass', 'AdminRoleController@updatepass');
		Route::get('/{action}/{id}', 'AdminRoleController@action')->name('admin.get.action.role');
	});

});