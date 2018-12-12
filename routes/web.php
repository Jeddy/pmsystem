<?php

Route::get('/', 'IndexController@index')->name('index.index');

Route::get('/login', 'IndexController@index')->name('login');
Route::get('/register', 'IndexController@index')->name('register');
