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
Route::get('/', 'Login\LoginController@index')->name("login_page");
Route::get('user/index', 'User\UserController@index')->middleware('login');


Route::prefix('user')->namespace('User')->group(function () {
    Route::get('/index', 'UserController@index')->name('user.index');
    Route::get('/create', 'UserController@create')->name('user.create');
    Route::get('/update', 'UserController@update')->name('user.update');
    Route::get('/deleter', 'UserController@delete')->name('user.delete');
});

Route::prefix('login')->namespace('Login')->group(function () {
    Route::get('/index', 'LoginController@index');
    Route::post('/login', 'LoginController@Login');
    Route::get('/logout', 'LoginController@logout');

});

