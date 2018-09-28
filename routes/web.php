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

Route::view('/', 'welcome')->name('index');

Auth::routes();

Route::get('/login/{social}', 'Auth\LoginController@socialLogin')->name('login.social');

Route::get('/login/callback/{social}', 'Auth\LoginController@socialCallback')->name('login.social.callback');

Route::get('/home', 'HomeController@index')->name('home');
