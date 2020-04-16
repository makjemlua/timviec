<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home.index');
Route::post('/', 'UserController@applied');

Route::get('/about-us', function () {
	return view('about-us');
})->name('about-us');

Route::get('/blogs', 'BlogController@index')->name('get.news');
Route::get('/blogs/{slug}-{id}', 'BlogController@detail')->name('get.detail.news');
Route::post('/blogs/{slug}-{id}', 'CommentController@store');

Route::group(['prefix' => 'danh-gia'], function () {
	Route::get('/comment-article/{id}', 'CommentController@savingRatingArticle')->name('post.rating.article');
	Route::get('/comment-reply/{id}/{reply}', 'CommentController@savingReplyComment')->name('post.reply.article');
});

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

//Search job
Route::group(['prefix' => 'jobs'], function () {
	Route::get('/viec-lam-{slug}/{job}', 'SearchController@index')->name('search.index');

});

//Search province
Route::group(['prefix' => 'provinces'], function () {
	Route::get('/khu-vuc-{slug}/{province}', 'SearchController@serachjob')->name('search.province');

});

//Search hồ sơ
Route::group(['prefix' => 'nha-tuyen-dung'], function () {
	Route::get('/', 'EmployerController@trangchu')->name('home.tuyendung');
	Route::get('/ho-so', 'SearchController@timhoso')->name('search.hoso');
	//Chi tiet ho so
	Route::get('/ho-so/{slug}-{id}', 'SearchController@viewProfile')->name('employer.detail.userprofile');
	//Luu ho so
	Route::post('/luu-ho-so', 'EmployerController@saveProfile');
	//Get PDF
	Route::get('/get-pdf/{slug}-{id}', 'EmployerController@getpdf')->name('get.pdf');

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

//Cart
Route::group(['prefix' => 'cart'], function () {
	Route::get('/add/{id}', 'CartController@addCart')->name('add.cart');
	Route::get('/delete/{id}', 'CartController@delete')->name('delete.cart');
	Route::get('/destroy', 'CartController@destroy')->name('destroy.cart');
	Route::get('/update', 'CartController@updateCart')->name('update.cart');
	Route::get('/danh-sach', 'CartController@getListCart')->name('get.list.cart');
	Route::get('/danh-sach/{id}', 'CartController@destroy')->name('cart.destroy');

	Route::get('/thanh-toan', 'CartController@getFormPay')->name('get.form.pay');
	Route::post('/thanh-toan', 'CartController@shoppingCart');
	Route::get('/thanh-toan-online', 'CartController@savePay')->name('cart.pay');
	Route::get('/complete', 'CartController@getComplete')->name('complete.cart');
});

// Route::group(['prefix' => 'nha-tuyen-dung'], function () {

// 	Route::get('/ho-so/{slug}-{id}', 'EmployerController@viewListProfile')->name('employer.detail.userprofile');

// });

//Thông tin tuyển việc
Route::get('/thong-tin/{slug}-{id}', 'EmployerController@thongtinProfile')->name('employer.thongtin.profile');
Route::post('/luu-viec-lam/{slug}-{id}', 'UserController@createProfile');
Route::get('/delete-save/{id}', 'UserController@deleteSave')->name('user.get.delete.save');

Route::post('/nop-ho-so/{slug}-{id}', 'UserController@applied');
Route::get('/delete-applie/{id}', 'UserController@deleteApplie')->name('user.get.delete.applie');

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