<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home.index');
Route::post('/', 'UserController@applied');

Route::get('/about-us', function () {
	return view('about-us');
})->name('about-us');

Route::get('/blogs', 'BlogController@index')->name('get.news');
Route::get('/blogs/{slug}-{id}', 'BlogController@detail')->name('get.detail.news');

Route::get('/contact', 'ContactController@index')->name('contact');

// Route::get('nha-tuyen-dung', function () {
// 	return view('tuyen-dung');
// })->name('tuyendung');

//Dang nhap
Route::group(['prefix' => 'dang-nhap', 'namespace' => 'Auth'], function () {

	Route::get('/', 'LoginController@index')->name('login.index');

	Route::get('/nguoi-tim-viec', 'LoginController@getLoginUser')->name('login.user');
	Route::post('/nguoi-tim-viec', 'LoginController@postLoginUser');

	Route::get('/nha-tuyen-dung', 'LoginController@getLoginEmployer')->name('login.employer');
	Route::post('/nha-tuyen-dung', 'LoginController@postLoginEmployer');
});

//Logout
Route::group(['namespace' => 'Auth'], function () {
	Route::get('dang-xuat-user', 'LoginController@getLogoutUser')->name('get.logout.user');
	Route::get('dang-xuat-employer', 'LoginController@getLogoutEmployer')->name('get.logout.employer');
});

//Dang ky
Route::group(['prefix' => 'dang-ky', 'namespace' => 'Auth'], function () {

	Route::get('/', 'RegisterController@index')->name('register.index');

	Route::get('/nguoi-tim-viec', 'RegisterController@getRegisterUser')->name('register.user');
	Route::post('/nguoi-tim-viec', 'RegisterController@postRegisterUser');

	Route::get('/nha-tuyen-dung', 'RegisterController@getRegisterEmployer')->name('register.employer');
	Route::post('/nha-tuyen-dung', 'RegisterController@postRegisterEmployer');
});

//User
Route::group(['prefix' => 'user', 'middleware' => 'CheckLoginUser'], function () {
	Route::get('/info', 'UserController@index')->name('user.info');
	Route::post('/info', 'UserController@saveUpdateInfoUser');

	Route::get('/example-cv', 'UserController@exampleCV')->name('user.exam.cv');

	Route::get('/viec-lam-da-luu', 'UserController@saveProfile')->name('save.profile');

	Route::get('/viec-lam-da-ung-tuyen', 'UserController@applieProfile')->name('applie.profile');

	Route::get('/setting-account', 'UserController@settingAccount')->name('user.setting.account');

});

//Hồ sơ khách hàng
Route::group(['prefix' => 'user/profile', 'middleware' => 'CheckLoginUser'], function () {
	Route::get('/', 'UserProfileController@index')->name('user.profile.index');

	Route::get('/view/{id}', 'UserProfileController@view')->name('user.profile.view');

	Route::get('/create', 'UserProfileController@createProfile')->name('user.profile.create');
	Route::post('/create', 'UserProfileController@saveProfile');

	Route::get('/update/{id}', 'UserProfileController@editProfile')->name('user.profile.update');
	Route::post('/update/{id}', 'UserProfileController@updateProfile');

	Route::get('/{action}/{id}', 'UserProfileController@action')->name('user.get.action.profile');
});

//Nha tuyen dung
Route::group(['prefix' => 'nha-tuyen-dung', 'middleware' => 'CheckLoginEmployer'], function () {
	Route::get('/info', 'EmployerController@index')->name('employer.info');
	Route::post('/info', 'EmployerController@saveUpdateInfoEmployer');

	Route::get('/setting-account', 'EmployerController@settingAccount')->name('employer.setting.account');

});
Route::group(['prefix' => 'nha-tuyen-dung'], function () {

	Route::get('/', 'EmployerController@home')->name('employer.home');

	Route::get('/danh-sach-ho-so', 'EmployerController@viewListProfile')->name('employer.list.profile');

});

//Thông tin tuyển việc
Route::get('/thong-tin/{slug}-{id}', 'EmployerController@thongtinProfile')->name('employer.thongtin.profile');
Route::post('/luu-viec-lam/{slug}-{id}', 'UserController@createProfile');
Route::post('/nop-ho-so/{slug}-{id}', 'UserController@applied');

//Hồ sơ tuyển dụng
Route::group(['prefix' => 'nha-tuyen-dung/profile', 'middleware' => 'CheckLoginEmployer'], function () {
	Route::get('/', 'EmployerProfileController@index')->name('employer.profile.index');

	Route::get('/view/{id}', 'EmployerProfileController@view')->name('employer.profile.view');

	Route::get('/create', 'EmployerProfileController@createProfile')->name('employer.profile.create');
	Route::post('/create', 'EmployerProfileController@saveProfile');

	Route::get('/update/{id}', 'EmployerProfileController@editProfile')->name('employer.profile.update');
	Route::post('/update/{id}', 'EmployerProfileController@updateProfile');

	Route::get('/{action}/{id}', 'EmployerProfileController@action')->name('employer.get.action.profile');
});