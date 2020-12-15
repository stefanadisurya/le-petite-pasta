<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::group(['middleware' => ['auth', 'roles:admin,member']], function () {
    Route::get('/home', 'GlobalController@home')->name('home');
});

Route::group(['middleware' => ['auth', 'roles:admin']], function () {
    Route::get('/users', 'AdminController@users')->name('users');
    Route::get('/users/{user}', 'AdminController@showUser')->name('showuser');
    Route::delete('/users/{user}', 'AdminController@destroyUser')->name('deleteuser');
    Route::get('/add', 'AdminController@add')->name('add');
    Route::post('/add', 'AdminController@store');
    Route::get('/edit/{product}', 'AdminController@edit')->name('edit');
    Route::post('/edit/{product}', 'AdminController@update');
});

Route::get('/', 'GuestController@home')->name('root')->middleware('guest');
Route::get('/menu', 'GuestController@menu')->name('guestmenu')->middleware('guest');
Route::get('/{product}', 'GuestController@order')->name('guestorder')->middleware('guest');

// Route::get('/home', 'HomeController@index')->name('home');
