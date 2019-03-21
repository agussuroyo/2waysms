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

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'AccountController@profile')->name('profile');

Route::resource('contact', 'ContactController');
Route::resource('account', 'AccountController');
Route::resource('message', 'MessageController');

Route::put('/change-password/{id}', 'AccountController@changePassword')->name('change.password');
Route::get('/message/create/{contact}', 'MessageController@to')->name('sms.to');