<?php

// 首页
Route::get('/', 'HomeController@index')->name('root');

// 登录
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// 注册
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// 重置密码
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// 登录控制
Route::get('logined', 'LoginedController@index')->name('logined');

// 我的
Route::get('/profile/{uid}', 'ProfileController@index')->name('profile');
Route::get('/settings', 'ProfileController@settings')->name('settings');

// 主体
Route::get('/corp/{corp}/spaces', 'CorpController@spaces')->name('corp.spaces');
Route::get('/corp/guide', 'CorpController@guide')->name('corp.guide');
Route::get('/corp/create', 'CorpController@create')->name('corp.create');
Route::post('/corp/create', 'CorpController@store')->name('corp.store');

// 空间

Route::get('/space/create', 'SpaceController@create')->name('space.create');
Route::post('/space/create', 'SpaceController@store')->name('space.store');
Route::get('/space/{space}', 'SpaceController@index')->name('space.index');

// 需求
Route::get('/space/{space}/feature', 'FeatureController@index')->name('feature');