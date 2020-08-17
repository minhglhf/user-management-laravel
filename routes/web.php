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

Route::prefix('user')->namespace('User')->group(function () {
    Route::get('/index', 'UserController@index')->name('user.index')->middleware('checkLogout');
    Route::get('/showUser', 'UserController@showUser')->name('user.showUser');
    Route::get('/create', 'UserController@info')->name('user.create');
    Route::post('/store', 'UserController@store')->name('user.store');
    Route::get('/search', 'UserController@infoSearch')->name('user.search');
    Route::post('/find', 'UserController@find')->name('user.find');
    Route::get('/infoUpdate', 'UserController@infoUpdate')->name('user.infoUpdate');
    Route::post('/update', 'UserController@update')->name('user.update');
    Route::get('/deleter', 'UserController@delete')->name('user.delete');
});

Route::prefix('login')->namespace('Login')->group(function () {
    Route::get('/index', 'LoginController@index')->middleware('checkLogin');
    Route::post('/login', 'LoginController@Login');
    Route::get('/logout', 'LoginController@logout');
});

