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

Route::get('/login/google', 'Auth\LoginController@googleLogin')->name('login.social.google');

Route::get('/login/callback/google', 'Auth\LoginController@googleCallback')->name('login.social.callback.google');

Route::get('/login/line', 'Auth\LoginController@lineLogin')->name('login.social.line');

Route::get('/login/callback/line', 'Auth\LoginController@lineCallback')->name('login.social.callback.line');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/webhook/line', 'LineController')->name('webhook.line');
