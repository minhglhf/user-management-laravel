<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'Login\LoginController@index')->name("login_page")->middleware('checkLogin');

//
//Route::prefix('photos')->namespace('User')->group(function () {
//    Route::get('/', 'PhotoController@index')->name('user.index')->middleware('checkLogout');
//    Route::get('/create', 'PhotoController@create')->name('user.create');
//    Route::post('/store', 'PhotoController@store')->name('user.store');
//    Route::get('/show/{id}', 'PhotoController@show')->name('user.show');
//    Route::put('/update/{id}', 'PhotoController@update')->name('user.update');
//    Route::get('/{id}/edit', 'PhotoController@edit')->name('user.edit');
//    Route::delete('/delete/{id}', 'PhotoController@delete')->name('user.delete');
//});

Route::prefix('user')->namespace('User')->group(function () {
    Route::get('/index', 'UserController@index')->name('user.index')->middleware('checkLogout');
    Route::get('/showUser', 'UserController@showUser')->name('user.showUser');
    Route::get('/create', 'UserController@info')->name('user.create');
    Route::post('/store', 'UserController@store')->name('user.store');
    Route::get('/search', 'UserController@infoSearch')->name('user.search');
    Route::post('/find', 'UserController@find')->name('user.find');
    Route::post('/pickId', 'UserController@pickId')->name('user.pickId');
    Route::get('/infoUpdate', 'UserController@infoUpdate')->name('user.infoUpdate');
    Route::put('/update', 'UserController@update')->name('user.update');
    Route::post('/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::delete('/delete/{id}', 'UserController@delete')->name('user.delete');
    Route::post('/restore', 'UserController@restore')->name('user.restore');
    Route::get('/sendMail','UserController@sendMail')->name('user.sendMail');
});

Route::prefix('login')->namespace('Login')->group(function () {
    Route::get('/index', 'LoginController@index')->middleware('checkLogin');
    Route::post('/login', 'LoginController@Login');
    Route::get('/logout', 'LoginController@logout');
});




Auth::routes();

Route::get('/user/index', 'User\UserController@index')->name('user/index');
