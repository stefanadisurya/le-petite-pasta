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
    Route::get('/transactions', 'GlobalController@show')->name('transactions');
    Route::get('/transactions/{header}', 'GlobalController@detailTransaction')->name('detailTransaction');
});

Route::group(['middleware' => ['auth', 'roles:admin']], function () {
    Route::get('/users', 'AdminController@users')->name('users');
    Route::get('/users/{user}', 'AdminController@showUser')->name('showuser');
    Route::delete('/users/{user}', 'AdminController@destroyUser')->name('deleteuser');
    Route::get('/add', 'AdminController@add')->name('add');
    Route::post('/add', 'AdminController@store');
    Route::get('/edit/{product}', 'AdminController@edit')->name('edit');
    Route::post('/edit/{product}', 'AdminController@update');
    Route::get('/delete/{product}', 'AdminController@delete')->name('delete');
    Route::delete('/delete/{product}', 'AdminController@destroy');
});

Route::group(['middleware' => ['auth', 'roles:member']], function () {
    Route::get('/menu', 'MemberController@menu')->name('menu');
    Route::get('/menu/{product}', 'MemberController@order')->name('order');
    Route::post('/menu/{product}', 'MemberController@store');
    Route::get('/cart', 'MemberController@cart')->name('cart');
    Route::post('/cart/update/{cart}', 'MemberController@updateQty');
    Route::delete('/cart/remove/{cart}', 'MemberController@remove');
    Route::post('/cart', 'MemberController@checkout')->name('checkout');
});

Route::get('/', 'GuestController@home')->name('root')->middleware('guest');
Route::get('/ourmenu', 'GuestController@menu')->name('guestmenu')->middleware('guest');